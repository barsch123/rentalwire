<div x-data="{
    progress: 0,
    intersecting: false,
    legalModal: null,
    updateProgress() { this.progress = Math.max(Math.min((window.innerHeight - $el.getBoundingClientRect().top) / (window.innerHeight + $el.offsetHeight), 1), 0) },
}"
    x-init="updateProgress(); $watch('legalModal', value => document.body.classList.toggle('overflow-hidden', Boolean(value)))"
    x-on:keydown.escape.window="legalModal = null"
    x-intersect="intersecting = true" x-intersect:leave="intersecting = false"
    x-on:scroll.window="if (intersecting) updateProgress()"
    x-bind:style="{ '--progress': progress }" class="relative border-t border-neutral-200 bg-white text-neutral-600">
    <footer class="w-full max-w-340 px-6 py-10 sm:px-12 lg:px-20 lg:py-12 mx-auto">
        <!-- Top: brand + socials + campfire -->
        <div class="mb-10 flex flex-col items-start justify-between gap-8 lg:flex-row lg:items-center">
                   
            <!-- Brand -->
            <div class="shrink-0">
                <a href="/" class="font-bungee flex items-center space-x-2 text-3xl font-bold text-neutral-950">
                    <span>Sol<span class="text-general">ara</span></span>
                </a>
                <p class="mt-2 text-sm text-neutral-500">&copy; {{ Date('Y') }} Solara. All rights reserved.</p>

                <!-- Socials -->
                <div class="mt-4 flex items-center space-x-5">
                    {{-- <a href="#" class="transition hover:text-general"><i class="fab fa-facebook text-xl"></i></a> --}}
                    <a href="https://www.instagram.com/solarasync.ja" target="_blank" class="transition hover:text-general"><i class="fab fa-instagram text-xl"></i></a>
                    {{-- <a href="#" class="transition hover:text-general"><i class="fab fa-linkedin text-xl"></i></a>
                    <a href="#" class="transition hover:text-general"><i class="fab fa-youtube text-xl"></i></a>
                    <a href="#" class="transition hover:text-general"><i class="fab fa-whatsapp text-xl"></i></a> --}}
                </div>
            </div>
            <div class="flex h-52 w-full items-center justify-center overflow-hidden lg:w-80 lg:justify-end">
                <x-campfire />
            </div>
        </div>

        <!-- Bottom: links + newsletter -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:gap-10">

            <!-- Company -->
            <div>
                <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide text-neutral-950">Company</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="javascript:void(0)" class="transition hover:text-neutral-950">Newsletter <span
                                class="ml-1 text-xs text-general">— Coming soon</span></a></li>
                    <li><a href="{{route('about')}}" wire:navigate class="transition hover:text-neutral-950">About us</a></li>

                    <li><button type="button" x-on:click="legalModal = 'privacy'" class="text-left transition hover:text-neutral-950">Privacy Policy</button></li>
                    <li><button type="button" x-on:click="legalModal = 'terms'" class="text-left transition hover:text-neutral-950">Terms & Conditions</button></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide text-neutral-950">Solutions</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('solutions') }}" class="transition hover:text-neutral-950">Solar Solutions</a></li>
                    <li><a href="{{ route('projects') }}" wire:navigate class="transition hover:text-neutral-950">Projects</a>
                    </li>
                    <li><a href="{{ route('blog.index') }}" wire:navigate class="transition hover:text-neutral-950">Blog</a>
                    </li>
                    <li><a href="{{route('services')}}" wire:navigate class="transition hover:text-neutral-950">Services</a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide text-neutral-950">Contact</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="mailto:info@solara.example" class="transition hover:text-neutral-950">support@solarasync.com</a></li>
                    <li class="text-neutral-500">Head office: 123 Energy Way, Kingston</li>
                    <li><a href="tel:18765430747" class="transition hover:text-neutral-950">1-123-456-7890</a></li>
                    <li><a href="#" class="transition hover:text-neutral-950">Support Portal</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide text-neutral-950">Newsletter</h4>
                <p class="mb-4 text-sm text-neutral-500">Subscribe for solar tips, incentives, and project updates.</p>
                <form wire:submit.prevent="createNewsletter" class="space-y-3">
                    <flux:input id="footer-email" icon="envelope" type="email" wire:model="email"
                        placeholder="Enter your email" class="w-full" />
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 w-full py-2.5!">Subscribe</button>
                </form>
                <flux:error name="email" />
            </div>
        </div>
    </footer>

    <div x-cloak x-show="legalModal" x-transition.opacity class="fixed inset-0 z-90 flex items-center justify-center bg-neutral-950/65 p-4 backdrop-blur-md sm:p-6"
        role="presentation" x-on:click.self="legalModal = null">
        <section x-show="legalModal" x-transition.scale.origin.center role="dialog" aria-modal="true"
            aria-labelledby="legal-modal-title"
            class="flex max-h-[88dvh] w-full max-w-3xl flex-col overflow-hidden rounded-lg border border-neutral-200 bg-white text-neutral-950 shadow-2xl">
            <div class="flex items-start justify-between gap-4 border-b border-neutral-200 px-5 py-4 sm:px-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-general">Solara</p>
                    <h2 id="legal-modal-title" class="mt-1 text-xl font-semibold"
                        x-text="legalModal === 'privacy' ? 'Privacy Policy' : 'Terms and Conditions'"></h2>
                    <p class="mt-1 text-sm text-neutral-500">Last updated: July 10, 2026</p>
                </div>
                <button type="button" x-on:click="legalModal = null"
                    class="rounded-md p-2 text-neutral-500 transition hover:bg-neutral-100 hover:text-neutral-950"
                    aria-label="Close legal modal">
                    <flux:icon.x-mark class="size-5" />
                </button>
            </div>

            <div class="overflow-y-auto px-5 py-5 text-sm leading-6 text-neutral-600 sm:px-6">
                <div x-show="legalModal === 'privacy'" class="space-y-5">
                    <p>Solara respects your privacy. This policy explains how we collect, use, and protect information you provide when you browse our website, request a solar estimate, subscribe to updates, or contact our team.</p>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Information we collect</h3>
                        <p class="mt-1">We may collect your name, email address, phone number, message details, selected solar solutions, newsletter preferences, and basic technical information such as browser, device, and usage data.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">How we use information</h3>
                        <p class="mt-1">We use your information to respond to enquiries, prepare solar estimates, improve our services, send requested updates, protect the website, and keep records related to consultations and customer support.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Sharing and storage</h3>
                        <p class="mt-1">We do not sell personal information. We may share limited information with service providers who help us operate the website, manage communications, or deliver consultations, subject to appropriate confidentiality controls.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Your choices</h3>
                        <p class="mt-1">You may request access, correction, or deletion of your personal information, and you may unsubscribe from marketing messages at any time by contacting Solara.</p>
                    </div>
                </div>

                <div x-show="legalModal === 'terms'" class="space-y-5">
                    <p>These terms govern your use of the Solara website and services. By using this website, requesting an estimate, or submitting information, you agree to use the site responsibly and in accordance with these terms.</p>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Estimates and availability</h3>
                        <p class="mt-1">Prices, savings, product details, and installation timelines shown on the website are estimates only. Final recommendations and pricing depend on equipment availability, load review, site assessment, permitting, and project scope.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Website content</h3>
                        <p class="mt-1">The content on this website is provided for general information. You may not copy, misuse, disrupt, or attempt to gain unauthorized access to any part of the website or related systems.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Customer responsibilities</h3>
                        <p class="mt-1">You are responsible for providing accurate information when requesting consultations, estimates, or support. Solara may decline or revise requests where information is incomplete, inaccurate, or unsuitable for the requested service.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-neutral-950">Limitation of liability</h3>
                        <p class="mt-1">To the fullest extent permitted by law, Solara is not liable for indirect losses, unavailable services, or decisions made from preliminary website information before a formal consultation or written agreement.</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-neutral-200 bg-neutral-50 px-5 py-4 text-right sm:px-6">
                <button type="button" x-on:click="legalModal = null"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-general px-5 py-3 text-sm font-semibold text-neutral-950 shadow-sm transition-all duration-300 ease-out hover:-translate-y-0.5 hover:brightness-95 hover:shadow-md focus:outline-none focus-visible:ring-4 focus-visible:ring-general/30 focus-visible:ring-offset-2 rounded-md! px-4! py-2!">
                    Close
                </button>
            </div>
        </section>
    </div>
</div>
