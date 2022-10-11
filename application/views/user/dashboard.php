<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row lg">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        Halaman Dasborad
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> <b> Rp. <?php echo number_format($jmlDeposito['tot_depo'], '0', '', '.'); ?></b></h3>
                            <p>Total Deposito</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-usd"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> <b> Rp. <?php echo number_format($jmlPinjaman['tot_pinjaman'], '0', '', '.'); ?></b></h3>

                            <p>Total Pinjaman</p>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> <b> Rp. <?php echo number_format($totalclosing['tot_closing'], '0', '', '.'); ?></b></h3>
                            <p>Total Closing</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <!-- BAR CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chart Deposito</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($penempatandepo as $pd) {
                                $bulan1[] = $pd->namabulan;
                                $tot_nominal[] = $pd->tot_nominal;
                            };
                            ?>
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>

                            </div>
                        </div>
                    </div>
                    <!-- BAR CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chart Pinjaman</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($fasilitaspinjaman as $f) {
                                $bulan2[] = $f->namabulan;
                                $tot_pinjaman[] = $f->tot_pinjaman;
                            };
                            ?>
                            <div class="chart">
                                <canvas id="barChart2" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
</div>
</section>


<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         * labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
         */
        var areaChartData = {
            labels: <?php echo json_encode($bulan1) ?>,
            datasets: [{
                    label: 'Penempatan Deposito',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($tot_nominal) ?>
                },
                {
                    label: '',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                xAxes: [{
                    ticks: {}
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 500000000,
                        // Return an empty string to draw the tick line but hide the tick label
                        // Return `null` or `undefined` to hide the tick line entirely
                        userCallback: function(value, index, values) {
                            // Convert the number to a string and splite the string every 3 charaters from the end
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            // Convert the array to a string and format the output
                            value = value.join('.');
                            return 'Rp.' + value;
                        }
                    }
                }]
            },

        }
        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })


        var areaChartData = {
            labels: <?php echo json_encode($bulan2) ?>,
            datasets: [{
                    label: 'Fasilitas Pinjaman',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($tot_pinjaman) ?>
                },
                {
                    label: '',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart2').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                xAxes: [{
                    ticks: {}
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 500000000,
                        // Return an empty string to draw the tick line but hide the tick label
                        // Return `null` or `undefined` to hide the tick line entirely
                        userCallback: function(value, index, values) {
                            // Convert the number to a string and splite the string every 3 charaters from the end
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            // Convert the array to a string and format the output
                            value = value.join('.');
                            return 'Rp.' + value;
                        }
                    }
                }]
            },

        }
        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

    })
</script>