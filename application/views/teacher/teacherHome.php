



<!-- Student Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/UserCss.css" rel="stylesheet">

<!-- Student Custom Styles -->
    <link href="<?php echo base_url();?>/assets/css/TeacherHomeCss.css" rel="stylesheet">


<body id="teacher">



<div class="home">
    		<h1>Hello Teacher!</h1>
    		<p class="lead">Welcome to your dashboard </p>
</div>


	<center>
	<p>
        <a type="button" class="btn btn-lg btn-success" href ="<?php echo base_url();?>student/register">Add Students</a>
        <button type="button" class="btn btn-lg btn-success">View Results</button>
        <button type="button" class="btn btn-lg btn-success">Add Survey</button>
      </p>
  </center>
	<div class ="containter">
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID#</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Grade</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td> 90</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td> 76 </td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Larry</td>
				<td>the Bird</td>
				<td> 99</td>
			</tr>
		</tbody>
	</table>
	</div>
</body>