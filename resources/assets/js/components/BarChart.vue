<script>
    import { Bar } from 'vue-chartjs'

    export default {
        name: 'bar-chart',
        extends: Bar,
        mounted () {
            // Overwriting base render method with actual data.
            this.renderChart({
                datasets: [
                    {
                        label: 'Job Market Prediction',
                        backgroundColor: '#54f8f0',
                    }
                ]
            })
        }
    }
</script>