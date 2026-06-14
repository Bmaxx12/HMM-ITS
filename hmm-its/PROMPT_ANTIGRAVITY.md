# Prompt untuk Antigravity — Frontend HMM ITS Website

Copy semua teks di bawah ini dan kasih ke antigravity sebagai context awal.

---

## PROMPT

Halo! Kamu diminta untuk mengerjakan **frontend (UI/Blade views)** dari website company profile **HMM ITS (Himpunan Mahasiswa Mesin ITS)**. Backend (Laravel 11 + Filament v3) sudah selesai dikerjakan. Tugasmu adalah membuat tampilan publiknya.

---

## TECH STACK

- **Laravel 11** — Blade templating
- **TailwindCSS** — styling utama
- **Alpine.js** — interaksi ringan (sudah include lewat Filament, tidak perlu install)
- **AOS (Animate On Scroll)** — scroll reveal animation
- **Vanilla JS** — untuk navbar scroll effect dan marquee

---

## REFERENSI DESAIN

Website referensi utama: **https://www.hmmitb.com/**
Tone desain: dark editorial, premium, bold — seperti majalah arsitektur/tech. Bukan corporate generik.

---

## DESIGN SYSTEM

### Warna
```css
--color-bg: #0a0a0a;
--color-surface: #141414;
--color-surface-2: #1a1a1a;
--color-border: #2a2a2a;
--color-red: #b91c1c;
--color-red-hover: #dc2626;
--color-white: #ffffff;
--color-text: #e5e5e5;
--color-muted: #737373;
--color-faint: #404040;
```

### Font
```html
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
```
- **Bebas Neue** → hero tagline, angka besar, section title display
- **Inter** → semua teks lainnya

### Tailwind Config
Tambahkan di `tailwind.config.js`:
```javascript
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'hmm': {
          'bg':        '#0a0a0a',
          'surface':   '#141414',
          'surface-2': '#1a1a1a',
          'border':    '#2a2a2a',
          'red':       '#b91c1c',
          'red-hover': '#dc2626',
          'text':      '#e5e5e5',
          'muted':     '#737373',
          'faint':     '#404040',
        }
      },
      fontFamily: {
        'display': ['"Bebas Neue"', 'sans-serif'],
        'body':    ['Inter', 'sans-serif'],
      },
      animation: {
        'marquee':         'marquee 30s linear infinite',
        'marquee-reverse': 'marquee-reverse 30s linear infinite',
      },
      keyframes: {
        marquee: {
          '0%':   { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        'marquee-reverse': {
          '0%':   { transform: 'translateX(-50%)' },
          '100%': { transform: 'translateX(0)' },
        },
      },
    },
  },
  plugins: [require('@tailwindcss/typography')],
}
```

---

## STRUKTUR FOLDER VIEWS

Buat file-file berikut di `resources/views/`:

```
resources/views/
├── layouts/
│   └── app.blade.php              ← layout utama
├── components/
│   ├── navbar.blade.php
│   ├── footer.blade.php
│   ├── section-label.blade.php
│   ├── card-post.blade.php
│   └── card-unit.blade.php
└── pages/
    ├── home.blade.php
    ├── about.blade.php
    └── publikasi/
        ├── index.blade.php
        └── show.blade.php
```

---

## DATA YANG TERSEDIA DI SETIAP VIEW

### `pages/home.blade.php`
```php
$settings    // Collection key-value dari tabel site_settings
$latestPosts // 3 post terbaru, tiap post punya: title, slug, thumbnail, excerpt, published_at, category->name
```

### `pages/about.blade.php`
```php
$settings // Collection key-value dari tabel site_settings
$units    // Collection CabinetUnit digroup by tier:
          // $units['leadership_core'], $units['directing'], $units['executing'], $units['advisory']
          // Tiap unit punya: name, tier, members (collection)
          // Tiap member punya: name, position, photo
```

