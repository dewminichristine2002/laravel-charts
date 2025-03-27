<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Target</title>
    <script src="{{ asset('js/d3.v3.min.js') }}"></script>
<script src="{{ asset('js/liquidFillGauge.js') }}"></script>


    <style>
        body {
            background: #1e1e1e;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .gauge-container {
            background: #2c2c2c;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.2);
        }

        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="gauge-container">
        <h2>Monthly Target</h2>
        <svg id="fillgauge" width="200" height="200"></svg>
    </div>

    <script>
        var config = liquidFillGaugeDefaultSettings();
        config.circleColor = "#000000";
        config.textColor = "#ffffff";
        config.waveTextColor = "#ffffff";
        config.waveColor = "#00c6ff";
        config.circleThickness = 0.08;
        config.textVertPosition = 0.5;
        config.waveAnimateTime = 2000;
        config.displayPercent = true;

        var percentage = {!! json_encode($percentage) !!};
        loadLiquidFillGauge("fillgauge", percentage, config);
    </script>

</body>
</html>
