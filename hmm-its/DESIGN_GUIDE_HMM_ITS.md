# Design Guide — HMM ITS Website
## Referensi: hmmitb.com | Versi 1.0 | Juni 2026

> Dokumen ini adalah panduan desain untuk tim frontend HMM ITS. Tujuannya agar visual website konsisten, terarah, dan setara kualitasnya dengan HMM ITB.

---

## 1. Filosofi Desain

Website ini bukan company profile biasa. Tone-nya adalah **dark editorial** — serius, bold, premium — seperti majalah arsitektur atau brand teknologi kelas atas. Bukan corporate biru-putih generik.

Tiga kata kunci yang harus selalu jadi acuan:
- **Presisi** — setiap elemen punya tujuan, tidak ada dekorasi yang sia-sia
- **Karya** — visual mendukung narasi karya dan prestasi
- **Dampak** — desain harus terasa berat dan berkesan, bukan ringan dan ceria

---

## 2. Warna

### Palet Utama

| Nama | Hex | Penggunaan |
|---|---|---|
| `--color-bg` | `#0a0a0a` | Background halaman utama |
| `--color-surface` | `#141414` | Card, modal, navbar |
| `--color-surface-2` | `#1a1a1a` | Input, hover state card |
| `--color-border` | `#2a2a2a` | Border default semua elemen |
| `--color-border-hover` | `#3a3a3a` | Border saat hover (bukan merah) |
| `--color-red` | `#b91c1c` | Accent utama — CTA, highlight, underline |
| `--color-red-hover` | `#dc2626` | Hover state elemen merah |
| `--color-white` | `#ffffff` | Heading utama |
| `--color-text-primary` | `#e5e5e5` | Body text, nama |
| `--color-text-secondary` | `#737373` | Label, caption, tag |
| `--color-text-muted` | `#404040` | Placeholder, divider text |

### Aturan Warna
- Background **selalu gelap** — tidak ada section putih di halaman publik
- Merah **hanya untuk accent** — CTA button, underline judul section, border card saat hover, icon aktif
- Jangan pakai merah untuk background block besar
- Gradasi warna antar section pakai variasi gelap: `#0a0a0a` → `#0f0f0f` → `#141414`

---

## 3. Tipografi

### Font yang Digunakan

```html
<!-- Di <head> layout utama -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
```

| Peran | Font | Weight | Contoh Penggunaan |
|---|---|---|---|
| Display / Hero | `Bebas Neue` | 400 (sudah bold by nature) | Tagline hero, angka besar (80+), section title besar |
| Heading | `Inter` | 700 | H2, H3 dalam konten |
| Body | `Inter` | 400 | Paragraf, deskripsi |
| Label / Tag | `Inter` | 500 | Tier label, kategori, badge |
| Mono / Kode | `Inter` | 400 | Nomor urut (01, 02, 03) |

### Skala Ukuran

```css
/* Hero tagline */
.text-hero      { font-size: clamp(3rem, 8vw, 7rem); font-family: 'Bebas Neue'; letter-spacing: 0.02em; }

/* Section title besar */
.text-display   { font-size: clamp(2rem, 5vw, 4rem); font-family: 'Bebas Neue'; }

/* Heading section */
.text-h2        { font-size: clamp(1.5rem, 3vw, 2.25rem); font-weight: 700; line-height: 1.2; }

/* Sub-heading */
.text-h3        { font-size: 1.125rem; font-weight: 600; line-height: 1.4; }

/* Body */
.text-body      { font-size: 0.9375rem; font-weight: 400; line-height: 1.7; }

/* Label kecil */
.text-label     { font-size: 0.6875rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase; }

/* Caption */
.text-caption   { font-size: 0.8125rem; font-weight: 400; }
```

