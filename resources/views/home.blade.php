@extends('layouts.app')

@section('content')
<div id="chart-container"class="container"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var orderPerMonth = <?php echo json_encode($orderPerMonth)?>;
    Highcharts.chart('chart-container', {
        title: {
            text: 'Jumlah Pemesanan Kendaraan di Tahun Ini'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pemesanan'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pesanan',
            data: orderPerMonth
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection
