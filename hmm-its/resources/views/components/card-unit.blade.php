@props(['unit'])

<div
    x-data
    @click="$dispatch('open-unit-modal', { unit: {{ json_encode([
        'name'    => $unit->name,
        'tier'    => $unit->tier,
        'members' => $unit->members->map(fn($m) => [
            'name'     => $m->name,
            'position' => $m->position,
            'photo'    => $m->photo,
        ])->values()->toArray(),
    ]) }} })"
    class="group bg-[#141414] border border-[#2a2a2a] p-6 cursor-pointer transition-all duration-300 hover:border-[#b91c1c] hover:-translate-y-1"
    role="button"
    tabindex="0"
    @keydown.enter="$dispatch('open-unit-modal', { unit: {{ json_encode([
        'name'    => $unit->name,
        'tier'    => $unit->tier,
        'members' => $unit->members->map(fn($m) => [
            'name'     => $m->name,
            'position' => $m->position,
            'photo'    => $m->photo,
        ])->values()->toArray(),
    ]) }} })"
>
    {{-- Tier Badge --}}
    <span class="inline-block text-[#737373] text-xs tracking-widest uppercase mb-3 border border-[#2a2a2a] px-2 py-0.5">
        {{ str_replace('_', ' ', $unit->tier) }}
    </span>

    {{-- Unit Name --}}
    <h3 class="text-white font-semibold text-base leading-snug mb-4 group-hover:text-[#e5e5e5] transition-colors">
        {{ $unit->name }}
    </h3>

    {{-- Member Count --}}
    <p class="text-[#737373] text-xs mb-4">
        {{ $unit->members->count() }} anggota
    </p>

    {{-- CTA --}}
    <div class="flex items-center gap-2 text-[#b91c1c] text-xs font-medium transition-all duration-200 group-hover:gap-3">
        Lihat Detail
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </div>
</div>