### `pages/publikasi/index.blade.php`
```php
$settings        // site_settings
$categories      // semua Category (id, name, slug)
$posts           // paginated posts (12/hal), tiap post: title, slug, thumbnail, excerpt, published_at, category->name
$activeCategory  // slug kategori yang sedang aktif (dari query string ?category=xxx)
```

### `pages/publikasi/show.blade.php`
```php
$post    // Post lengkap: title, thumbnail, body (rich text HTML), published_at, author_name, category->name
$related // 3 post related (kategori sama)
```

### Cara akses settings di blade:
```php
{{ $settings->get('hero_tagline', 'Default Tagline') }}
{{ $settings->get('cabinet_name') }}
```

---

## ROUTES (sudah ada, jangan diubah)

```php
GET /                    → HomeController@index        → nama route: 'home'
GET /about               → AboutController@index       → nama route: 'about'
GET /publikasi           → PublikasiController@index   → nama route: 'publikasi.index'
GET /publikasi/{slug}    → PublikasiController@show    → nama route: 'publikasi.show'
```

Penggunaan di blade:
```php
{{ route('home') }}
{{ route('publikasi.show', $post->slug) }}
```

---

## LAYOUT UTAMA (`layouts/app.blade.php`)

Layout ini dipakai oleh semua halaman. Harus include:
- Google Fonts (Bebas Neue + Inter)
- TailwindCSS (via Vite: `@vite(['resources/css/app.css', 'resources/js/app.js'])`)
- AOS CSS + JS
- `@stack('styles')` dan `@stack('scripts')` untuk override per halaman
- Komponen navbar dan footer
- `{{ $slot }}` untuk konten halaman

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HMM ITS' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-hmm-bg text-hmm-text font-body antialiased">
    @include('components.navbar')
    <main>{{ $slot }}</main>
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init({ duration: 700, once: true, offset: 80 });</script>
    @stack('scripts')
</body>
</html>
```

---

## HALAMAN HOME — Section yang harus ada

### 1. Hero
- Full viewport height (`min-h-screen`)
- Background image dengan overlay gradient gelap
- Konten: logo HMM ITS kecil, tagline (`hero_tagline`), sub-tagline (`hero_subtext`), 2 CTA button, nama kabinet (`cabinet_name`)
- CTA Primer: border putih, hover bg putih + teks hitam
- CTA Sekunder: teks + arrow, hover merah

### 2. Marquee
- Dua baris teks bergerak (satu ke kiri, satu ke kanan)
- Teks: `EST · {founding_year} · HIMPUNAN MAHASISWA MESIN ITS ·`
- Warna teks sangat muted (`#2a2a2a` atau `#404040`)
- Border atas bawah tipis

### 3. Tiga Pilar (Study, Society, Solidarity)
- Layout alternating: gambar kiri teks kanan, lalu flip
- Data dari: `pillar_1_title`, `pillar_1_desc`, `pillar_2_title`, dst
- Nomor besar (01, 02, 03) sebagai dekorasi background, warna sangat muted
- Sub-judul warna merah

### 4. Heritage
- Section dengan angka besar `{founding_year}` sebagai dekorasi
- Teks `Est. {founding_year}`, deskripsi singkat (`heritage_desc`)
- Statistik: `{member_count}` anggota

### 5. Highlights Publikasi
- Grid 3 kolom card berita terbaru (dari `$latestPosts`)
- Pakai komponen `card-post`
- Ada tombol "Lihat Semua →" ke halaman publikasi

### 6. Solidarity Forever
- Section full width, gelap
- Quote dari `solidarity_quote`
- 3 CTA link: Lihat Karya, Eksplor Kegiatan, Hubungi Kami

---

## HALAMAN ABOUT — Section yang harus ada

### 1. Hero Kabinet
- Background image + overlay
- Nama kabinet (`cabinet_name`), tagline (`cabinet_tagline`), deskripsi singkat

### 2. Visi & Misi
- Visi: satu paragraf/kalimat besar (`vision`)
- Misi: list dari JSON `mission` — parse dengan `json_decode($settings->get('mission'), true)`

