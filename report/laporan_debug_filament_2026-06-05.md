# Laporan Debug & Migrasi Filament v5
**Proyek:** HMM ITS — Admin Panel  
**Tanggal:** 5 Juni 2026  
**Stack:** Laravel + Filament v5.6.6  

---

## Ringkasan Masalah

Seluruh resource dan halaman admin Filament tidak bisa diakses akibat kode yang ditulis untuk **Filament v3** dijalankan di atas **Filament v5.6.6**. Filament v5 memperkenalkan banyak perubahan breaking yang menyebabkan fatal error berantai.

---

## Daftar Bug & Perbaikan

### 1. Type Mismatch pada Property Navigasi
**File:** Semua resource & pages  
**Error:**
```
FatalError: Type of App\Filament\Resources\CabinetMemberResource::$navigationGroup
must be UnitEnum|string|null (as in class Filament\Resources\Resource)
```
**Penyebab:** Filament v5 mengubah tipe properti navigasi dari `?string` menjadi union type dengan enum. Deklarasi di child class harus identik dengan parent.

**Perbaikan:**

| Properti | Tipe v3 (lama) | Tipe v5 (benar) |
|---|---|---|
| `$navigationIcon` | `?string` | `string\|BackedEnum\|null` |
| `$navigationGroup` | `?string` | `string\|UnitEnum\|null` |
| `$navigationLabel` | `?string` | `?string` *(tetap sama)* |
| `$navigationSort` | `?int` | `?int` *(tetap sama)* |

**File yang diubah:** `CabinetMemberResource`, `CabinetUnitResource`, `PostResource`, `CategoryResource`, `ManageSettings`

---

### 2. Method Signature `form()` Tidak Kompatibel
**File:** Semua resource  
**Error:**
```
FatalError: Could not check compatibility between
App\...\CabinetMemberResource::form(Filament\Forms\Form $form): Filament\Forms\Form
and Filament\Resources\Resource::form(Filament\Schemas\Schema $schema): Filament\Schemas\Schema
```
**Penyebab:** Filament v5 mengganti `Filament\Forms\Form` dengan `Filament\Schemas\Schema` sebagai tipe parameter dan return type pada method `form()`.

**Perbaikan:**
```php
// v3 (lama)
public static function form(Form $form): Form { ... }

// v5 (benar)
public static function form(Schema $schema): Schema { ... }
```

---

### 3. `$view` Harus Non-Static di Page
**File:** `ManageSettings.php`  
**Error:**
```
FatalError: Cannot redeclare non static Filament\Pages\Page::$view
as static App\Filament\Pages\ManageSettings::$view
```
**Penyebab:** Di Filament v5 (via Livewire), properti `$view` adalah instance property, bukan static.

**Perbaikan:**
```php
// v3 (lama)
protected static string $view = 'filament.pages.manage-settings';

// v5 (benar)
protected string $view = 'filament.pages.manage-settings';
```

---

### 4. Resource Tidak Muncul di Sidebar (Namespace Salah)
**File:** Semua resource & pages  
**Error:** Resource terdaftar tapi tidak muncul di sidebar, routes tidak tergenerate.  
**Penyebab:** Dua masalah namespace ditemukan:
- **Pages files** masih menggunakan namespace lama `App\Filament\Admin\Resources\...` yang tidak ada
- **Resource files** menggunakan namespace `App\Filament\Resources` padahal file berada di subfolder `CabinetMemberResource/`, sehingga PSR-4 autoloading gagal menemukan class

**Perbaikan:**

| File | Namespace Lama | Namespace Benar |
|---|---|---|
| `CabinetMemberResource.php` | `App\Filament\Resources` | `App\Filament\Resources\CabinetMemberResource` |
| `Pages/ListCabinetMembers.php` | `App\Filament\Admin\Resources\CabinetMembers\Pages` | `App\Filament\Resources\CabinetMemberResource\Pages` |
| *(dan seterusnya untuk semua resource)* | | |

