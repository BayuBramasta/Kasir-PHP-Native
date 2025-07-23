  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard3.js"></script> -->
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-rowreorder/js/rowReorder.bootstrap4.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Page specific script -->
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
    // $('.nav-link').click(function(){
    //   $(this).attr('class','nav-link active')
    // });
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "rowReorder": {
          "selector": 'td:nth-child(2)'
        },
        "lengthChange": true,
        'lengthMenu': [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#example2").DataTable({
        "responsive": true,
        "rowReorder": {
          "selector": 'td:nth-child(2)'
        },
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print", "colvis" ]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#example3").DataTable({
        "responsive": true,
        "rowReorder": {
          "selector": 'td:nth-child(2)'
        },
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#example4").DataTable({
        "responsive": true,
        "rowReorder": {
          "selector": 'td:nth-child(2)'
        },
        "lengthChange": true,
        'lengthMenu': [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        "autoWidth": false,
      }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    });
    $('.btnDel').click(function() {
      const id = $(this).attr('data-id');
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = ("./delete/deleteGudang.php?id=" + id);
        }
      });
    });
    $('.btnDelUsers').click(function() {
      const id = $(this).attr('data-id');
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = ("./delete/deleteUsers.php?id=" + id);
        }
      });
    });
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  </body>

  </html>
  <!-- notification for gudang.php -->
  <?php
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'hapus_berhasil') {
      echo "<script>
            Swal.fire({
              title: 'Data berhasil dihapus!',
              icon: 'success',
              confirmButtonText: 'OK'
            });
          </script>";
    } elseif ($status == 'tambah_berhasil') {
      echo "<script>
            Swal.fire({
              title: 'Data berhasil ditambahkan!',
              icon: 'success',
              confirmButtonText: 'OK'
            });
          </script>";
    } elseif ($status == 'tambah_gagal') {
      echo "<script>
            Swal.fire({
              title: 'Data gagal ditambahkan!',
              text: 'Barcode sudah pernah ditambahkan!',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
    } elseif ($status == 'edit_berhasil') {
      echo "<script>
            Swal.fire({
              title: 'Data berhasil update!',
              icon: 'success',
              confirmButtonText: 'OK'
            });
          </script>";
    } elseif ($status == 'tambahusers_gagal') {
      echo "<script>
            Swal.fire({
              title: 'Username sudah terdaftar!',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
    } elseif ($status == 'editusers_berhasil') {
      echo "<script>
            Swal.fire({
              title: 'Edit berhasil',
              text: 'Silahkan Log Out terlebih dahulu untuk melihat perubahan.',
              icon: 'info',
              confirmButtonText: 'OK'
            });
          </script>";
    } else {
      echo "<script>
            Swal.fire({
              title: 'Operasi gagal!',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
    }
  }
  ?>