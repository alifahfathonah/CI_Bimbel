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
        <h1 class="mt-4">Pengajar</h1>
        <form action="#" method="post">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Nilai Baru</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <div class="card-body"> 
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control">
                      <option disabled selected>-- Pilih --</option>
                      <?php foreach ($mapel_rows as $row) {
                        ?>
                      <option value="<?php echo $row->id_mapel; ?>"><?php echo $row->nama_mapel; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <?php echo form_error('mapel'); ?>
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <select name="id_siswa" class="form-control">
                      <option disabled selected>-- Pilih --</option>
                      <?php foreach ($siswa_rows as $row) {
                        ?>
                      <option value="<?php echo $row->id_siswa; ?>"><?php echo $row->nama_siswa; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <?php echo form_error('siswa'); ?>
                  <div class="form-group">
                    <label>Niai</label>
                    <input type="text" class="form-control" name="nilai" placeholder="Masukkan Nilai">
                  </div>
                  <?php echo form_error('nilai'); ?>
                  <div class="card-footer">
                    <button type="submit" name="nilai_submit" class="btn btn-primary">Tambah baru</button>
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