### Aturan Tipografi
- Label section (seperti "KABINET", "HERITAGE", "SOLIDARITY") selalu **uppercase + letter-spacing lebar** dengan warna `--color-text-secondary`
- Judul section pakai **Bebas Neue** untuk yang besar, Inter 700 untuk yang lebih kecil
- Line-height heading: 1.1–1.2. Line-height body: 1.6–1.7
- Jangan pakai font lain selain dua font di atas

---

## 4. Spacing & Layout

### Container

```css
.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 24px;
}

@media (min-width: 768px) {
  .container { padding: 0 48px; }
}

@media (min-width: 1024px) {
  .container { padding: 0 80px; }
}
```

### Section Padding

```css
/* Section standar */
.section        { padding: 96px 0; }

/* Section besar (hero, solidarity) */
.section-lg     { padding: 140px 0; }

/* Section kecil (marquee, divider) */
.section-sm     { padding: 48px 0; }
```

### Aturan Spacing
- Gunakan kelipatan 8px untuk semua spacing (8, 16, 24, 32, 48, 64, 96, 128)
- Gap antar card: **16px** (mobile) → **24px** (desktop)
- Margin bawah label sebelum heading: **12px**
- Margin bawah heading sebelum deskripsi: **16–24px**

---

## 5. Komponen

### 5.1 Navbar

```
[Logo HMM ITS]          [Home] [Publikasi] [About]          [—]
```

- Background: `transparent` saat di top, `#0f0f0f` + `border-bottom: 0.5px solid #1e1e1e` saat scroll
- Height: `64px`
- Transisi background: `transition: background 0.3s ease`
- Logo di kiri, nav link di tengah/kanan
- Tidak ada button CTA di navbar (berbeda dari ITB yang ada Sign In karena mereka punya LMS)
- Link aktif: warna `#ffffff`, tidak aktif: `#737373`, hover: `#e5e5e5`

### 5.2 Hero Section

Struktur layer (dari bawah ke atas):
1. **Background image** — full cover, gelap, `object-fit: cover`
2. **Overlay** — `background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(10,10,10,0.95))`
3. **Konten** — logo kabinet, tagline, sub-tagline, dua CTA button, nama kabinet

```
[Logo HMM ITS kecil]
[TAGLINE BESAR — Bebas Neue]
[Sub-tagline — Inter regular]

[CTA Primer]  [CTA Sekunder]

              KABINET
         NAMA KABINET AKTIF
```

CTA Primer: `border: 1px solid #ffffff`, bg transparan, hover: bg putih + teks hitam
CTA Sekunder: teks saja dengan panah `→`, hover: teks merah

### 5.3 Marquee / Ticker

```css
/* Teks berulang bergerak ke kiri, infinite */
.marquee-track {
  display: flex;
  gap: 48px;
  animation: marquee 30s linear infinite;
  white-space: nowrap;
}

@keyframes marquee {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
```

- Teks: `EST · 19XX · HIMPUNAN MAHASISWA MESIN ITS ·`
- Font: `Inter 500`, uppercase, letter-spacing lebar
- Warna: `#2a2a2a` (sangat muted) atau `#404040`
- Border atas dan bawah: `0.5px solid #1e1e1e`
- Dua baris marquee, satu ke kiri satu ke kanan (seperti ITB)

### 5.4 Section Label

Selalu muncul di atas setiap heading section:

```html
<span class="section-label">Heritage</span>
<h2 class="section-title">Est. 1946</h2>
```

```css
.section-label {
  display: block;
  font-size: 0.6875rem;
  font-weight: 500;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: #737373;
  margin-bottom: 12px;
}
```

### 5.5 Card Publikasi

```
┌─────────────────────────┐
│  [Thumbnail 16:9]       │
│                         │
├─────────────────────────┤
│  [Kategori] · [Tanggal] │
│  Judul Berita Yang...   │
│  Excerpt singkat...     │
│                 Baca →  │
└─────────────────────────┘
```

