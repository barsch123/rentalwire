{{-- @section('title', 'Careers ')
@section('og:title', 'Careers')
@section('description', '')
@section('og:description', '')
@section('keywords', '') --}}

<x-layouts.base>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center mb-12">
            <div class="container py-20 mx-auto px-4 relative my-4">
                <!-- Background Text -->
                <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }"
                    :class="animate ? 'opacity-50 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                    class="section-title absolute inset-0 md:text-6xl md:mt-14 lg:text-7xl text-5xl font-extrabold  border-gray-200 opacity-50 uppercase tracking-wide leading-none">
                    WE'RE HIRING
                </h2>

                <!-- Foreground Text -->
                <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                    x-intersect:options="{ threshold: 0.5 }" :class="animate
                    ?
                    'opacity-100 translate-x-0 transition duration-700' :
                    'opacity-0 translate-x-10'" class="relative text-4xl md:text-5xl font-extrabold text-neutral-900">
                    CHOOSE A PATH WITH US
                </h2>
            </div>
            <p class="text-lg text-neutral-600 mt-4">At SHECLJA, we believe our people are the key to our success. We’re
                always looking for talented, motivated individuals who are passionate about making a difference in the
                construction and equipment rental industry. If you’re looking for a dynamic work environment with
                opportunities to grow, you’re in the right place!</p>
            <p class="text-lg text-neutral-600 mt-4">Join us and be part of a team that delivers reliable equipment and
                expert results to projects across the Caribbean.</p>
        </div>

        <div class="space-y-12">
            <div class="mb-20">
                <h2 class="text-3xl font-bold text-neutral-900 mb-8 text-center">Current Openings</h2>

                <div class="space-y-8">
                    <!-- Job 1 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                    <h3 class="text-2xl font-bold text-yellow-600">Equipment Operator</h3>
                                    <div class="flex items-center mt-2 space-x-4">
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Various Sites
                                        </span>
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                                <a href="#apply"
                                    class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-150">
                                    Apply Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-neutral-800">Job Description</h4>
                                <p class="text-neutral-600 mt-2">
                                    Operate various heavy machinery to complete tasks such as excavation, grading, and
                                    material handling.
                                    We're looking for skilled, dependable individuals committed to safety and quality
                                    work.
                                </p>

                                <div class="grid md:grid-cols-2 gap-8 mt-6">
                                    <div>
                                        <h4 class="text-lg font-semibold text-neutral-800">Responsibilities</h4>
                                        <ul class="mt-2 space-y-2 text-neutral-600">
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Operate bulldozers, excavators, and other heavy equipment</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Ensure machines are properly maintained and report issues</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Follow safety protocols and site regulations</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-lg font-semibold text-neutral-800">Requirements</h4>
                                        <ul class="mt-2 space-y-2 text-neutral-600">
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Proven experience operating heavy machinery</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Strong knowledge of safety procedures</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Valid operator certification (preferred)</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job 2 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                    <h3 class="text-2xl font-bold text-yellow-600">Sales Representative</h3>
                                    <div class="flex items-center mt-2 space-x-4">
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Kingston, Jamaica
                                        </span>
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                                <a href="#apply"
                                    class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-150">
                                    Apply Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Job content would follow same structure as above -->
                        </div>
                    </div>

                    <!-- Job 3 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                    <h3 class="text-2xl font-bold text-yellow-600">Mechanic / Equipment Maintenance
                                        Specialist</h3>
                                    <div class="flex items-center mt-2 space-x-4">
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Kingston, Jamaica
                                        </span>
                                        <span class="flex items-center text-neutral-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                                <a href="#apply"
                                    class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-150">
                                    Apply Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white p-6 rounded-lg shadow-md mt-12">
                <h2 class="text-2xl font-bold text-neutral-700">How to Apply</h2>
                <p class="text-neutral-600 mt-4">
                    If you're ready to join our team, we'd love to hear from you! Please send
                    your resume and a cover letter outlining your qualifications and interest in the position to
                    <a href="javascript:void(0)"
                        class="text-[#ffab00] hover:text-yellow-600 transition-colors duration-150">careers@loremipsum.com</a>.
                </p>
                <p class="text-neutral-600 mt-4">You can also fill out the form below to submit your application.</p>

                <livewire:career-form />
            </div>
        </div>
    </section>
</x-layouts.base>