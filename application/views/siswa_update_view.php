<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('header'); ?>

<body>

  <div class="d-flex" id="wrapper">

  <?php $this->load->view('sidebar'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="<?php base_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Siswa</h1>
        <form action="#" method="post">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Siswa</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label>Id Siswa</label>
                    <input type="text" class="form-control" name="id" readonly value="<?php echo $model->id_siswa ?>">
                  </div>  
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Siswa" value="<?php echo $model->nama_siswa ?>">
                  </div>
                  <div class="form-group">
                  <label>Jenis Kelamin</label><br>
                    <?php if ($model->jenis_kelamin == "L"){
                        ?>
                        <input type="radio" id="age1" name="jenis_kelamin" value="L" checked="true">
                        <label for="age1">L</label>
                        <input type="radio" id="age2" name="jenis_kelamin" value="P">
                        <label for="age2">P</label>
                    <?php
                    } else {
                    ?>
                        <input type="radio" id="age1" name="jenis_kelamin" value="L">
                        <label for="age1">L</label>
                        <input type="radio" id="age2" name="jenis_kelamin" value="P" checked="true">
                        <label for="age2">P</label>
                    <?php }
                    ?>
                  </div>
                  <div class="form-group">
                    <label>Umur</label>
                    <input type="text" class="form-control" name="umur" placeholder="Masukkan umur siswa" value="<?php echo $model->umur ?>">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                      <?php
                        for($i=7; $i<=12; $i++) {
                      ?>
                        <?php
                            if ($i==$model->kelas) {
                        ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php
                            } else {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                            }
                        ?>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sekolah Asal</label>
                    <input type="text" class="form-control" name="sekolah" placeholder="Masukkan nama sekolah" value="<?php echo $model->sekolah_asal ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="siswa_submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
            </form>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('');?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('');?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
