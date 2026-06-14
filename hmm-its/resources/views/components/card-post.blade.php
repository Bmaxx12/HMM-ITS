@props(['post'])

<article class="group bg-[#141414] border border-[#2a2a2a] overflow-hidden transition-all duration-300 hover:border-[#b91c1c] hover:-translate-y-1">
    {{-- Thumbnail --}}
    <a href="{{ route('publikasi.show', $post->slug) }}" class="block overflow-hidden aspect-video">
        @if ($post->thumbnail)
            <img
                src="{{ asset('storage/' . $post->thumbnail) }}"
                alt="{{ $post->title }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                loading="lazy"
            >
        @else
            <div class="w-full h-full bg-[#1a1a1a] flex items-center justify-center">
                <svg class="w-12 h-12 text-[#404040]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif
    </a>

    {{-- Content --}}
    <div class="p-6">
        {{-- Category & Date --}}
        <div class="flex items-center gap-3 mb-3">
            @if ($post->category)
                <span class="text-[#b91c1c] text-xs tracking-widest uppercase font-medium">
                    {{ $post->category->name }}
                </span>
                <span class="text-[#404040] text-xs">·</span>
            @endif
            <time class="text-[#737373] text-xs">
                {{ $post->published_at?->format('d M Y') }}
            </time>
        </div>

        {{-- Title --}}
        <h3 class="text-white font-semibold text-base leading-snug mb-2 line-clamp-2 group-hover:text-[#e5e5e5] transition-colors">
            <a href="{{ route('publikasi.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        {{-- Excerpt --}}
        @if ($post->excerpt)
            <p class="text-[#737373] text-sm leading-relaxed line-clamp-3 mb-4">
                {{ $post->excerpt }}
            </p>
        @endif

        {{-- CTA --}}
        <a href="{{ route('publikasi.show', $post->slug) }}"
           class="inline-flex items-center gap-2 text-[#b91c1c] text-sm font-medium transition-all duration-200 hover:gap-3">
            Baca
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</article>
