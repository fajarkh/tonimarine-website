<div>
    <div class="min-h-screen bg-white text-slate-900">

        {{-- =========================================================
        HERO SECTION
    ========================================================== --}}
        <section class="relative overflow-hidden bg-[#06284b]">
            {{-- Background --}}
            <div class="absolute inset-0">
                <img src="{{ asset('images/landing/hero-marine.jpg') }}" alt="Marine supply vessel"
                    class="h-full w-full object-cover">

                <div
                    class="absolute inset-0 bg-gradient-to-r
                        from-[#03254a]/95 via-[#07345d]/80 to-[#07345d]/20">
                </div>
            </div>

            <div class="relative mx-auto max-w-7xl px-6 py-24 lg:px-8 lg:py-32">
                <div class="max-w-3xl">

                    <span
                        class="mb-5 inline-flex items-center rounded-full
                             border border-white/20 bg-white/10 px-4 py-2
                             text-sm font-semibold text-white backdrop-blur">
                        <span class="mr-2 h-2 w-2 rounded-full bg-red-500"></span>
                        MARINE SUPPLY SERVICES
                    </span>

                    <h1
                        class="text-4xl font-extrabold leading-tight tracking-tight
                           text-white sm:text-5xl lg:text-6xl">
                        Reliable Marine Provisions & Technical Stores
                        <span class="text-red-500">
                            Supplied Directly to Your Vessel, 24/7.
                        </span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-50">
                        Fast response, reliable supply and professional marine
                        services for vessels operating around Muara Badak,
                        East Kalimantan.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">

                        <a href="#rfq"
                            class="inline-flex items-center gap-2 rounded-lg
                              bg-red-600 px-6 py-3.5 text-sm font-bold
                              text-white shadow-lg shadow-red-900/20
                              transition hover:bg-red-700">

                            <i data-lucide="message-circle" class="h-5 w-5"></i>

                            Request Immediate Quote
                        </a>

                        <a href="#services"
                            class="inline-flex items-center gap-2 rounded-lg
                              border border-white/40 bg-white/10 px-6 py-3.5
                              text-sm font-bold text-white backdrop-blur
                              transition hover:bg-white/20">

                            <i data-lucide="book-open" class="h-5 w-5"></i>

                            View Supply Catalog
                        </a>

                    </div>
                </div>
            </div>

            {{-- Hero stats --}}
            <div class="relative border-t border-white/10 bg-[#032b52]/90">
                <div
                    class="mx-auto grid max-w-7xl grid-cols-2
                        divide-x divide-white/10 md:grid-cols-4">

                    @foreach ([['icon' => 'clock-3', 'value' => '24/7', 'label' => 'Service & Support'], ['icon' => 'ship', 'value' => 'Muara Badak', 'label' => 'Port Coverage'], ['icon' => 'zap', 'value' => 'Fast Response', 'label' => 'On-Time Delivery'], ['icon' => 'shield-check', 'value' => 'Trusted Quality', 'label' => 'Safety & Compliance']] as $stat)
                        <div class="flex items-center gap-3 px-5 py-5 lg:px-8">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center
                                    justify-center rounded-full bg-white/10">

                                <i data-lucide="{{ $stat['icon'] }}" class="h-5 w-5 text-white"></i>

                            </div>

                            <div>
                                <p class="text-sm font-bold text-white">
                                    {{ $stat['value'] }}
                                </p>

                                <p class="text-xs text-blue-200">
                                    {{ $stat['label'] }}
                                </p>
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
                        Complete Marine Supply Solutions
                    </h2>

                    <p class="mt-4 text-slate-500">
                        Reliable supplies and support for vessels, crews and
                        marine operations.
                    </p>

                </div>


                <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">

                    @php
                        $services = [
                            [
                                'icon' => 'shopping-cart',
                                'title' => 'Provisions & Bonded Stores',
                                'description' =>
                                    'Fresh, frozen and dry provisions, halal and non-halal food, beverages, tobacco and crew essentials.',
                            ],
                            [
                                'icon' => 'settings-2',
                                'title' => 'Deck, Engine, & Cabin Stores',
                                'description' => 'Wide range of technical stores compliant with IMPA and ISSA codes.',
                            ],
                            [
                                'icon' => 'life-buoy',
                                'title' => 'Safety & Life-Saving Appliances',
                                'description' =>
                                    'Complete safety equipment, life-saving appliances and certified marine safety supplies.',
                            ],
                            [
                                'icon' => 'truck',
                                'title' => 'Logistics, Customs Clearance & Spare Parts',
                                'description' =>
                                    'End-to-end logistics, customs clearance and urgent spare parts delivery.',
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
                            Port Coverage
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
                            We specialize in supplying vessels at Muara Badak
                            Port and surrounding anchorage areas with fast,
                            reliable service and complete marine provisions
                            and technical stores.
                        </p>


                        <ul class="mt-6 space-y-3">

                            @foreach (['Anchorage Supply', 'Jetty & Berthing Supply', 'Crew Change Support', 'Spare Parts Delivery', 'Bunkering Coordination'] as $item)
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
                                    Muara Badak Port / Jetty
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
                                Why Muara Badak?
                            </p>


                            <div class="mt-6 space-y-6">

                                @php
                                    $reasons = [
                                        [
                                            'icon' => 'compass',
                                            'title' => 'Strategic Location',
                                            'text' => 'Gateway to East Kalimantan energy and industrial hub.',
                                        ],
                                        [
                                            'icon' => 'ship',
                                            'title' => 'Fast & Reliable Supply',
                                            'text' => 'Quick response for anchorage or alongside vessels.',
                                        ],
                                        [
                                            'icon' => 'users',
                                            'title' => 'Local Expertise',
                                            'text' => 'Experienced team and strong local network.',
                                        ],
                                        [
                                            'icon' => 'clock-3',
                                            'title' => '24/7 Operation',
                                            'text' => 'We are ready when you need us, anytime.',
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
                                                {{ $reason['text'] }}
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
        CERTIFICATIONS
    ========================================================== --}}
        <section class="bg-white py-16">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="text-center">

                    <p class="text-xs font-bold uppercase tracking-widest
                          text-blue-700">
                        Certifications & Accreditations
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-slate-900">
                        Quality You Can Trust
                    </h2>

                </div>


                <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">

                    @php
                        $certifications = [
                            ['name' => 'IMPA', 'desc' => 'International Marine Purchasing Association'],
                            ['name' => 'ISSA', 'desc' => 'International Ship Suppliers Association'],
                            ['name' => 'ISO', 'desc' => 'ISO 9001:2015 Quality Management'],
                            ['name' => 'HALAL', 'desc' => 'Halal Certified Food Provisions'],
                            ['name' => 'BV', 'desc' => 'Bureau Veritas Supplier Approval'],
                            ['name' => 'INSA', 'desc' => 'Indonesian National Shipowners Association'],
                        ];
                    @endphp


                    @foreach ($certifications as $cert)
                        <div
                            class="flex min-h-36 flex-col items-center justify-center
                                rounded-xl border border-slate-200 p-5
                                text-center transition hover:border-blue-300
                                hover:shadow-md">

                            <div class="text-2xl font-black text-blue-700">
                                {{ $cert['name'] }}
                            </div>

                            <p class="mt-3 text-[11px] leading-4 text-slate-500">
                                {{ $cert['desc'] }}
                            </p>

                        </div>
                    @endforeach

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

                    @foreach ([
        [
            'category' => 'DECK & ENGINE SUPPLY',
            'date' => '20 May 2026',
            'title' => 'Delivery Order Deck & Engine Store for MV Arfianie Ayu',
            'description' => 'Successfully delivered essential deck and engine stores for MV Arfianie Ayu (PT. Gurita Lintas Samudera) at Muara Jawa Anchorage, Indonesia.',
            'image' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'category' => 'PROVISION SUPPLY',
            'date' => '15 May 2026',
            'title' => 'Provision Supply Operations for MV Golden Hope & MV CH Bella',
            'description' => 'Provided fresh provisions and vessel supplies for MV Golden Hope and MV CH Bella at Muara Berau Anchorage, Indonesia.',
            'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'category' => 'TECHNICAL SERVICES',
            'date' => '08 May 2026',
            'title' => 'Motor Repair & Provisions Supply at Port of Tanjung Bara & Muara Berau',
            'description' => 'Executed motor repair services for MV Calypso Island at Muara Berau and fulfilled provisions supply services at Port of Tanjung Bara.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
        ],
    ] as $news)
                        <article
                            class="overflow-hidden rounded-xl border
                                   border-slate-200 bg-white shadow-sm
                                   transition hover:-translate-y-1
                                   hover:shadow-lg">

                            <img src="{{$news['image'] }}" alt="{{ $news['title'] }}"
                                class="h-52 w-full object-cover">

                            <div class="p-6">

                                <span
                                    class="inline-flex rounded bg-blue-50
                                         px-2.5 py-1 text-[10px] font-bold
                                         text-blue-700">
                                    {{ $news['category'] }}
                                </span>

                                <p class="mt-4 text-xs text-slate-400">
                                    {{ $news['date'] }}
                                </p>

                                <h3
                                    class="mt-2 text-lg font-bold leading-6
                                       text-slate-900">
                                    {{ $news['title'] }}
                                </h3>

                                <p class="mt-3 text-sm leading-6 text-slate-500">
                                    {{ $news['description'] }}
                                </p>

                                <a href="#"
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

                                    <i data-lucide="message-circle" class="h-5 w-5 shrink-0 text-yellow-400">
                                    </i>

                                    <div>
                                        <p class="text-sm font-semibold">
                                            +62 821-4151-1101
                                        </p>

                                        <p class="text-xs text-blue-200">
                                            24/7 Hotline
                                        </p>
                                    </div>

                                </div>


                                <div class="flex gap-4">

                                    <i data-lucide="mail" class="h-5 w-5 shrink-0 text-white">
                                    </i>

                                    <p class="text-sm text-blue-100">
                                        ajfmarketing@aztonjayaforever.com
                                    </p>

                                </div>


                                <div class="flex gap-4">

                                    <i data-lucide="map-pin" class="h-5 w-5 shrink-0 text-white">
                                    </i>

                                    <p class="text-sm text-blue-100">
                                        Muara Badak, Kutai Kartanegara<br>
                                        East Kalimantan, Indonesia
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Form --}}
                        <div class="bg-white p-6 lg:col-span-3 lg:p-8">

                            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">

                                @csrf

                                <div class="grid gap-5 sm:grid-cols-2">

                                    {{-- Vessel --}}
                                    <div>
                                        <label
                                            class="mb-2 block text-xs font-bold
                                                  text-slate-700">
                                            Vessel Name *
                                        </label>

                                        <input type="text" name="vessel_name" placeholder="e.g. MV Ocean Star"
                                            required
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

                                        <input type="text" name="imo_number" placeholder="e.g. 9876543"
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

                                            <option value="muara_badak">
                                                Muara Badak, East Kalimantan
                                            </option>

                                            <option value="muara_jawa">
                                                Muara Jawa
                                            </option>

                                            <option value="samboja">
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

                                        <input type="datetime-local" name="eta" required
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

                                        <input type="text" name="contact" placeholder="e.g. name@company.com"
                                            required
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

                                        <input type="text" name="company" placeholder="e.g. Ocean Shipping Ltd."
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
                                           focus:ring-2 focus:ring-blue-100"></textarea>
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
