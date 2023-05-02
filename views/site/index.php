<?php

use yii\helpers\Url;
$baseUrl = Url::base();
/** @var yii\web\View $this */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /><script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>
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
                                <div class="col-xl-3 col-md-6">
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
                                </div><!--end col-->
                                <div class="col-xl-3 col-md-6">
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
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Bot Tidak Aktif</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $inactive ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="inactive_chart" data-colors='["--vz-warning"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Bot Penyelenggaraan</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $maintain ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="maintain_chart" data-colors='["--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
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
                                <div id="simple_pie_chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Bot Terbaru</h4>
                                <div class="flex-shrink-0">
                                    <a href="<?php echo Url::to(['boat/index']) ?>" class="btn btn-soft-primary btn-sm">Lihat Semua Bot <i class="ri-arrow-right-line align-bottom"></i></a>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                        <tbody>
                                            <?php foreach ($newBoat as $boat){ ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs me-2 flex-shrink-0">
                                                                <div class="avatar-title bg-soft-secondary rounded">
                                                                    <?php if ($boat->image_file){ ?>
                                                                        <img src="<?php echo $baseUrl.'/uploads/boatImages/'; echo $boat->image_file;?>" alt="" height="16" class="avatar-xs">
                                                                    <?php } else { ?>
                                                                        <div class="avatar-title bg-soft-<?php echo $color= $boat->imageColor;?> text-<?php echo $color?> ">
                                                                            <?php echo $boat->image ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <h6 class="mb-0"><?php echo $boat->boat_name ?></h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo $boat->statusTable?> text-uppercase"><?php echo $boat->status->name; ?></span>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo Url::to(['boat/view','id'=>$boat->id]) ?>" class="btn btn-link btn-sm">Lihat Selebihnya <i class="ri-arrow-right-line align-bottom"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div> <!-- .card-->

                    </div><!--end col-->
                    <div class="col=col-xl-12">
                        <div class="card" id="summary">
                            <div class="card-header">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm-auto">
                                        <div>
                                            <h4 class="card-title mb-0 flex-grow-1">Ringkasan Laporan Mengikut Bot</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">Nama Bot</th>
                                                <th scope="col">Laporan Diterima</th>
                                                <th scope="col">Pembaikan Telah Dilaksanakan</th>
                                                <th scope="col">Belum Dilaksanakan</th>
                                                <th scope="col">Bukan Dalam Jaminan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php foreach ($modelBoat as $boat): ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-shrink-0 me-2">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <?php if ($boat->image_file){ ?>
                                                                        <img src="<?php echo $baseUrl.'/uploads/boatImages/'; echo $boat->image_file;?>" alt="" class="avatar-xs rounded-circle" />
                                                                    <?php } else { ?>
                                                                        <div class="avatar-title bg-soft-<?php echo $color= $boat->imageColor;?> text-<?php echo $color?> rounded-circle">
                                                                            <?php echo $boat->image ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <a href="<?php echo Url::to(['boat/view','id'=>$boat->id]) ?>" class="fw-medium link-primary"><?php echo $boat->boat_name ?></a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $boat->totalReport ?></td>
                                                    <td>
                                                        <?php echo $boat->totalReportRepair ?>
                                                    </td>
                                                    <td><?php echo $boat->totalReportNotFixed ?></td>
                                                    <td>
                                                        <?php echo $boat->totalReportNoWarranty ?>
                                                    </td>
                                                </tr><!-- end tr -->
                                            <?php endforeach; ?>
                                            
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                    
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Sebelum
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Seterusnya
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card-->
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


<script>
    var perPage = 8;

    //Table
    var options = {
        valueNames: [
            
        ],
        page: perPage,
        pagination: true,
        plugins: [
            ListPagination({
                left: 2,
                right: 2
            })
        ],
        
    };

    // Init list
    var contactList = new List("summary", options).on("updated", function (list) {
        
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
            height: 300,
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

    //  interview_chart
    var chartRadialbarBasicColors = getChartColorsArray("maintain_chart");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $maintainPercent ?>],
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
                },
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#maintain_chart"), options);
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