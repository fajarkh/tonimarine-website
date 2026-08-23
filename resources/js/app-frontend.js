import './bootstrap';
import 'flowbite';

import { initFlowbite } from 'flowbite';
import { createIcons, icons } from 'lucide';

import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

window.L = L;

/**
 * ================================================================
 * Theme
 * ================================================================
 */

const THEME_KEY = 'color-theme';

function getPreferredTheme() {
    const storedTheme = localStorage.getItem(THEME_KEY);

    if (storedTheme) {
        return storedTheme;
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches
        ? 'dark'
        : 'light';
}

function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');

    localStorage.setItem(THEME_KEY, theme);

    updateThemeToggleIcons();
}

function setInitialTheme() {
    const theme = getPreferredTheme();

    document.documentElement.classList.toggle(
        'dark',
        theme === 'dark'
    );
}

function updateThemeToggleIcons() {
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    if (!darkIcon || !lightIcon) {
        return;
    }

    const isDark = document.documentElement.classList.contains('dark');

    darkIcon.classList.toggle('hidden', isDark);
    lightIcon.classList.toggle('hidden', !isDark);
}

function initThemeToggle() {
    const button = document.getElementById('theme-toggle');

    if (!button) {
        return;
    }

    // Prevent duplicate event listeners
    if (button.dataset.themeInitialized === 'true') {
        return;
    }

    button.dataset.themeInitialized = 'true';

    button.addEventListener('click', () => {
        const currentTheme =
            document.documentElement.classList.contains('dark')
                ? 'dark'
                : 'light';

        applyTheme(
            currentTheme === 'dark'
                ? 'light'
                : 'dark'
        );
    });

    updateThemeToggleIcons();
}


/**
 * ================================================================
 * Lucide Icons
 * ================================================================
 */

function initIcons() {
    createIcons({
        icons,
        attrs: {
            'stroke-width': 1.8,
        },
    });
}


/**
 * ================================================================
 * Smooth Scroll
 * ================================================================
 */

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {

        if (link.dataset.smoothScrollInitialized === 'true') {
            return;
        }

        link.dataset.smoothScrollInitialized = 'true';

        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');

            if (!targetId || targetId === '#') {
                return;
            }

            const target = document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        });
    });
}


/**
 * ================================================================
 * Scroll Reveal
 * ================================================================
 */

function initScrollReveal() {
    const elements = document.querySelectorAll('[data-reveal]');

    if (!elements.length) {
        return;
    }

    // Fallback
    if (!('IntersectionObserver' in window)) {
        elements.forEach((element) => {
            element.classList.add('is-visible');
        });

        return;
    }

    const observer = new IntersectionObserver(
        (entries, observer) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');

                observer.unobserve(entry.target);
            });

        },
        {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px',
        }
    );

    elements.forEach((element) => {
        observer.observe(element);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const mapElement = document.getElementById('muaraBadakMap');

    if (!mapElement) {
        return;
    }

    // Muara Badak
    const map = L.map('muaraBadakMap', {
        zoomControl: true,
        scrollWheelZoom: false,
    });

    // OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 9,
        attribution: '&copy; OpenStreetMap contributors',
    }).addTo(map);

    /*
    |--------------------------------------------------------------------------
    | Locations
    |--------------------------------------------------------------------------
    */

    const locations = [
        {
            name: 'Muara Badak Port',
            type: 'port',
            lat: -0.2067,
            lng: 117.4875,
            description: 'Muara Badak Port / Jetty',
        },

        {
            name: 'Muara Badak',
            type: 'area',
            lat: -0.2200,
            lng: 117.4800,
            description: 'Muara Badak Area',
        },

        {
            name: 'Anchorage Area',
            type: 'anchorage',
            lat: -0.1900,
            lng: 117.5100,
            description: 'Anchorage & Supply Area',
        },
    ];

    /*
    |--------------------------------------------------------------------------
    | Custom Marker
    |--------------------------------------------------------------------------
    */

    const portIcon = L.divIcon({
        className: 'custom-leaflet-marker',
        html: `
            <div class="relative flex h-10 w-10 items-center justify-center">
                
                <div class="
                    absolute inset-0
                    animate-ping
                    rounded-full
                    bg-red-500/30
                "></div>

                <div class="
                    relative z-10
                    flex h-10 w-10
                    items-center justify-center
                    rounded-full
                    bg-red-600
                    text-white
                    shadow-lg
                    ring-4 ring-white/80
                ">
                    <span class="text-lg">⚓</span>
                </div>

            </div>
        `,
        iconSize: [40, 40],
        iconAnchor: [20, 20],
        popupAnchor: [0, -20],
    });

    const areaIcon = L.divIcon({
        className: 'custom-leaflet-marker',
        html: `
            <div class="
                flex h-4 w-4
                rounded-full
                bg-blue-700
                ring-4 ring-blue-700/20
            "></div>
        `,
        iconSize: [16, 16],
        iconAnchor: [8, 8],
    });

    /*
    |--------------------------------------------------------------------------
    | Add Markers
    |--------------------------------------------------------------------------
    */

    const markers = [];

    locations.forEach((location) => {

        const icon = location.type === 'port'
            ? portIcon
            : areaIcon;

        const marker = L.marker(
            [location.lat, location.lng],
            { icon }
        ).addTo(map);

        marker.bindPopup(`
            <div class="min-w-[180px]">
                <div class="text-sm font-bold text-slate-900">
                    ${location.name}
                </div>

                <div class="mt-1 text-xs text-slate-500">
                    ${location.description}
                </div>
            </div>
        `);

        markers.push(marker);
    });

    /*
    |--------------------------------------------------------------------------
    | Map Bounds
    |--------------------------------------------------------------------------
    */

    if (markers.length > 0) {
        const group = L.featureGroup(markers);

        map.fitBounds(group.getBounds(), {
            padding: [40, 40],
        });
    }
});

/**
 * ================================================================
 * App Initialization
 * ================================================================
 */

function initializeApp() {
    setInitialTheme();
    updateThemeToggleIcons();

    initThemeToggle();
    initFlowbite();
    initIcons();

    initSmoothScroll();
    initScrollReveal();
}


/**
 * ================================================================
 * Initial Load
 * ================================================================
 */

if (document.readyState === 'loading') {
    document.addEventListener(
        'DOMContentLoaded',
        initializeApp,
        { once: true }
    );
} else {
    initializeApp();
}


/**
 * ================================================================
 * Livewire Navigation
 * ================================================================
 */

document.addEventListener(
    'livewire:navigated',
    initializeApp
);


/**
 * ================================================================
 * Livewire Updates
 * ================================================================
 */

document.addEventListener(
    'livewire:updated',
    () => {
        initFlowbite();
        initIcons();
        initSmoothScroll();
        initScrollReveal();
    }
);