<?php
$this->pageTitle=Yii::app()->name;
// energy price
$price=Yii::app()->params["price"];
$money=$energy * $price;
?>
<div class="row">
<div class="span10">
<h1>Money and Energy monitor</h1>
</div>
<div class="span2">
<h3 class="pull-right">kW/h - <?php echo $price; ?> €</h3>
</div>
</div>
<div class="row">
<div class="span4">
	<div class="hero-unit">
		<h1 id="power"><?php echo $power; ?></h1>
	<p>Power in Watts</p>
	</div>
</div>
<div class="span4">
	<div class="hero-unit">
		<h1 id="energy"><?php echo $energy; ?></h1>
	<p>Energy in kW/h</p>
	</div>
</div>
<div class="span4">
	<div class="hero-unit">
		<h1 id="money"><?php echo $money; ?></h1>
	<p>Money in Euros</p>
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