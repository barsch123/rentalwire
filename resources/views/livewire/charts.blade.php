@props(['class'])
<!--

 * NOTE:
 * Couldn't find a well-maintained or suitable Laravel chart package for this project,
 * so I implemented the charts manually rawdogged it.
 * 36 hours
-->

<div class="mb-10" x-data="chartComponent()">
    <!-- Chart Canvas Container (prevent re-rendering with wire:ignore) -->
    <div class="w-full h-72" wire:ignore>
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
                this.$nextTick(() => {
                    if (this.$refs.canvas) {
                        this.renderChart();
                    }
                });

                Livewire.on('updateTheChart', (payload) => {
                    this.published = payload.published ?? this.published;
                    this.noTags = payload.noTags ?? this.noTags;
                    this.$nextTick(() => {
                        if (this.$refs.canvas) {
                            this.renderChart();
                        }
                    });
                });
            },

            renderChart() {
                const ctx = this.$refs.canvas.getContext('2d');
                if (this.chartInstance) {
                    this.chartInstance.destroy();
                }
                this.chartInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Published Blogs', 'Blogs with no tags'],
                        datasets: [{
                            label: 'Blog Status',
                            data: [this.published, this.noTags],
                            backgroundColor: [
                                'rgb(255, 171, 0)',   // ffab00
                                'rgba(244, 67, 54, 0.6)'    // red
                            ],
                            borderColor: [
                                'rgb(255, 171, 0)',
                                'rgba(244, 67, 54, 1)'
                            ],
                            borderWidth: 1,
                            hoverOffset: 10,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: true, position: 'top' },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = Number(context.raw) || 0;
                                        const sum = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percent = sum ? ((value / sum) * 100).toFixed(2) : 0;
                                        return `${label}: ${value} (${percent}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        }
    }
</script>
@endpush



