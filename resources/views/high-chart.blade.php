<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Grafik Wisata</title>
  </head>
  <body>
    <div class="container">
        <div id="dataWisata">

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- High Chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('dataWisata', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Harga Wisata'
            },
            subtitle: {
                text: 'Source: https://ict-juara.herokuapp.com/api/wisata'
            },
            xAxis: {
                categories: <?php echo json_encode($categories); ?>,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Harga'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Wisata',
                data: <?php echo json_encode($harga); ?>,

            }]
        });
    </script>
  </body>
</html>
