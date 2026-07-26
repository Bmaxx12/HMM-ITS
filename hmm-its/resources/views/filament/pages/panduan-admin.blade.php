<x-filament-panels::page>
    {{-- Tailwind CDN & Google Fonts --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .guide-container { font-family: 'Inter', sans-serif; }
        .font-bebas { font-family: 'Bebas Neue', sans-serif; letter-spacing: 0.03em; }
    </style>

    <div class="guide-container space-y-12 -mt-4 text-[#e5e5e5]">

        {{-- ===== HEADER SECTION ===== --}}
        <div class="relative overflow-hidden rounded-3xl bg-[#141414] border border-[#2a2a2a] p-8 sm:p-12 shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-[#b91c1c]/10 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute -top-16 -right-16 w-80 h-80 bg-[#b91c1c]/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10">
                
                <h1 class="text-4xl sm:text-6xl text-white uppercase font-bebas leading-none mb-4">
                    Panduan Penggunaan Admin Dashboard
                </h1>
                <p class="text-[#a3a3a3] text-sm sm:text-base max-w-2xl leading-relaxed">
                    Petunjuk resmi pengelolaan website HMM ITS. Ikuti langkah-langkah di bawah untuk merilis publikasi berita, menyatukan foto kelompok organogram, serta memperbarui visi &amp; misi kabinet.
                </p>
            </div>
        </div>

        {{-- ===== MAIN GRID ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

            {{-- Sidebar Index Navigation --}}
            <div class="lg:col-span-1">
                <div class="sticky top-6 bg-[#141414] border border-[#2a2a2a] p-6 rounded-2xl space-y-4 shadow-xl">
                    <h3 class="text-xs text-[#b91c1c] font-bold uppercase tracking-widest mb-2 border-b border-[#2a2a2a] pb-3">
                        Daftar Isi Panduan
                    </h3>
                    <div class="space-y-2">
                        <a href="#postingan" class="flex items-center gap-3 text-sm text-[#a3a3a3] hover:text-white hover:bg-[#1a1a1a] p-3 rounded-xl transition-all group border border-transparent hover:border-[#2a2a2a]">
                            <span class="w-8 h-8 rounded-lg bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xs flex items-center justify-center group-hover:bg-[#b91c1c] group-hover:text-white transition-all">01</span>
                            <span class="font-medium">Kelola Berita / Publikasi</span>
                        </a>
                        <a href="#organogram" class="flex items-center gap-3 text-sm text-[#a3a3a3] hover:text-white hover:bg-[#1a1a1a] p-3 rounded-xl transition-all group border border-transparent hover:border-[#2a2a2a]">
                            <span class="w-8 h-8 rounded-lg bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xs flex items-center justify-center group-hover:bg-[#b91c1c] group-hover:text-white transition-all">02</span>
                            <span class="font-medium">Organogram &amp; Kelompok Foto</span>
                        </a>
                        <a href="#pengaturan" class="flex items-center gap-3 text-sm text-[#a3a3a3] hover:text-white hover:bg-[#1a1a1a] p-3 rounded-xl transition-all group border border-transparent hover:border-[#2a2a2a]">
                            <span class="w-8 h-8 rounded-lg bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xs flex items-center justify-center group-hover:bg-[#b91c1c] group-hover:text-white transition-all">03</span>
                            <span class="font-medium">Visi &amp; Misi Kabinet</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Detailed Content --}}
            <div class="lg:col-span-2 space-y-10">

                {{-- SECTION 1 --}}
                <div id="postingan" class="bg-[#141414] border border-[#2a2a2a] p-8 rounded-2xl shadow-xl space-y-6 scroll-mt-6 relative">
                    <div class="flex items-center gap-4 border-b border-[#2a2a2a] pb-6">
                        <div class="w-12 h-12 rounded-xl bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xl flex items-center justify-center font-bebas">01</div>
                        <div>
                            <h2 class="text-3xl text-white uppercase font-bebas leading-none mb-1">Mengelola Berita &amp; Publikasi</h2>
                            <p class="text-xs text-[#737373]">Panduan menambah, mengedit, dan merilis artikel publikasi pada website.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Buka menu <strong class="text-white">Publikasi &gt; Posts</strong> pada sidebar navigasi di sebelah kiri.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Klik tombol <strong class="text-white">+ New Post</strong> yang berada di pojok kanan atas tabel.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Isi <strong class="text-white">Judul Berita</strong> (URL Slug otomatis dibuat), pilih <strong class="text-white">Kategori</strong>, lalu upload gambar <strong class="text-white">Thumbnail</strong> berita.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Tuliskan isi konten pada Text Editor, lalu aktifkan toggle <strong class="text-emerald-400">Is Published</strong> agar artikel langsung terbit di website.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SECTION 2 --}}
                <div id="organogram" class="bg-[#141414] border border-[#2a2a2a] p-8 rounded-2xl shadow-xl space-y-6 scroll-mt-6">
                    <div class="flex items-center gap-4 border-b border-[#2a2a2a] pb-6">
                        <div class="w-12 h-12 rounded-xl bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xl flex items-center justify-center font-bebas">02</div>
                        <div>
                            <h2 class="text-3xl text-white uppercase font-bebas leading-none mb-1">Mengatur Organogram &amp; Kelompok Foto</h2>
                            <p class="text-xs text-[#737373]">Cara menyatukan beberapa orang ke dalam 1 kartu foto bersama di website.</p>
                        </div>
                    </div>

                    {{-- Highlight Box --}}
                    <div class="p-5 bg-gradient-to-r from-[#b91c1c]/20 via-[#1a1a1a] to-[#141414] border-l-4 border-[#b91c1c] rounded-r-2xl space-y-2">
                        <h4 class="text-white font-bold text-sm flex items-center gap-2">
                            <span>📌</span> Konsep Kelompok Foto
                        </h4>
                        <p class="text-xs text-[#a3a3a3] leading-relaxed">
                            Berapapun jumlah orang dalam 1 foto bersama (misal 2 atau 3 orang), mereka akan otomatis disatukan ke dalam 1 kartu foto jika menggunakan nama <strong>Kelompok Foto / Sub-Kelompok</strong> yang sama!
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Buka menu <strong class="text-white">Kabinet &gt; Anggota Kabinet</strong> lalu klik <strong class="text-white">+ New Cabinet Member</strong>.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Pilih <strong class="text-white">Unit / Divisi</strong> (misal: <em>HUBLU</em>, <em>PSDM</em>), serta isi Nama dan Jabatan.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Isi kolom <strong class="text-white">Kelompok Foto / Sub-Kelompok</strong>:
                                <p class="text-xs text-[#737373] mt-2 bg-[#141414] p-3 rounded-lg border border-[#2a2a2a]">
                                    Beri nama kelompok yang sama (contoh: <code class="text-[#b91c1c] font-bold">Sub 1</code> atau <code class="text-[#b91c1c] font-bold">Kelompok A</code>). Seluruh anggota di divisi tersebut yang isi kolom ini-nya sama akan otomatis disatukan ke 1 kartu foto!
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Upload <strong class="text-white">Foto Kelompok</strong> pada anggota pertama di kelompok tersebut. Anggota ke-2 &amp; ke-3 di kelompok yang sama <em>tidak perlu di-upload foto lagi</em> (otomatis mengikut foto pertama).
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">5</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Isi <strong class="text-white">Urutan Tampil dalam Foto</strong> (<code class="text-white font-bold">1</code> untuk paling kiri, <code class="text-white font-bold">2</code> untuk tengah/sebelahnya, <code class="text-white font-bold">3</code> untuk kanan, dst).
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SECTION 3 --}}
                <div id="pengaturan" class="bg-[#141414] border border-[#2a2a2a] p-8 rounded-2xl shadow-xl space-y-6 scroll-mt-6">
                    <div class="flex items-center gap-4 border-b border-[#2a2a2a] pb-6">
                        <div class="w-12 h-12 rounded-xl bg-[#1a1a1a] border border-[#2a2a2a] text-[#b91c1c] font-bold text-xl flex items-center justify-center font-bebas">03</div>
                        <div>
                            <h2 class="text-3xl text-white uppercase font-bebas leading-none mb-1">Mengubah Visi &amp; Misi Kabinet</h2>
                            <p class="text-xs text-[#737373]">Pembaruan teks Visi &amp; Misi saat pergantian periode kabinet baru.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Buka menu <strong class="text-white">Pengaturan Site</strong> di bagian bawah sidebar admin.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Ubah teks <strong class="text-white">Visi Kabinet</strong> atau susunan poin-poin <strong class="text-white">Misi Kabinet</strong>.
                            </div>
                        </div>

                        <div class="flex gap-4 items-start bg-[#0a0a0a] p-5 rounded-xl border border-[#2a2a2a]">
                            <div class="w-7 h-7 rounded-full bg-[#b91c1c]/20 text-[#b91c1c] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</div>
                            <div class="text-sm leading-relaxed text-[#a3a3a3]">
                                Klik tombol <strong class="text-white">Save Changes / Simpan Perubahan</strong> di bagian bawah.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-filament-panels::page>
