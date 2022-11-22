<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fuqarolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container p-3">
    <h1 class="text-center">Fuqarolar statistikasi</h1>
    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard')}}" class="btn btn-outline-danger">Kirish</a>
    </div>
    <div class="d-flex justify-content-center">
        <div class="p-3" style="width:70%; height: 600px">
            <canvas id="myChart" width="100%" height="400"></canvas>
        </div>
        <div class="p-3" style="width:70%; height: 600px">
            <canvas id="myChart2" width="100%" height="400"></canvas>
        </div>
    </div>
</div>
</body>
</html>
<script>
    const labels = @json($labels);
    const values = @json($values);
    const dead_labels = @json($dead_labels);
    const dead_values = @json($dead_values);
    const live_labels = @json($live_labels);
    const live_values = @json($live_values);
    // const m = tf.variable(tf.scalar(Math.random()));
    // const b = tf.variable(tf.scalar(Math.random()));
    //
    // function predict(x) {
    //     return tf.tidy(function() {
    //         return m.mul(x).add(b);
    //     });
    // }
    //
    // function loss(prediction, labels) {
    //     //subtracts the two arrays & squares each element of the tensor then finds the mean.
    //     const error = prediction
    //         .sub(labels)
    //         .square()
    //         .mean();
    //     return error;
    // }
    //
    // function train() {
    //     const learningRate = 0.005;
    //     const optimizer = tf.train.sgd(learningRate);
    //
    //     optimizer.minimize(function() {
    //         const predsYs = predict(tf.tensor1d(trainX));
    //         console.log(predsYs);
    //         stepLoss = loss(predsYs, tf.tensor1d(trainY));
    //         console.log(stepLoss.dataSync()[0]);
    //         return stepLoss;
    //     });
    //     plot();
    // }
    // const predictionsBefore = predict(tf.tensor1d(trainX));

    function plot() {
        // let plotData = [];
        //
        // for (let i = 0; i < trainY.length; i++) {
        //     plotData.push({ x: trainX[i], y: trainY[i] });
        // }

        // var ctx = document.getElementById("myChart").getContext("2d");

        var barChartCanvas = document.getElementById("myChart").getContext("2d");
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }
        new Chart(barChartCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'soni',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: values
                },
                    // {
                    //     label: 'narxi',
                    //     backgroundColor: 'rgba(200,141,188,0.9)',
                    //     borderColor: 'rgba(200,141,188,0.8)',
                    //     pointRadius: false,
                    //     pointColor: '#3b8bba',
                    //     pointStrokeColor: 'rgba(200,141,188,1)',
                    //     pointHighlightFill: '#fff',
                    //     pointHighlightStroke: 'rgba(200,141,188,1)',
                    //     data: values
                    // },
                ]
            },
            options: barChartOptions
        })
        var barChartCanvas = document.getElementById("myChart2").getContext("2d");
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }
        new Chart(barChartCanvas, {
            type: 'line',
            data: {
                labels: dead_labels,
                datasets: [{
                    label: "o'lim",
                    backgroundColor: 'rgba(255,0,0,0.9)',
                    borderColor: 'rgba(255,0,0,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(255,0,0,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255,0,0,1)',
                    data: dead_values
                },
                    {
                        label: "tug'ilish",
                        backgroundColor: 'rgba(0,255,0,0.9)',
                        borderColor: 'rgba(0,255,0,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(0,255,0,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(0,255,0,1)',
                        data: live_values
                    },
                ]
            },
            options: barChartOptions
        })
    }

    plot();
</script>
