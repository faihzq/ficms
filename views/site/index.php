<?php

use yii\helpers\Url;
$baseUrl = Url::base();
/** @var yii\web\View $this */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .red {
        background-color: #fce7e7; /* Set the background color you want for highlighted rows */
        /* Add any other styles you want for the highlighted rows */
    }
    .green {
        background-color: #dcf6e9; /* Set the background color you want for highlighted rows */
        /* Add any other styles you want for the highlighted rows */
    }
</style>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12 mb-3">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Selamat Datang, <?php echo Yii::$app->user->identity->fullname ?>!</h4>
                            <p class="text-muted mb-0">Berikut ialah perkara yang berlaku dengan dashboard anda hari ini.</p>
                        </div>
                        
                    </div><!-- end card header -->
                </div>
                <!--end col-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex flex-column h-100">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <a href="javascript:void(0);" onclick="filterStatus('')">
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-secondary)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Jumlah Bot</p>
                                                        <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $total ?>">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="total_boats" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!--end col-->
                                <div class="col-xl-4 col-md-6">
                                    <a href="javascript:void(0);" onclick="filterStatus('1')">
                                        <!-- card -->
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-secondary)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Bot Aktif</p>
                                                        <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $active ?>">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="active_chart" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->
                                <div class="col-xl-4 col-md-6">
                                    <!-- card -->
                                    <a href="javascript:void(0);" onclick="filterStatus('2')">
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-secondary)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Bot Tidak Aktif</p>
                                                        <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $inactive ?>">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="inactive_chart" data-colors='["--vz-warning"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->
                                
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Statistik Laporan</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="simple_pie_chart" data-colors='["--vz-warning", "--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-6">
                        <a href="<?= Yii::$app->user->identity->user_role_id != 5? Url::to(['report-repair/index']):'javascript:void(0);' ?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light text-success rounded-circle fs-3">
                                                <i class="ri-tools-fill align-middle"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium fs-12 text-muted mb-1">Dibaiki</p>
                                            <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $totalFixed ?>">0</span></h4>
                                        </div>
                                        
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </a>

                        <a href="<?= Yii::$app->user->identity->user_role_id != 5? Url::to(['report-repair/index']):'javascript:void(0);' ?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light text-warning rounded-circle fs-3">
                                                <i class="ri-file-excel-2-line align-middle"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium fs-12 text-muted mb-1">Belum Dibaiki</p>
                                            <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $totalNotFixed ?>">0</span></h4>
                                        </div>
                                        
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </a>

                        <a href="<?= Yii::$app->user->identity->user_role_id != 5? Url::to(['report-survey/index']):'javascript:void(0);' ?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light text-danger rounded-circle fs-3">
                                                <i class="ri-file-shield-line align-middle"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium fs-12 text-muted mb-1">Bukan Dalam Jaminan</p>
                                            <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $totalNoWarranty ?>">0</span></h4>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </a>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light text-dark rounded-circle fs-3">
                                            <i class="ri-survey-fill align-middle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium fs-12 text-muted mb-1">Jumlah Laporan</p>
                                        <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $totalAllReport ?>">0</span></h4>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!--end col-->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Ringkasan Laporan Mengikut Bot</h4>
                            </div><!-- end card header -->

                            <div class="card-body p-0 pb-2">
                                <div>
                                    <div id="projects-overview-chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card body -->
                            
                        </div><!-- end card -->
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover dt-responsive nowrap att-tbl" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Nama Bot</th>                                                        
                                                        <th class="text-center">Status</th> 
                                                        <th class="text-center">Propulsion</th>
                                                        <th class="text-center">Generation</th>
                                                        <th class="text-center">Navigation</th>
                                                        <th class="text-center">Communication</th>
                                                        <th class="text-center">Warfare System</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
            <!--end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->

</div>
<!-- list.js min js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.js/list.min.js"></script>
<!--list pagination js-->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.pagination.js/list.pagination.min.js"></script>
<!-- apexcharts -->
<script src="<?= \Yii::getAlias('@web');?>/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


