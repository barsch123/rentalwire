<div x-data="{ intersecting: false, progress: 0, updateProgress() { this.progress = Math.max(Math.min((window.innerHeight - $el.getBoundingClientRect().top) / (window.innerHeight + $el.offsetHeight), 1), 0) } }" x-intersect="intersecting = true" x-intersect:leave="intersecting = false"
    x-on:scroll.window="if (intersecting) { updateProgress() }" x-bind:style="{ '--progress': progress }"
    x-init="updateProgress()" class="relative border-t border-neutral-700 bg-neutral-800 text-gray-300">
    <footer class="mt-auto w-full max-w-[85rem] py-12 px-6 sm:px-10 lg:px-16 mx-auto">
        <!-- Existing Footer Content -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
            <div class="col-span-full hidden lg:col-span-1 lg:block">
                <a class="font-bungee flex items-center space-x-2 font-semibold text-xl text-white focus:outline-none focus:opacity-80"
                    href="/" aria-label="Brand">
                    <span>Peng<span class="text-[#ffab00]">ui</span>n</span>
                </a>
                <p class="mt-3 text-xs sm:text-sm text-gray-400">
                    &copy; {{ Date('Y') }} Penguin. All rights reserved.
                </p>
                <!-- Social Media Links -->
                <div class="mt-4 flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-[#ffab00] transition">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#ffab00] transition">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#ffab00] transition">
                        <i class="fab fa-linkedin text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#ffab00] transition">
                        <i class="fab fa-youtube text-2xl"></i>
                    </a>
                    <a href="javascript:void(0)" class="text-gray-400 hover:text-[#ffab00] transition">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                </div>
            </div>

            <!-- Company Info -->
            <div>
                <h4 class="text-xs font-semibold text-white uppercase">Company</h4>
                <div class="mt-3 space-y-3 text-sm">
                    <p>
                        <a class="text-gray-400 hover:text-white" href="javascript:void(0)">Newsletter</a>
                        <span class="text-[#ffab00]">— Coming soon</span>
                    </p>
                    <p><a class="text-gray-400 hover:text-white" href="/about">About us</a></p>
                    <p>
                        <a class="text-gray-400 hover:text-white" href="/careers">Careers</a>
                        <span class="text-[#ffab00]">— We're hiring</span>
                    </p>

                    <p><a class="text-gray-400 hover:text-white" href="#">Privacy Policy</a></p>
                    <p><a class="text-gray-400 hover:text-white" href="#">Terms &amp; Conditions</a></p>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-xs font-semibold text-white uppercase">Services</h4>
                <div class="mt-3 space-y-3 text-sm">
                    <p><a class="text-gray-400 hover:text-white" href="{{ route('equipment-rentals') }}">Equipment for
                            Rent</a></p>
                    <p><a class="text-gray-400 hover:text-white" href="{{ route('projects') }}">Projects</a></p>
                    <p><a class="text-gray-400 hover:text-white" href="{{ route('blog.index') }}">Blog</a></p>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-xs font-semibold text-white uppercase">Contact</h4>
                <div class="mt-3 space-y-3 text-sm">
                    <p>
                        <a class="text-gray-400 hover:text-white" href="javascript:void(0)">info@test.com</a>
                    </p>
                    <p class="text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing</p>
                    <p>
                        <a class="text-gray-400 hover:text-white" href="tel:18765430747">1-123-456-7890</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="border-t border-t-neutral-700 pt-8">
            <div class="max-w-[85rem] mx-auto text-center">
                <h4 class="text-2xl font-bold text-white">Newsletter</h4>

                <form wire:submit.prevent="createNewsletter"
                    class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">

                    <!-- Email Input with Icon -->
                    <div class="relative w-full sm:w-1/2">
                        <flux:input icon="envelope" type="email" wire:model="email" placeholder="Enter your email" />
                    </div>
                    <!-- Subscribe Button -->
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 text-white bg-[#ffab00] rounded-lg text-sm font-semibold hover:bg-yellow-600 transition">
                        Subscribe
                    </button>
                </form>
                <flux:error name="email" />
            </div>
        </div>
    </footer>
</div>
