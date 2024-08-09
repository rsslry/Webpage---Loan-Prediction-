<?php

include('security.php');

$maleQuery = "SELECT COUNT(*) AS male_count FROM dataset WHERE Gender = 'Male'";
$stmt = $connection->query($maleQuery);
$rowMale = $stmt->fetch_assoc();
$maleCount = $rowMale['male_count'];

$femaleQuery = "SELECT COUNT(*) AS female_count FROM dataset WHERE Gender = 'Female'";
$stmt = $connection->query($femaleQuery);
$rowFemale = $stmt->fetch_assoc();
$femaleCount = $rowFemale['female_count'];

?>

<!-- chart/bar.php -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Gender</h3>
    </div>
    <div class="card-body">
        <!-- Bar chart container -->
        <div id="bar-chart"></div>
        <canvas id="genderCtx"></canvas>
    </div>
</div>

<!-- JavaScript for the bar chart -->
<script>
    const genderCtx = document.getElementById('genderCtx');

    var barChartOptions = {
        series: [{
            name: 'Gender',
            data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Male', 'Female'], // Assuming you want to plot male and female counts
        },
        yaxis: {
            title: {
                text: 'Count'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val;
                }
            }
        }
    };

    var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
    barChart.render();
</script>
