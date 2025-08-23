<x-layouts.base>
    <section class="py-28">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-2xl lg:max-w-5xl mx-auto">
                <!-- Header Section -->
                <div class="container mx-auto px-4 relative my-4">
                    <!-- Background Text -->
                    <h2 x-data="{ animate: false }" x-intersect:enter="animate = true"
                        x-intersect:leave="animate = false" x-intersect:options="{ threshold: 0.5 }"
                        :class="animate ? 'opacity-50 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                        class="section-title absolute inset-0 md:text-6xl lg:text-7xl text-5xl font-extrabold border-gray-200 opacity-50 uppercase tracking-wide leading-none">
                        IT'S NICE TO
                    </h2>

                    <!-- Foreground Text -->
                    <h2 x-data="{ animate: false }" x-intersect:enter="animate = true"
                        x-intersect:leave="animate = false" x-intersect:options="{ threshold: 0.5 }"
                        :class="animate ? 'opacity-100 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                        class="relative text-4xl md:text-5xl font-extrabold text-neutral-900">
                        GET IN TOUCH
                    </h2>
                </div>

                <!-- Contact Form and Map Grid -->
                <div class="mt-12 grid lg:grid-cols-2 gap-12">
                    <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8">
                        <h2 class="mb-8 text-xl font-semibold text-gray-800">Fill in the form</h2>
                        <livewire:contact-form />

                    </div>

                    <!-- Embedded Map -->
                    <div class="relative rounded-lg overflow-hidden shadow-lg"
                        style="padding-bottom: 56.25%; height: 100%;">
                        <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.927885991379!2d-73.97124878459443!3d40.78286477932427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f1805b8f3%3A0x685f7f3f4b0e8ff0!2sCentral%20Park!5e0!3m2!1sen!2sus!4v1733228911096!5m2!1sen!2sus"
                            style="border:0;" allowfullscreen=true referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Contact Info Section -->
                <div class="mt-12 divide-y divide-gray-200 space-y-6">
                    <!-- Business Hours -->
                    <div class="flex gap-x-6">
                        <svg class="shrink-0 w-6 h-6 mt-1.5 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-800">Business Hours</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Monday to Friday: 8:00 AM - 5:00 PM<br>
                                Saturday: 9:00 AM - 1:00 PM<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="flex gap-x-6">
                        <svg class="shrink-0 w-6 h-6 mt-1.5 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="m7 11 2-2-2-2" />
                            <path d="M11 13h4" />
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-800">Our Contact Information</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Phone: 1-876-000-0000<br>
                                Email: info@lorem.com
                            </p>
                        </div>
                    </div>

                    <!-- Contact Us by Email -->
                    <div class="flex gap-x-6">
                        <svg class="shrink-0 w-6 h-6 mt-1.5 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path
                                d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z" />
                            <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10" />
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-800">Contact us by email</h3>
                            <p class="text-sm text-gray-500 mt-1">If you wish to write us an email instead, please use
                            </p>
                            <a class="text-sm font-medium text-gray-600 hover:text-gray-800" href="#">
                                example@site.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Flash Message -->
                @if (session()->has('error'))
                    <div class="mt-6 bg-red-500 text-sm text-white rounded-lg p-4" role="alert">
                        <span class="font-bold">Error:</span> {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-layouts.base>