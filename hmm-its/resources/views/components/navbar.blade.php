<nav
    id="navbar"
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40)"
    :class="scrolled ? 'bg-[#0a0a0a]/95 border-b border-[#2a2a2a] backdrop-blur-sm' : 'bg-transparent border-b border-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between md:justify-center h-16 lg:h-20 md:gap-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img
                    src="{{ asset('images/logo_hmm.png') }}"
                    alt="Logo HMM ITS"
                    class="w-8 h-8 object-contain"
                    onerror="this.style.display='none'"
                >
                <span class="text-white font-semibold text-sm tracking-widest uppercase hidden sm:block">
                    HMM ITS
                </span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="text-sm tracking-widest uppercase transition-colors duration-200 {{ request()->routeIs('home') ? 'text-white' : 'text-[#737373] hover:text-white' }}">
                    Beranda
                </a>
                <a href="{{ route('about') }}"
                   class="text-sm tracking-widest uppercase transition-colors duration-200 {{ request()->routeIs('about') ? 'text-white' : 'text-[#737373] hover:text-white' }}">
                    Tentang
                </a>
                <a href="{{ route('publikasi.index') }}"
                   class="text-sm tracking-widest uppercase transition-colors duration-200 {{ request()->routeIs('publikasi.*') ? 'text-white' : 'text-[#737373] hover:text-white' }}">
                    Publikasi
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button
                @click="open = !open"
                class="md:hidden text-[#737373] hover:text-white transition-colors"
                aria-label="Toggle menu"
            >
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-[#141414] border-t border-[#2a2a2a]"
    >
        <div class="px-6 py-4 flex flex-col gap-4">
            <a href="{{ route('home') }}" @click="open=false"
               class="text-sm tracking-widest uppercase py-2 {{ request()->routeIs('home') ? 'text-white' : 'text-[#737373]' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" @click="open=false"
               class="text-sm tracking-widest uppercase py-2 {{ request()->routeIs('about') ? 'text-white' : 'text-[#737373]' }}">
                Tentang
            </a>
            <a href="{{ route('publikasi.index') }}" @click="open=false"
               class="text-sm tracking-widest uppercase py-2 {{ request()->routeIs('publikasi.*') ? 'text-white' : 'text-[#737373]' }}">
                Publikasi
            </a>
        </div>
    </div>
</nav>
