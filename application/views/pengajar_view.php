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
        <button type="button" onclick="javascript:top.location.href='pengajar/create'" class="btn btn-primary">Tambah<i class="fa fa-pencil"></i></button>
        <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Nama Pengajar</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Mata Pelajaran</th>
                    <th></th>
                  </tr>
                  <?php
                    foreach ($rows as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row->id_pengajar;?></td>
                    <td><?php echo $row->nama_pengajar;?></td>
                    <td><?php echo $row->jenis_kelamin;?></td>
                    <td><?php echo $row->umur;?></td>
                    <td><?php echo $row->nama_mapel;?></td>
                    <td>
                      <div class="btn-group">
                        <button type="button" onclick="javascript:top.location.href='pengajar/update/<?php echo $row->id_pengajar; ?>'" class="btn btn-warning btn-sm">Edit<i class="fa fa-pencil"></i></button>
                        <button type="button" onclick="javascript:top.location.href='pengajar/delete/<?php echo $row->id_pengajar; ?>'" class="btn btn-danger btn-sm">Hapus<i class="fa fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
        </table>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
