<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="Home">Home</a>
		</li>
		<li class="breadcrumb-item active">Data Kelas</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
		Data Kelas</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Kelas</th>
							<th>Nama Kelas</th>                     
						</tr>
					</thead>
					<?php foreach($kelas as $kls) : ?>
						<tbody>
							
							<tr>
								<td><?php echo $kls->ID_KELAS ?></td>
								<td><?php echo $kls->NAMA_KELAS ?></td>

							</tr>

						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"></div>
	</div>

	<p class="small text-center text-muted my-5">
		<em></em>
	</p>

</div>

<?php $this->load->view("partial/foot.php") ?>
</html>