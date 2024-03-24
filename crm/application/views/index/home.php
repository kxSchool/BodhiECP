<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团总控管理系统 | 后台管理</title>
    <?php $this->load->view('common/top');?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('common/header');?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('common/left');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box">
                <section class="content-header">
                    <h1>
                        控制面板
                        <!--                    <small>Version 2.0</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> 控制面板</a></li>
                        <li class="active">控制面板</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $today_count;?></h3>
                                    <p>今日订单量</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-line-chart"></i>
                                </div>

                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><sup style="font-size: 20px">￥</sup><?php echo $today_amount;?></h3>
                                    <p>今日成交额</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-jpy"></i>
                                </div>

                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $order_count;?></h3>
                                    <p>总订单量</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>

                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><sup style="font-size: 20px">￥</sup><?php echo $order_amount;?></h3>
                                    <p>总成交额</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>

                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">年报表</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong><?php echo date('Y',strtotime('-1 year')) . '--' . date('Y').'年度报表';?></strong>
                                            </p>
                                            <div class="chart">
                                                <canvas id="lineChart" style="height:250px"></canvas>

                                            </div>
                                        </div><!-- /.col -->

                                    </div><!-- /.row -->

                                </div><!-- ./box-body -->

                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">订单类型占比</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <canvas id="pieChart" style="height:250px"></canvas>
                                </div><!-- /.box-body -->
                                <!--                            <div class="box-footer">-->
                                <!--                                <div class="row">-->
                                <!--                                    121212121-->
                                <!--                                </div><!-- /.row -->
                                <!--                            </div><!-- /.box-footer -->
                            </div><!-- /.box -->

                        </div>
                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.box -->
        </div>
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('common/footer');?>
    <script src="<?php echo CRM_STATIC_PATH;?>plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <script>
        $(function () {

            /**
             * 线状图
             */
            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                scaleShowGridLines: false,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                bezierCurve: true,
                bezierCurveTension: 0.3,
                pointDot: true,
                pointDotRadius: 4,
                scaleLabel : "<%=value%>",
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 3,
                datasetFill: true,
                animation : true,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                maintainAspectRatio: true,
                responsive: true
            };
            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas);
            var lineChartOptions = areaChartOptions;
            lineChartOptions.datasetFill = false;
            var lineData = new Array();
            var areaChartData = {};
            $.ajax({
                url : '/index/ajaxOrderYearLine',
                type : 'POST',
                dataType : 'JSON',
                success : function (res) {
                    areaChartData.labels = res.labels;
                    res.list.forEach(function (i,index) {
                        lineData.push({
                            label :   i.label,
                            fillColor : i.rgb_color,
                            strokeColor : i.rgb_color,
                            pointColor : i.rgb_color,
                            pointHighlightStroke : i.rgb_color,
                            pointHighlightFill : "#fff",
                            pointStrokeColor : i.color,
                            data : i.data
                        });
                    });
                    areaChartData.datasets = lineData;
                    lineChart.Line(areaChartData, lineChartOptions);
                }
            });

            /**
             * 饼状图
             */
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var pieOptions = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke: true,
                //String - The colour of each segment stroke
                segmentStrokeColor: "#fff",
                //Number - The width of each segment stroke
                segmentStrokeWidth: 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps: 100,
                //String - Animation easing effect
                animationEasing: "easeOutBounce",
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate: true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            };

            var PieData = new Array();

            $.ajax({
                url : '/index/ajaxOrderYearPie',
                type : 'POST',
                dataType : 'JSON',
                success : function (res) {

                    res.forEach(function (i,index) {
                        PieData.push({
                            value :   i.count,
                            color : i.color,
                            highlight : i.color,
                            label : i.label
                        });

                    });
                    pieChart.Doughnut(PieData, pieOptions);
                }
            });
        });
    </script>
</body>

</html>