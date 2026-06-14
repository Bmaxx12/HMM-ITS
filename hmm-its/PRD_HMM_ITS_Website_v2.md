# Product Requirements Document (PRD)
## Website Company Profile — Himpunan Mahasiswa Mesin ITS
### Versi 2.0 | Juni 2026 | Revisi: Referensi HMM ITB + Struktur Organogram Fleksibel

---

## 1. Overview Produk

**Nama Proyek:** HMM ITS Company Profile Website
**Tech Stack:** Laravel 13, Filament v3 (Admin Panel), MySQL, TailwindCSS
**Target Audiens:** Mahasiswa, masyarakat umum, mitra industri
**Tujuan:** Menyediakan informasi resmi HMM ITS secara digital — profil organisasi, kabinet aktif beserta struktur per divisi, dan publikasi berita yang dapat dikelola admin.

---

## 2. Scope & Out of Scope

### ✅ Dalam Scope
- 3 halaman publik: Home, About Us, Publikasi
- Admin panel berbasis Filament untuk manajemen konten
- Manajemen berita/publikasi (CRUD)
- Manajemen struktur organogram fleksibel (per unit/divisi + anggota per unit)
- Manajemen konten statis via site_settings (visi, misi, logo, pilar, dll)
- Upload gambar untuk thumbnail berita dan foto anggota

### ❌ Di Luar Scope (v1)
- Sistem komentar publik
- Login anggota / LMS
- Forum diskusi
- Sistem pendaftaran anggota
- Multi-bahasa
- Halaman events/kegiatan terpisah

---

## 3. Halaman Publik

### 3.1 Home (`/`)

**Tujuan:** Memperkenalkan HMM ITS secara kuat dan berkarakter.

| Section | Deskripsi | Sumber Data |
|---|---|---|
| Hero | Logo, tagline utama, sub-tagline, CTA | `site_settings` |
| Marquee / Ticker | Teks bergerak "EST · 19XX · HIMPUNAN MAHASISWA MESIN ITS" | `site_settings` |
| Tiga Pilar | Study, Society, Solidarity — judul, deskripsi, gambar tiap pilar | `site_settings` |
| Heritage / Est. | Tahun berdiri, highlight historis singkat, statistik anggota | `site_settings` |
| Highlights Publikasi | 3 berita terbaru | `posts` (3 terbaru published) |
| Solidarity Forever | Quote penutup + CTA | `site_settings` |

---

### 3.2 About Us (`/about`)

**Tujuan:** Menampilkan profil dan struktur kabinet aktif secara lengkap.

| Section | Deskripsi | Sumber Data |
|---|---|---|
| Hero Kabinet | Nama kabinet, tagline, foto hero | `site_settings` |
| Makna Logo | Penjelasan per elemen logo (bisa multi-bagian) | `site_settings` (JSON) |
| Visi & Misi | Visi + daftar misi (bisa dikelompokkan per fondasi/strategi/tata kelola) | `site_settings` |
| Organogram | Daftar unit/divisi per tier, tiap unit tampil anggotanya + jabatan | `cabinet_units` + `cabinet_members` |
| Arah Gerak | Deskripsi inkubator / program kabinet | `site_settings` |

---

### 3.3 Publikasi (`/publikasi`)

**Tujuan:** Menampilkan semua berita/artikel yang dipublikasikan.

| Section | Deskripsi | Sumber Data |
|---|---|---|
| Header | Judul + deskripsi halaman | `site_settings` |
| Filter Kategori | Tombol filter per kategori | `categories` |
| Grid Berita | Card: thumbnail, kategori, tanggal, judul, excerpt | `posts` |
| Pagination | 12 post per halaman | — |

---

### 3.4 Detail Berita (`/publikasi/{slug}`)

Thumbnail, judul, kategori, tanggal, penulis, body artikel (rich text).

---

## 4. Admin Panel (Filament)

**URL:** `/admin`
**Auth:** Email + password (Laravel default via Filament)

### Resources Admin

| Resource | Aksi |
|---|---|
| **Posts** | CRUD, toggle publish/draft |
| **Categories** | CRUD |
| **Cabinet Units** | CRUD, atur tier & urutan tampil |
| **Cabinet Members** | CRUD, assign ke unit, atur jabatan & urutan |
| **Site Settings** | Update semua konten statis |

