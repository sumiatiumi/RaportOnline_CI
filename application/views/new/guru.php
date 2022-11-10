<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="admin">Home</a>
		</li>
		<li class="breadcrumb-item active">Tables</li>
	</ol>
	<form method="POST" action="Guru/add" enctype="multipart/form-data" class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="Nama Guru">Nama Guru</label>
					<input value="" type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label for="Tanggal Lahir">Tanggal Lahir</label>
					<input value=""  type="date" class="form-control" name="tgl">
				</div>
				<div class="form-group">
					<label for="Nomor HP">Nomor Hp</label>
					<input value=""  type="text" class="form-control" name="nomor">
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input value=""  type="text" class="form-control" name="email">
				</div>
			</div>
		</div>

		<div class="card-footer small text-mutedtext-center">
			<button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Tambah</button>
		</div>

	</form>
	<p class="small text-center text-muted my-5">
		<em></em>
	</p>

</div>
<!-- /.container-fluid -->

<?php $this->load->view("partial/foot.php") ?>
</html>