<!DOCTYPE html>
<html>
<head>
    <title>Latest Invoices</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #1e1e1e;
            font-family: Arial;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chart-box {
            background: #2c2c2c;
            border-radius: 16px;
            padding: 20px;
            width: 500px;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>
<body>

<div class="chart-box">
    <canvas id="invoiceChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('invoiceChart').getContext('2d');

    const data = {
        labels: {!! json_encode($labels) !!},        // Example: ['Beijing', 'Guangzhou', ...]
        datasets: [{
            label: 'Amount',
            data: {!! json_encode($totals) !!},       // Example: [179, 161, 132, ...]
            backgroundColor: 'rgba(0, 255, 160, 0.7)',
            borderRadius: 6,
            borderSkipped: false,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    grid: {
                        color: '#444'
                    },
                    ticks: {
                        color: 'white'
                    }
                },
                y: {
                    grid: {
                        color: '#444'
                    },
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Latest Invoices',
                    color: 'white',
                    font: {
                        size: 16
                    },
                    position: 'right'
                }
            }
        }
    };

    new Chart(ctx, config);
</script>

</body>
</html>
