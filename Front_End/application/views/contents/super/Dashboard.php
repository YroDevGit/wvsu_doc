<?php
 
$dataPoints = array( 
	array("label"=>"Files", "symbol" => "Files","y"=>50),
	array("label"=>"Views", "symbol" => "Views","y"=>25),
    array("label"=>"Downloads", "symbol" => "Dl","y"=>25),

 
)
 
?>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Dashboard</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a >Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    January 2018
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Export List</a>
                    <a class="dropdown-item" href="#">Policies</a>
                    <a class="dropdown-item" href="#">View Assets</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix progress-box">
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div id="chartContainer"></div>
    </div>
				
				
				
</div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
 window.addEventListener("load", function(){
    var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Files Summary"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
  
 });  
 setTimeout(function(){
    document.querySelectorAll(".canvasjs-chart-canvas").forEach(element => {
    element.style.position = "unset";
}); 
 }, 2000);          
</script>

<style>
    .canvasjs-chart-credit{
        display: none;
    }
    .canvasjs-chart-canvas{
        position: relative;
       
    }
</style>