```css
.card {
  background: #141414;
  border: 0.5px solid #2a2a2a;
  border-radius: 12px;
  overflow: hidden;
  transition: border-color 0.2s, transform 0.2s;
}
.card:hover {
  border-color: #b91c1c;
  transform: translateY(-3px);
}
```

- Thumbnail: `aspect-ratio: 16/9`, `object-fit: cover`
- Padding body card: `20px`
- Kategori: warna merah `#b91c1c`, uppercase, font-size 11px
- Judul: Inter 600, 2 baris max (`-webkit-line-clamp: 2`)
- Excerpt: warna `#737373`, 3 baris max
- "Baca →": warna merah, hover: translate ke kanan 3px

### 5.6 Card Organogram (Unit)

```
┌─────────────────────────┐
│  [Foto Unit / Placeholder]│
│  [tag: Unit / Core Role]│
├─────────────────────────┤
│  Nama Unit              │
│  Lihat Detail →         │
└─────────────────────────┘
```

Sama seperti card publikasi tapi:
- Foto: `aspect-ratio: 4/3`
- Tag posisi absolute di atas foto: `top: 10px; left: 10px`
- CTA "Lihat Detail →" warna merah

### 5.7 Modal Anggota

Muncul saat card organogram diklik:

```
┌────────────────────────────────┐
│  [Tag tier]                    │
│  Nama Unit                     │
│ ─────────────────────────────  │
│  [Avatar] Nama Anggota         │
│           Jabatan              │
│  [Avatar] Nama Anggota         │
│           Jabatan              │
│ ─────────────────────────────  │
│         [Tutup]                │
└────────────────────────────────┘
```

- Background overlay: `rgba(0,0,0,0.85)`
- Modal: `background: #141414`, `border: 0.5px solid #2a2a2a`, `border-radius: 16px`
- Avatar: lingkaran `36x36px`, inisial nama, background `#1e1e1e`
- Implementasi: Alpine.js `x-show` + `x-transition`

### 5.8 Pilar Section (Study, Society, Solidarity)

Layout alternating — gambar kiri teks kanan, lalu teks kiri gambar kanan:

```
[Gambar full]    01 / Study
                 ──────────
                 Keilmuan & karya
                 Deskripsi pilar...
```

- Nomor: Bebas Neue, besar, warna `#1e1e1e` (sangat muted sebagai dekorasi)
- Nama pilar: Bebas Neue display size
- Sub-judul: Inter 500, warna merah
- Deskripsi: Inter regular, warna `#737373`
- Gambar: `object-fit: cover`, full height section, slight dark overlay

### 5.9 Heritage / Timeline

```
             Est. 1946
80+          Dari 1946 — terus bergerak.
YEARS IN MOTION

●─────────────────────────●
1946                    Sekarang
Establishment           Pionir Berkarya
Deskripsi...           Deskripsi...
```

- Angka besar: Bebas Neue, `clamp(4rem, 10vw, 8rem)`, warna `#1e1e1e` sebagai dekorasi di belakang
- Timeline: garis horizontal `0.5px solid #2a2a2a`, titik merah di tiap milestone
- Label tahun: uppercase, letter-spacing

---

## 6. Animasi & Interaksi

### Scroll Reveal
Pakai **AOS (Animate On Scroll)** — sudah ringan dan mudah:

```html
<!-- Di <head> -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- Sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 80 });</script>
```

Penggunaan di Blade:
```html
<div data-aos="fade-up">...</div>
<div data-aos="fade-up" data-aos-delay="100">...</div>
<div data-aos="fade-up" data-aos-delay="200">...</div>
```

### Navbar Scroll Effect
```javascript
window.addEventListener('scroll', () => {
  const nav = document.getElementById('navbar');
  if (window.scrollY > 50) {
    nav.classList.add('scrolled'); // tambah background + border
  } else {
    nav.classList.remove('scrolled');
  }
});
```

### Hover States
- Card: `transform: translateY(-3px)` + `border-color: #b91c1c`
- Link navigasi: `color` transition 0.2s
- Arrow icon: `transform: translateX(3px)` transition 0.2s
- Button: background swap transition 0.2s

