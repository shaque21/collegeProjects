<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-globe  mr-3" aria-hidden="true"></i>ALL USERS <small class="text-secondary">All Users</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-globe  mr-3" aria-hidden="true"></i>All Users</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
			</ol>
		</nav>
		<div class="table-responsive" style="font-size: 14px;">
			<table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Gender</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `users` ORDER BY `id` DESC";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						$i=1;
					?>
					<tr>
						<?php while ($row1 = mysqli_fetch_assoc($result1)) {
						?>
						<td><?php
								if($i < 10){
									$i = '0'.$i;
								}
								echo $i;
						?></td>
						<td><?php echo ucwords($row1['name']); ?></td>
						<td><?php echo $row1['email']; ?></td>
						<td><?php echo $row1['mobile']; ?></td>
						<td><?php echo ucwords($row1['gender']); ?></td>
						<td style="height: 100px; width: 100px;" class="text-center"><img style="width: 80%; height: 80%;" src="../upload/<?php echo $row1['image']; ?>" alt=""></td>
						<td class="text-center">
							
							<a style="font-size: 12px;" href="delete_user.php?id=<?php echo base64_encode($row1['id']); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs mt-1"><i class="far fa-trash-alt mr-2" aria-hidden="true"></i> Delete</a>
						</td>
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		</div>
	</div>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
	return confirm('Are you sure?');
	}
	</script>
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>
<!-- main content end -->
<?php require("footer.php"); ?>