
<!-- Student Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/UserCss.css" rel="stylesheet">

<!-- Student Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/TeacherHomeCss.css" rel="stylesheet">


<body id="teacher">


	<div class = "container">
		<div class="home">
			<center>
			<h1>Hello Teacher!</h1>
			<p class="lead">Welcome to your dashboard </p>
			</center>
		</div>


		<center>
			<div id = "sidebar" >
				<ul class ="list-group">
					<li class ="list-group-item"><a type="button" class="btn btn-lg btn-success" href ="<?php echo base_url();?>student/register">Add Students</a></li>
					<li class ="list-group-item"><button type="button" class="btn btn-lg btn-success">View Results</button></li>
					<li class ="list-group-item"><button type="button" class="btn btn-lg btn-success">Add Survey</button></li>
				</ul>
			</div>
		</center>

		<div class ="containter" id = "studentTable">
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
					<?php foreach($students as $student) : ?>
						<tr>
							<th scope="row"><?php echo $student['S_ID'] ?></th>
							<td><?php echo $student['fname'] ?></td>
							<td><?php echo $student['lname'] ?></td>
							<td> <?php echo $student['AVG_Grade'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>