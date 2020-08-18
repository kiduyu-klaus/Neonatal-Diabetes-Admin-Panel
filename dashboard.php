<?php
include('include/header.php');
include('include/config.php');
include('include/checklogin.php');

$qry_tips="SELECT COUNT(*) as num FROM neonatal_tips";
$total_tips= mysqli_fetch_array(mysqli_query($mysqli,$qry_tips));
$total_tips = $total_tips['num'];

$qry_herbs="SELECT COUNT(*) as num FROM neonatal_consultant";
$total_herbs = mysqli_fetch_array(mysqli_query($mysqli,$qry_herbs));
$total_herbs = $total_herbs['num'];

?>

<div class="container-fluid">
<h2 class="page-title">Dashboard</h2>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Doctors</span>
					<span class="info-box-number"><?php echo $total_herbs;?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-success"><i class="fas fa-seedling"></i></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Tips</span>
					<span class="info-box-number"><?php echo $total_tips;?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Patients</span>
					<span class="info-box-number">120</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Testimonies</span>
					<span class="info-box-number">56</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
</div>



<?php
include('include/footer.php');
?>