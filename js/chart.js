var chart={
	list:{},
	addPoint: function () {
		
	}
};

function Chartpoint(data){

}
var lastPoint=0;

$(function (){
	$('#graph').highcharts({
				chart: {
					type: 'spline',
					animation: Highcharts.svg, // don't animate in old IE
					marginRight: 10,
					events: {
						load: function() {
		
							// set up the updating of the chart each second
							var series = this.series[0];
							setInterval(function() {
								var x = (new Date()).getTime(), // current time
									y = Math.random();

								$.ajax({
									url:'http://185.20.136.207/gui/api/sync',
									success: function (data) {
										if(lastPoint!==data.date){
											lastPoint=data.date;
											series.addPoint([data.date*1000, data.power], true, true);
										}
									}
								});
								//console.log(data);
								//series.addPoint([x, y], true, true);
							}, 1000);
						}
					}
				},
				title: {
					text: 'Energia graafik'
				},
				xAxis: {
					type: 'datetime',
					tickPixelInterval: 150
				},
				yAxis: {
					title: {
						text: 'KW/h'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				legend: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				series: [{
					name: 'Sensor 1',
					data: (function() {
						// generate an array of random data
						var data = [],
							time = (new Date()).getTime(),
							i;
		
						//for (i = -19; i <= 0; i++) {
							data.push({
								x: time-1000 * 1000,
								y: 0
							});
						//}
						return data;
					})()
				}]
			});
});