### 3. Organogram
- Dikelompokkan per tier dengan label:
  - `leadership_core` → "Leadership Core // Tier 1"
  - `directing` → "Directing // Tier 2"
  - `executing` → "Executing // Tier 3"
  - `advisory` → "Advisory"
- Tiap tier tampilkan grid card unit (`card-unit`)
- Klik card → modal muncul dengan daftar anggota unit tersebut
- Modal implementasi pakai Alpine.js

### 4. Arah Gerak
- Teks dari `movement_direction`
- Layout simpel dengan tipografi besar

---

## HALAMAN PUBLIKASI — Section yang harus ada

### 1. Header
- Judul "Publikasi & Informasi"
- Deskripsi singkat

### 2. Filter Kategori
- Tombol per kategori dari `$categories`
- Tombol "Semua" selalu ada di depan
- Active state: bg merah, inactive: border tipis
- Klik filter → GET request ke `/publikasi?category={slug}`
- Cek active dengan: `$activeCategory === $category->slug`

### 3. Grid Berita
- 3 kolom desktop, 2 tablet, 1 mobile
- Pakai komponen `card-post`
- Kalau tidak ada post: tampilkan pesan "Belum ada publikasi."

### 4. Pagination
- `{{ $posts->links() }}` — styling disesuaikan dengan dark theme

---

## HALAMAN DETAIL BERITA — Yang harus ada

- Thumbnail full width dengan overlay
- Breadcrumb: Publikasi → Nama Kategori → Judul
- Judul artikel, tanggal, penulis, badge kategori
- Body artikel: `{!! $post->body !!}` dengan class `prose prose-invert` dari Tailwind Typography
- Section "Artikel Terkait" dengan 3 card dari `$related`

---

## KOMPONEN

### `card-post.blade.php`
Props: `$post` (object Post dengan relasi category)
```blade
@props(['post'])
```
Tampilkan: thumbnail (16:9), kategori (merah), tanggal, judul (2 baris max), excerpt (3 baris max), link "Baca →"

### `card-unit.blade.php`
Props: `$unit` (object CabinetUnit dengan relasi members)
```blade
@props(['unit'])
```
Tampilkan: foto placeholder / foto unit, tag tier, nama unit, "Lihat Detail →"
Klik → trigger Alpine.js modal

### `section-label.blade.php`
Props: `$label` (string)
```blade
@props(['label'])
<span class="...uppercase tracking-widest text-hmm-muted text-xs font-medium">{{ $label }}</span>
```

---

## ATURAN PENTING

1. Semua halaman extend `layouts/app.blade.php` menggunakan `<x-layouts.app>`
2. Background selalu gelap — tidak ada section putih
3. Merah (`#b91c1c`) hanya untuk accent: CTA, border hover card, kategori badge, underline
4. Semua card punya hover: `border-hmm-red` + `translateY(-3px)` transition
5. Gunakan `data-aos="fade-up"` di setiap section untuk scroll reveal
6. Navbar: transparan di top, gelap + border saat scroll (pakai Alpine atau vanilla JS)
7. Gambar yang belum ada pakai placeholder dengan bg `#1a1a1a`
8. Semua teks dari `$settings` harus ada fallback default: `$settings->get('key', 'Default')`
9. Foto member/unit: `asset('storage/' . $member->photo)` — kalau null tampilkan avatar inisial nama
10. Pagination dark theme: publish custom pagination view di `resources/views/vendor/pagination/`

---

## REFERENSI TAMBAHAN

- Lihat langsung: https://www.hmmitb.com/ untuk feel dan layout
- Design guide lengkap sudah tersedia di file `DESIGN_GUIDE_HMM_ITS.md`
- PRD lengkap tersedia di file `PRD_HMM_ITS_Website_v2.md`

---

*Kalau ada pertanyaan soal struktur data atau logic backend, tanya ke Ardan.*
