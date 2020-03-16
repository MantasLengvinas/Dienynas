<canvas id="graph" width="40" height="15"></canvas>

<script>

var ctx = document.getElementById('graph').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        datasets: [{
            label: 'Menesio vidurkis',
            data: [7, 8.5, 7.9, 9, 2, 2, 5, 8, 6],
            borderWidth: '1'
        }, {
            label: 'Bendras vidurkis',
            data: [8.4, 8.3, 8, 8.6, 8.4, 8.3, 8, 8.6, 7.5],
            fill: false,
            backgroundColor: 'rgb(131, 179, 203)',
            borderColor: 'rgb(131, 179, 203)',
            type: 'line'
        }],
        labels: ['September', 'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May']
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 10
                }
            }]
        }
    }
});

</script>