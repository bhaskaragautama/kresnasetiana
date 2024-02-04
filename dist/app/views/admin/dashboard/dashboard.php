<h2 class="fw-semibold mb-4">Dashboard</h2>
<?php
$currentSummary = $data['currin'] - $data['currout'];
$allSummary = $data['allin'] - $data['allout'];
?>
<div class="row g-4">
    <div class="col-md-6">
        <div class="bg-secondary-subtle px-3 py-2 rounded-3">
            <div class="fw-medium mb-2">Current (<?= $data['term']['term_name'] ?>)</div>
            <div class="<?= $currentSummary == 0 ? '' : ($currentSummary > 0 ? 'text-success' : 'text-danger') ?> fw-semibold fs-4">Rp <?= number_format($currentSummary, 0, ',', '.') ?>,-</div>
            <hr class="my-1">
            <table class="w-auto table-secondary">
                <tbody>
                    <tr>
                        <td class="pt-0 text-success">Income</td>
                        <td class="pt-0 text-success">=</td>
                        <td class="pt-0 text-success">Rp <?= number_format($data['currin'], 0, ',', '.') ?>,-</td>
                    </tr>
                    <tr>
                        <td class="pt-0 text-danger">Expense</td>
                        <td class="pt-0 text-danger">=</td>
                        <td class="pt-0 text-danger">Rp <?= number_format($data['currout'], 0, ',', '.') ?>,-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bg-secondary-subtle px-3 py-2 rounded-3">
            <div class="fw-medium mb-2">All Years</div>
            <div class="<?= $allSummary == 0 ? '' : ($allSummary > 0 ? 'text-success' : 'text-danger') ?> fw-semibold fs-4">Rp <?= number_format($allSummary, 0, ',', '.') ?>,-</div>
            <hr class="my-1">
            <table class="w-auto table-secondary">
                <tbody>
                    <tr>
                        <td class="pt-0 text-success">Income</td>
                        <td class="pt-0 text-success">=</td>
                        <td class="pt-0 text-success">Rp <?= number_format($data['allin'], 0, ',', '.') ?>,-</td>
                    </tr>
                    <tr>
                        <td class="pt-0 text-danger">Expense</td>
                        <td class="pt-0 text-danger">=</td>
                        <td class="pt-0 text-danger">Rp <?= number_format($data['allout'], 0, ',', '.') ?>,-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 mt-5">
        <canvas id="all-chart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
<script>
    let dataLabel = [];
    let dataIncome = [];
    let dataExpense = [];
    let chartData = {
        labels: [],
        datasets: [{
                label: 'Income',
                data: [],
                borderColor: '#198754',
                backgroundColor: '#198754',
            },
            {
                label: 'Expense',
                data: [],
                borderColor: '#dc3545',
                backgroundColor: '#dc3545',
            }
        ]
    };
    let allChart = new Chart($('#all-chart'), {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                y: {
                    display: true,
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1000000
                    }
                },
                x: {
                    display: true,
                    ticks: {
                        display: false
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            elements: {
                point: {
                    radius: 5,
                    hoverRadius: 7
                },
                line: {
                    tension: 0.1
                }
            },
        }
    });
    $(document).ready(function() {
        $.ajax({
            url: "<?= BASEURL ?>dashboard/getallsummary",
            dataType: "json",
            success: function(response) {
                console.log(response);
                // dataLabel = [null];
                // dataIncome = [null];
                // dataExpense = [null];
                $.each(response, function(idx, val) {
                    dataLabel.push(val.term_name);
                    dataIncome.push(val.income);
                    dataExpense.push(val.expense);
                });
                // dataLabel.push(null);
                // dataIncome.push(null);
                // dataExpense.push(null);
                // allChart.options.scales.y.max = maxY;
                chartData.labels = dataLabel;
                chartData.datasets[0].data = dataIncome;
                chartData.datasets[1].data = dataExpense;
                allChart.update();
            }
        });
    });
</script>