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
				<td><input type="hidden" name="no[]" value="<?php echo $row->NO_INDUK?>"><?php echo $row->NAMA_SISWA?></td>                                     
				<td>
					<div class="form-group">                            
						<input value=""  type="number" min="0" max="100" class="form-control" name="nilai[]">      
					</div>
				</td>               
			</tr>
		<?php endforeach; ?>
		
	</tbody>
</table> 