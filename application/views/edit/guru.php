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
  <?php foreach($guru as $row):?>
    <form method="POST" action="<?php echo site_url('Edit/Guru/update') ?>" enctype="multipart/form-data" class="col-md-12">
      <div class="row">
        <div class="col-md-4">                
          <input type="hidden" name="id" value="<?php echo $row->ID_GURU ?>">
          <div class="form-group">
            <label for="">Nama Guru</label>
            <input value="<?php echo $row->NAMA_GURU ?>"  type="text" class="form-control" name="nama">
          </div>

          <div class="form-group">
            <label for="">Tanggal Lahir Guru</label>
            <input value="<?php echo $row->TGL_LAHIR_GURU ?>"  type="date" class="form-control" name="tgl">
          </div>                   

        </div>
        <div class="col-md-4">
         <div class="form-group">
          <label for="">No HP Guru</label>
          <input value="<?php echo $row->NO_HP_GURU ?>"  type="text" class="form-control" name="nomor">
        </div>
        <div class="form-group">
          <label for="">Email Guru</label>
          <input value="<?php echo $row->EMAIL_GURU ?>"  type="text" class="form-control" name="email">
        </div> 
      </div>
    </div>
  <?php endforeach; ?>

  <div class="card-footer small text-mutedtext-center">
    <button name='Simpan Perubahan' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan Perubahan</button> 
  </div>

</form>
<p class="small text-center text-muted my-5">
  <em></em>
</p>

</div>

<?php $this->load->view("partial/foot.php") ?>
</html>