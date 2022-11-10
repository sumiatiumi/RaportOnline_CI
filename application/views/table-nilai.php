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
					<a href="" class="btn btn-info" >Ubah</a>
					<a href="" class="btn btn-danger" >Hapus</a>
				</td>


			</tr>
		<?php endforeach; ?>
	</tbody>
</table>