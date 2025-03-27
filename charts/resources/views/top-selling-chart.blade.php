<!DOCTYPE html>
<html>
<head>
    <title>Top Selling Vehicle Parts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #1e1e1e;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chart-box {
            background: #111;
            border-radius: 16px;
            padding: 20px;
            width: 340px;
            height: 340px;
            position: relative;
            box-shadow: inset 6px 6px 12px #0a0a0a, inset -6px -6px 12px #1a1a1a;
        }

        canvas {
            position: relative;
        }
    </style>
</head>
<body>

<div class="chart-box">
    <canvas id="donutChart"></canvas>
</div>

<script>
    const labels = {!! json_encode($labels) !!};
    const data = {!! json_encode($data) !!};

    const total = data.reduce((sum, val) => sum + val, 0);
    const percentages = data.map(v => ((v / total) * 100).toFixed(1));

    const chartData = {
        labels: labels.map((label, i) => `${label} ${percentages[i]}%`),
        datasets: [{
            data: data,
            backgroundColor: ['#18ffff', '#4fc3f7', '#ffee58', '#ec407a', '#8bc34a'],
            borderWidth: 8,
            borderColor: '#111',
            hoverOffset: 8
        }]
    };

    const config = {
        type: 'doughnut',
        data: chartData,
        options: {
            cutout: '65%',
            rotation: -90,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: 'white'
                    }
                }
            }
        },
        plugins: [{
            id: 'centerTextPlugin',
            beforeDraw(chart) {
                const { ctx, chartArea } = chart;
                const topIndex = chart.data.datasets[0].data.indexOf(Math.max(...chart.data.datasets[0].data));
                const topLabel = chart.data.labels[topIndex].split(' ')[0];
                const topPercent = chart.data.labels[topIndex].split(' ').pop();

                const centerX = (chartArea.left + chartArea.right) / 2;
                const centerY = (chartArea.top + chartArea.bottom) / 2;

                ctx.save();
                ctx.font = 'bold 24px Arial';
                ctx.fillStyle = '#fff';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(topPercent, centerX, centerY - 10);
                ctx.font = '16px Arial';
                ctx.fillText(topLabel, centerX, centerY + 18);
                ctx.restore();
            }
        }]
    };

    new Chart(document.getElementById('donutChart'), config);
</script>

</body>
</html>
