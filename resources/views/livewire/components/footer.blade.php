<div x-data="{ progress: 0, intersecting: false, updateProgress() { this.progress = Math.max(Math.min((window.innerHeight - $el.getBoundingClientRect().top) / (window.innerHeight + $el.offsetHeight), 1), 0) } }"
    x-intersect="intersecting = true" x-intersect:leave="intersecting = false"
    x-on:scroll.window="if (intersecting) updateProgress()" x-init="updateProgress()"
    x-bind:style="{ '--progress': progress }" class="relative border-t border-neutral-700 bg-neutral-900 text-gray-300">
    <footer class="w-full max-w-[85rem] py-14 px-6 sm:px-12 lg:px-20 mx-auto">
        <!-- Top: brand + socials + campfire -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-16">

            <!-- Brand -->
            <div>
                <a href="/" class="font-bungee text-3xl font-bold text-white flex items-center space-x-2">
                    <span>Peng<span class="text-general">ui</span>n</span>
                </a>
                <p class="mt-3 text-sm text-gray-400">&copy; {{ Date('Y') }} Penguin. All rights reserved.</p>

                <!-- Socials -->
                <div class="mt-6 flex items-center space-x-5">
                    <a href="#" class="hover:
                    
                    
                    
                    
                    
                    
                    transition"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="hover:text-general transition"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="hover:text-general transition"><i class="fab fa-linkedin text-xl"></i></a>
                    <a href="#" class="hover:text-general transition"><i class="fab fa-youtube text-xl"></i></a>
                    <a href="#" class="hover:text-general transition"><i class="fab fa-whatsapp text-xl"></i></a>
                </div>
            </div>

            <!-- Campfire (updates/status) -->
            <div class="lg:col-span-1">
                <div class="bg-neutral-800 border border-neutral-700 rounded-2xl p-6 shadow-md">
                    <h5 class="text-sm font-semibold uppercase tracking-wide text-white mb-4">Say Hello</h5>
                    <x-campfire />
                    <div class="mt-4 space-y-3 text-sm">
                        <div class="flex items-start gap-3">
                            <span class="h-2.5 w-2.5 rounded-full bg-green-500 mt-2"></span>
                            <p><span class="font-semibold text-white">Server Status:</span> All systems operational.</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="h-2.5 w-2.5 rounded-full bg-blue-500 mt-2"></span>
                            <p><span class="font-semibold text-white">New Release:</span> v1.3.0 with performance
                                improvements.</p>
                        </div>

                    </div>
                    <p class="mt-4 text-xs text-gray-500">Community updates & live status.</p>
                </div>
            </div>
        </div>

        <!-- Bottom: links + newsletter -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Company -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-white mb-4">Company</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="javascript:void(0)" class="hover:text-white transition">Newsletter <span
                                class="text-general text-xs ml-1">— Coming soon</span></a></li>
                    <li><a href="{{route('about')}}" wire:navigate class="hover:text-white transition">About us</a></li>
                    <li><a href="{{route('careers')}}" wire:navigate class="hover:text-white transition">Careers <span
                                class="text-general text-xs ml-1">— We’re hiring</span></a></li>
                    <li><a href="javascript:void(0)" class="hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="javascript:void(0)" class="hover:text-white transition">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-white mb-4">Maintenance</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('equipment-rentals') }}" class="hover:text-white transition">Equipment for
                            Rent</a></li>
                    <li><a href="{{ route('projects') }}" wire:navigate class="hover:text-white transition">Projects</a>
                    </li>
                    <li><a href="{{ route('blog.index') }}" wire:navigate class="hover:text-white transition">Blog</a>
                    </li>
                    <li><a href="{{route('services')}}" wire:navigate class="hover:text-white transition">Services</a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-white mb-4">Contact</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="mailto:info@test.com" class="hover:text-white transition">info@test.com</a></li>
                    <li class="text-gray-400">Head office: 123 Industrial Ave, Kingston</li>
                    <li><a href="tel:18765430747" class="hover:text-white transition">1-123-456-7890</a></li>
                    <li><a href="#" class="hover:text-white transition">Support Portal</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-white mb-4">Newsletter</h4>
                <p class="text-sm text-gray-400 mb-4">Subscribe for updates & news.</p>
                <form wire:submit.prevent="createNewsletter" class="space-y-3">
                    <flux:input id="footer-email" icon="envelope" type="email" wire:model="email"
                        placeholder="Enter your email" class="w-full" />
                    <button type="submit"
                        class="w-full px-4 py-2.5 text-white bg-[#ffab00] hover:bg-yellow-600 rounded-lg text-sm font-semibold transition">Subscribe</button>
                </form>
                <flux:error name="email" />
            </div>
        </div>
    </footer>
</div>