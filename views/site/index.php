<?php

use yii\helpers\Url;
$baseUrl = Url::base();
/** @var yii\web\View $this */

$this->title = 'Dashboards';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12 mb-3">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Good Morning, <?php echo Yii::$app->user->identity->fullname ?>!</h4>
                            <p class="text-muted mb-0">Here's what's happening with your dashboard
                                today.</p>
                        </div>
                        
                    </div><!-- end card header -->
                </div>
                <!--end col-->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="d-flex flex-column h-100">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Total Boats</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $total ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="total_jobs" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!--end col-->
                                <div class="col-xl-6 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Active Boats</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $active ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="apply_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-6 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Inactive Boats</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $inactive ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="new_jobs_chart" data-colors='["--vz-dark"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-6 col-md-6">
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
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Maintenance Boats</p>
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-0"><span class="counter-value" data-target="<?php echo $maintain ?>">0</span></h4>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="interview_chart" data-colors='["--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Newest Boats</h4>
                                <div class="flex-shrink-0">
                                    <a href="<?php echo Url::to(['boat/index']) ?>" class="btn btn-soft-primary btn-sm">View All Boats <i class="ri-arrow-right-line align-bottom"></i></a>
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
                                                                        <img src="<?= \Yii::getAlias('@web');?>/images/nft/img-01.jpg" alt="" height="16" class="avatar-xs" />
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
                                                        <a href="<?php echo Url::to(['boat/view','id'=>$boat->id]) ?>" class="btn btn-link btn-sm">View More <i class="ri-arrow-right-line align-bottom"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">5</span> of <span class="fw-semibold"><?php echo $total ?></span> Results
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> <!-- .card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!--end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->

    
</div>
<!-- apexcharts -->
<script src="<?= \Yii::getAlias('@web');?>/libs/apexcharts/apexcharts.min.js"></script>
<script>
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

    //  total jobs Charts
    var chartRadialbarBasicColors = getChartColorsArray("total_jobs");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $total ?>],
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
                            formatter: function (val) {
                            return val
                          }
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#total_jobs"), options);
        chart.render();
    }

    //  apply jobs Charts
    var chartRadialbarBasicColors = getChartColorsArray("apply_jobs");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $active ?>],
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
                            formatter: function (val) {
                            return val
                          }
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#apply_jobs"), options);
        chart.render();
    }

    //  New jobs Chart
    var chartRadialbarBasicColors = getChartColorsArray("new_jobs_chart");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $inactive ?>],
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
                            formatter: function (val) {
                            return val
                          }
                        }
                    }
                }
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#new_jobs_chart"), options);
        chart.render();
    }

    //  interview_chart
    var chartRadialbarBasicColors = getChartColorsArray("interview_chart");
    if (chartRadialbarBasicColors) {
        var options = {
            series: [<?php echo $inactive ?>],
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
                            formatter: function (val) {
                            return val
                          }
                        }
                    }
                },
            },
            colors: chartRadialbarBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#interview_chart"), options);
        chart.render();
    }
</script>