<script>
    var status = '';
    function filterStatus(value){
        status = value;
        table.draw();
    }

    var table = $(".att-tbl").DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "searching": false,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
        "ajax": {
            "type": "GET",
            "url": "<?= Url::to(['site/get-list']) ?>",
            "data": function (d) {
                d.status = status;
            },
            "dataType": "json",
            "contentType": "application/json; charset=utf-8"
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,        
        // oLanguage: {
        //     sProcessing: "<span class=\"loader-28\"> </span>"
        // },
        // columnDefs: [
        //     { orderable: false, targets: 0 },
        //     { responsivePriority: 1, targets: 1 },
        //     { responsivePriority: 2, targets: -1 },
        //     { responsivePriority: 3, targets: -3 }
        // ]
        "createdRow": function( row, data, dataIndex ) {
            console.log(data[2]);
            if (data[2] == '<span class="badge badge-border bg-soft-success text-success text-uppercase">Aktif</span>') {        
                $(row).addClass('green');
            } else {
                $(row).addClass('red');
            }
        },
        columnDefs: [
            {
                targets: [-1, -2, -3, -4, -5, -6, 0],
                className: 'dt-body-center'
            }
        ]
    });
    
    // get colors array from the string
    function getChartColorsArray(chartId) {
        if (document.getElementById(chartId) !== null) {
            var colors = document.getElementById(chartId).getAttribute("data-colors");
            if (colors) {
                colors = JSON.parse(colors);
                return colors.map(function (value) {
                    var newValue = value.replace(" ", "");
                    if (newValue.indexOf(",") === -1) {
                        var color = getComputedStyle(document.documentElement).getPropertyValue(
                            newValue
                        );
                        if (color) return color;
                        else return newValue;
                    } else {
                        var val = value.split(",");
                        if (val.length == 2) {
                            var rgbaColor = getComputedStyle(
                                document.documentElement
                            ).getPropertyValue(val[0]);
                            rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                            return rgbaColor;
                        } else {
                            return newValue;
                        }
                    }
                });
            } else {
                console.warn('data-colors atributes not found on', chartId);
            }
        }
    }

    //  Simple Pie Charts

    var chartPieBasicColors = getChartColorsArray("simple_pie_chart");
    if(chartPieBasicColors){
    var options = {
        series: [<?php echo $totalNotFixed ?>, <?php echo $totalFixed ?>, <?php echo $totalNoWarranty ?>],
        chart: {
            height: 340,
            type: 'pie',
        },
        labels: ['Belum Dibaiki', 'Dibaiki', 'Bukan Dalam Jaminan'],
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            dropShadow: {
                enabled: false,
            }
        },
        colors: chartPieBasicColors
    };

    var chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options);
    chart.render();
    }

    //  total jobs Charts
    var chartRadialbarBasicColors = getChartColorsArray("total_boats");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [100],
            chart: {
                type: 'radialBar',
                width: 105,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%'
                    },
                    track: {
                        margin: 1
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 600,
                            offsetY: 8,
                            
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#total_boats"), options);
        chart.render();
    }

    //  apply jobs Charts
    var chartRadialbarBasicColors = getChartColorsArray("active_chart");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $activePercent ?>],
            chart: {
                type: 'radialBar',
                width: 105,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%'
                    },
                    track: {
                        margin: 1
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 600,
                            offsetY: 8,
                            
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#active_chart"), options);
        chart.render();
    }

    //  New jobs Chart
    var chartRadialbarBasicColors = getChartColorsArray("inactive_chart");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $inactivePercent ?>],
            chart: {
                type: 'radialBar',
                width: 105,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%'
                    },
                    track: {
                        margin: 1
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            fontWeight: 600,
                            offsetY: 8,
                            
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#inactive_chart"), options);
        chart.render();
    }

    // Projects Overview
    var linechartcustomerColors = getChartColorsArray("projects-overview-chart");
    if (linechartcustomerColors) {
        var options = {
            series: [{
                name: 'Laporan Diterima',
                type: 'bar',
                data: <?php echo $totalBoatReport ?>
            }, {
                name: 'Pembaikan Telah Dilaksanakan',
                type: 'bar',
                data: <?php echo $totalBoatReportFix ?>
            }, {
                name: 'Belum Dilaksanakan',
                type: 'bar',
                data: <?php echo $totalBoatReportNotFix ?>
            }, {
                name: 'Bukan Dalam Jaminan',
                type: 'bar',
                data: <?php echo $totalBoatReportNoWarranty ?>
            }],
            chart: {
                height: 374,
                type: 'line',
                toolbar: {
                    show: false,
                }
            },
            stroke: {
                curve: 'smooth',
                dashArray: [0, 3, 3, 0],
                width: [0, 1, 1, 0],
            },
            fill: {
                opacity: [1, 1, 1, 1]
            },
            markers: {
                size: [0, 4, 4, 0],
                strokeWidth: 2,
                hover: {
                    size: 4,
                }
            },
            xaxis: {
                categories: <?php echo $boatName ?>,
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: true
                }
            },
            grid: {
                show: true,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                yaxis: {
                    lines: {
                        show: false,
                    }
                },
                padding: {
                    top: 0,
                    right: -2,
                    bottom: 15,
                    left: 10
                },
            },
            legend: {
                show: true,
                horizontalAlign: 'center',
                offsetX: 0,
                offsetY: -5,
                markers: {
                    width: 9,
                    height: 9,
                    radius: 6,
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '30%',
                    barHeight: '70%'
                }
            },
            colors: linechartcustomerColors,
            tooltip: {
                shared: true,
                
            }
        };
        var chart = new ApexCharts(document.querySelector("#projects-overview-chart"), options);
        chart.render();
    }

</script>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          backdrop: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
    </script>   
<?php endif; ?>