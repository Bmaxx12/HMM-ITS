<x-layouts.app title="Tentang — HMM ITS">

{{-- ===== HERO KABINET ===== --}}
<section class="relative min-h-[60vh] flex items-end pb-20 overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0" style="background-image: url('{{ asset('images/assets_about_1.png') }}'); background-size: cover; background-position: center;"></div>
    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/40">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-black/40 to-transparent"></div>
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(#e5e5e5 1px, transparent 1px), linear-gradient(to right, #e5e5e5 1px, transparent 1px); background-size: 60px 60px;"></div>
    </div>
    <div class="absolute top-0 right-0 w-px h-full bg-gradient-to-b from-transparent via-[#b91c1c]/40 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 pt-32">
        <div data-aos="fade-up">
            <span class="inline-block uppercase tracking-[0.25em] text-white/90 text-xs font-medium">Tentang Kami</span>
            <h1 class="text-5xl sm:text-7xl lg:text-8xl text-white mt-4 mb-4 uppercase leading-none" style="font-family:'Bebas Neue',sans-serif;">
                HMM ITS
            </h1>
            <p class="text-white/90 text-base sm:text-lg max-w-2xl leading-relaxed">
                {{ $settings->get('vision', 'HMM FT-IRS ITS yang berintegritas sebagai wadah eskalasi guna mewujudkan sinergi Keluarga Mahasiswa Mesin.') }}
            </p>
        </div>
    </div>
</section>

{{-- ===== ARTI LOGO KABINET ===== --}}
<section class="py-24 bg-[#0a0a0a] border-b border-[#2a2a2a]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-12 text-center" data-aos="fade-up">
            <x-section-label label="Filosofi & Identitas" />
            <h2 class="text-4xl sm:text-5xl text-white mt-4 uppercase" style="font-family:'Bebas Neue',sans-serif;">
                Filosofi M Rotary
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            {{-- Logo visual --}}
            <div class="flex justify-center" data-aos="fade-right">
                <div class="relative">
                    {{-- Outer glow --}}
                    <div class="absolute inset-0 blur-3xl bg-[#b91c1c]/10 rounded-full scale-110"></div>
                    <div class="relative border border-[#2a2a2a] bg-[#141414] p-12 lg:p-16">
                        <img
                            src="{{ asset('images/logo_hmm.png') }}"
                            alt="Logo HMM ITS"
                            class="w-40 h-40 lg:w-52 lg:h-52 object-contain mx-auto"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                        >
                        {{-- Fallback --}}
                        <div class="w-40 h-40 lg:w-52 lg:h-52 bg-[#b91c1c] items-center justify-center hidden mx-auto">
                            <span class="text-white font-bold text-5xl" style="font-family:'Bebas Neue',sans-serif;">HMM</span>
                        </div>

                        {{-- Decorative corner lines --}}
                        <div class="absolute top-3 left-3 w-6 h-6 border-t border-l border-[#b91c1c]"></div>
                        <div class="absolute top-3 right-3 w-6 h-6 border-t border-r border-[#b91c1c]"></div>
                        <div class="absolute bottom-3 left-3 w-6 h-6 border-b border-l border-[#b91c1c]"></div>
                        <div class="absolute bottom-3 right-3 w-6 h-6 border-b border-r border-[#b91c1c]"></div>
                    </div>
                </div>
            </div>

            {{-- Arti & Filosofi --}}
            <div data-aos="fade-left" data-aos-delay="100">
                <div class="space-y-8">
                    {{-- Poin 1 --}}
                    <div class="flex items-start gap-5" data-aos="fade-up">
                        <div class="w-10 h-10 shrink-0 bg-[#1a1a1a] border border-[#2a2a2a] flex items-center justify-center rounded-full mt-0.5">
                            <span class="text-[#b91c1c] text-sm font-bold tracking-widest" style="font-family:'Bebas Neue',sans-serif;">01</span>
                        </div>
                        <div>
                            <p class="text-white text-lg font-semibold mb-2" style="font-family:'Bebas Neue',sans-serif; letter-spacing: 0.05em;">Dinamika Berkelanjutan</p>
                            <p class="text-[#a3a3a3] text-sm leading-relaxed text-justify">
                                Bentuk huruf <strong class="text-white">M – Rotary</strong> yang tidak terputus dan tetap terbaca "M" meski diputar 180 derajat, melambangkan sebuah pergerakan dan dinamika yang selalu berkelanjutan. Ini mencerminkan semangat adaptasi dan inovasi yang tak pernah padam.
                            </p>
                        </div>
                    </div>

                    {{-- Poin 2 --}}
                    <div class="flex items-start gap-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-10 h-10 shrink-0 bg-[#1a1a1a] border border-[#2a2a2a] flex items-center justify-center rounded-full mt-0.5">
                            <span class="text-[#b91c1c] text-sm font-bold tracking-widest" style="font-family:'Bebas Neue',sans-serif;">02</span>
                        </div>
                        <div>
                            <p class="text-white text-lg font-semibold mb-2" style="font-family:'Bebas Neue',sans-serif; letter-spacing: 0.05em;">Keberanian & Persaudaraan</p>
                            <p class="text-[#a3a3a3] text-sm leading-relaxed text-justify">
                                Penggunaan <strong class="text-[#b91c1c]">Warna Merah</strong> merupakan bukti nyata bahwa masyarakat mesin memiliki keberanian tinggi dalam berkarya dan menghadapi tantangan. Merah juga menyimbolkan perasaan sedarah sebagai satu kesatuan Keluarga Besar Teknik Mesin ITS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== SEJARAH MESIN ===== --}}
