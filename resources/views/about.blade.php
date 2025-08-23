@section('og:description', 'Learn about our company, mission, and values')
@section('description', 'Discover our story, expertise, and commitment to excellence in heavy equipment solutions')
@section('title', 'About Our Company')
@section('og:title', 'About Our Company')
@section('keywords', 'heavy equipment, about us, company history, mission')

<x-layouts.base>
    <!-- Hero Section with Animation -->
    <section class="py-24 md:px-0 px-6" x-data>
        <div class="px-4 relative py-10">
            <!-- Background Title -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-50 -translate-x-0 transition duration-700' : 'opacity-0 -translate-x-10'"
                class="flex section-title absolute inset-0 items-center justify-end md:text-7xl text-5xl font-extrabold text-gray-200 opacity-50 uppercase tracking-wide leading-none select-none">
                EXCELLENCE
            </h2>
            <!-- Foreground Title -->
            <h2 x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }" x-data="{ animate: false }"
                :class="animate ? 'opacity-100 translate-y-0 transition duration-700' : 'opacity-0 -translate-y-10'"
                class="relative translate-y-7 text-3xl md:text-5xl font-extrabold text-neutral-800 flex justify-end">
                <span class="border-b-4 border-yellow-500 pb-2">OUR STORY</span>
            </h2>
        </div>
        
        <!-- Main Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Intro Section -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                <div x-intersect:enter="animate = true" x-data="{ animate: false }" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }"
                    :class="animate ? 'opacity-100 translate-y-0 transition duration-700' : 'opacity-0 -translate-y-10'">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Building the Future Together</h3>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Since our founding, we've been committed to delivering exceptional heavy equipment solutions 
                        with integrity, innovation, and unmatched expertise. Our journey has been shaped by the trust 
                        of our clients and the dedication of our team.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Today, we stand as a leader in our industry, serving clients across multiple sectors with 
                        reliable equipment and skilled operators who share our passion for quality work.
                    </p>
                </div>
                <div x-intersect:enter="animate = true" x-data="{ animate: false }" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }"
                    :class="animate ? 'opacity-100 translate-y-0 transition duration-700' : 'opacity-0 -translate-y-10'"
                    class="relative h-96 bg-gray-100 rounded-xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1605152276897-4f618f831968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Our team at work" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="py-16">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        The principles that guide every decision we make and every project we undertake
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Value 1 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 translate-y-0 transition duration-500' : 'opacity-0 translate-y-10'"
                        class="bg-white p-8 rounded-xl shadow-md text-center">
                        <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Reliability</h3>
                        <p class="text-gray-600">
                            We deliver on our promises with equipment and operators you can count on, project after project.
                        </p>
                    </div>
                    
                    <!-- Value 2 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 translate-y-0 transition duration-500 delay-100' : 'opacity-0 translate-y-10'"
                        class="bg-white p-8 rounded-xl shadow-md text-center">
                        <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Innovation</h3>
                        <p class="text-gray-600">
                            We continuously improve our services and adopt new technologies to enhance efficiency and results.
                        </p>
                    </div>
                    
                    <!-- Value 3 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 translate-y-0 transition duration-500 delay-200' : 'opacity-0 translate-y-10'"
                        class="bg-white p-8 rounded-xl shadow-md text-center">
                        <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Teamwork</h3>
                        <p class="text-gray-600">
                            Our collaborative approach ensures we work seamlessly with clients to achieve shared goals.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Expertise Section -->
            <div class="py-16 bg-gray-50 rounded-xl px-8 py-12 mb-20">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Our Expertise</h2>
                    
                    <div class="space-y-8">
                        <!-- Expertise 1 -->
                        <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                            :class="animate ? 'opacity-100 translate-x-0 transition duration-500' : 'opacity-0 -translate-x-10'"
                            class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Solutions</h3>
                                <p class="text-gray-600">
                                    We understand that every project is unique. Our team works closely with clients to develop 
                                    tailored equipment solutions that meet specific requirements and challenges.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Expertise 2 -->
                        <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                            :class="animate ? 'opacity-100 translate-x-0 transition duration-500 delay-100' : 'opacity-0 -translate-x-10'"
                            class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Safety First</h3>
                                <p class="text-gray-600">
                                    Our rigorous safety protocols and trained operators ensure that every project is completed 
                                    without compromise to safety standards or quality.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Expertise 3 -->
                        <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                            :class="animate ? 'opacity-100 translate-x-0 transition duration-500 delay-200' : 'opacity-0 -translate-x-10'"
                            class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="flex-shrink-0 bg-white p-4 rounded-lg shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Timely Execution</h3>
                                <p class="text-gray-600">
                                    We respect project timelines and deliver efficient solutions that keep your operations 
                                    moving forward without unnecessary delays.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Highlights -->
            <div class="py-16">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Trusted By Industry Leaders</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        We're proud to partner with respected organizations across multiple sectors
                    </p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Client 1 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 scale-100 transition duration-500' : 'opacity-0 scale-90'"
                        class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-center h-32">
                        <img src="https://via.placeholder.com/150x80?text=Client+1" alt="Client Logo" class="max-h-16">
                    </div>
                    
                    <!-- Client 2 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 scale-100 transition duration-500 delay-100' : 'opacity-0 scale-90'"
                        class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-center h-32">
                        <img src="https://via.placeholder.com/150x80?text=Client+2" alt="Client Logo" class="max-h-16">
                    </div>
                    
                    <!-- Client 3 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 scale-100 transition duration-500 delay-200' : 'opacity-0 scale-90'"
                        class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-center h-32">
                        <img src="https://via.placeholder.com/150x80?text=Client+3" alt="Client Logo" class="max-h-16">
                    </div>
                    
                    <!-- Client 4 -->
                    <div x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                        :class="animate ? 'opacity-100 scale-100 transition duration-500 delay-300' : 'opacity-0 scale-90'"
                        class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-center h-32">
                        <img src="https://via.placeholder.com/150x80?text=Client+4" alt="Client Logo" class="max-h-16">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>