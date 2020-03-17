<div class="row" style="margin: 15px 5px 15px 5px; border-top: solid 2px #e8e8e8;">
    <canvas id="graph" width="40" height="20"></canvas>
</div>


<script>

    var ctx = document.getElementById('graph').getContext('2d');

    var data = <?php echo $DataJSON ?>;

    if(data.isUseable){
        Notify("Analitika", "Mokinio pasiekimų analitika.", true);
    }
    else {
        Notify("Analitika", "Mokinys neturi pažymių.", false);
    }

    var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Per mėnesį gautų pažymių vidurkis',
                    data: data.monthAvg,
                    barPercentage: 0.3
                }, {
                    label: 'Bendras vidurkis',
                    data: data.totalAvg,
                    fill: false,
                    backgroundColor: 'rgb(131, 179, 203)',
                    borderColor: 'rgb(131, 179, 203)',
                    borderWidth: 3,
                    type: 'line'
                }],
                labels: data.labels
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 2,
                            max: 11
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 80,
                            minRotation: 60
                        }
                    }]
                },
                legend: {
                    reverse: true
                },
                title: {
                    display: true,
                    text: "Analitika pagal mėnesius",
                    fontSize: 18,
                    padding: 15
                }
            }
        });

</script>