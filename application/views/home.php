<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="Home">Home</a>
		</li>
		<li class="breadcrumb-item active">Halaman Admin</li>
	</ol>                    

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-home"></i>
		HALAMAN ADMIN</div>
		<div class="card-body">
			<a href="New/Info">
				<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Pengumuman</button></a>
				<div class="table-responsive mt-5">
					
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Judul</th>
								<th>Isi</th>
								<th>Waktu</th>                        
								<th>Aksi</th>                  
							</tr>
						</thead>
						<?php foreach ($pengumuman as $info) :?>
							<tbody>

								<tr>
									<td><?php echo $info->JUDUL ?></td>
									<td><?php echo $info->ISI ?></td>
									<td><?php echo $info->TIME ?></td>
									<td>
										<a href="" class="btn btn-info" >Ubah</a>
										<a href="" class="btn btn-danger" >Hapus</a>
									</td>


								</tr>

							</tbody>
						<?php endforeach;?>
					</table>

				</div>
			</div>
			<div class="card-footer small text-muted">
			</div>
		</div>
	</div>

	<?php $this->load->view("partial/foot.php") ?>
	</html>