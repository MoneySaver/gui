<?php
$this->pageTitle=Yii::app()->name;
// energy price
$price=Yii::app()->params["price"];
$money=$energy * $price;
?>
<div class="row" style="margin-top: 20px;">
    <div class="span6">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="logo">
    </div>
    <div class="span4">
        <h1>Energy and Temperature monitor</h1>
    </div>
    <div class="span2">
        <h3 class="pull-right">kWh - <?php echo $price; ?> €</h3>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="span3">
	<div class="hero-unit">
		<h1 id="power"><?php echo round($power); ?></h1>
	<p><small>Current power, W</small></p>
	</div>
</div>
<div class="span3">
	<div class="hero-unit">
		<h1 id="energy"><?php echo round($energy*720); ?></h1>
	<p><small>Monthly energy, kWh</small></p>
	</div>
</div>
<div class="span3">
    <div class="hero-unit">
        <h1 id="temp"><?php echo round($temp); ?></h1>
    <p><small>Temperature, °C</small></p>
    </div>
</div>
<div class="span3">
	<div class="hero-unit">
		<h1 id="money"><?php echo round($money*720); ?></h1>
	<p><small>Monthly bill, €</small></p>
	</div>
</div>
</div>
<script type="text/javascript">
var i = setInterval(function () {
        $.ajax( {
        	url:"<?php echo Yii::app()->request->baseUrl; ?>/api/sync",
    		dataType: "json",
            success: function (json) {
                // progress from 1-100
                $("#power").text(json.power);
                $("#energy").text(json.energy);
                $("#money").text(json.money);
                $("#temp").text(json.temp);            
            },

            error: function (){
                // on error, stop execution
                clearInterval(i);
            }
        });
    }, 5000);
/*function displayNumbers() {
    alert("s");
    $.ajax({
    	url:"/api/sync",
    	dataType: "json",
    	success:function(result){

    		//$("#power").html(result.power);
    	}
    });
}

$(document).ready(function() {
    setInterval('displayNumbers', 1000);
})*/
</script>