### Yang TIDAK perlu dipakai
- Parallax berat (performa buruk di mobile)
- Loading screen / splash screen
- Auto-play video background
- Cursor custom

---

## 7. Responsif

### Breakpoints (sesuai Tailwind default)

| Nama | Min-width | Penggunaan |
|---|---|---|
| `sm` | 640px | Penyesuaian kecil |
| `md` | 768px | Layout 2 kolom mulai |
| `lg` | 1024px | Layout desktop penuh |
| `xl` | 1280px | Container max-width |

### Aturan Responsif per Komponen

**Grid card publikasi:**
- Mobile: 1 kolom
- Tablet (md): 2 kolom
- Desktop (lg): 3 kolom

**Grid organogram:**
- Mobile: 2 kolom
- Tablet: 3 kolom
- Desktop: 4–5 kolom

**Hero tagline:**
- Gunakan `clamp()` — tidak perlu override manual per breakpoint

**Pilar section:**
- Mobile: stack vertikal (gambar atas, teks bawah)
- Desktop: side by side alternating

**Navbar:**
- Mobile: hamburger menu, drawer dari kiri/kanan
- Desktop: link horizontal

---

## 8. Tailwind Config

Tambahkan custom config ini di `tailwind.config.js`:

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
          'bg':         '#0a0a0a',
          'surface':    '#141414',
          'surface-2':  '#1a1a1a',
          'border':     '#2a2a2a',
          'red':        '#b91c1c',
          'red-hover':  '#dc2626',
          'text':       '#e5e5e5',
          'muted':      '#737373',
          'faint':      '#404040',
        }
      },
      fontFamily: {
        'display': ['"Bebas Neue"', 'sans-serif'],
        'body':    ['Inter', 'sans-serif'],
      },
      fontSize: {
        'hero': ['clamp(3rem, 8vw, 7rem)', { lineHeight: '1.0', letterSpacing: '0.02em' }],
        'display': ['clamp(2rem, 5vw, 4rem)', { lineHeight: '1.1' }],
      },
      borderWidth: {
        'thin': '0.5px',
      },
      animation: {
        'marquee': 'marquee 30s linear infinite',
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
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
```

---

## 9. Struktur File Blade

```
resources/views/
├── layouts/
│   └── app.blade.php          ← layout utama (navbar, footer, AOS init)
├── pages/
│   ├── home.blade.php
│   ├── about.blade.php
│   └── publikasi/
│       ├── index.blade.php
│       └── show.blade.php
└── components/
    ├── navbar.blade.php
    ├── footer.blade.php
    ├── card-post.blade.php     ← card berita
    ├── card-unit.blade.php     ← card organogram
    ├── section-label.blade.php ← label kecil di atas heading
    └── marquee.blade.php
```

---

## 10. Checklist Sebelum Launch

- [ ] Semua heading pakai Bebas Neue (display) atau Inter 700
- [ ] Tidak ada warna putih / terang sebagai background section
- [ ] Merah hanya dipakai sebagai accent, bukan block besar
- [ ] Semua card punya hover state (border merah + translate Y)
- [ ] Marquee berjalan smooth di mobile dan desktop
- [ ] Navbar berubah background saat scroll
- [ ] Gambar hero punya overlay gelap yang cukup agar teks terbaca
- [ ] Scroll reveal aktif (AOS) di semua section utama
- [ ] Responsif dicek di 375px (iPhone SE), 768px (tablet), 1280px (desktop)
- [ ] Foto organogram fallback ke placeholder jika kosong
- [ ] Modal anggota bisa ditutup dengan klik overlay atau tombol Tutup

---

*Design Guide ini dibuat berdasarkan analisis hmmitb.com sebagai referensi utama.*
*Tim antigravity bebas bereksperimen selama mengikuti color palette, tipografi, dan tone yang sudah ditetapkan.*
