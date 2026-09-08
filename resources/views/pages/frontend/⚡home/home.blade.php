<div>
    <div class="min-h-screen bg-white text-slate-900">

        {{-- =========================================================
        HERO SECTION SLIDER (Alpine.js)
    ========================================================== --}}
        <section x-data="{
            activeSlide: 0,
            slides: [{
                    title: 'General Marine Supplier & Service',
                    highlight: 'For Your Vessel\'s Operational Needs.',
                    desc: 'Provision, bonded store, engine & deck store, fresh water, OXY & ACE refill, and motor repair services based in Muara Badak.',
                    image: '{{ asset('img/landing/hero/hero-vessel-supply.jpeg') }}',
                    badge: 'PT. AZTON JAYA FOREVER'
                },
                {
                    title: 'Fresh Provision & Bonded Store Supply',
                    highlight: 'High Quality Food & Provisions On Time.',
                    desc: 'Direct delivery of fresh produce, meat, dry goods, and crew provisions straight to anchorage areas.',
                    image: '{{ asset('img/landing/hero/hero-provision-delivery.jpeg') }}',
                    badge: 'PROVISION STORE'
                },
                {
                    title: 'Deck, Engine Stores & Technical Support',
                    highlight: 'Complete Technical Equipment & Refills.',
                    desc: 'Supplying certified safety gear, deck tools, engine spares, OXY & ACE refill, and eco-friendly garbage disposal.',
                    image: '{{ asset('img/landing/hero/hero-technical-store.jpeg') }}',
                    badge: 'ENGINE & DECK STORE'
                }
            ],
            timer: null,
            init() {
                this.startAutoplay();
            },
            startAutoplay() {
                this.timer = setInterval(() => {
                    this.next();
                }, 3000);
            },
            stopAutoplay() {
                clearInterval(this.timer);
            },
            next() {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            },
            prev() {
                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
            }
        }" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()"
            class="relative overflow-hidden bg-[#06284b]">

            {{-- Slider Background Images with Transitions --}}
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-1000 transform"
                    x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-700 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute inset-0">

                    <img :src="slide.image" :alt="slide.title" class="h-full w-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-r from-[#03254a]/95 via-[#07345d]/85 to-[#07345d]/30">
                    </div>
                </div>
            </template>

            {{-- Content Section --}}
            <div class="relative mx-auto max-w-7xl px-6 py-24 lg:px-8 lg:py-32">
                <div class="max-w-3xl min-h-[320px] flex flex-col justify-center">

                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index"
                            x-transition:enter="transition ease-out duration-700 delay-200"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-4">

                            <span
                                class="mb-5 inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-white backdrop-blur">
                                <span class="mr-2 h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                                <span x-text="slide.badge"></span>
                            </span>

                            <h1
                                class="text-4xl font-extrabold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                                <span x-text="slide.title"></span>
                                <span class="block text-red-500 mt-1" x-text="slide.highlight"></span>
                            </h1>

                            <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-50" x-text="slide.desc"></p>
                        </div>
                    </template>

                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="#rfq"
                            class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-red-900/20 transition hover:bg-red-700">
                            <i data-lucide="message-circle" class="h-5 w-5"></i>
                            Request a Quote
                        </a>

                        <a href="#services"
                            class="inline-flex items-center gap-2 rounded-lg border border-white/40 bg-white/10 px-6 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/20">
                            <i data-lucide="book-open" class="h-5 w-5"></i>
                            View Our Services
                        </a>
                    </div>

                </div>

                {{-- Slider Controls --}}
                <div
                    class="absolute bottom-8 left-1/2 z-20 flex -translate-x-1/2 items-center gap-3 rounded-full border border-white/20 bg-slate-950/25 px-3 py-2 backdrop-blur-sm hidden">
                    <button @click="prev()"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white transition hover:bg-white/25"
                        aria-label="Previous slide">
                        <i data-lucide="chevron-left" class="h-5 w-5"></i>
                    </button>

                    <button @click="next()"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white transition hover:bg-white/25"
                        aria-label="Next slide">
                        <i data-lucide="chevron-right" class="h-5 w-5"></i>
                    </button>
                </div>
            </div>

            {{-- Hero Stats Footer --}}
            <div class="relative border-t border-white/10 bg-[#032b52]/90">
                <div class="mx-auto grid max-w-7xl grid-cols-2 divide-x divide-white/10 md:grid-cols-4">
                    @foreach ([['icon' => 'clock-3', 'value' => '24/7', 'label' => 'Service & Support'], ['icon' => 'ship', 'value' => 'Muara Badak', 'label' => 'Port Coverage'], ['icon' => 'zap', 'value' => 'Fast Response', 'label' => 'On-Time Delivery'], ['icon' => 'shield-check', 'value' => 'NIB Registered', 'label' => '1007260025108']] as $stat)
                        <div class="flex items-center gap-3 px-5 py-5 lg:px-8">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/10">
                                <i data-lucide="{{ $stat['icon'] }}" class="h-5 w-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-white">{{ $stat['value'] }}</p>
                                <p class="text-xs text-blue-200">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>


        {{-- =========================================================
        CORE CAPABILITIES
    ========================================================== --}}
        <section id="services" class="bg-white py-20 lg:py-24">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="mx-auto max-w-2xl text-center">

                    <p class="text-sm font-bold uppercase tracking-widest text-blue-700">
                        Our Core Capabilities
                    </p>

                    <h2
                        class="mt-3 text-3xl font-extrabold tracking-tight
                           text-slate-900 sm:text-4xl">
                        Complete Marine Supply & Services
                    </h2>

                    <p class="mt-4 text-slate-500">
                        Reliable supplies and services for vessels, crews, and marine operations.
                    </p>

                </div>


                <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-5">

                    @php
                        $services = [
                            [
                                'icon' => 'shopping-cart',
                                'title' => 'Provision & Bonded Store',
                                'description' =>
                                    'Fresh food, provisions, and official bonded store supplies for vessel crew needs.',
                            ],
                            [
                                'icon' => 'store',
                                'title' => 'Gallery & Engine Store',
                                'description' =>
                                    'Complete gallery essentials and comprehensive engine technical stores.',
                            ],
                            [
                                'icon' => 'anchor',
                                'title' => 'Deck Store & Fresh Water',
                                'description' =>
                                    'Full range of deck equipment, maintenance stores, and fresh water supply.',
                            ],
                            [
                                'icon' => 'flame',
                                'title' => 'Oxy & Ace Refill & Garbage',
                                'description' =>
                                    'Oxygen & Acetylene cylinder refill services and eco-friendly garbage disposal.',
                            ],
                            [
                                'icon' => 'wrench',
                                'title' => 'BA Chart & Motor Repair',
                                'description' =>
                                    'British Admiralty (BA) nautical charts and professional motor repair services.',
                            ],
                        ];
                    @endphp


                    @foreach ($services as $service)
                        <div
                            class="group rounded-2xl border border-slate-200
                                bg-white p-7 text-center shadow-sm
                                transition duration-300
                                hover:-translate-y-1 hover:shadow-xl">

                            <div
                                class="mx-auto flex h-16 w-16 items-center
                                    justify-center rounded-full bg-blue-50
                                    transition group-hover:bg-blue-700">

                                <i data-lucide="{{ $service['icon'] }}"
                                    class="h-7 w-7 text-blue-700
                                      group-hover:text-white">
                                </i>

                            </div>

                            <h3 class="mt-6 text-lg font-bold text-slate-900">
                                {{ $service['title'] }}
                            </h3>

                            <p class="mt-4 text-sm leading-6 text-slate-500">
                                {{ $service['description'] }}
                            </p>

                            <div class="mx-auto mt-6 h-1 w-10 rounded-full bg-blue-700">
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>
        </section>


        {{-- =========================================================
        PORT COVERAGE - MUARA BADAK
    ========================================================== --}}
        <section id="ports" class="bg-slate-50 py-20 lg:py-24">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="grid items-center gap-10 lg:grid-cols-12">

                    {{-- Left --}}
                    <div class="lg:col-span-4">

                        <p class="text-sm font-bold uppercase tracking-widest text-blue-700">
                            Port Coverage & Location
                        </p>

                        <h2
                            class="mt-3 text-3xl font-extrabold leading-tight
                               text-slate-900">
                            We Focus on
                            <span class="text-blue-700">
                                Muara Badak,
                            </span>
                            East Kalimantan
                        </h2>

                        <p class="mt-5 leading-7 text-slate-600">
                            Located at Dermaga Baru Toko Lima RT. 14, Muara Badak Ilir, Kutai Kartanegara, we specialize
                            in supplying vessels at Muara Badak Port and surrounding anchorage areas.
                        </p>


                        <ul class="mt-6 space-y-3">

                            @foreach (['Provision & Bonded Supply', 'Fresh Water Delivery', 'OXY & ACE Cylinder Refill', 'Garbage Disposal Service', 'Motor Repair & Technical Stores'] as $item)
                                <li
                                    class="flex items-center gap-3 text-sm font-medium
                                       text-slate-700">

                                    <span
                                        class="flex h-5 w-5 items-center justify-center
                                             rounded-full bg-blue-100">

                                        <i data-lucide="check" class="h-3.5 w-3.5 text-blue-700">
                                        </i>

                                    </span>

                                    {{ $item }}

                                </li>
                            @endforeach

                        </ul>


                        <a href="#rfq"
                            class="mt-8 inline-flex items-center gap-2
                              rounded-lg bg-[#06284b] px-5 py-3
                              text-sm font-bold text-white
                              transition hover:bg-blue-900">

                            View Service Area Details

                            <i data-lucide="arrow-right" class="h-4 w-4"></i>

                        </a>

                    </div>


                    {{-- Map --}}
                    <div class="lg:col-span-5">

                        <div
                            class="relative overflow-hidden rounded-2xl
               border border-slate-200 bg-white shadow-lg">

                            {{-- Leaflet Map --}}
                            <div id="muaraBadakMap" class="aspect-[4/3] w-full">
                            </div>

                            {{-- Map Legend --}}
                            <div
                                class="absolute bottom-4 left-4 z-[1000]
                   rounded-lg bg-white/95 p-3 text-xs
                   shadow-lg backdrop-blur">

                                <div class="flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-red-600"></span>
                                    Muara Berau Port
                                </div>

                                <div class="mt-2 flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-blue-700"></span>
                                    Anchorage & Supply Area
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Right --}}
                    <div class="lg:col-span-3">

                        <div
                            class="rounded-2xl bg-white p-6 shadow-lg
                                ring-1 ring-slate-200">

                            <p
                                class="text-xs font-bold uppercase tracking-widest
                                  text-blue-700">
                                Company Legality & Contact
                            </p>


                            <div class="mt-6 space-y-6">

                                @php
                                    $reasons = [
                                        [
                                            'icon' => 'file-text',
                                            'title' => 'Legal Identity',
                                            'text' => 'NPWP: 1000000009900911<br>NIB: 1007260025108',
                                        ],
                                        [
                                            'icon' => 'mail',
                                            'title' => 'Email Support',
                                            'text' =>
                                                'ajfadmin@aztonjayaforever.com<br>ajfmarketing@aztonjayaforever.com',
                                        ],
                                        [
                                            'icon' => 'phone',
                                            'title' => 'Office / Telp & Fax',
                                            'text' => '+62 812 5097 7777',
                                        ],
                                        [
                                            'icon' => 'message-square',
                                            'title' => 'WhatsApp / WeChat / Zalo',
                                            'text' => '+62 812 5097 7777<br>+62 821 4151 1101',
                                        ],
                                    ];
                                @endphp


                                @foreach ($reasons as $reason)
                                    <div class="flex gap-4">

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                items-center justify-center
                                                rounded-lg bg-blue-50">

                                            <i data-lucide="{{ $reason['icon'] }}" class="h-5 w-5 text-blue-700">
                                            </i>

                                        </div>

                                        <div>
                                            <h3 class="text-sm font-bold text-slate-900">
                                                {{ $reason['title'] }}
                                            </h3>

                                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                                {!! $reason['text'] !!}
                                            </p>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        TRUST, CERTIFICATIONS & STATS WITH VISUALS & ANIMATED COUNTERS
    ========================================================== --}}
        <section class="bg-slate-50 py-20 lg:py-24">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                {{-- Header Section --}}
                <div class="mx-auto max-w-2xl text-center">

                    <p
                        class="inline-flex items-center gap-2 rounded-full bg-blue-100/80 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-blue-800 backdrop-blur">
                        <i data-lucide="award" class="h-4 w-4 text-blue-700"></i>
                        Proven Excellence & Industry Standards
                    </p>

                    <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                        Quality You Can Trust
                    </h2>

                    <p class="mt-3 max-w-2xl mb-8 text-base text-slate-600">
                        Committed to delivering reliable marine supplies, certified standards, and exceptional service
                        coverage for all types of vessels in Muara Badak anchorage & port.
                    </p>

                </div>

                {{-- Grid Combined: Visual Stats & Certifications --}}
                <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    @php
                        $trustItems = [
                            [
                                'type' => 'stat',
                                'badge' => '24/7 Operational',
                                'target' => 100,
                                'suffix' => '+',
                                'title' => 'Vessels Supplied',
                                'desc' =>
                                    'Trusted supplier for domestic & international vessels in Muara Badak anchorage.',
                                'image' =>
                                    'https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=80',
                                'icon' => 'ship',
                            ],
                            [
                                'type' => 'stat',
                                'badge' => 'Complete Services',
                                'target' => 10,
                                'suffix' => '+',
                                'title' => 'Marine Categories',
                                'desc' => 'Provisions, bonded stores, deck/engine supplies, OXY/ACE, to motor repairs.',
                                'image' =>
                                    'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80',
                                'icon' => 'boxes',
                            ],
                            [
                                'type' => 'cert',
                                'badge' => 'Global Association',
                                'static' => '',
                                'title' => 'International Marine Purchasing',
                                'desc' => 'Official member of International Marine Purchasing Association.',
                                'image' => asset('img/impa-logo.jpg'),
                                'imageFit' => 'contain',
                                'icon' => 'globe-2',
                            ],
                            [
                                'type' => 'stat',
                                'badge' => 'Trade Network',
                                'static' => '',
                                'title' => 'ShipServ Verified Member',
                                'desc' =>
                                    'Registered and fully verified trade supplier on ShipServ global maritime network.',
                                'image' => asset('img/shipserv-logo.png'),
                                'imageFit' => 'contain',
                                'icon' => 'shield-check',
                            ],
                        ];
                    @endphp

                    @foreach ($trustItems as $item)
                        <div @if ($item['type'] === 'stat') x-data="{
                                    current: 0,
                                    target: {{ $item['target'] ?? 0 }},
                                    animate() {
                                        const duration = 1500;
                                        const startTime = performance.now();

                                        const update = (currentTime) => {
                                            const progress = Math.min((currentTime - startTime) / duration, 1);
                                            const easedProgress = 1 - Math.pow(1 - progress, 2);
                                            this.current = Math.floor(easedProgress * this.target);

                                            if (progress < 1) {
                                                requestAnimationFrame(update);
                                            }
                                        };

                                        requestAnimationFrame(update);
                                    }
                                }"
                                x-intersect.once="animate()" @endif
                            class="group relative flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:scale-[1.02] hover:border-blue-300 hover:shadow-2xl">

                            {{-- Background Image with Overlay --}}
                            <div
                                class="relative h-44 w-full overflow-hidden {{ ($item['imageFit'] ?? 'cover') === 'contain' ? 'bg-white' : '' }}">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                    class="h-full w-full {{ ($item['imageFit'] ?? 'cover') === 'contain' ? 'object-contain p-5' : 'object-cover' }} transition-transform duration-500 {{ ($item['imageFit'] ?? 'cover') === 'cover' ? 'group-hover:scale-110' : '' }}">
                                @if (($item['imageFit'] ?? 'cover') === 'cover')
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent">
                                    </div>
                                @endif

                                {{-- Badge --}}
                                <span
                                    class="absolute top-4 left-4 inline-flex items-center gap-1.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-blue-900 shadow-md backdrop-blur">
                                    <i data-lucide="{{ $item['icon'] }}" class="h-3.5 w-3.5 text-blue-700"></i>
                                    {{ $item['badge'] }}
                                </span>

                                {{-- Counter / Main Value Overlay --}}
                                <div class="absolute inset-x-6 bottom-4 flex items-end justify-between gap-3">
                                    @if (isset($item['target']))
                                        <span
                                            class="flex items-baseline text-4xl font-black tracking-tight text-white drop-shadow-md transition-all duration-300 group-hover:text-blue-300">
                                            <span x-text="current">0</span>{{ $item['suffix'] }}
                                        </span>
                                        <span class="relative flex h-3 w-3">
                                            <span
                                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                            <span
                                                class="relative inline-flex h-3 w-3 rounded-full bg-emerald-500"></span>
                                        </span>
                                    @else
                                        {{-- Static Text (e.g. IMPA) --}}
                                        <span
                                            class="text-4xl font-black tracking-tight text-white drop-shadow-md transition-all duration-300 group-hover:text-blue-300">
                                            {{ $item['static'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Content Body --}}
                            <div class="flex flex-1 flex-col justify-between p-6">
                                <div>
                                    <h3
                                        class="text-base font-bold text-slate-900 group-hover:text-blue-700 transition-colors">
                                        {{ $item['title'] }}
                                    </h3>

                                    <p class="mt-2 text-xs leading-5 text-slate-500">
                                        {{ $item['desc'] }}
                                    </p>
                                </div>

                                {{-- Decorative Line --}}
                                <div
                                    class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-blue-700">
                                    <div
                                        class="h-1.5 w-12 rounded-full bg-slate-100 group-hover:bg-blue-600 transition-colors">
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- Banner Bottom: Legalities & Compliance --}}
                <div class="relative mt-10 overflow-hidden rounded-3xl bg-[#06284b] p-8 text-white shadow-xl">
                    <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-blue-500/10 blur-2xl"></div>
                    <div class="absolute -left-10 -top-10 h-40 w-40 rounded-full bg-indigo-500/10 blur-2xl"></div>

                    <div
                        class="relative z-10 flex flex-col items-center justify-between gap-6 md:flex-row text-center md:text-left">
                        <div class="flex flex-col md:flex-row items-center gap-5">
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/10 text-blue-300 ring-1 ring-white/20 backdrop-blur">
                                <i data-lucide="shield-check" class="h-7 w-7 text-emerald-400"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">Full Legal & Tax Compliance</h4>
                                <p class="mt-1 text-xs text-blue-200">PT. AZTON JAYA FOREVER is fully registered and
                                    licensed for port & marine services in Indonesia.</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-center gap-3 text-xs">
                            <div
                                class="group flex items-center gap-2 rounded-xl bg-white/10 px-4 py-2.5 font-mono text-blue-100 ring-1 ring-white/15 backdrop-blur transition hover:bg-white/20">
                                <span class="text-blue-300 font-sans font-semibold">NPWP:</span>
                                <span class="font-bold tracking-wider text-white">1000000009900911</span>
                            </div>

                            <div
                                class="group flex items-center gap-2 rounded-xl bg-white/10 px-4 py-2.5 font-mono text-blue-100 ring-1 ring-white/15 backdrop-blur transition hover:bg-white/20">
                                <span class="text-blue-300 font-sans font-semibold">NIB:</span>
                                <span class="font-bold tracking-wider text-white">1007260025108</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        {{-- =========================================================
        LATEST NEWS
    ========================================================== --}}
        <section id="news" class="bg-slate-50 py-20">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="flex flex-col justify-between gap-5 sm:flex-row
                        sm:items-end">

                    <div>

                        <p
                            class="text-xs font-bold uppercase tracking-widest
                              text-blue-700">
                            Latest News & Maritime Insights
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-900">
                            Stay Updated with Marine Industry News
                        </h2>

                    </div>


                    <a href="#"
                        class="inline-flex items-center gap-2 text-sm font-bold
                          text-blue-700 hover:text-blue-900">

                        View All News

                        <i data-lucide="arrow-right" class="h-4 w-4"></i>

                    </a>

                </div>


                <div class="mt-10 grid gap-6 md:grid-cols-3">

                    @foreach ($posts as $post)
                        <article
                            class="overflow-hidden rounded-xl border
                                   border-slate-200 bg-white shadow-sm
                                   transition hover:-translate-y-1
                                   hover:shadow-lg">

                            <img src="{{ $post->image ?: asset('img/landing/hero/hero-vessel-supply.jpeg') }}"
                                alt="{{ $post->name }}" class="h-52 w-full object-cover">

                            <div class="p-6">

                                <span
                                    class="inline-flex rounded bg-blue-50
                                         px-2.5 py-1 text-[10px] font-bold
                                         text-blue-700">
                                    {{ strtoupper($post->category?->name ?? 'MARITIME INSIGHTS') }}
                                </span>

                                <p class="mt-4 text-xs text-slate-400">
                                    {{ $post->published_at?->format('d M Y') }}
                                </p>

                                <h3
                                    class="mt-2 text-lg font-bold leading-6
                                       text-slate-900">
                                    {{ $post->name }}
                                </h3>

                                <p class="mt-3 text-sm leading-6 text-slate-500">
                                    {{ $post->intro ?: str(strip_tags($post->content))->limit(140) }}
                                </p>

                                <a href="{{ route('frontend.posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                    class="mt-5 inline-flex items-center gap-2
                                      text-xs font-bold text-blue-700">

                                    Read More

                                    <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i>

                                </a>

                            </div>

                        </article>
                    @endforeach

                </div>

            </div>

        </section>


        {{-- =========================================================
        QUICK RFQ
    ========================================================== --}}
        <section id="rfq" class="bg-slate-50 pb-20">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="overflow-hidden rounded-2xl bg-[#06284b]
                        shadow-xl">

                    <div class="grid lg:grid-cols-5">

                        {{-- Contact --}}
                        <div class="p-8 text-white lg:col-span-2 lg:p-10">

                            <p
                                class="text-xs font-bold uppercase tracking-widest
                                  text-yellow-400">
                                Quick RFQ
                            </p>

                            <h2 class="mt-3 text-3xl font-extrabold">
                                Request for Quotation
                            </h2>

                            <p class="mt-4 max-w-sm text-sm leading-6 text-blue-100">
                                Fill in the form and our team will respond
                                to your inquiry as soon as possible.
                            </p>


                            <div class="mt-8 space-y-5">

                                <div class="flex gap-4">

                                    <i data-lucide="phone" class="h-5 w-5 shrink-0 text-yellow-400">
                                    </i>

                                    <div>
                                        <a href="tel:+6281250977777"
                                            class="text-sm font-semibold transition hover:text-yellow-300">
                                            +62 812 5097 7777
                                        </a>

                                        <p class="text-xs text-blue-200">
                                            Office / Telp & Fax
                                        </p>
                                    </div>

                                </div>


                                <div class="flex gap-4">

                                    <i data-lucide="mail" class="h-5 w-5 shrink-0 text-white">
                                    </i>

                                    <div class="flex flex-col gap-1 text-sm text-blue-100">
                                        <a href="mailto:ajfadmin@aztonjayaforever.com"
                                            class="transition hover:text-white">
                                            ajfadmin@aztonjayaforever.com
                                        </a>
                                        <a href="mailto:ajfmarketing@aztonjayaforever.com"
                                            class="transition hover:text-white">
                                            ajfmarketing@aztonjayaforever.com
                                        </a>
                                    </div>

                                </div>


                                <div class="flex gap-4">

                                    <i data-lucide="message-square" class="h-5 w-5 shrink-0 text-white">
                                    </i>

                                    <div class="flex flex-col gap-1 text-sm text-blue-100">
                                        <a href="https://wa.me/6281250977777" target="_blank"
                                            rel="noopener noreferrer" class="transition hover:text-white">
                                            +62 812 5097 7777
                                        </a>
                                        <a href="https://wa.me/6282141511101" target="_blank"
                                            rel="noopener noreferrer" class="transition hover:text-white">
                                            +62 821 4151 1101
                                        </a>
                                    </div>

                                </div>


                                <div class="flex gap-4">

                                    <i data-lucide="map-pin" class="h-5 w-5 shrink-0 text-white">
                                    </i>

                                    <p class="text-sm leading-6 text-blue-100">
                                        Dermaga Baru Toko Lima RT. 14 (75382)<br>
                                        Muara Badak Ilir, Muara Badak<br>
                                        Kutai Kartanegara, Kalimantan Timur, Indonesia
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Form --}}
                        <div class="bg-white p-6 lg:col-span-3 lg:p-8">

                            <form action="{{ route('frontend.rfqs.store') }}" method="POST"
                                enctype="multipart/form-data" class="space-y-5">

                                @csrf

                                @if (session('success'))
                                    <div
                                        class="rounded-lg bg-green-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">
                                        <p class="font-semibold">{{ __('rfq::text.validation_failed') }}</p>
                                        <ul class="mt-1 list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="grid gap-5 sm:grid-cols-2">

                                    {{-- Vessel --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            Vessel Name *
                                        </label>

                                        <input type="text" name="vessel_name" value="{{ old('vessel_name') }}"
                                            placeholder="e.g. MV Ocean Star" required
                                            class="w-full rounded-lg border border-slate-200
                                               px-4 py-3 text-sm outline-none
                                               transition focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">
                                    </div>


                                    {{-- IMO --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            IMO Number
                                        </label>

                                        <input type="text" name="imo_number" value="{{ old('imo_number') }}"
                                            placeholder="e.g. 9876543"
                                            class="w-full rounded-lg border border-slate-200
                                               px-4 py-3 text-sm outline-none
                                               transition focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">
                                    </div>


                                    {{-- Port --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            Port of Destination *
                                        </label>

                                        <select name="port" required
                                            class="w-full rounded-lg border border-slate-200
                                               bg-white px-4 py-3 text-sm outline-none
                                               focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">

                                            <option value="">
                                                Select Port
                                            </option>

                                            <option value="muara_badak" @selected(old('port') === 'muara_badak')>
                                                Muara Badak, East Kalimantan
                                            </option>

                                            <option value="muara_jawa" @selected(old('port') === 'muara_jawa')>
                                                Muara Jawa
                                            </option>

                                            <option value="samboja" @selected(old('port') === 'samboja')>
                                                Samboja
                                            </option>

                                        </select>
                                    </div>


                                    {{-- ETA --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            ETA (Estimated Time of Arrival) *
                                        </label>

                                        <input type="datetime-local" name="eta" value="{{ old('eta') }}"
                                            required
                                            class="w-full rounded-lg border border-slate-200
                                               px-4 py-3 text-sm outline-none
                                               focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">
                                    </div>


                                    {{-- Contact --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            Contact Email / Phone *
                                        </label>

                                        <input type="text" name="contact" value="{{ old('contact') }}"
                                            placeholder="e.g. name@company.com" required
                                            class="w-full rounded-lg border border-slate-200
                                               px-4 py-3 text-sm outline-none
                                               focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">
                                    </div>


                                    {{-- Company --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            Company
                                        </label>

                                        <input type="text" name="company" value="{{ old('company') }}"
                                            placeholder="e.g. Ocean Shipping Ltd."
                                            class="w-full rounded-lg border border-slate-200
                                               px-4 py-3 text-sm outline-none
                                               focus:border-blue-600
                                               focus:ring-2 focus:ring-blue-100">
                                    </div>

                                </div>


                                {{-- Requirement --}}
                                <div>
                                    <label
                                        class="mb-2 block text-xs font-bold
                                              text-slate-700">
                                        Your Requirement / Remarks *
                                    </label>

                                    <textarea name="requirement" rows="4" required placeholder="Please describe your requirements..."
                                        class="w-full resize-none rounded-lg border
                                           border-slate-200 px-4 py-3 text-sm
                                           outline-none transition
                                           focus:border-blue-600
                                           focus:ring-2 focus:ring-blue-100">{{ old('requirement') }}</textarea>
                                </div>


                                {{-- Attachment --}}
                                <div>
                                    <label
                                        class="mb-2 block text-xs font-bold
                                              text-slate-700">
                                        Attach File (PDF / Excel)
                                    </label>

                                    <input type="file" name="attachment" accept=".pdf,.xls,.xlsx"
                                        class="block w-full rounded-lg border
                                           border-slate-200 text-sm
                                           file:mr-4 file:border-0
                                           file:bg-blue-50 file:px-4
                                           file:py-3 file:font-semibold
                                           file:text-blue-700
                                           hover:file:bg-blue-100">

                                    <p class="mt-1 text-xs text-slate-400">
                                        Maximum file size: 10 MB
                                    </p>
                                </div>


                                {{-- Submit --}}
                                <button type="submit"
                                    class="flex w-full items-center justify-center
                                       gap-2 rounded-lg bg-red-600 px-6 py-3.5
                                       text-sm font-bold text-white
                                       transition hover:bg-red-700
                                       focus:outline-none focus:ring-4
                                       focus:ring-red-100">

                                    <i data-lucide="send" class="h-4 w-4"></i>

                                    Submit RFQ

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
</div>