---

## 5. Database Schema

### Tabel: `categories`
```sql
id          BIGINT UNSIGNED PK AUTO_INCREMENT
name        VARCHAR(100) NOT NULL
slug        VARCHAR(100) UNIQUE NOT NULL
created_at  TIMESTAMP
updated_at  TIMESTAMP
```

---

### Tabel: `posts`
```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
title           VARCHAR(255) NOT NULL
slug            VARCHAR(255) UNIQUE NOT NULL
thumbnail       VARCHAR(255) NULLABLE
excerpt         TEXT NULLABLE
body            LONGTEXT NOT NULL
category_id     BIGINT UNSIGNED FK → categories.id (nullOnDelete)
author_name     VARCHAR(100) NOT NULL
status          ENUM('draft', 'published') DEFAULT 'draft'
published_at    TIMESTAMP NULLABLE
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

---

### Tabel: `cabinet_units`

Menyimpan setiap unit/divisi/bureau dalam kabinet.

```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
name            VARCHAR(150) NOT NULL    -- "Bureau of Human Capital", "Dept. Keilmuan", dll
tier            ENUM(
                  'leadership_core',     -- Tier 1: Pimpinan inti (Ketua, Wakil, dll)
                  'directing',           -- Tier 2: Kepala bureau / department
                  'executing',           -- Tier 3: Sub-bureau / divisi pelaksana
                  'advisory'             -- Eksternal: DPA, Senator, dll
                ) NOT NULL
parent_unit_id  BIGINT UNSIGNED NULLABLE FK → cabinet_units.id (nullOnDelete)
                -- Untuk grup sub-unit ke induknya,
                -- misal: "Sub-Bureau of Web Dev" → parent: "Bureau of Creative Comm"
order_number    TINYINT UNSIGNED DEFAULT 0  -- urutan tampil dalam tier
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

---

### Tabel: `cabinet_members`

Menyimpan anggota per unit dengan jabatan spesifik masing-masing.

```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
cabinet_unit_id BIGINT UNSIGNED FK → cabinet_units.id (cascadeOnDelete)
name            VARCHAR(150) NOT NULL
position        VARCHAR(150) NOT NULL    -- "Ketua Umum", "Kepala Bureau", "Staff", dll
                                         -- bebas diisi admin, fleksibel per orang
photo           VARCHAR(255) NULLABLE
order_number    TINYINT UNSIGNED DEFAULT 0  -- urutan tampil dalam unit
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

---

### Tabel: `site_settings`

Key-value store untuk semua konten statis yang bisa diubah admin.

```sql
id          BIGINT UNSIGNED PK AUTO_INCREMENT
key         VARCHAR(100) UNIQUE NOT NULL
value       LONGTEXT NULLABLE
created_at  TIMESTAMP
updated_at  TIMESTAMP
```

**Daftar key yang digunakan:**

| Key | Tipe Value | Deskripsi |
|---|---|---|
| `hero_tagline` | string | Tagline besar di hero Home |
| `hero_subtext` | string | Kalimat deskriptif di bawah tagline |
| `founding_year` | string | Tahun berdiri, untuk marquee & heritage |
| `member_count` | string | Jumlah anggota aktif |
| `pillar_1_title` | string | Judul pilar 1 (contoh: "Study") |
| `pillar_1_desc` | text | Deskripsi pilar 1 |
| `pillar_2_title` | string | Judul pilar 2 (contoh: "Society") |
| `pillar_2_desc` | text | Deskripsi pilar 2 |
| `pillar_3_title` | string | Judul pilar 3 (contoh: "Solidarity") |
| `pillar_3_desc` | text | Deskripsi pilar 3 |
| `heritage_desc` | text | Deskripsi singkat sejarah HMM ITS |
| `solidarity_quote` | string | Quote "Solidarity Forever" di penutup Home |
| `cabinet_name` | string | Nama kabinet aktif |
| `cabinet_tagline` | string | Tagline kabinet di hero About |
| `cabinet_description` | text | Deskripsi singkat kabinet |
| `logo_meaning` | JSON | Array elemen makna logo (lihat format di bawah) |
| `vision` | text | Visi kabinet (satu kalimat/paragraf) |
| `mission` | JSON | Array misi (lihat format di bawah) |
| `movement_direction` | text | Deskripsi arah gerak / inkubator kabinet |
| `contact_email` | string | Email kontak HMM ITS |
| `instagram_url` | string | URL Instagram |
| `youtube_url` | string | URL YouTube (opsional) |

**Format JSON untuk `logo_meaning`:**
```json
[
  {
    "order": 1,
    "title": "Pionir",
    "description": "Bentuk-bentuk ini menyusun huruf P yang merepresentasikan semangat kepemimpinan dan inovasi."
  },
  {
    "order": 2,
    "title": "Berkarya",
    "description": "Komposisi serupa membentuk huruf B yang melambangkan kreativitas dan kontribusi."
  }
]
```

**Format JSON untuk `mission`:**
```json
[
  {
    "group": "Fondasi",
    "items": [
      { "order": 1, "title": "Karya Teknis", "desc": "Membentuk wadah pengembangan kemampuan berkarya anggota secara teknis dan inovatif." },
      { "order": 2, "title": "Pionir Pribadi", "desc": "Mengembangkan anggota menjadi pionir dengan sistem perkembangan diri yang terpersonalisasi." }
    ]
  },
  {
    "group": "Strategi",
    "items": [
      { "order": 3, "title": "Lingkungan Sehat", "desc": "Memastikan pemenuhan kebutuhan dasar anggota di lingkungan yang suportif." }
    ]
  }
]
```
> Kalau tidak mau pakai grup, `group` bisa dikosongkan atau dihilangkan — frontend tetap bisa render flat list.

---

## 6. Relasi Antar Tabel

```
categories ──< posts               (1 kategori, banyak post)

