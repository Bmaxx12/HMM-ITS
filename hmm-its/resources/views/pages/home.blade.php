<x-layouts.app title="HMM ITS — Himpunan Mahasiswa Mesin">

{{-- ===== HERO ===== --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0" style="background-image: url('{{ asset('images/Assets_home.png') }}'); background-size: cover; background-position: center;"></div>
    {{-- Background Overlay --}}
    <div class="absolute inset-0 bg-black/40">
        {{-- Gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-[#0a0a0a]"></div>
        {{-- Grid pattern --}}
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(#e5e5e5 1px, transparent 1px), linear-gradient(to right, #e5e5e5 1px, transparent 1px); background-size: 60px 60px;"></div>
    </div>

    {{-- Red accent line --}}
    <div class="absolute top-0 left-0 w-1 h-full bg-[#b91c1c] opacity-60"></div>



    {{-- Content —— layout asli, hanya logo ditambah di samping tagline --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 pt-24 pb-16 w-full">

        {{-- Wrapper: konten kiri + kabinet kanan bawah --}}
        <div class="relative">
            <div class="max-w-4xl">

                {{-- Logo + Tagline sejajar --}}
                <div class="flex items-center gap-6 lg:gap-8 mb-4" data-aos="fade-up">
                    {{-- Logo HMM ITS --}}
                    <div class="shrink-0 self-center flex items-center justify-center">
                        <img
                            src="{{ asset('images/logo_hmm.png') }}"
                            alt="Logo HMM ITS"
                            class="h-[3rem] sm:h-[4.5rem] lg:h-[6rem] xl:h-[110px] w-auto object-contain"
                            onerror="this.style.display='none'"
                        >
                    </div>

                    {{-- Main Tagline & Institut Text --}}
                    <div class="flex flex-col justify-center">
                        <span class="text-white text-xs tracking-[0.3em] uppercase mb-1 sm:mb-2 block" data-aos="fade-right">
                            Institut Teknologi Sepuluh Nopember
                        </span>
                        <h1
                            class="text-5xl sm:text-7xl lg:text-8xl xl:text-[110px] text-white leading-none uppercase"
                            style="font-family:'Bebas Neue',sans-serif;"
                        >
                            <span class="text-white">HMM ITS</span>
                            <span class="text-white mx-1">:</span>
                            {{ $settings->get('hero_tagline', 'Uber Alles!') }}
                        </h1>
                    </div>
                </div>

                {{-- Sub tagline --}}
                <p class="text-white/90 text-base sm:text-lg max-w-xl leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="100">
                    {{ $settings->get('hero_subtext', 'Himpunan Mahasiswa Mesin ITS — membangun generasi insinyur yang unggul, berdampak, dan berjiwa sosial.') }}
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap items-center gap-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('about') }}"
                       class="border border-white text-white hover:bg-white hover:text-black text-sm tracking-widest uppercase px-8 py-3 transition-all duration-300">
                        Kenali Kami
                    </a>
                    <a href="{{ route('publikasi.index') }}"
                       class="flex items-center gap-2 text-white/90 hover:text-white text-sm tracking-widest uppercase transition-all duration-300">
                        Lihat Publikasi
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

            </div>


        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
        <span class="text-[#404040] text-xs tracking-widest uppercase">Scroll</span>
        <div class="w-px h-8 bg-gradient-to-b from-[#404040] to-transparent"></div>
    </div>
</section>

{{-- ===== MARQUEE ===== --}}
<section class="border-y border-[#2a2a2a] py-4 overflow-hidden bg-[#0a0a0a]">
    <div class="relative flex overflow-x-hidden">
        <div class="flex whitespace-nowrap animate-[marquee_30s_linear_infinite] gap-8">
            @for ($i = 0; $i < 8; $i++)
                <span class="text-[#2a2a2a] text-2xl font-bold tracking-widest uppercase" style="font-family:'Bebas Neue',sans-serif;">
                    EST · 1957 · HIMPUNAN MAHASISWA MESIN ITS ·&nbsp;
                </span>
            @endfor
        </div>
        <div class="absolute top-0 flex whitespace-nowrap animate-[marquee_30s_linear_infinite] gap-8" aria-hidden="true">
            @for ($i = 0; $i < 8; $i++)
                <span class="text-[#2a2a2a] text-2xl font-bold tracking-widest uppercase" style="font-family:'Bebas Neue',sans-serif;">
                    EST · 1957 · HIMPUNAN MAHASISWA MESIN ITS ·&nbsp;
                </span>
            @endfor
        </div>
    </div>
</section>



{{-- ===== HIGHLIGHTS PUBLIKASI ===== --}}
@if ($latestPosts->isNotEmpty())
<section class="py-24 max-w-7xl mx-auto px-6 lg:px-8">
    <div class="flex items-end justify-between mb-12" data-aos="fade-up">
        <div>
            <x-section-label label="Publikasi Terbaru" />
            <h2 class="text-4xl sm:text-5xl text-white mt-4 uppercase" style="font-family:'Bebas Neue',sans-serif;">
                Berita &amp; Informasi
            </h2>
        </div>
        <a href="{{ route('publikasi.index') }}"
           class="hidden sm:flex items-center gap-2 text-[#b91c1c] text-sm tracking-widest uppercase hover:gap-4 transition-all duration-200">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($latestPosts as $post)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <x-card-post :post="$post" />
            </div>
        @endforeach
    </div>

    <div class="mt-8 sm:hidden text-center">
        <a href="{{ route('publikasi.index') }}"
           class="inline-flex items-center gap-2 text-[#b91c1c] text-sm tracking-widest uppercase">
            Lihat Semua →
        </a>
    </div>
</section>
@endif

{{-- ===== SOLIDARITY FOREVER ===== --}}
<section class="py-24 border-t border-[#2a2a2a] relative overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0" style="background-image: url('{{ asset('images/assets_home_2.png') }}'); background-size: cover; background-position: center;"></div>
    {{-- Background Overlay --}}
    <div class="absolute inset-0 bg-black/40">
        {{-- Gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-[#0a0a0a]"></div>
        {{-- Grid pattern --}}
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#b91c1c 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center" data-aos="fade-up">

        <blockquote class="text-3xl sm:text-5xl lg:text-6xl text-white mt-8 mb-6 max-w-4xl mx-auto leading-tight" style="font-family:'Bebas Neue',sans-serif;">
            "{{ $settings->get('solidarity_quote', 'Uber Alles!') }}"
        </blockquote>

        {{-- Penjelasan Uber Alles --}}
        <div class="max-w-3xl mx-auto mb-12 text-left sm:text-center" data-aos="fade-up" data-aos-delay="100">
            <p class="text-white/70 text-sm sm:text-base leading-relaxed text-justify">
                Di atas segalanya. Dimaksudkan untuk memberikan semangat tertinggi agar mencapai hasil terbaik tanpa merendahkan pihak lain di sekitarnya. Über Alles merupakan semangat mental juara yang harus dimiliki oleh setiap arek Mesin. Penanaman nilai Über Alles paling lazim digunakan untuk mendidik kader mesin hingga saat ini. Apabila ditelaah lebih jauh, nilai seorang Juara tidak hanya bergantung pada ambisi pribadi dalam menginginkan kemenangan. Seorang Juara akan selalu optimis, teguh pendirian, berintegritas, sportif, mempunyai daya juang tinggi, tekad dan keyakinan kuat, serta pantang berputus asa. Dengan kata lain, pengertian "di atas segalanya" dalam konsep ini merupakan sebuah tuntutan bahwa mesin haruslah memiliki kader-kader terbaik.
            </p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
            <a href="{{ route('about') }}"
               class="border border-white/30 text-white/90 hover:border-white hover:text-white text-sm tracking-widest uppercase px-6 py-3 transition-all duration-300">
                About Us
            </a>
            <a href="{{ route('publikasi.index') }}"
               class="bg-[#b91c1c] hover:bg-[#dc2626] text-white text-sm tracking-widest uppercase px-6 py-3 transition-all duration-300">
                Publikasi
            </a>
        </div>
    </div>
</section>

</x-layouts.app>