**Total file namespace yang difix:** 16 file (4 resource utama + 12 Pages)

---

### 5. Actions & Components Pindah Namespace
**File:** Semua resource & `ManageSettings`  
**Error:**
```
Class "Filament\Tables\Actions\EditAction" not found
Class "Filament\Forms\Components\Tabs" not found
```
**Penyebab:** Filament v5 memisahkan paket dan memindahkan banyak class ke namespace baru.

**Perbaikan:**

| Class | Namespace v3 (lama) | Namespace v5 (benar) |
|---|---|---|
| `EditAction` | `Filament\Tables\Actions\EditAction` | `Filament\Actions\EditAction` |
| `DeleteAction` | `Filament\Tables\Actions\DeleteAction` | `Filament\Actions\DeleteAction` |
| `Action` (custom) | `Filament\Tables\Actions\Action` | `Filament\Actions\Action` |
| `BulkActionGroup` | `Filament\Tables\Actions\BulkActionGroup` | `Filament\Actions\BulkActionGroup` |
| `DeleteBulkAction` | `Filament\Tables\Actions\DeleteBulkAction` | `Filament\Actions\DeleteBulkAction` |
| `Tabs` | `Filament\Forms\Components\Tabs` | `Filament\Schemas\Components\Tabs` |
| `Tab` | `Filament\Forms\Components\Tabs\Tab` | `Filament\Schemas\Components\Tabs\Tab` |
| `Section` | `Filament\Forms\Components\Section` | `Filament\Schemas\Components\Section` |

---

### 6. Blade Component `filament-panels::form.actions` Tidak Ditemukan
**File:** `resources/views/filament/pages/manage-settings.blade.php`  
**Error:**
```
InvalidArgumentException: Unable to locate a class or view for component
[filament-panels::form.actions]
```
**Penyebab:** Filament v5 menghapus blade component `<x-filament-panels::form>` dan `<x-filament-panels::form.actions>`. Pendekatan custom blade view untuk halaman berform diganti dengan method `content()` di PHP class.

**Perbaikan:** Menghapus custom blade dan menggantinya dengan method `content()` di `ManageSettings.php` menggunakan komponen `Form`, `EmbeddedSchema`, dan `Actions` dari `Filament\Schemas\Components`:

```php
public function content(Schema $schema): Schema
{
    return $schema->components([
        Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions())->key('form-actions'),
            ]),
    ]);
}
```

Blade view disederhanakan menjadi:
```blade
<x-filament-panels::page>
    {{ $this->content }}
</x-filament-panels::page>
```

---

### 7. Penambahan Logo di Navbar
**File:** `AdminPanelProvider.php`  
**Request:** Menambahkan logo di sebelah nama "HMM ITS" di sidebar/navbar admin.

**Perbaikan:** Menambahkan 3 method ke konfigurasi panel:
```php
->brandName('HMM ITS')
->brandLogo(asset('images/logo_hmm.png'))
->brandLogoHeight('2rem')
```
Logo ditempatkan di `public/images/logo_hmm.png`.

---

## Kesimpulan

| # | Kategori | Jumlah File Diubah |
|---|---|---|
| 1 | Tipe properti navigasi | 5 file |
| 2 | Method signature `form()` | 4 file |
| 3 | Static `$view` property | 1 file |
| 4 | Namespace PSR-4 & Pages | 16 file |
| 5 | Import namespace Actions & Components | 5 file |
| 6 | Custom blade → content() pattern | 2 file |
| 7 | Brand logo di provider | 1 file |
| **Total** | | **34 file** |

> [!NOTE]
> Semua error bersumber dari satu masalah utama: **kode ditulis untuk Filament v3 tetapi dijalankan di Filament v5**. Filament v5 adalah versi major dengan banyak breaking changes terutama di namespace, tipe property, dan sistem Schema/Form.
