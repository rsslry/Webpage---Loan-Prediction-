<?php

include('security.php');

// Count applicants with a specific income
$incomeQuery = "SELECT ApplicantIncome, COUNT(*) AS income_count FROM dataset WHERE ApplicantIncome IS NOT NULL GROUP BY ApplicantIncome";
$stmt = $connection->query($incomeQuery);

$incomeCounts = array();
while ($row = $stmt->fetch_assoc()) {
    $income = $row['ApplicantIncome'];
    $count = $row['income_count'];
    $incomeCounts[$income] = $count;
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Applicant Income Report</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <!-- Add your other card tools here -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- Line chart container -->
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
</div>
<!-- /.container-fluid -->

<!-- Line chart script -->
<script>
    var incomeCounts = <?php echo json_encode($incomeCounts); ?>;

    var lineChartOptions = {
        series: [{
            name: 'Applicants',
            data: Object.values(incomeCounts)
        }],
        chart: {
            type: 'line',
            height: 350
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: Object.keys(incomeCounts)
        },
        colors: ['#ff6384'], // Line color
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 100]
            }
        }
    };

    var lineChart = new ApexCharts(document.querySelector("#lineChart"), lineChartOptions);
    lineChart.render();
</script>
