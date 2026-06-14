<x-layouts.app :title="$post->title . ' — HMM ITS'">

{{-- ===== THUMBNAIL HERO ===== --}}
<section class="relative h-[60vh] min-h-[400px] overflow-hidden">
    @if ($post->thumbnail)
        <img
            src="{{ asset('storage/' . $post->thumbnail) }}"
            alt="{{ $post->title }}"
            class="absolute inset-0 w-full h-full object-cover"
        >
    @else
        <div class="absolute inset-0 bg-[#141414]"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-[#0a0a0a]/60 to-[#0a0a0a]/20"></div>

    {{-- Content overlay --}}
    <div class="absolute bottom-0 left-0 right-0 max-w-7xl mx-auto px-6 lg:px-8 pb-12">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs text-[#737373] tracking-widest uppercase mb-6" data-aos="fade-up">
            <a href="{{ route('publikasi.index') }}" class="hover:text-white transition-colors">Publikasi</a>
            @if ($post->category)
                <span class="text-[#404040]">/</span>
                <a href="{{ route('publikasi.index', ['category' => $post->category->slug]) }}"
                   class="hover:text-white transition-colors text-[#b91c1c]">
                    {{ $post->category->name }}
                </a>
                <span class="text-[#404040]">/</span>
            @endif
            <span class="text-[#404040] max-w-xs truncate">{{ Str::limit($post->title, 40) }}</span>
        </nav>

        {{-- Category Badge --}}
        @if ($post->category)
            <span class="inline-block bg-[#b91c1c] text-white text-xs tracking-widest uppercase px-3 py-1 mb-4" data-aos="fade-up">
                {{ $post->category->name }}
            </span>
        @endif
    </div>
</section>

{{-- ===== ARTIKEL HEADER ===== --}}
<section class="max-w-4xl mx-auto px-6 lg:px-8 pt-10 pb-4">
    {{-- Title --}}
    <h1 class="text-3xl sm:text-5xl text-white font-bold leading-tight mb-6" data-aos="fade-up">
        {{ $post->title }}
    </h1>

    {{-- Meta --}}
    <div class="flex flex-wrap items-center gap-6 pb-8 border-b border-[#2a2a2a]" data-aos="fade-up">
        <div class="flex items-center gap-2 text-[#737373] text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <time>{{ $post->published_at?->translatedFormat('d F Y') ?? $post->published_at?->format('d M Y') }}</time>
        </div>
        @if ($post->author_name)
        <div class="flex items-center gap-2 text-[#737373] text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span>{{ $post->author_name }}</span>
        </div>
        @endif
    </div>
</section>

{{-- ===== BODY ARTIKEL ===== --}}
<section class="max-w-4xl mx-auto px-6 lg:px-8 py-10">
    <div class="prose prose-lg prose-invert max-w-none
                prose-headings:font-bold prose-headings:text-white
                prose-p:text-[#737373] prose-p:leading-relaxed
                prose-a:text-[#b91c1c] prose-a:no-underline hover:prose-a:underline
                prose-strong:text-white
                prose-blockquote:border-l-[#b91c1c] prose-blockquote:text-[#737373]
                prose-img:rounded-none prose-img:border prose-img:border-[#2a2a2a]
                prose-hr:border-[#2a2a2a]
                prose-code:text-[#e5e5e5] prose-code:bg-[#1a1a1a] prose-code:px-1">
        {!! $post->body !!}
    </div>
</section>

{{-- ===== ARTIKEL TERKAIT ===== --}}
@if ($related->isNotEmpty())
<section class="py-16 bg-[#141414] border-t border-[#2a2a2a]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-10" data-aos="fade-up">
            <x-section-label label="Baca Juga" />
            <h2 class="text-3xl sm:text-4xl text-white mt-3 uppercase" style="font-family:'Bebas Neue',sans-serif;">
                Artikel Terkait
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($related as $relatedPost)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-card-post :post="$relatedPost" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Back link --}}
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    <a href="{{ route('publikasi.index') }}"
       class="inline-flex items-center gap-2 text-[#737373] hover:text-white text-sm tracking-widest uppercase transition-colors">
        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
        Kembali ke Publikasi
    </a>
</div>

</x-layouts.app>
