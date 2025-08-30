<div x-data="toastManager()" x-on:toast.window="add($event.detail)"
    class="fixed bottom-4 right-4 flex flex-col gap-3 z-50">

    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.show" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-10" @mouseenter="pause(toast.id)"
            @mouseleave="resume(toast.id)" class="relative w-80 overflow-hidden rounded-xl shadow-lg border text-white"
            :class="{
                'bg-green-600 border-green-700': toastType === 'success',
                'bg-red-600 border-red-700': toastType === 'error',
                'bg-blue-600 border-blue-700': toastType === 'info',
                'bg-amber-500 border-amber-600': toastType === 'warning',
                'bg-neutral-700 border-neutral-800': !toastType
            }">
            <div class="px-4 py-3">
                <div class="font-semibold text-white" x-text="toastTitle"></div>
                <div class="text-sm mt-1 opacity-90" x-text="toastBody"></div>
            </div>

            <!-- Progress Bar -->
            <div class="absolute bottom-0 left-0 h-1" :class="{
                     'bg-green-400': toastType === 'success',
                     'bg-red-400': toastType === 'error',
                     'bg-blue-400': toastType === 'info',
                     'bg-amber-300': toastType === 'warning',
                     'bg-white/40': !toastType
                 }" :style="`width: ${toast.progress}%; transition: width 0.1s linear;`">
            </div>

            <!-- Close button -->
            <button class="absolute top-1 right-1 text-white/70 hover:text-white" @click="close(toast.id)">×</button>
        </div>
    </template>
</div>


<script>
    function toastManager() {
        return {
            toasts: [],
            timers: {},

            toastTitle: @entangle('toastTitle'),
            toastBody: @entangle('toastBody'),
            toastType: @entangle('toastType'),

            add({ toastTitle, toastBody, timeout = 5000 }) {
                const id = 't_' + Date.now().toString(36) + Math.random().toString(36).slice(2);
                const toast = { id, title: toastTitle, body: toastBody, timeout, show: true, progress: 100, remaining: timeout, start: Date.now() };
                this.toasts.push(toast);
                this.startTimer(id, timeout);

                console.log(toastBody);
            },

            startTimer(id, timeout) {
                const toast = this.toasts.find(t => t.id === id);
                if (!toast) return;

                this.clearTimers(id);

                toast.start = Date.now();
                toast.remaining = timeout;

                this.timers[id] = {
                    interval: setInterval(() => {
                        const elapsed = Date.now() - toast.start;
                        const remain = Math.max(0, toast.remaining - elapsed);
                        toast.progress = (remain / toast.timeout) * 100;
                    }, 50),
                    timeoutRef: setTimeout(() => {
                        this.close(id);
                    }, timeout)
                };
            },

            pause(id) {
                const toast = this.toasts.find(t => t.id === id);
                if (!toast) return;
                const timer = this.timers[id];
                if (!timer) return;

                clearInterval(timer.interval);
                clearTimeout(timer.timeoutRef);
                const elapsed = Date.now() - toast.start;
                toast.remaining = Math.max(0, toast.remaining - elapsed);
                this.timers[id] = null;
            },

            resume(id) {
                const toast = this.toasts.find(t => t.id === id);
                if (!toast || toast.remaining <= 0) return;
                this.startTimer(id, toast.remaining);
            },

            close(id) {
                const idx = this.toasts.findIndex(t => t.id === id);
                if (idx === -1) return;

                this.clearTimers(id);
                this.toasts[idx].show = false;

                setTimeout(() => {
                    this.toasts.splice(this.toasts.findIndex(t => t.id === id), 1);
                }, 300);
            },

            clearTimers(id) {
                if (this.timers[id]) {
                    clearInterval(this.timers[id].interval);
                    clearTimeout(this.timers[id].timeoutRef);
                    delete this.timers[id];
                }
            }
        }
    }
</script>