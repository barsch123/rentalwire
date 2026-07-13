<x-layouts.base>
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-28" x-data="{
      modalOpen: false,
      modalProject: { title:'', tag:'', date:'', status:'', summary:'', highlights:[], image:'', cost:'', duration:'', co2:'' },
      openModal(project){
        this.modalProject = project;
        this.modalOpen = true;
        document.body.classList.add('overflow-hidden');
        this.$nextTick(()=> { if($refs.closeBtn) $refs.closeBtn.focus() })
      },
      closeModal(){
        this.modalOpen = false;
        this.modalProject = { title:'', tag:'', date:'', status:'', summary:'', highlights:[], image:'', cost:'', duration:'', co2:'' };
        document.body.classList.remove('overflow-hidden');
      }
    }">

        <!-- Title Section -->
        <div class="container mx-auto px-4 relative my-4">
            <!-- Background Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-50 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                class="section-title absolute inset-0 md:text-6xl lg:text-7xl text-5xl font-extrabold border-gray-200 opacity-50 uppercase tracking-wide leading-none select-none">
                POWER WITH US
            </h2>

            <!-- Foreground Text -->
            <h2 x-data="{ animate: false }" x-intersect:enter="animate = true" x-intersect:leave="animate = false"
                x-intersect:options="{ threshold: 0.5 }"
                :class="animate ? 'opacity-100 translate-x-0 transition duration-700' : 'opacity-0 translate-x-10'"
                class="relative text-4xl md:text-5xl font-extrabold text-neutral-900">
                OUR WORK
            </h2>
        </div>

        <!-- Featured Projects grid (compact) -->
        <div id="featured" class="py-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <article x-data="{ show:false }" x-intersect:enter="$el.style.transitionDelay='80ms'; show=true"
                x-intersect:leave="show=false" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="transform transition duration-500 bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="relative h-52 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1200&q=80"
                        alt="Residential solar installation"
                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <span
                        class="absolute top-4 right-4 bg-yellow-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-wide">RESIDENTIAL</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900">Kingston Rooftop Solar Retrofit</h3>
                    <p class="text-gray-600 mt-2">Hybrid rooftop system with battery backup and monitoring.</p>
                    <div class="mt-5 flex items-center justify-between text-sm">
                        <span class="text-gray-500 font-medium">Completed - Mar 2024</span>
                        <button @click="openModal({
                title:'Kingston Rooftop Solar Retrofit',
                tag:'Residential',
                date:'Mar 2024',
                status:'Completed',
                image:'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1600&q=80',
                summary:'A rooftop solar retrofit with hybrid inverter, battery backup, and app-based monitoring for lower bills and improved resilience.',
                highlights:['Lower daytime grid draw','Battery backup for critical loads','Remote production monitoring'],
                cost:'JMD 1.8M',
                duration:'4 weeks',
                co2:'18t avoided yearly'
              })" class="text-yellow-600 font-semibold hover:text-yellow-700 flex items-center group">
                            View case <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article x-data="{ show:false }" x-intersect:enter="$el.style.transitionDelay='160ms'; show=true"
                x-intersect:leave="show=false" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="transform transition duration-500 bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="relative h-52 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1200&q=80"
                        alt="Commercial solar array"
                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <span
                        class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-wide">COMMERCIAL</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900">Montego Bay Warehouse Array</h3>
                    <p class="text-gray-600 mt-2">Commercial roof array sized for cooling and daytime operations.</p>
                    <div class="mt-5 flex items-center justify-between text-sm">
                        <span class="text-gray-500 font-medium">Completed - Nov 2023</span>
                        <button @click="openModal({
                title:'Montego Bay Warehouse Array',
                tag:'Commercial',
                date:'Nov 2023',
                status:'Completed',
                image:'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1600&q=80',
                summary:'A commercial solar array built around daytime refrigeration, warehouse lighting, and office loads.',
                highlights:['Reduced peak utility demand','Live performance dashboard','Maintenance plan included'],
                cost:'JMD 8.6M',
                duration:'10 weeks',
                co2:'96t avoided yearly'
              })" class="text-yellow-600 font-semibold hover:text-yellow-700 flex items-center group">
                            View case <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article x-data="{ show:false }" x-intersect:enter="$el.style.transitionDelay='240ms'; show=true"
                x-intersect:leave="show=false" :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="transform transition duration-500 bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="relative h-52 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=1200&q=80"
                        alt="Solar farm"
                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <span
                        class="absolute top-4 right-4 bg-green-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-wide">MICROGRID</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900">St. Elizabeth Solar Microgrid</h3>
                    <p class="text-gray-600 mt-2">Solar and storage design for resilient community facilities.</p>
                    <div class="mt-5 flex items-center justify-between text-sm">
                        <span class="text-gray-500 font-medium">Ongoing</span>
                        <button @click="openModal({
                title:'St. Elizabeth Solar Microgrid',
                tag:'Microgrid',
                date:'Ongoing',
                status:'Active',
                image:'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=1600&q=80',
                summary:'A phased solar microgrid with battery storage to support refrigeration, communications, and emergency operations.',
                highlights:['Critical-load backup','Expandable battery storage','Community energy monitoring'],
                cost:'JMD 12.4M (phase 1)',
                duration:'phase-based',
                co2:'140t avoided yearly'
              })" class="text-yellow-600 font-semibold hover:text-yellow-700 flex items-center group">
                            View case <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                    </div>
                </div>
            </article>
        </div>

        <!-- Project Highlights (compact) -->
        <div
            class="mt-16 bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 flex flex-col sm:flex-row items-center justify-between gap-8 text-white shadow-xl">
            <div class="text-center">
                <div class="text-4xl font-bold text-yellow-400">JMD 18M</div>
                <div class="text-sm text-gray-300 mt-1">Estimated Energy Savings</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-yellow-400">11 weeks</div>
                <div class="text-sm text-gray-300 mt-1">Avg. Installation Window</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-yellow-400">254t</div>
                <div class="text-sm text-gray-300 mt-1">Annual CO2 Avoided</div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-16 text-center">
            <a href="mailto:info@solara.example?subject=Request%20a%20Quote"
                class="inline-block px-8 py-4 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-400 transition transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                Request a Quote
            </a>
        </div>

        <!-- Enhanced Case Study Modal -->
        <div x-show="modalOpen" x-cloak @keydown.window.escape="closeModal()" x-transition.opacity.duration.300
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4 backdrop-blur-md md:p-6">

            <div x-transition.scale.duration.300 role="dialog" aria-modal="true" aria-labelledby="modal-title"
                class="w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden transform md:max-h-[90vh] flex flex-col">

                <!-- CLOSE BUTTON (top right) -->
                <button x-ref="closeBtn" @click="closeModal()"
                    class="absolute top-5 right-5 z-50 bg-white/90 hover:bg-white p-2.5 rounded-full text-gray-700 shadow-md hover:text-gray-900 transition-colors"
                    aria-label="Close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex flex-col md:flex-row h-full overflow-y-auto">
                    <!-- Left: Image -->
                    <div class="md:w-2/5 h-72 md:h-auto overflow-hidden">
                        <img :src="modalProject.image" alt="" class="w-full h-full object-cover">
                    </div>

                    <!-- Right: Content -->
                    <div class="md:w-3/5 p-6 md:p-8 flex flex-col">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span
                                    class="inline-block bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-wide"
                                    x-text="modalProject.tag"></span>
                                <h3 id="modal-title" class="mt-4 text-2xl md:text-3xl font-bold text-gray-900"
                                    x-text="modalProject.title"></h3>
                                <div class="text-sm text-gray-500 mt-2 flex items-center"
                                    x-text="modalProject.date + ' • ' + modalProject.status">
                                </div>
                            </div>
                        </div>

                        <p class="mt-5 text-gray-600 leading-relaxed" x-text="modalProject.summary"></p>

                        <div class="mt-6 grid grid-cols-3 gap-4 py-4 border-y border-gray-200">
                            <div class="text-center">
                                <div class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Cost</div>
                                <div class="font-bold text-gray-900 text-lg mt-1" x-text="modalProject.cost"></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Duration</div>
                                <div class="font-bold text-gray-900 text-lg mt-1" x-text="modalProject.duration"></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-gray-500 uppercase tracking-wide font-semibold">CO2 Impact
                                </div>
                                <div class="font-bold text-gray-900 text-lg mt-1" x-text="modalProject.co2"></div>
                            </div>
                        </div>

                        <template x-if="modalProject.highlights && modalProject.highlights.length">
                            <div class="mt-6">
                                <div class="text-sm text-gray-700 font-semibold mb-3">KEY HIGHLIGHTS</div>
                                <ul class="space-y-2">
                                    <template x-for="(h,i) in modalProject.highlights" :key="i">
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span x-text="h" class="text-gray-600"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </template>

                        <div class="mt-8 flex flex-col sm:flex-row gap-3 pt-4">
                            <a :href="`mailto:info@solara.example?subject=Inquiry about ${encodeURIComponent(modalProject.title)}`"
                                class="px-5 py-3 bg-yellow-500 text-gray-900 rounded-lg font-semibold hover:bg-yellow-400 transition text-center flex-1">
                                Contact about this project
                            </a>
                            <a href="#"
                                class="px-5 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition text-center flex-1">
                                View full case study
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-layouts.base>