<section class="py-24 bg-[#141414] border-y border-[#2a2a2a] relative overflow-hidden">
    {{-- Big year bg --}}
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
        <span class="text-[300px] lg:text-[450px] font-bold leading-none text-[#1a1a1a] select-none" style="font-family:'Bebas Neue',sans-serif;">
            1957
        </span>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">
        <div data-aos="fade-up">
            <x-section-label label="Heritage" />
            <h2 class="text-5xl sm:text-7xl text-white uppercase leading-none mb-12 mt-4" style="font-family:'Bebas Neue',sans-serif;">
                Sejarah<br>Mesin
            </h2>
        </div>

        {{-- Timeline --}}
        <div class="mt-16 max-w-7xl mx-auto">
            @php
                $history = [
                    ['year' => '1957', 'desc' => 'YPTT (Yayasan Perguruan Tinggi Teknik) mendirikan Perguruan Tinggi Teknik 10 Nopember Surabaya, yang masih terdiri dari dua jurusan yaitu Teknik Sipil dan Teknik Mesin (angkatan M1), pada tanggal 10 Nopember 1957.'],
                    ['year' => '1960', 'desc' => 'Pada 3 November 1960, Perguruan Tinggi Teknik 10 Nopember Surabaya resmi menjadi perguruan tinggi negeri dan berganti nama menjadi Institut Teknologi Sepuluh Nopember Surabaya sebelum kemudian pada 3 Desember 1960, namanya berubah lagi menjadi Institut Teknologi Sepuluh Nopember (ITS).'],
                    ['year' => '1961', 'desc' => 'ITS berkembang menjadi 5 jurusan dan jurusan Teknik Mesin berubah menjadi fakultas.'],
                    ['year' => '1965', 'desc' => 'Teknik Mesin ITS pertama kali kedatangan dosen lulusan luar negeri (Jerman), yaitu a.n Dipl.Ing Oei Giok Bing dan Dipl.Ing Hariono Sumarsono. Sejak itu, semboyan Uber Alles mulai digunakan di Teknik Mesin ITS.'],
                    ['year' => '1983', 'desc' => 'Fakultas Teknik Mesin dilebur ke dalam FTI (Fakultas Teknologi Industri) dan berubah menjadi jurusan Teknik Mesin.'],
                    ['year' => '2001', 'desc' => 'Bidang studi S-1 Teknik Mesin ITS dikembangkan menjadi Konversi Energi, Teknik Produksi, Desain, dan Metalurgi.'],
                    ['year' => '2024', 'desc' => 'Terdapat program studi baru yaitu Rekayasa Keselamatan Proses (RKP).'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 gap-y-16 lg:gap-y-20 items-start">
                @foreach ($history as $i => $item)
                <div class="flex items-center gap-4 sm:gap-6 relative" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                    
                    {{-- Year --}}
                    <div class="shrink-0 w-16 sm:w-20 text-right">
                        <span class="text-[#b91c1c] text-3xl sm:text-4xl tracking-widest" style="font-family:'Bebas Neue',sans-serif;">
                            {{ $item['year'] }}
                        </span>
                    </div>

                    {{-- Dot & Line --}}
                    <div class="relative shrink-0 flex items-center justify-center w-4 h-full self-stretch">
                        <div class="absolute z-10 w-[14px] h-[14px] rounded-full bg-[#141414] border-[2.5px] border-[#b91c1c] shadow-[0_0_8px_rgba(185,28,28,0.6)]"></div>
                        <div class="absolute top-1/2 w-[2px] h-24 bg-gradient-to-b from-[#b91c1c]/50 to-transparent"></div>
                    </div>

                    {{-- Content --}}
                    <div class="flex-1">
                        <div class="bg-[#1a1a1a]/40 backdrop-blur-sm p-6 sm:p-8 rounded-lg transition-all duration-300">
                            <p class="text-[#a3a3a3] text-sm leading-relaxed text-justify">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== VISI & MISI ===== --}}
