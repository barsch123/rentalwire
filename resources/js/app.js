document.addEventListener('alpine:init', () => {
    Alpine.data('homeHero', () => ({
        translations: window.solaraTranslations ?? {},
        active: 0,
        timer: null,
        slides: [
            {
                label: 'Home solar',
                title: window.solaraTranslations?.hero_home_title ?? 'Power your home with more predictable energy.',
                description: window.solaraTranslations?.hero_home_description ?? 'A solar system designed around your roof, daily usage, and long-term savings goals.',
                image: 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1600&q=85',
                alt: 'Solar panels installed on a modern home',
            },
            {
                label: 'Battery backup',
                title: window.solaraTranslations?.hero_battery_title ?? 'Keep essential power available when it matters.',
                description: window.solaraTranslations?.hero_battery_description ?? 'Store solar energy for evenings, outages, and the appliances your household relies on.',
                image: 'https://images.unsplash.com/photo-1624397640148-949b1732bb0a?auto=format&fit=crop&w=1600&q=85',
                alt: 'Home solar and battery energy system',
            },
            {
                label: 'Commercial',
                title: window.solaraTranslations?.hero_commercial_title ?? 'Turn business energy use into a smarter investment.',
                description: window.solaraTranslations?.hero_commercial_description ?? 'Commercial solar and storage planned around operating hours, demand, and available space.',
                image: 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1600&q=85',
                alt: 'Large commercial solar panel installation',
            },
        ],

        init() {
            this.start();
        },

        select(index) {
            this.active = index;
            this.start();
        },

        start() {
            this.pause();
            this.timer = window.setInterval(() => {
                this.active = (this.active + 1) % this.slides.length;
            }, 5000);
        },

        pause() {
            window.clearInterval(this.timer);
            this.timer = null;
        },

        destroy() {
            this.pause();
        },
    }));

    Alpine.data('delayedLoader', () => ({
        visible: false,
        timer: null,
        requestInterceptor: null,
        navigateHandler: null,
        navigatedHandler: null,
        loadHandler: null,
        livewireInitHandler: null,

        init() {
            this.navigateHandler = () => this.start();
            this.navigatedHandler = () => this.stop();
            this.loadHandler = () => this.stop();
            this.livewireInitHandler = () => this.registerRequestInterceptor();

            document.addEventListener('livewire:navigate', this.navigateHandler);
            document.addEventListener('livewire:navigated', this.navigatedHandler);

            if (document.readyState !== 'complete') {
                this.start();
                window.addEventListener('load', this.loadHandler, { once: true });
            }

            if (window.Livewire) {
                this.registerRequestInterceptor();
            } else {
                document.addEventListener('livewire:init', this.livewireInitHandler, { once: true });
            }
        },

        start() {
            window.clearTimeout(this.timer);
            this.timer = window.setTimeout(() => {
                this.visible = true;
            }, 500);
        },

        stop() {
            window.clearTimeout(this.timer);
            this.timer = null;
            this.visible = false;
        },

        registerRequestInterceptor() {
            if (this.requestInterceptor || ! window.Livewire) {
                return;
            }

            this.requestInterceptor = Livewire.interceptRequest(({ onSend, onFinish }) => {
                onSend(() => this.start());
                onFinish(() => this.stop());
            });
        },

        destroy() {
            this.stop();
            document.removeEventListener('livewire:navigate', this.navigateHandler);
            document.removeEventListener('livewire:navigated', this.navigatedHandler);
            document.removeEventListener('livewire:init', this.livewireInitHandler);
            window.removeEventListener('load', this.loadHandler);
            this.requestInterceptor?.();
        },
    }));

    // Modal store for table modals
    Alpine.store('modal', {
        view: 'prompt',

        setView(view) {
            this.view = view;
        },

        isView(view) {
            return this.view === view;
        }
    });
});
