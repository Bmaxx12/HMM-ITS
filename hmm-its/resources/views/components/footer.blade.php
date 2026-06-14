<footer class="bg-[#141414] border-t border-[#2a2a2a] mt-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            {{-- Brand --}}
            <div class="col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <img
                        src="{{ asset('images/logo_hmm.png') }}"
                        alt="Logo HMM ITS"
                        class="w-10 h-10 object-contain"
                        onerror="this.style.display='none'"
                    >
                    <div>
                        <p class="text-white font-semibold text-sm tracking-widest uppercase">HMM ITS</p>
                        <p class="text-[#737373] text-xs">Himpunan Mahasiswa Mesin</p>
                    </div>
                </div>
                <p class="text-[#737373] text-sm leading-relaxed max-w-xs">
                    Himpunan Mahasiswa Mesin Institut Teknologi Sepuluh Nopember. Study · Society · Solidarity.
                </p>
            </div>

            {{-- Navigation --}}
            <div>
                <h4 class="text-white text-xs tracking-widest uppercase mb-6 font-medium">Navigasi</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-[#737373] hover:text-white text-sm transition-colors">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="text-[#737373] hover:text-white text-sm transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ route('publikasi.index') }}" class="text-[#737373] hover:text-white text-sm transition-colors">Publikasi</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white text-xs tracking-widest uppercase mb-6 font-medium">Kontak</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="https://www.instagram.com/hmmits/" target="_blank" rel="noopener"
                           class="flex items-center gap-2 text-[#737373] hover:text-white text-sm transition-colors group">
                            <svg class="w-4 h-4 group-hover:text-[#b91c1c] transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            @hmmits
                        </a>
                    </li>
                    <li>
                        <a href="mailto:hmmits@me.its.ac.id"
                           class="text-[#737373] hover:text-white text-sm transition-colors">
                            hmmits@me.its.ac.id
                        </a>
                    </li>
                    <li>
                        <p class="text-[#737373] text-sm">Jurusan Teknik Mesin, ITS Surabaya</p>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="mt-16 pt-8 border-t border-[#2a2a2a] flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-[#737373] text-xs tracking-widest uppercase">
                © {{ date('Y') }} HMM ITS — All Rights Reserved
            </p>
            <p class="text-[#404040] text-xs tracking-widest uppercase">
                Study · Society · Solidarity
            </p>
        </div>
    </div>
</footer>
