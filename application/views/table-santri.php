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
                  <a href="" class="btn btn-info" >Ubah</a>
                  <a href="" class="btn btn-danger" >Hapus</a>
                </td>
              </tr>

            </tbody>
          <?php endforeach; ?>
        </table>