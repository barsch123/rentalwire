<div>
    <section id="hero" class="relative h-screen overflow-hidden text-white bg-neutral-900" x-data="heroController()"
        x-init="init()" @mouseleave.window="resetParallax()" aria-label="Hero — Heavy equipment rentals">

        <!-- Background gradient + grain -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute inset-0 bg-gradient-to-br from-neutral-900 via-neutral-800 to-black opacity-95"></div>
            <svg class="absolute inset-0 w-full h-full" preserveAspectRatio="none" aria-hidden="true">
                <filter id="grain">
                    <feTurbulence baseFrequency="0.9" numOctaves="2" stitchTiles="stitch" />
                    <feColorMatrix type="saturate" values="0" />
                    <feComponentTransfer>
                        <feFuncA type="table" tableValues="0 0.04" />
                    </feComponentTransfer>
                </filter>
                <rect width="100%" height="100%" filter="url(#grain)" opacity="0.04" />
            </svg>
        </div>

        <!-- Decorative rotating gear -->
        <svg class="absolute right-6 top-12 w-44 h-44 opacity-20 transform" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 200 200" aria-hidden="true">
            <g transform="translate(100,100)">
                <g :class="{'animate-spin-slow': isSpinning}">
                    <path
                        d="M-70,-5 L-50,-25 L-20,-18 L-10,-40 L10,-40 L20,-18 L50,-25 L70,-5 L70,5 L50,25 L20,18 L10,40 L-10,40 L-20,18 L-50,25 Z"
                        fill="rgba(255,255,255,0.06)" />
                </g>
            </g>
        </svg>

        <!-- Layout -->
        <div
            class="relative z-10 h-full flex flex-col-reverse md:flex-row items-start md:items-center justify-center px-6 lg:px-20 py-12">

            <!-- Left: Content -->
            <div class="w-full md:w-6/12 max-w-2xl space-y-6 md:space-y-8 text-center md:text-left">
                <p
                    class="inline-flex items-center gap-3 text-sm md:text-base text-yellow-400 font-semibold tracking-wide">
                    <span class="inline-block w-3 h-3 rounded-full bg-yellow-400 animate-pulse"
                        aria-hidden="true"></span>
                    HEAVY EQUIPMENT SOLUTIONS
                </p>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                    Powering Your Projects With
                    <div class="mt-2 inline-block text-yellow-500" aria-live="polite">
                        <span x-text="displayText"></span><span class="ml-1 text-white/60"
                            x-show="cursorVisible">|</span>
                    </div>
                </h1>

                <p class="text-gray-300 text-lg md:text-xl max-w-xl">
                    Expert rentals with certified operators for construction, mining, and industrial projects —
                    equipment, logistics, and safety managed end-to-end.
                </p>

                <!-- CTA buttons -->
                <div class="mt-6 inline-flex flex-col sm:flex-row items-center gap-4">
                    <a href="#quote"
                        class="group inline-flex items-center gap-3 rounded-2xl px-6 py-3 bg-yellow-600/95 hover:bg-general shadow-2xl transition transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-yellow-400/30">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="font-semibold">Request a Free Quote</span>
                    </a>

                    <a href="#equipment"
                        class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 border border-white/10 backdrop-blur-sm bg-white/5 hover:bg-white/10 transition focus:outline-none focus:ring-4 focus:ring-white/10">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="font-semibold">View Equipment</span>
                    </a>
                </div>

              
            </div>

            <!-- Right: Masonry gallery -->
            <div class="w-full md:w-6/12 mt-8 md:mt-0 md:pl-12">
                <div class="relative [column-count:1] md:[column-count:2] xl:[column-count:3] gap-4">

                    <figure class="mb-4 rounded-lg overflow-hidden shadow-xl break-inside-avoid">
                        <img src="https://images.unsplash.com/photo-1630288214173-a119cf823388?auto=format&fit=crop&w=1200&q=80"
                            alt="Excavator" class="w-full h-auto object-cover">
                    </figure>
                    <figure class="mb-4 rounded-lg overflow-hidden shadow-xl break-inside-avoid">
                        <img src="https://images.unsplash.com/photo-1583024011792-b165975b52f5?auto=format&fit=crop&w=1200&q=80"
                            alt="Construction site" class="w-full h-auto object-cover">
                    </figure>
                    <figure class="mb-4 rounded-lg overflow-hidden shadow-xl break-inside-avoid">
                        <img src="https://images.unsplash.com/photo-1652613015049-be06063b559c?auto=format&fit=crop&w=1200&q=80"
                            alt="Heavy equipment" class="w-full h-auto object-cover">
                    </figure>
                    <figure class="mb-4 rounded-lg overflow-hidden shadow-xl break-inside-avoid">
                        <img src="https://images.unsplash.com/photo-1610477865545-37711c53144d?auto=format&fit=crop&w=1200&q=80"
                            alt="Bulldozer" class="w-full h-auto object-cover">
                    </figure>
                    <figure class="mb-4 rounded-lg overflow-hidden shadow-xl break-inside-avoid">
                        <img src="https://images.unsplash.com/photo-1703113691621-af7d6e70dcc1?auto=format&fit=crop&w=1200&q=80"
                            alt="Crane" class="w-full h-auto object-cover">
                    </figure>

                    <!-- Small accent gear -->
                    <div class="absolute -left-8 -top-8 w-16 h-16 opacity-30 pointer-events-none">
                        <svg viewBox="0 0 100 100" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <g transform="translate(50,50)">
                                <g class="animate-spin-slow">
                                    <circle r="16" fill="rgba(255,255,255,0.04)" />
                                    <g fill="rgba(255,255,255,0.06)">
                                        <rect x="22" y="-6" width="10" height="12" rx="2" />
                                        <rect x="-32" y="-6" width="10" height="12" rx="2" />
                                        <rect x="-6" y="22" width="12" height="10" rx="2" transform="rotate(90)" />
                                        <rect x="-6" y="-32" width="12" height="10" rx="2" transform="rotate(90)" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll hint -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-gray-300 text-xs flex items-center gap-2">
            <svg class="w-5 h-5 animate-bounce" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 5v14M5 12l7 7 7-7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span>Scroll to explore</span>
        </div>

        @push('scripts')
            <script>
                function heroController() {
                    return {
                        strings: ['Efficiency', 'Excellence', 'Expertise', 'Equipment', 'Eco-friendly'],
                        displayText: '', currentStringIndex: 0, currentCharIndex: 0,
                        typeSpeed: 70, deletingSpeed: 35, cursorVisible: true,
                        mouseX: 0, mouseY: 0,
                        layers: [{ depth: 0.02 }, { depth: 0.06 }, { depth: 0.12 }, { depth: 0.18 }],
                        counters: { fleet: 0, projects: 0, operators: 0 },
                        isSpinning: true,

                        init() {
                            this.startTyping();
                        },
                        startTyping() {
                            this.currentCharIndex = 0;
                            this.displayText = '';
                            const currentString = this.strings[this.currentStringIndex];
                            const typeInterval = setInterval(() => {
                                if (this.currentCharIndex < currentString.length) {
                                    this.displayText += currentString.charAt(this.currentCharIndex++);
                                } else {
                                    clearInterval(typeInterval);
                                    setTimeout(() => this.eraseAll(), 1400);
                                }
                            }, this.typeSpeed);
                        },
                        eraseAll() {
                            const eraseInterval = setInterval(() => {
                                if (this.displayText.length > 0) {
                                    this.displayText = this.displayText.slice(0, -1);
                                } else {
                                    clearInterval(eraseInterval);
                                    this.currentStringIndex = (this.currentStringIndex + 1) % this.strings.length;
                                    setTimeout(() => this.startTyping(), 280);
                                }
                            }, this.deletingSpeed);
                        },

                        animateCounter(key, target) {
                            const step = Math.max(1, Math.floor(target / 60));
                            const interval = setInterval(() => {
                                if (this.counters[key] < target) {
                                    this.counters[key] += step;
                                    if (this.counters[key] > target) this.counters[key] = target;
                                } else clearInterval(interval);
                            }, 12);
                        }
                    }
                }
            </script>
        @endpush
    </section>
</div>