<section class="py-24 bg-[#141414] border-b border-[#2a2a2a]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            {{-- Visi --}}
            <div data-aos="fade-up">
                <x-section-label label="Visi" />
                <div class="mt-6 pl-4 border-l-2 border-[#b91c1c]">
                    <p class="text-white text-xl sm:text-2xl leading-relaxed font-light">
                        {{ $settings->get('vision', 'HMM FT-IRS ITS yang berintegritas sebagai wadah eskalasi guna mewujudkan sinergi Keluarga Mahasiswa Mesin.') }}
                    </p>
                </div>
            </div>

            {{-- Misi --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <x-section-label label="Misi" />
                <ul class="mt-6 space-y-4">
                    @php
                        $missionRaw = json_decode($settings->get('mission', '[]'), true) ?? [];
                        $missionItems = [];
                        if (!empty($missionRaw)) {
                            if (isset($missionRaw[0]['items'])) {
                                foreach ($missionRaw as $group) {
                                    foreach ($group['items'] ?? [] as $item) {
                                        $missionItems[] = [
                                            'group' => $group['group'] ?? '',
                                            'title' => $item['title'] ?? '',
                                            'desc'  => $item['desc'] ?? '',
                                        ];
                                    }
                                }
                            } elseif (is_string($missionRaw[0] ?? null)) {
                                foreach ($missionRaw as $m) {
                                    $missionItems[] = ['group' => '', 'title' => '', 'desc' => $m];
                                }
                            }
                        }
                        if (empty($missionItems)) {
                            $missionItems = [
                                ['group' => '', 'title' => '', 'desc' => 'Menciptakan tata kelola organisasi yang sistematis, berlandaskan konstitusi demi terwujudnya himpunan yang profesional.'],
                                ['group' => '', 'title' => '', 'desc' => 'Mengoptimalkan sistem pengembangan sumber daya manusia yang progresif secara dinamis'],
                                ['group' => '', 'title' => '', 'desc' => 'Menciptakan wadah pengembangan KMM yang berkelanjutan sesuai dengan HDPSDM'],
                                ['group' => '', 'title' => '', 'desc' => 'Mengharmonisasikan hubungan dengan seluruh elemen KMM dan mitra eksternal guna menciptakan sinergitas yang kolaboratif'],
                            ];
                        }
                    @endphp
                    @foreach ($missionItems as $i => $item)
                        <li class="flex items-start gap-4">
                            <span class="text-[#b91c1c] text-xs font-bold mt-1 shrink-0" style="font-family:'Bebas Neue',sans-serif;">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <div>
                                @if ($item['title'])
                                    <p class="text-white text-sm font-medium mb-0.5">{{ $item['title'] }}</p>
                                @endif
                                <p class="text-[#737373] text-sm leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ===== ORGANOGRAM — Per Divisi, gaya HMM ITB ===== --}}
<section
    class="py-24"
    x-data="{
        modalOpen: false,
        activeGroup: null,
        openGroupModal(group) {
            this.activeGroup = group;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeGroupModal() {
            this.modalOpen = false;
            this.activeGroup = null;
            document.body.style.overflow = '';
        }
    }"
    @keydown.escape.window="closeGroupModal()"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-16 text-center" data-aos="fade-up">
            <x-section-label label="Struktur Organisasi" />
            <h2 class="text-4xl sm:text-5xl text-white mt-4 uppercase" style="font-family:'Bebas Neue',sans-serif;">
                Organogram Kabinet
            </h2>
        </div>

        @php
            $tierLabels = [
                'leadership_core' => 'Leadership Core // Tier 1',
                'directing'       => 'Directing // Tier 2',
                'executing'       => 'Executing // Tier 3',
                'advisory'        => 'Advisory',
            ];
            $tierOrder = ['leadership_core', 'directing', 'executing', 'advisory'];
        @endphp

        @foreach ($tierOrder as $tierKey)
            @if (isset($units[$tierKey]) && $units[$tierKey]->isNotEmpty())
            <div class="mb-20" data-aos="fade-up">
                {{-- Tier header dihapus atas permintaan user --}}

                {{-- Divisi rows --}}
                @foreach ($units[$tierKey] as $unit)
                    @if ($unit->members->isNotEmpty())
                    <div class="mb-10 pb-10 border-b border-[#1a1a1a] last:border-0 last:mb-0 last:pb-0">
                        {{-- Divisi label --}}
                        <div class="flex items-center gap-3 mb-6">
                            <p class="text-white text-sm font-semibold tracking-wide">{{ $unit->name }}</p>
                            <span class="text-[#404040] text-xs">—</span>
                            <span class="text-[#737373] text-xs">{{ $unit->members->count() }} anggota</span>
                        </div>

                        {{-- Group photos --}}
                        <div class="flex flex-wrap justify-center gap-6 w-full">
                            @php
                                $groups = [];
                                if (strtolower($unit->name) === 'kahima') {
                                    $groups[] = [
                                        'name' => 'Kahima',
                                        'members' => $unit->members
                                    ];
                                } elseif (strtolower($unit->name) === 'bpi (badan pengurus inti)' || strtolower($unit->name) === 'bpi') {
                                    foreach ($unit->members as $member) {
                                        $groups[] = [
                                            'name' => $member->name,
                                            'members' => collect([$member])
                                        ];
                                    }
                                } else {
                                    // Group by photo. Members without photo fall under '' group.
                                    $grouped = $unit->members->groupBy('photo');
                                    
                                    // If all members have no photo, just chunk by 3 to avoid one massive group
                                    if ($grouped->keys()->filter()->isEmpty()) {
                                        $chunked = $unit->members->chunk(3);
                                        foreach ($chunked as $index => $chunk) {
                                            $groups[] = [
                                                'name' => $unit->name . ($chunked->count() > 1 ? ' (' . ($index + 1) . ')' : ''),
                                                'members' => $chunk->values()
                                            ];
                                        }
                                    } else {
                                        $index = 1;
                                        foreach ($grouped as $photo => $members) {
                                            // Extract group name from photo filename if possible, otherwise use index
                                            $groupName = $unit->name . ' (' . $index . ')';
                                            if ($photo) {
                                                // e.g. organogram/PSDM 1.png -> PSDM 1
                                                $basename = pathinfo($photo, PATHINFO_FILENAME);
                                                if ($basename) {
                                                    $groupName = mb_strtoupper($basename);
                                                }
                                            }
                                            $groups[] = [
                                                'name' => $groupName,
                                                'members' => $members->values()
                                            ];
                                            $index++;
                                        }
                                    }
                                }
                            @endphp

                            @foreach ($groups as $group)
                                @if ($group['members']->isNotEmpty())
                                @php
                                    $groupData = json_encode([
                                        'name' => $group['name'],
                                        'unit' => $unit->name,
                                        'members' => $group['members']->map(fn($m) => [
                                            'name' => $m->name,
                                            'position' => $m->position,
                                            'photo' => $m->photo
                                        ])->toArray()
                                    ]);
                                    
                                    // Use the first available photo in the group as the group photo placeholder
                                    $firstPhoto = $group['members']->firstWhere('photo', '!=', null)->photo ?? null;
                                @endphp
                                <div
                                    class="group cursor-pointer relative w-40 h-56 sm:w-48 sm:h-64 lg:w-56 lg:h-72 shrink-0 overflow-hidden bg-[#1a1a1a] rounded-2xl shadow-lg transition-all duration-300"
                                    @click="openGroupModal({{ $groupData }})"
                                >
                                    @if ($firstPhoto)
                                        <img src="{{ str_starts_with($firstPhoto, 'images/') ? asset($firstPhoto) : asset('storage/' . $firstPhoto) }}" alt="{{ $group['name'] }}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center gap-2 p-4 text-center">
                                            <svg class="w-10 h-10 text-[#404040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                            <span class="text-[#737373] text-sm tracking-widest uppercase font-bold" style="font-family:'Bebas Neue',sans-serif;">{{ $group['name'] }}</span>
                                        </div>
                                    @endif
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        @endforeach
    </div>

    {{-- ===== Member Modal ===== --}}
    <div
        x-show="modalOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4"
        style="display:none;"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="closeGroupModal()"></div>

        {{-- Modal Card --}}
        <div
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative z-10 bg-[#141414] border border-[#2a2a2a] w-full max-w-lg max-h-[85vh] overflow-y-auto"
            style="display:none;"
            @click.stop
        >
            {{-- Close btn --}}
            <button
                @click="closeGroupModal()"
                class="absolute top-6 right-6 text-[#737373] hover:text-white transition-colors z-30"
                aria-label="Tutup"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Header/Title --}}
            <div class="p-6 md:p-8 border-b border-[#2a2a2a] sticky top-0 bg-[#141414]/95 backdrop-blur-sm z-20">
                <p class="text-[#b91c1c] text-xs font-bold tracking-widest uppercase mb-2" x-text="activeGroup?.unit"></p>
                <h3 class="text-3xl sm:text-4xl text-white uppercase" style="font-family:'Bebas Neue',sans-serif;" x-text="activeGroup?.name"></h3>
            </div>

            {{-- Info List --}}
            <div class="p-6 md:p-8">
                <div class="space-y-6">
                    <template x-for="member in activeGroup?.members" :key="member.name">
                        <div class="flex gap-4 md:gap-6 items-center border-b border-[#2a2a2a] pb-6 last:border-0 last:pb-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 shrink-0 bg-[#1a1a1a] border border-[#2a2a2a] overflow-hidden flex items-center justify-center relative">
                                <template x-if="member.photo">
                                    <img :src="member.photo.startsWith('images/') ? '/' + member.photo : '/storage/' + member.photo" class="w-full h-full object-cover absolute inset-0">
                                </template>
                                <template x-if="!member.photo">
                                    <span class="text-[#b91c1c] font-bold text-2xl" style="font-family:'Bebas Neue',sans-serif;" x-text="member.name.split(' ').map(w => w[0]).join('').slice(0,2).toUpperCase()"></span>
                                </template>
                            </div>
                            <div>
                                <h4 class="text-lg md:text-xl text-white font-bold tracking-wide" x-text="member.name"></h4>
                                <p class="text-[#737373] text-sm mt-1" x-text="member.position"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>



</x-layouts.app>
