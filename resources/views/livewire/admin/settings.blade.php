@section('title',' Admin | Newsletter')
<div>
    <form wire:submit.prevent='sendNewsLetter'>
        <x-primary-button>
            {{ __('Send newsletter') }}
        </x-primary-button>

    </form>
    @if (session('error'))
    <div class="bg-red-500 text-white py-2 rounded-lg px-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Dark-Themed Account Management Card -->
    {{-- <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
        <!-- Card -->
        <div
            class="p-4 md:p-5 min-h-[410px] flex flex-col border shadow-sm rounded-xl bg-neutral-800 border-neutral-700">

            <div class="mb-8">
                <h2 class="text-xl font-bold text-neutral-200">Manage Your Account</h2>
                <p class="text-sm text-neutral-400">
                    Update your profile, change your password, and manage newsletter subscriptions.
                </p>
            </div>

            <form>
                <!-- Grid: Two-column layout for Profile Photo and Name -->
                <div class="grid sm:grid-cols-12 gap-6">
                    <!-- Profile Photo Section -->
                    <div class="sm:col-span-3">
                        <label class="block text-sm text-neutral-200 mt-2.5">
                            Profile Photo
                        </label>
                    </div>
                    <div class="sm:col-span-9 flex items-center gap-5">
                        <img class="w-16 h-16 rounded-full ring-2 ring-neutral-800"
                            src="https://preline.co/assets/img/160x160/img1.jpg" alt="Avatar">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-neutral-700 bg-neutral-800 text-neutral-200 shadow-sm hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700">
                            <!-- Upload Icon -->
                            <svg class="w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M12 3v9" />
                            </svg>
                            <span>Upload Photo</span>
                        </button>
                    </div>
                    <!-- End Profile Photo -->

                    <!-- Full Name Section -->
                    <div class="sm:col-span-3">
                        <x-input-label :value="__('Email')" />
                    </div>
                    <div class="sm:col-span-9">
                        <x-text-input type="text" :value="Auth::user()->email" placeholder="" />
                    </div>
                    <!-- End Full Name -->

                    <div class="sm:col-span-9">
                        <input id="account-email" type="email" placeholder="you@example.com"
                            class="py-2 px-3 block w-full border border-neutral-700 rounded-lg text-sm bg-neutral-800 text-neutral-200 focus:outline-none focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                    <!-- End Email -->

                    <!-- Password Section -->
                    <div class="sm:col-span-3">
                        <label for="account-password" class="block text-sm text-neutral-200 mt-2.5">Password</label>
                    </div>
                    <div class="sm:col-span-9 space-y-2">
                        <input id="account-password" type="password" placeholder="Current Password"
                            class="py-2 px-3 block w-full border border-neutral-700 rounded-lg text-sm bg-neutral-800 text-neutral-200 focus:outline-none focus:border-blue-500 focus:ring-blue-500" />
                        <input type="password" placeholder="New Password"
                            class="py-2 px-3 block w-full border border-neutral-700 rounded-lg text-sm bg-neutral-800 text-neutral-200 focus:outline-none focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                    <!-- End Password -->

                    <!-- Newsletter Subscription Button -->
                    <div class="sm:col-span-3">
                        <label class="block text-sm text-neutral-200 mt-2.5">Newsletter</label>
                    </div>
                    <div class="sm:col-span-9">
                        <button type="button"
                            class="w-full py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition focus:outline-none">
                            Subscribe to Newsletter
                        </button>
                    </div>
                    <!-- End Newsletter -->
                </div>
                <!-- End Grid -->

                <!-- Form Actions -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-neutral-700 bg-neutral-800 text-neutral-200 shadow-sm hover:bg-neutral-700 focus:outline-none">
                        Cancel
                    </button>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                        Save Changes
                    </button>
                </div>
                <!-- End Form Actions -->
            </form>
        </div>
        <!-- End Card -->
    </div> --}}
    <!-- End Card Section -->

</div>