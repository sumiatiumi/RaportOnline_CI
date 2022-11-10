<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>

			<th>Nama Santri</th>                          
			<th>Subuh</th>
			<th>Maghrib</th>
			<th>Isyak</th>                        
		</tr>
	</thead>

	<tbody>
		<?php foreach ($santri as $row) : ?>
			<tr>

				<td><input type="hidden" name="no[]" value="<?php echo $row->NO_INDUK ?>"><?php echo $row->NAMA_SISWA ?></td>                          
				<td>
					<div class="form-group">                            
						<select name="subuh[]" class="form-control">
							<option value="Hadir">Hadir</option>
							<option value="Izin">Izin</option>
							<option value="Sakit">Sakit</option>
							<option value="Alfa">Alfa</option>
						</select>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="maghrib[]" class="form-control">
							<option value="Hadir">Hadir</option>
							<option value="Izin">Izin</option>
							<option value="Sakit">Sakit</option>
							<option value="Alfa">Alfa</option>
						</select>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="isyak[]" class="form-control">
							<option value="Hadir">Hadir</option>
							<option value="Izin">Izin</option>
							<option value="Sakit">Sakit</option>
							<option value="Alfa">Alfa</option>
						</select>
					</div>
				</td>                         
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>