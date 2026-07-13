<!-- Application Section: form left, info right -->
<div id="apply" class="bg-white p-6 md:p-8 rounded-xl shadow-md border border-neutral-200">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-6">
            <h3 class="text-2xl md:text-3xl font-bold text-neutral-900">Ready to Join Our Team?</h3>
            <p class="mt-2 text-neutral-600 max-w-2xl mx-auto">
                Send your resume and cover letter to
                <a href="mailto:careers@solara.example"
                    class="font-semibold text-[#9a6700] hover:underline">careers@solara.example</a>
                or complete the form - it takes under 2 minutes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <!-- LEFT: Compact Form -->
            <div class="bg-neutral-50 p-4 rounded-lg">
                <form wire:submit.prevent="submit" x-data="{ showCover: false }" class="space-y-3 text-sm">
                    <div>
                        <flux:input label="Full name" id="name" wire:model.defer="name" class="!py-2 !px-2" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <flux:input label="Email" type="email" id="email" wire:model.defer="email"
                            class="!py-2 !px-2" />
                        <flux:input label="Phone" type="tel" id="phone" wire:model.defer="phone" class="!py-2 !px-2" />
                    </div>

                    <div>
                        <flux:select label="Position" id="position" wire:model.defer="position" class="!py-2">
                            <flux:select.option value="">Select a position</flux:select.option>
                            <flux:select.option>Solar Installer</flux:select.option>
                            <flux:select.option>Sales Representative</flux:select.option>
                            <flux:select.option>Solar Service Technician</flux:select.option>
                            <flux:select.option>Project Coordinator</flux:select.option>
                        </flux:select>
                    </div>

                    <div>
                        <flux:input type="file" label="Resume (PDF preferred)" id="resume" wire:model="resume"
                            class="!py-1" />
                        <p class="text-xs text-neutral-500 mt-1">We prefer PDF. Max 2 MB.</p>
                    </div>

                    <div>
                        <button type="button" x-on:click="showCover = !showCover"
                            class="text-xs underline hover:text-[#9a6700]">+ Add cover letter (optional)</button>
                        <div x-show="showCover" x-cloak class="mt-2">
                            <flux:input type="file" label="Cover Letter" id="coverLetter" wire:model="coverLetter"
                                class="!py-1" />
                        </div>
                    </div>

                    <div>
                        <flux:button type="submit" label="Submit" variant="primary" class="w-full py-2! text-sm"
                            wire:loading.attr="disabled">
                            Submit Application
                        </flux:button>
                    </div>

                    <div class="text-xs text-neutral-500">
                        By submitting you agree to our application process. We will contact shortlisted candidates
                        within 7 business days.
                    </div>
                </form>
            </div>

            <!-- RIGHT: Applicant Info / Sell Sheet -->
            <aside class="space-y-4">
                <!-- Company card -->
                <div class="p-4 rounded-lg border border-neutral-100 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-md bg-general/15">
                            <!-- simple icon -->
                            <svg class="h-6 w-6 text-[#9a6700]" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 12h18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M3 6h18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" opacity="0.5" />
                                <path d="M3 18h18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" opacity="0.5" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-neutral-900">Why work with us</h4>
                            <p class="text-sm text-neutral-600 mt-1">We are a Caribbean solar solutions team with
                                stable schedules, fair pay, and practical on-the-job training.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick tips -->
                <div class="p-4 rounded-lg border border-neutral-100 bg-white">
                    <h5 class="text-sm font-semibold text-neutral-900 mb-3">Application tips</h5>
                    <ul class="text-sm text-neutral-600 space-y-2">
                        <li class="flex items-start gap-2"><span class="w-2">•</span> Keep your resume focused on
                            relevant experience.</li>
                        <li class="flex items-start gap-2"><span class="w-2">•</span> Include any licenses or
                            certifications (e.g., electrical, solar PV, safety).</li>
                        <li class="flex items-start gap-2"><span class="w-2">•</span> Use a clear subject line if
                            emailing: <code class="text-xs">Position - Your Name</code>.</li>
                    </ul>
                </div>

                <!-- Hiring timeline -->
                <div class="p-4 rounded-lg border border-neutral-100 bg-neutral-50">
                    <h5 class="text-sm font-semibold text-neutral-900 mb-3">Hiring timeline</h5>
                    <ol class="text-sm text-neutral-600 space-y-2">
                        <li><strong class="text-neutral-800">1.</strong> Resume review (1-3 days)</li>
                        <li><strong class="text-neutral-800">2.</strong> Phone screen (3-7 days)</li>
                        <li><strong class="text-neutral-800">3.</strong> On-site test / interview (1 week)</li>
                        <li><strong class="text-neutral-800">4.</strong> Offer & onboarding</li>
                    </ol>
                </div>

                <!-- Contact / Locations -->
                <div class="p-4 rounded-lg border border-neutral-100">
                    <h5 class="text-sm font-semibold text-neutral-900 mb-2">Contact</h5>
                    <p class="text-sm text-neutral-600">Email: <a href="mailto:careers@solara.example"
                            class="text-[#9a6700] hover:underline">careers@solara.example</a></p>
                    <p class="text-sm text-neutral-600 mt-1">Phone: <a href="tel:+8760000000" class="hover:underline">+1
                            (876) 000-0000</a></p>
                    <p class="text-sm text-neutral-600 mt-2">Office: Kingston & Montego Bay (site travel may be
                        required)</p>
                </div>
            </aside>
        </div>
    </div>
</div>
