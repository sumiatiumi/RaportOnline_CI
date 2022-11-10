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
	<form method="POST" action="Nilai/add" enctype="multipart/form-data" class="col-md-12">
		<div class="container mt-3"> 
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">         
						Pilih Kelas : <select class="form-control" name="kelas" id="kelas" onchange="showUser(this.value)">
							<option>--Kelas--</option>
							<?php foreach( $kelas as $row) :?>
								<option value="<?php echo $row->ID_KELAS ?>"><?php echo $row->NAMA_KELAS ?></option>
							<?php endforeach; ?>            
						</select> 
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control mt-4" name="guru" id="guru">                      
							<option>--Guru--</option>
							<?php foreach( $guru as $row) :?>
								<option value="<?php echo $row->ID_GURU ?>"><?php echo $row->NAMA_GURU ?></option>
							<?php endforeach; ?>             
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" name="mapel" id="mapel">                      
							<option>--Mata Pelajaran--</option>
							<?php foreach( $mapel as $row) :?>
								<option value="<?php echo $row->KD_MAPEL ?>"><?php echo $row->MAPEL ?></option>
							<?php endforeach; ?>             
						</select>                      
					</div>                                       
				</div>
				<div class="col-md-3">
					<div class="form-group mt-4">                                            
						<select name="tahun" class="form-control">
							<option value="">--Tahun Ajaran--</option>
							<option value="2017/2018">2017/2018</option>
							<option value="2018/2019">2018/2019</option>
							<option value="2019/2020">2019/2020</option>
							<option value="2020/2021">2020/2021</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" name="semester" > 
							<option value="">--Semester--</option>                     
							<option value="ganjil">GANJIL</option>
							<option value="genap">GENAP</option>            
						</select>
					</div>
				</div>
			</div>        
		</div>
		<div class="card-body">
			<div class="table-responsive" id="txtHint">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>

							<th>Nama Santri</th>                         
							<th>Nilai</th>                       
						</tr>
					</thead>

					<tbody>
						<?php foreach($santri as $row) : ?>
							<tr>
								<td><input type="hidden" name="no[]" value=""><?php echo $row->NAMA_SISWA?></td>                                     
								<td>
									<div class="form-group">                            
										<input value=""  type="number" min="0" max="100" class="form-control" name="nilai[]">      
									</div>
								</td>               
							</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>               
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
		xmlhttp.open("GET","<?php echo site_url('New/Nilai/GetDataKelas') ?>?kelas="+str,true);
		xmlhttp.send();
	}
</script>

<?php $this->load->view("partial/foot.php") ?>
</html>