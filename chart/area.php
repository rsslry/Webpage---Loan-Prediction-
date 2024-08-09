<?php

include('security.php');

$yesQuery = "SELECT COUNT(*) AS yes_count FROM dataset WHERE Credit_History = '1'";
$stmt = $connection->query($yesQuery);
$rowYes = $stmt->fetch_assoc();
$yesCount = $rowYes['yes_count'];

$noQuery = "SELECT COUNT(*) AS no_count FROM dataset WHERE Credit_History = '0'";
$stmt = $connection->query($noQuery);
$rowNo = $stmt->fetch_assoc();
$noCount = $rowNo['no_count'];

?>

<!-- chart/bar.php -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Credit History</h3>
    </div>
    <div class="card-body">
        <!-- Bar chart container -->
        <div id="barChart"></div>
        <!-- canvas element is not needed here -->
    </div>
</div>

<!-- JavaScript for the bar chart -->
<script>
    var yesCount = <?php echo $yesCount; ?>;
    var noCount = <?php echo $noCount; ?>;
    
    var barChartOptions = {
        series: [{
            name: 'Credit History',
            data: [yesCount, noCount]
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
        xaxis: {
            categories: ['Paid on time', 'Not paid on time'],
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

    var barChart = new ApexCharts(document.querySelector("#barChart"), barChartOptions);
    barChart.render();
</script>
