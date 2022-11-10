<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="Home">Home</a>
		</li>
		<li class="breadcrumb-item active">Data Nilai</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
		Data Nilai</div>
		<div class="container mt-3">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						PILIH MATA PELAJARAN :
						<select class="form-control" name="mapel" id="mapel">                      
							<option>Mata Pelajaran</option>
							<?php foreach($mapel as $m) :?>
								<option value="<?php echo $m->KD_MAPEL?>"><?php echo $m->MAPEL?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						PILIH SEMESTER :
						<select class="form-control" name="semester" id="semester">                      
							<option value="ganjil">GANJIL</option>
							<option value="genap">GENAP</option>            
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						PILIH KELAS :
						<select class="form-control" name="kelas" id="kelas">                      
							<option>--Kelas--</option>
							<?php foreach($kelas as $k) :?>
								<option value="<?php echo $k->ID_KELAS?>"><?php echo $k->NAMA_KELAS?></option>
							<?php endforeach;?>
						</select>
					</div>
					<input type = "button" onclick = "ajaxFunction()" class="btn btn-secondary mt-4" value ="FILTER"/>

				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<a href="New/Nilai">
							<button name="tambah" type="button" class="btn btn-primary  float-right mr-5 mt-5">+ Tambah Data</button></a>
						</div>
					</div>
				</div>
			</div>                           

			<div class="card-body">
				<div class="table-responsive"  id="txtHint">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>

								<th>Nama Guru</th>  
								<th>Nama Santri</th>   
								<th>Mapel</th>   
								<th>Nilai</th>     
								<th>Semester</th>
								<th>Tahun Ajaran</th> 
								<th>Aksi</th>                
							</tr>
						</thead>

						<tbody>
							<?php foreach($nilai as $n) : ?>
								<tr>
									<td><?php echo $n->NAMA_GURU?></td>
									<td><?php echo $n->NAMA_SISWA?></td>
									<td><?php echo $n->MAPEL?></td>
									<td><?php echo $n->NILAI?></td>
									<td><?php echo $n->SEMESTER?></td>
									<td><?php echo $n->THN_AJAR?></td>
									<td>
										<a href="<?php echo base_url('Edit/Nilai') ?>" class="btn btn-info" >Ubah</a>
										<a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('Nilai/delete/'.$n->ID_NILAI) ?>" class="btn btn-danger" >Hapus</a>
									</td>


								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted"></div>
		</div>

		<p class="small text-center text-muted my-5">
			<em></em>
		</p>

	</div>
	<script>
        function ajaxFunction() {
          var mapel = document.getElementById('mapel').value;
          var semester = document.getElementById('semester').value;
          var kelas = document.getElementById('kelas').value;

            //var ajaxRequest;  // The variable that makes Ajax possible!
            var xmlhttp;

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
            xmlhttp.open("GET","<?php echo site_url('Nilai/GetInfo') ?>?mapel="+mapel+"&semester="+semester+"&kelas="+kelas, true);
            xmlhttp.send();
          }
        </script>

	<?php $this->load->view("partial/foot.php") ?>
	</html>