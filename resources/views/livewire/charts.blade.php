@props(['class'])
<!--

 * NOTE:
 * Couldn't find a well-maintained or suitable Laravel chart package for this project,
 * so I implemented the charts manually rawdogged it.
 * 36 hours
-->

<div class="mb-10" x-data="chartComponent()">
    <!-- Chart Canvas Container (prevent re-rendering with wire:ignore) -->
    <div class="w-full h-72">
        <canvas x-ref="canvas" class="w-full h-full"></canvas>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
    <script>
        function chartComponent() {
            return {
                chartInstance: null,
                published: @entangle('published'),
                noTags: @entangle('noTags'),

                init() {
                    // Initialize chart once DOM is ready
                    this.$nextTick(() => this.renderChart());

                    // Re-render chart on Livewire event
                    Livewire.on('updateTheChart', (payload) => {
                        this.published = payload.published ?? this.published;
                        this.noTags = payload.noTags ?? this.noTags;
                        this.$nextTick(() => this.renderChart());
                    });

                    // Ensure chart re-renders after any Livewire DOM update
                    Livewire.hook('message.processed', (message, component) => {
                        if (this.$refs.canvas) this.renderChart();
                    });
                },

                renderChart() {
                    if (!this.$refs.canvas || typeof Chart === 'undefined') return;

                    const ctx = this.$refs.canvas.getContext('2d');

                    if (this.chartInstance) this.chartInstance.destroy();

                    this.chartInstance = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Published Blogs', 'Blogs with no tags'],
                            datasets: [{
                                label: 'Blog Status',
                                data: [this.published, this.noTags],
                                backgroundColor: ['rgb(255, 171, 0)', 'rgba(244, 67, 54, 0.6)'],
                                borderColor: ['rgb(255, 171, 0)', 'rgba(244, 67, 54, 1)'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: true, position: 'top' }
                            }
                        }
                    });
                }
            }
        }
    </script>


@endpush