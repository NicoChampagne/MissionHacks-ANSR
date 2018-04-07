<script>
    import VueChartJs from 'vue-chartjs'

    export default {
        name: 'polar-area',
        extends: VueChartJs.PolarArea,
        props: { graphdata: Array },
        mounted () {
            this.renderChart({
                labels: [
                    "Mathematics",
                    "Sciences",
                    "Languages",
                    "Arts",
                    "Physical Ed",
                    "Social Studies",
                    "History",
                    "Practical Exp"],
                datasets: [
                    {
                        label: 'My Data Set',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(255, 206, 186, 0.4',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(75, 92, 192, 0.4)',
                            'rgba(53, 102, 255, 0.4)',
                            'rgba(55, 159, 164, 0.4)'
                        ],
                        data: this.graphdata
                    }
                ],

            }, {
                onClick: function (evt) {
                    var activePoints = this.getElementsAtEvent(evt);
                    if (activePoints[0]) {
                        var chartData = activePoints[0]['_chart'].config.data;
                        var idx = activePoints[0]['_index'];

                        var label = chartData.labels[idx];
                        var value = chartData.datasets[0].data[idx];

                        var url = "http://example.com/?label=" + label + "&value=" + value;
                        console.log(url);
                        alert(url);
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: true,
                    position: 'bottom',
                    text:'Student Polar Chart'
                }})
        }
    }
</script>
