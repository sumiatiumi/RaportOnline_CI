<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="Home">Home</a>
		</li>
		<li class="breadcrumb-item active">Absensi</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
		Data Absensi</div>

		<div class="container mt-3">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						Pilih Tanggal : <input type="date" class="form-control" name="ajax" id="ajax">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						Pilih Kelas : <select class="form-control" name="kelas" id="kelas">                      
							<option>--Kelas--</option>
							
							<option value=""></option>
							
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<input type = "button" onclick = "ajaxFunction()" class="btn btn-secondary mt-4" value ="Filter"/>
				</div>
				<div class="col-md-3">
					<a href="New/Absensi">
						<button name="tambah" type="button" class="btn btn-primary float-right mr-3 mt-4">+ Tambah Data</button></a>
					</div>
				</div>                  
			</div>
			
			<div class="card-body">
				<div class="table-responsive" id="txtHint">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>

								<th>Nama Santri</th>                          
								<th>Subuh</th>
								<th>Maghrib</th>
								<th>Isyak</th>
								<th>Tanggal</th>
								<th>Semester</th>                          
								<th>Tahun Ajaran</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach($absensi as $a) : ?>
								<tr>
									<td><?php echo $a->NAMA_SISWA?></td>
									<td><?php echo $a->SUBUH?></td>
									<td><?php echo $a->MAGHRIB?></td>
									<td><?php echo $a->ISYAK?></td>
									<td><?php echo $a->TANGGAL?></td>
									<td><?php echo $a->SEMESTER?></td>
									<td><?php echo $a->THN_AJARAN?></td>
									<td>
										<a href="" class="btn btn-info">Ubah</a>
										<a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('Absensi/delete/'.$a->ID_ABSEN) ?>" class="btn btn-danger" >Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="card-footer small text-muted">
			</div>

			<p class="small text-center text-muted my-5">
				<em></em>
			</p>
		<p class="small text-center text-muted my-5">
			<em></em> 
		</p>

		</div>

		<?php $this->load->view("partial/foot.php") ?>
		</html>