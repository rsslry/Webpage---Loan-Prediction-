<?php

include('security.php');

$graduateQuery = "SELECT COUNT(*) AS graduate_count FROM dataset WHERE Education = 'Graduate'";
$stmt = $connection->query($graduateQuery);
$rowGraduate = $stmt->fetch_assoc();
$graduateCount = $rowGraduate['graduate_count'];

$notgraduateQuery = "SELECT COUNT(*) AS notgraduate_count FROM dataset WHERE Education = 'Not Graduate'";
$stmt = $connection->query($notgraduateQuery);
$rowNotGraduate = $stmt->fetch_assoc();
$notgraduateCount = $rowNotGraduate['notgraduate_count'];

?>


<!-- Pie chart container -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Graduate</h3>
    </div>
    <div class="card-body">
        <div id="pieChart"></div>
    </div>
</div>

<!-- JavaScript for the pie chart -->
<script>
    var pieChartOptions = {
        series: [<?php echo $graduateCount; ?>, <?php echo $notgraduateCount; ?>],
        labels: ['Graduate', 'Not Graduate'],
        chart: {
            type: 'pie',
            width: 400,
            height: 200
        },
        colors: [
            '#007bff', 
            '#8a2be2'
        ]
    };

    var pieChart = new ApexCharts(document.querySelector("#pieChart"), pieChartOptions);
    pieChart.render();
</script>