cabinet_units ──< cabinet_units    (self-referential: parent_unit_id, untuk sub-unit)
cabinet_units ──< cabinet_members  (1 unit, banyak anggota)
```

**Total: 5 tabel** — tetap ramping untuk company profile.

---

## 7. Contoh Data Organogram

Ilustrasi bagaimana data disimpan dan ditampilkan:

```
cabinet_units
─────────────────────────────────────────────────────
id  name                        tier              parent
1   Pimpinan Inti               leadership_core   null
2   Bureau of Human Capital     directing         null
3   Sub-Bureau of Member Dev    executing         2      ← child dari unit id 2
4   Dept. Keilmuan              directing         null
5   DPA                         advisory          null

cabinet_members
─────────────────────────────────────────────────────
id  unit_id  name         position          order
1   1        Budi S.      Ketua Umum        1
2   1        Ani R.       Wakil Ketua       2
3   2        Candra W.    Kepala Bureau     1
4   2        Dina P.      Staff             2
5   3        Eko M.       Kepala Sub-Bureau 1
```

Di halaman About, frontend mengambil semua unit, group by tier, lalu untuk tiap unit tampilkan anggotanya. Sub-unit ditampilkan di bawah parent-nya.

---

## 8. Routing

```
GET  /                     → HomeController@index
GET  /about                → AboutController@index
GET  /publikasi            → PublikasiController@index
GET  /publikasi/{slug}     → PublikasiController@show
GET  /admin                → Filament Admin Panel
```

---

## 9. Non-Functional Requirements

- **Responsive:** Mobile-first
- **SEO:** Meta title & description dinamis per halaman
- **Performance:** Lazy load gambar, eager load relasi di controller
- **Security:** Admin panel hanya bisa diakses user terdaftar
- **Storage:** `storage/app/public` + symlink untuk upload

---
## 10. Milestones

| Fase | Scope | Est. |
|---|---|---|
| **Fase 1** | Setup Laravel + Filament, migration 5 tabel | 1–2 hari |
| **Fase 2** | Filament Resources: Posts, Categories, Units, Members, Settings | 2–3 hari |
| **Fase 3** | Frontend: Home page | 1–2 hari |
| **Fase 4** | Frontend: About Us + Organogram | 1–2 hari |
| **Fase 5** | Frontend: Publikasi + Detail Berita | 1 hari |
| **Fase 6** | Polish, responsive, SEO meta, testing | 1–2 hari |

---

*Versi 2.0 — Direvisi berdasarkan referensi hmmitb.com dan kebutuhan organogram fleksibel per divisi.*
