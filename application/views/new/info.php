<!DOCTYPE html>
<html>
<?php $this->load->view("partial/head.php") ?>

<div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="admin">Home</a>
              </li>
              <li class="breadcrumb-item active">Tambah Pengumuman</li>
            </ol>
            <form method="POST" action="Info/add" enctype="multipart/form-data" class="col-md-12">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="judul berita">Judul Pengumuman</label>
                    <input value="" type="text" class="form-control" name="judul">
                  </div>
                  <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea name="isi" rows="4" cols="50" class="form-control" name="isi"></textarea>                    
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