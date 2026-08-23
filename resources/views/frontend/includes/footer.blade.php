<footer
    class="bg-[#06264a] text-white dark:bg-gray-800"
    role="contentinfo"
    aria-label="Site footer"
>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
    {{-- Main Footer --}}
    <div class="flex flex-col gap-5 py-5 lg:flex-row lg:items-center lg:justify-between">

        {{-- Logo --}}
        <div class="flex shrink-0 justify-center lg:justify-start">
            <a
                href="/"
                wire:navigate
                aria-label="Go to homepage"
                class="inline-flex items-center"
            >
                <img
                    src="{{ asset('img/logo-with-text-trans.png') }}"
                    alt="{{ app_name() }} Logo"
                    class="h-50 w-100 rounded-sm object-contain"
                />
            </a>
        </div>

        {{-- Navigation --}}
        <x-menu-dynamic-menu
            location="frontend-footer"
            css-class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-[11px] font-medium text-white"
        />

        {{-- Social Media --}}
        @if (setting("show_footer_social_profiles"))
            <div class="flex justify-center lg:justify-end">
                <x-cube::social.links
                    class="flex items-center gap-4"
                    :website="setting('website_url')"
                    :instagram="setting('instagram_url')"
                    :facebook="setting('facebook_url')"
                    :twitter="setting('twitter_url')"
                    :youtube="setting('youtube_url')"
                    :whatsapp="setting('whatsapp_url')"
                />
            </div>
        @endif

    </div>

    {{-- Copyright / Footer Credit --}}
    <div class="border-t border-white/10 py-2.5 text-center">

        @if (setting("show_license"))
            <div class="text-[10px] leading-relaxed text-white/70">
                <x-cube::footer-license
                    license="cc-by-sa"
                    :author="app_name()"
                    :author-url="app_url()"
                />
            </div>
        @endif

        @if (setting("show_credit"))
            <div class="text-[10px] leading-relaxed text-white/70">
                <x-cube::footer-credit
                    :text="setting('footer_text')"
                />
            </div>
        @endif

        {{-- Fallback copyright --}}
        @if (!setting("show_license") && !setting("show_credit"))
            <p class="text-[10px] font-light tracking-wide text-white/70 sm:text-[11px]">
                © {{ date('Y') }} {{ app_name() }}. All Rights Reserved.
            </p>
        @endif

    </div>

</div>
</footer>
