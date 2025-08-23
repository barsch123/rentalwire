document.addEventListener('alpine:init', () => {
    // Modal store for table modals
    Alpine.store('modal', {
        view: 'prompt',

        setView(view) {
            this.view = view;
        },

        isView(view) {
            return this.view === view;
        }
    });
});
