<div>
    <section class="relative h-screen text-white overflow-hidden" x-data="typeWriter()" x-init="startTyping()">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-900 to-neutral-800">
            {{-- <video autoplay muted loop playsinline class="object-cover object-center w-full h-full opacity-70">
                <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video> --}}
        </div>

        <!-- Content container -->
        <div class="relative z-10 flex flex-col justify-center items-center h-full px-4 text-center">
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Pre-heading with subtle animation -->
                <div class="overflow-hidden">
                    <p class="text-lg md:text-xl font-medium text-yellow-400 transform transition-all duration-500 ease-out"
                        x-intersect="$el.classList.add('translate-y-0', 'opacity-100')"
                        x-intersect:leave="$el.classList.remove('translate-y-0', 'opacity-100')"
                        class="translate-y-10 opacity-0">
                        HEAVY EQUIPMENT SOLUTIONS
                    </p>
                </div>
                
                <!-- Main heading with typewriter effect -->
                <div class="overflow-hidden">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight transform transition-all duration-700 ease-out delay-150"
                        x-intersect="$el.classList.add('translate-y-0', 'opacity-100')"
                        x-intersect:leave="$el.classList.remove('translate-y-0', 'opacity-100')"
                        class="translate-y-10 opacity-0">
                        Powering Your Projects With <br>
                        <span x-text="displayText" class="text-yellow-500 font-extrabold"></span>
                    </h1>
                </div>
                
                <!-- Subheading -->
                <div class="overflow-hidden">
                    <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto transform transition-all duration-700 ease-out delay-300"
                        x-intersect="$el.classList.add('translate-y-0', 'opacity-100')"
                        x-intersect:leave="$el.classList.remove('translate-y-0', 'opacity-100')"
                        class="translate-y-10 opacity-0">
                        Expert equipment rentals with certified operators for construction, mining, and industrial projects.
                    </p>
                </div>
                
                <!-- CTA Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-4 transform transition-all duration-700 ease-out delay-500"
                    x-intersect="$el.classList.add('translate-y-0', 'opacity-100')"
                    x-intersect:leave="$el.classList.remove('translate-y-0', 'opacity-100')"
                    class="translate-y-10 opacity-0">
                    <a href="#" class="relative inline-flex items-center justify-center gap-2 rounded-md bg-yellow-600 hover:bg-yellow-500 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600 min-w-[200px]">
                        <span>REQUEST A FREE QUOTE</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="relative inline-flex items-center justify-center gap-2 rounded-md bg-transparent border border-white hover:bg-white/10 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white min-w-[200px]">
                        <span>VIEW EQUIPMENT</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Scroll indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    function typeWriter() {
        return {
            strings: ['Efficiency', 'Excellence', 'Expertise', 'Equipment', 'Eco-friendly'],
            displayText: '',
            currentStringIndex: 0,
            currentCharIndex: 0,
            typeSpeed: 100,
            deletingSpeed: 50,
            firstLetter: '',
            startTyping() {
                let currentString = this.strings[this.currentStringIndex];
                
                // If we don't have a first letter yet, get it from current string
                if (!this.firstLetter) {
                    this.firstLetter = currentString.charAt(0);
                    this.displayText = this.firstLetter;
                    this.currentCharIndex = 1;
                }
                
                let typeInterval = setInterval(() => {
                    if (this.currentCharIndex < currentString.length) {
                        this.displayText += currentString.charAt(this.currentCharIndex);
                        this.currentCharIndex++;
                    } else {
                        clearInterval(typeInterval);
                        setTimeout(() => {
                            this.eraseText();
                        }, 1500);
                    }
                }, this.typeSpeed);
            },
            eraseText() {
                let eraseInterval = setInterval(() => {
                    // Only erase down to the first letter
                    if (this.displayText.length > this.firstLetter.length) {
                        this.displayText = this.displayText.slice(0, -1);
                    } else {
                        clearInterval(eraseInterval);
                        
                        // Find next string that starts with same first letter
                        let nextString = this.findNextMatchingString();
                        
                        if (nextString) {
                            setTimeout(() => {
                                this.currentCharIndex = 1; // Start from second character
                                this.typeNextWord(nextString);
                            }, 300);
                        } else {
                            // If no matching string found, start fresh with new word
                            this.firstLetter = '';
                            this.currentStringIndex = (this.currentStringIndex + 1) % this.strings.length;
                            setTimeout(() => {
                                this.startTyping();
                            }, 300);
                        }
                    }
                }, this.deletingSpeed);
            },
            findNextMatchingString() {
                // Create a list of all strings that start with our first letter (excluding current)
                const matches = this.strings.filter((str, index) => 
                    index !== this.currentStringIndex && 
                    str.charAt(0).toLowerCase() === this.firstLetter.toLowerCase()
                );
                
                // If we found matches, pick a random one
                if (matches.length > 0) {
                    const randomMatch = matches[Math.floor(Math.random() * matches.length)];
                    this.currentStringIndex = this.strings.indexOf(randomMatch);
                    return randomMatch;
                }
                
                return null;
            },
            typeNextWord(word) {
                let typeInterval = setInterval(() => {
                    if (this.currentCharIndex < word.length) {
                        this.displayText += word.charAt(this.currentCharIndex);
                        this.currentCharIndex++;
                    } else {
                        clearInterval(typeInterval);
                        setTimeout(() => {
                            this.eraseText();
                        }, 1500);
                    }
                }, this.typeSpeed);
            }
        }
    }
</script>
@endpush