<!-- ================== BEGIN BASE JS ================== -->
<script src="/admumpln/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="/admumpln/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="/admumpln/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="/admumpln/assets/crossbrowserjs/html5shiv.js"></script>
  <script src="/admumpln/assets/crossbrowserjs/respond.min.js"></script>
  <script src="/admumpln/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->

<script src="/admumpln/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/admumpln/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="/admumpln/assets/plugins/chart-js/chart.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/admumpln/assets/js/apps.min.js"></script>
<!-- <script src="/admumpln/assets/js/chart-js.demo.min.js"></script> -->

<?php
  //PKL Chart
  $rows = R::find('pkl',"GROUP BY lokasi");
  $col=array();
  $nilai1=array();
  $nilai2=array();
  foreach ($rows as $row) {
    $col[]='"'.$row->lokasi.'"';
    $hitung1=R::count('pkl',"lokasi='$row->lokasi' AND status='OJT'");
    $hitung2=R::count('pkl',"lokasi='$row->lokasi' AND status='PKL'");
    $nilai1[]='"'.$hitung1.'"';
    $nilai2[]='"'.$hitung2.'"';
  }
  $kol=implode(",",$col);
  $kol=substr($kol,1,-1);

  $val1=implode(",",$nilai1);
  $val1=substr($val1,1,-1);
  $val2=implode(",",$nilai2);
  $val2=substr($val2,1,-1);
?>
<script>
var white = "rgba(255,255,255,1.0)";
var fillBlack = "rgba(45, 53, 60, 0.6)";
var fillBlackLight = "rgba(45, 53, 60, 0.2)";
var strokeBlack = "rgba(45, 53, 60, 0.8)";
var highlightFillBlack = "rgba(45, 53, 60, 0.8)";
var highlightStrokeBlack = "rgba(45, 53, 60, 1)";
var fillBlue = "rgba(52, 143, 226, 0.6)";
var fillBlueLight = "rgba(52, 143, 226, 0.2)";
var strokeBlue = "rgba(52, 143, 226, 0.8)";
var highlightFillBlue = "rgba(52, 143, 226, 0.8)";
var highlightStrokeBlue = "rgba(52, 143, 226, 1)";
var fillGrey = "rgba(182, 194, 201, 0.6)";
var fillGreyLight = "rgba(182, 194, 201, 0.2)";
var strokeGrey = "rgba(182, 194, 201, 0.8)";
var highlightFillGrey = "rgba(182, 194, 201, 0.8)";
var highlightStrokeGrey = "rgba(182, 194, 201, 1)";
var fillGreen = "rgba(0, 172, 172, 0.6)";
var fillGreenLight = "rgba(0, 172, 172, 0.2)";
var strokeGreen = "rgba(0, 172, 172, 0.8)";
var highlightFillGreen = "rgba(0, 172, 172, 0.8)";
var highlightStrokeGreen = "rgba(0, 172, 172, 1)";
var fillPurple = "rgba(114, 124, 182, 0.6)";
var fillPurpleLight = "rgba(114, 124, 182, 0.2)";
var strokePurple = "rgba(114, 124, 182, 0.8)";
var highlightFillPurple = "rgba(114, 124, 182, 0.8)";
var highlightStrokePurple = "rgba(114, 124, 182, 1)";
var randomScalingFactor = function() {
    return Math.round(Math.random() * 100)
};

// var kolom = "<?php echo $kol; ?>";
var barChartData = {
    labels: ["<?php echo $kol; ?>"],
    datasets: [{
        label: "My First dataset",
        fillColor: highlightFillPurple,
        strokeColor: highlightStrokePurple,
        highlightFill: highlightFillPurple,
        highlightStroke: highlightStrokePurple,
        data: ["<?php echo $val1; ?>"]
    }, {
        label: "My First dataset",
        fillColor: highlightFillBlue,
        strokeColor: highlightStrokeBlue,
        highlightFill: highlightFillBlue,
        highlightStroke: highlightStrokeBlue,
        data: ["<?php echo $val2; ?>"]
    }]
};
Chart.defaults.global = {
    animation: true,
    animationSteps: 60,
    animationEasing: "easeOutQuart",
    showScale: true,
    scaleOverride: false,
    scaleSteps: null,
    scaleStepWidth: null,
    scaleStartValue: null,
    scaleLineColor: "rgba(0,0,0,.1)",
    scaleLineWidth: 1,
    scaleShowLabels: true,
    scaleLabel: "<%=value%>",
    scaleIntegersOnly: true,
    scaleBeginAtZero: false,
    scaleFontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", "Arial", sans-serif',
    scaleFontSize: 12,
    scaleFontStyle: "normal",
    scaleFontColor: "#707478",
    responsive: true,
    maintainAspectRatio: true,
    showTooltips: true,
    customTooltips: false,
    tooltipEvents: ["mousemove", "touchstart", "touchmove"],
    tooltipFillColor: "rgba(0,0,0,0.8)",
    tooltipFontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", "Arial", sans-serif',
    tooltipFontSize: 12,
    tooltipFontStyle: "normal",
    tooltipFontColor: "#ccc",
    tooltipTitleFontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", "Arial", sans-serif',
    tooltipTitleFontSize: 12,
    tooltipTitleFontStyle: "bold",
    tooltipTitleFontColor: "#fff",
    tooltipYPadding: 10,
    tooltipXPadding: 10,
    tooltipCaretSize: 8,
    tooltipCornerRadius: 3,
    tooltipXOffset: 10,
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
    multiTooltipTemplate: "<%= value %>",
    onAnimationProgress: function() {},
    onAnimationComplete: function() {}
};
var handleGenerateGraph = function(e) {

    var r = document.getElementById("bar-chart").getContext("2d");
    var i = (new Chart(r)).Bar(barChartData, {
        animation: e
    });

};
var handleChartJs = function() {
    $(window).load(function() {
        handleGenerateGraph(true)
    });
    $(window).resize(function() {
        handleGenerateGraph()
    })
};
var ChartJs = function() {
    "use strict";
    return {
        init: function() {
            handleChartJs()
        }
    }
}()
</script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
  $(document).ready(function() {
    App.init();
    ChartJs.init();
  });
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','/admumpln/assets/js/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');
</script>
