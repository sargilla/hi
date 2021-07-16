<template>
    <div>
        <canvas ref="canvas"></canvas>
    </div>
</template>
<script>
    import Chart from 'chart.js';
    export default {
        props: ['url'],
        data() {
            return {
                background: [ 
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                border: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ]
            }
        },
        mounted(){
            if(this.url){
                axios.get(this.url).then(response => {
                    let datasets = response.data.values.map((dataset,index) => {
                        return {
                                label:response.data.nombres[index],
                                backgroundColor: this.background[index],
                                borderColor: this.border[index],
                                data : dataset
                            }
                    })
                    this.createChart({
                        labels : response.data.labels,
                        datasets :datasets
                    })
                }).catch(errors => console.log(errors.response)) 
            }
        },
        methods: {
            createChart(data) {
                const chart = new Chart(this.$refs.canvas,{
                    type: 'bar',
                    data: data
                });
            }
        },
        computed: {
            datasets() {
                return this.values.map((dataset,index) => {
                    return {
                            label:'Visitantes',
                            backgroundColor: this.background[index],
                            borderColor: this.border[index],
                            data : dataset
                        }
                })
            }
        },
    }
</script>
