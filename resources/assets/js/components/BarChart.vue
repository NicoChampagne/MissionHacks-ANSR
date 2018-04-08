<script>
    import VueChartJs from 'vue-chartjs'

    export default {
        name: 'bar-chart',
        extends: VueChartJs.Bar,
        props: { labels: Array, data: Array},
        mounted () {
            this.renderChart({
                labels: this.labels,
                datasets: [
                    {
                        label: 'Job Count',
                        backgroundColor: [
                            '#a693f8',
                            '#58f8bd',
                            '#edf858',
                            '#5156f8',
                            '#31f814',
                            '#f847cc',
                            '#52f8ca',
                            '#9997f8',
                            '#c9f848',
                            '#f8691a',
                            '#45bff8',
                            '#d5f8a9',
                            '#f84660',
                        ],
                        data: this.data
                    }
                ],
                options: {
                    beginAtZero: true,
                }
            }, {
                onClick: function (evt) {
                    var activePoints = this.getElementsAtEvent(evt);
                    if (activePoints[0]) {
                        var chartData = activePoints[0]['_chart'].config.data;
                        var idx = activePoints[0]['_index'];

                        var url = window.location.href + "/" + (idx+1);
                        window.location.replace(url);
                        history.pushState('graph click', url);
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: true,
                    position: 'bottom',
                    text:'Future Job Trends'
                }})
        }
    }
</script>