<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="Home">Home</a>
		</li>
		<li class="breadcrumb-item active">Data Santri</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>

			Data Santri
		</div>
		<div class="container mt-3">
			
			PILIH KELAS : <select class="custom-select mb-2 w-25" name="kelas" onchange="showUser(this.value)">
				<option>-- Kelas --</option>
				<?php foreach( $kelas as $kls) :?>
					<option value="<?php echo $kls->ID_KELAS ?>"><?php echo $kls->NAMA_KELAS ?></option>
				<?php endforeach; ?>
			</select>

			<a href="New/Santri">
				<button name="tambah" type="button" class="btn btn-primary col-md-2 col-xs-12 float-right mr-5">+ Tambah Data</button></a>
			</div>              
			<div class="card-body">
				<div class="table-responsive" id="txtHint">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No Induk</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th>User</th>
								<th>Alamat</th>
								<th>Guru BK</th>
								<th>Nama Wali</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>Golongan Darah</th>
								<th>No Hp</th>
								<th>Email</th> 
								<th>Angkatan</th>
								<th>Status</th>
								<th>Aksi</th>                    
							</tr>
						</tr>
					</thead>
					<?php foreach($santri as $santri) : ?>
						<tbody>
							<tr>
								<td><?php echo $santri->NO_INDUK ?></td>
								<td><?php echo $santri->NAMA_SISWA ?></td>
								<td><?php echo $santri->NAMA_KELAS ?></td>
								<td><?php echo $santri->USERNAME ?></td>
								<td><?php echo $santri->ALAMAT ?></td>
								<td><?php echo $santri->NAMA_GURU ?></td>
								<td><?php echo $santri->NAMA_WALI ?></td>								
								<td><?php echo $santri->TEMPAT_LAHIR ?></td>
								<td><?php echo $santri->TANGGAL_LAHIR ?></td>
								<td><?php echo $santri->JENIS_KELAMIN ?></td>
								<td><?php echo $santri->GOL_DARAH ?></td>								
								<td><?php echo $santri->HP ?></td>
								<td><?php echo $santri->EMAIL ?></td>
								<td><?php echo $santri->ANGKATAN ?></td>
								<td><?php echo $santri->STATUS ?></td>
								<td>
									<a href="<?php echo base_url('Edit/Santri') ?>" class="btn btn-info" >Ubah</a>
								<a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('Santri/delete/'.$santri->NO_INDUK) ?>" class="btn btn-danger" >Hapus</a>
								</td>
							</tr>

						</tbody>
					<?php endforeach; ?>
				</table>

			</div>
		</div>
		<div class="card-footer small text-muted">
		</div>
	</div>

	<p class="small text-center text-muted my-5">
		<em></em>
	</p>

</div>
<script>

      function showUser(str) {
        if (str=="") {
          document.getElementById("txtHint").innerHTML="";
          return;
        }
        if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        } else { 
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("txtHint").innerHTML=this.responseText;
          }
        }
        xmlhttp.open("GET","<?php echo site_url('Santri/GetDataKelas') ?>?kelas="+str,true);
      
        xmlhttp.send();
      }
    </script>

<?php $this->load->view("partial/foot.php") ?>
</html>