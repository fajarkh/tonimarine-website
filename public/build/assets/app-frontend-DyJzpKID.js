import{r as e}from"./rolldown-runtime-hePW80VL.js";import{a as t,c as n,i as r,o as i,s as a}from"./vendor/.pnpm-DSyqi_rL.js";window.axios=n,window.axios.defaults.headers.common[`X-Requested-With`]=`XMLHttpRequest`;var o=e(r(),1);window.L=o.default;var s=`color-theme`;function c(){return localStorage.getItem(s)||(window.matchMedia(`(prefers-color-scheme: dark)`).matches?`dark`:`light`)}function l(e){document.documentElement.classList.toggle(`dark`,e===`dark`),localStorage.setItem(s,e),d()}function u(){let e=c();document.documentElement.classList.toggle(`dark`,e===`dark`)}function d(){let e=document.getElementById(`theme-toggle-dark-icon`),t=document.getElementById(`theme-toggle-light-icon`);if(!e||!t)return;let n=document.documentElement.classList.contains(`dark`);e.classList.toggle(`hidden`,n),t.classList.toggle(`hidden`,!n)}function f(){let e=document.getElementById(`theme-toggle`);e&&e.dataset.themeInitialized!==`true`&&(e.dataset.themeInitialized=`true`,e.addEventListener(`click`,()=>{l((document.documentElement.classList.contains(`dark`)?`dark`:`light`)==`dark`?`light`:`dark`)}),d())}function p(){t({icons:i,attrs:{"stroke-width":1.8}})}function m(){document.querySelectorAll(`a[href^="#"]`).forEach(e=>{e.dataset.smoothScrollInitialized!==`true`&&(e.dataset.smoothScrollInitialized=`true`,e.addEventListener(`click`,t=>{let n=e.getAttribute(`href`);if(!n||n===`#`)return;let r=document.querySelector(n);r&&(t.preventDefault(),r.scrollIntoView({behavior:`smooth`,block:`start`}))}))})}function h(){let e=document.querySelectorAll(`[data-reveal]`);if(!e.length)return;if(!(`IntersectionObserver`in window)){e.forEach(e=>{e.classList.add(`is-visible`)});return}let t=new IntersectionObserver((e,t)=>{e.forEach(e=>{e.isIntersecting&&(e.target.classList.add(`is-visible`),t.unobserve(e.target))})},{threshold:.12,rootMargin:`0px 0px -40px 0px`});e.forEach(e=>{t.observe(e)})}document.addEventListener(`DOMContentLoaded`,()=>{if(!document.getElementById(`muaraBadakMap`))return;let e=o.default.map(`muaraBadakMap`,{zoomControl:!0,scrollWheelZoom:!1});o.default.tileLayer(`https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png`,{maxZoom:9,attribution:`&copy; OpenStreetMap contributors`}).addTo(e);let t=[{name:`Muara Badak Port`,type:`port`,lat:-.2067,lng:117.4875,description:`Muara Badak Port / Jetty`},{name:`Muara Badak`,type:`area`,lat:-.22,lng:117.48,description:`Muara Badak Area`},{name:`Anchorage Area`,type:`anchorage`,lat:-.19,lng:117.51,description:`Anchorage & Supply Area`}],n=o.default.divIcon({className:`custom-leaflet-marker`,html:`
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
        `,iconSize:[40,40],iconAnchor:[20,20],popupAnchor:[0,-20]}),r=o.default.divIcon({className:`custom-leaflet-marker`,html:`
            <div class="
                flex h-4 w-4
                rounded-full
                bg-blue-700
                ring-4 ring-blue-700/20
            "></div>
        `,iconSize:[16,16],iconAnchor:[8,8]}),i=[];if(t.forEach(t=>{let a=t.type===`port`?n:r,s=o.default.marker([t.lat,t.lng],{icon:a}).addTo(e);s.bindPopup(`
            <div class="min-w-[180px]">
                <div class="text-sm font-bold text-slate-900">
                    ${t.name}
                </div>

                <div class="mt-1 text-xs text-slate-500">
                    ${t.description}
                </div>
            </div>
        `),i.push(s)}),i.length>0){let t=o.default.featureGroup(i);e.fitBounds(t.getBounds(),{padding:[40,40]})}});function g(){u(),d(),f(),a(),p(),m(),h()}document.readyState===`loading`?document.addEventListener(`DOMContentLoaded`,g,{once:!0}):g(),document.addEventListener(`livewire:navigated`,g),document.addEventListener(`livewire:updated`,()=>{a(),p(),m(),h()});