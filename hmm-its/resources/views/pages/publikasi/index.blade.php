<x-layouts.app title="Publikasi & Informasi — HMM ITS">

{{-- ===== HEADER ===== --}}
<section class="pt-36 pb-16 max-w-7xl mx-auto px-6 lg:px-8" data-aos="fade-up">
    <x-section-label label="Publikasi" />
    <h1 class="text-5xl sm:text-7xl text-white mt-4 uppercase leading-none" style="font-family:'Bebas Neue',sans-serif;">
        Publikasi &amp;<br>Informasi
    </h1>
    <p class="text-[#737373] text-sm mt-4 max-w-md leading-relaxed">
        Temukan berita, informasi kegiatan, dan karya terbaru dari Himpunan Mahasiswa Mesin ITS.
    </p>
</section>

{{-- ===== FILTER KATEGORI ===== --}}
<section class="pb-8 max-w-7xl mx-auto px-6 lg:px-8">
    <div class="flex flex-wrap items-center gap-3" data-aos="fade-up">
        {{-- "Semua" button --}}
        <a href="{{ route('publikasi.index') }}"
           class="text-xs tracking-widest uppercase px-4 py-2 border transition-all duration-200
           {{ !$activeCategory
                ? 'bg-[#b91c1c] border-[#b91c1c] text-white'
                : 'border-[#2a2a2a] text-[#737373] hover:border-white hover:text-white' }}">
            Semua
        </a>

        @foreach ($categories as $category)
        <a href="{{ route('publikasi.index', ['category' => $category->slug]) }}"
           class="text-xs tracking-widest uppercase px-4 py-2 border transition-all duration-200
           {{ $activeCategory === $category->slug
                ? 'bg-[#b91c1c] border-[#b91c1c] text-white'
                : 'border-[#2a2a2a] text-[#737373] hover:border-white hover:text-white' }}">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    {{-- Divider --}}
    <div class="mt-6 h-px bg-[#2a2a2a]"></div>
</section>

{{-- ===== GRID BERITA ===== --}}
<section class="pb-16 max-w-7xl mx-auto px-6 lg:px-8">
    @if ($posts->isEmpty())
        <div class="py-24 text-center">
            <p class="text-[#404040] text-6xl mb-4" style="font-family:'Bebas Neue',sans-serif;">—</p>
            <p class="text-[#737373] text-sm tracking-widest uppercase">Belum ada publikasi.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 75 }}">
                    <x-card-post :post="$post" />
                </div>
            @endforeach
        </div>

        {{-- ===== PAGINATION ===== --}}
        @if ($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
    @endif
</section>

</x-layouts.app>
