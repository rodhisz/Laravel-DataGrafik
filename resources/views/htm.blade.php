<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-zpUA-Compatible" content="IE=edge">
    <meta name="viewport" contentphp="width=device-width, initial-scale=1.0">
    <title>Data Wisata</title>
</head>

<body>
    <h1>Chart Harga Wisata ICT</h1>
    {!! $chart->container() !!}

    {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
</body>

</html>
