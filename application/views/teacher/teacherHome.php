
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
	});
 </script>


<!-- Student Custom Styles -->
<link href="<?php echo base_url();?>/assets/css/teacherHomeCSS.css" rel="stylesheet">


<body id="teacher">




	    <nav id="sidebar" >
	        
	        <!-- Sidebar Header
	        <div class="sidebar-header">
	        	<center>
	            	<a href="#" data-toggle="collapse" aria-expanded="false" id ="sideHead">Chip</a>
	        	</center>
	        </div> -->

			

	        <!-- Sidebar Links -->
	        <ul class ="list-group">
				<li class ="list-group-item"><a href ="<?php echo base_url();?>student/register">Add Students</a></li>
				<li class ="list-group-item"><a href="<?php echo base_url();?>teacher/view/result">View Results</a></li>
			</ul>

	    </nav>

	

	<div class = "container">

		<div class="home">
			<!--Animations-->
			<div id="chipPic"></div>

			<div id = "homeText">
				<h1>Hello Teacher!</h1>
				<p class="lead">Welcome to your dashboard </p>
			</div>
		</div>
		<br>
		<br>
		<br>
		<center>
			<div id = "studentTable">
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
		</center>
	</div>
</body>