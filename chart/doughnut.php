<?php

include('security.php');

$marriedQuery = "SELECT COUNT(*) AS married_count FROM dataset WHERE Married = 'Yes'";
$stmt = $connection->query($marriedQuery);
$rowMarried = $stmt->fetch_assoc();
$marriedCount = $rowMarried['married_count'];

$notmarriedQuery = "SELECT COUNT(*) AS notmarried_count FROM dataset WHERE Married = 'No'";
$stmt = $connection->query($notmarriedQuery);
$rowNotMarried = $stmt->fetch_assoc();
$notmarriedCount = $rowNotMarried['notmarried_count'];

?>

<!-- chart/doughnut.php -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Status</h3>
    </div>
    <div class="card-body">
        <!-- Doughnut chart container -->
        <div id="doughnut-chart"></div>
    </div>
</div>

<!-- JavaScript for the doughnut chart -->
<script>
    // Data for the doughnut chart
    var doughnutData = {
        series: [<?php echo $marriedCount; ?>, <?php echo $notmarriedCount; ?>],
        labels: ['Married', 'Not Married']
    };

    // Doughnut chart options
    var doughnutOptions = {
        chart: {
            type: 'donut'
        },
        labels: doughnutData.labels,
        series: doughnutData.series,
        colors: [
            '#ff6384', // Married (Red)
            '#36a2eb'  // Not Married (Blue)
        ]
    };

    // Get the container for the doughnut chart
    var doughnutChartContainer = document.querySelector("#doughnut-chart");

    // Create the doughnut chart
    var doughnutChart = new ApexCharts(doughnutChartContainer, doughnutOptions);

    // Render the doughnut chart
    doughnutChart.render();
</script>
