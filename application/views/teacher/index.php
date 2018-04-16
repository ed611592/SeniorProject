<html>
<head>
<title> Google chart in CodeIgniter </title>

<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>js



<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
			url : "<?php echo base_url().'teacher/data'; ?>",
			dataType : "JSON",
			success : function(result){
				google.charts.load('current', {
					'packages' : [ 'corechart']
				});
				google.charts.setOnLoadCallback(function(){
					drawChart(result);
				});
			}

	});

		function drawChart(result){
			var data = new google.visualization.DataTable();
			data.addColumn('number', 'Q_ID');
			data.addColumn('number', 'Student_Answer');
			var dataArray = [];

			$.each(result, function(i, obj){
				data.Array.push([obj.Q_ID, parseInt(obj.Student_Answer)]);
			});

			data.addRows(dataArray);

			var piechart_options = {
				title: 'Pie Chart: How much Products Sold By Last Night',
				width : 400,
				height : 300
			};

			var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
			piechart.draw(data, piechart_options);

			var barchart_options = {
				title : 'Barchart: How Much Products Sold By Last Night',
				width: 400,
				height: 300,
				legend: 'none'
			};

			var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
			barchart.draw(data, barchart_options);

		}
		

</script>

</head>

<body>
	<table class = "columns">
		<tr>
			<td>
				<div id="piechart_div" style = "border: 1px solid #ccc"></div>
			</td>
			<td>
				<div id = "barchart_div" style = "border: 1px solid #ccc"></div>

			</td>
		</tr>
	</table>

</body>
</html>	