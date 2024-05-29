<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agenda BPKD | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Agenda BPKD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin BPKD</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="./index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
            // Mengambil data dari database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agenda_db";

            // Membuat koneksi
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil jumlah per kategori
            $sql = "SELECT kategori, COUNT(*) AS jumlah FROM events Where kategori='agenda' AND DATE(event_datetime) = CURDATE()";
            $result = $conn->query($sql);

            // Memeriksa apakah ada data yang diambil dari database
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<h3>" . $row["jumlah"] . "</h3>";
                    echo "<p>Jumlah Agenda Hari Ini </p>";
                }
            } else {
                echo "<h3>0</h3>";
                echo "<p>No data available</p>";
            }
            $conn->close();
            ?>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div></br>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
            // Mengambil data dari database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agenda_db";

            // Membuat koneksi
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil jumlah per kategori
            $sql = "SELECT kategori, COUNT(*) AS jumlah FROM events Where kategori='ulang_tahun' AND DATE(event_datetime) = CURDATE()";
            $result = $conn->query($sql);

            // Memeriksa apakah ada data yang diambil dari database
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<h3>" . $row["jumlah"] . "</h3>";
                    echo "<p>Jumlah Yang Ulang Tahun <br>Hari Ini </p>";
                }
            } else {
                echo "<h3>0</h3>";
                echo "<p>No data available</p>";
            }
            $conn->close();
            ?>
              </div>
              <div class="icon">
              <i class="fas fa-gift"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3 id="clock"></h3>
              <p> Waktu Saat Ini </p></br>
              
<script>
// Fungsi untuk mengupdate waktu secara live
function updateClock() {
    var now = new Date(); // Mendapatkan waktu saat ini
    var options = {timeZone: 'Asia/Jakarta', hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit'}; // Mengatur zona waktu ke Waktu Indonesia Barat dan format 24 jam
    var formattedTime = now.toLocaleTimeString('id-ID', options); // Format waktu dalam zona waktu tertentu
    document.getElementById('clock').textContent = formattedTime; // Menampilkan waktu dalam elemen dengan ID 'clock'
}

// Panggil fungsi updateClock setiap detik
setInterval(updateClock, 1000);
</script>
              </div>
              <div class="icon">
              <i class="far fa-clock"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
            <div class="card w-200">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1 p-0"></i>
                  Agenda Hari Ini
                </h3>

                <!-- <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body " id="event_list">
                <ul class="todo-list" data-widget="todo-list">
                <?php
// Mengambil data dari database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari database
$sql = "SELECT * FROM events WHERE DATE(event_datetime) = CURDATE() and kategori='Agenda'";
$result = $conn->query($sql);
$checkboxChecked = ''; // Mendefinisikan variabel di luar loop
// Memeriksa apakah ada data yang diambil dari database
if ($result->num_rows > 0) {
  // Output data dari setiap baris
  while($row = $result->fetch_assoc()) {
      $eventDatetime = new DateTime($row["event_datetime"]);
      // Menentukan waktu 30 menit sebelum acara
      $notifyTime = clone $eventDatetime;
      $notifyTime->sub(new DateInterval('PT30M'));
      $now = new DateTime();
      // Memeriksa apakah waktu notifikasi sudah terlewati
      if ($notifyTime > $now) {
          // Hitung sisa waktu dari waktu sekarang hingga waktu acara
          $timeUntilEvent = $now->diff($eventDatetime);
          // Tampilkan sisa waktu hanya jika acara masih akan datang
          if ($timeUntilEvent ->invert == 0) {
              echo '<li>';
              echo '<span class="handle">';
              echo '<i class="fas fa-ellipsis-v"></i>';
              echo '<i class="fas fa-ellipsis-v"></i>';
              echo '</span>';
              echo '<div class="icheck-primary d-inline ml-2">';
              echo '<input type="checkbox" value="" name="todo1" id="todoCheck1" ' . $checkboxChecked . '>'; // Menambahkan atribut checked jika waktu acara sudah lewat
              echo '<label for="todoCheck1"></label>';
              echo '</div>';
              echo '<span class="text">' . $row["event_name"] . '</span>';
              // Tampilkan sisa waktu dalam format yang sesuai
             // Hitung sisa waktu hingga acara dimulai
$timeUntilEventString = '';
if ($timeUntilEvent->invert == 0) {
    $hours = $timeUntilEvent->h;
    $minutes = $timeUntilEvent->i;
    
    // Konversi jam dan menit menjadi total menit
    $totalMinutes = $hours * 60 + $minutes;
    
    if ($totalMinutes >= 60) {
        // Jika sisa waktu lebih dari atau sama dengan satu jam, tampilkan dalam format jam dan menit
        $timeUntilEventString = $timeUntilEvent->format('%h hours %i minutes');
    } else {
        // Jika sisa waktu kurang dari satu jam, tampilkan hanya dalam menit
        $timeUntilEventString = $totalMinutes . ' minutes';
    }
} else {
    $timeUntilEventString = "Acara sudah berlangsung";
}

// Tampilkan sisa waktu dalam format yang sesuai
echo '<small class="badge badge-danger"><i class="far fa-clock"></i> <span id="countdown-' . $row["id"] . '">' . $timeUntilEventString . '</span></small>';


              // Tampilkan tanggal acara
              echo '<small class="badge badge-info"><i class="far fa-calendar"></i> ' . $eventDatetime->format('Y-m-d H:i') . '</small>';
              echo '<div class="tools">';
              // echo '<i class="fas fa-edit"></i>';
              // echo '<i class="fas fa-trash-o"></i>';
              echo '</div>';
              echo '</li>';
              // Jalankan ResponsiveVoice 30 menit sebelum acara
              $responsiveVoiceTime = $notifyTime->format('Y-m-d H:i:s');
              echo '<script>';
              echo 'var countdown' . $row["id"] . ' = document.getElementById("countdown-' . $row["id"] . '");';
              echo 'function updateCountdown' . $row["id"] . '() {';
              echo 'var now = new Date();';
              echo 'var timeUntilEvent = new Date("' . $eventDatetime->format('Y-m-d H:i:s') . '") - now;';
              echo 'if (timeUntilEvent > 0) {';
              echo 'var hours = Math.floor(timeUntilEvent / (1000 * 60 * 60));';
              echo 'var minutes = Math.floor((timeUntilEvent % (1000 * 60 * 60)) / (1000 * 60));';
              echo 'var seconds = Math.floor((timeUntilEvent % (1000 * 60)) / 1000);';
              echo 'countdown' . $row["id"] . '.innerHTML = hours + " hours " + minutes + " minutes " + seconds + " seconds";';
              echo '} else {';
              echo 'countdown' . $row["id"] . '.innerHTML = "Acara sudah berlangsung";';
              echo '}';
              echo '}';
              echo 'updateCountdown' . $row["id"] . '();';
              echo 'setInterval(updateCountdown' . $row["id"] . ', 1000);';
              echo '</script>';
              echo '<script>';
              echo 'setTimeout(function() {';
              echo 'responsiveVoice.speak("30 menit lagi menuju acara, ' . $row["event_name"] . ',Di hadiri Oleh,' . $row["event_person"] . ',berlokasi di' . $row["event_lokasi"] . ',Mohon Di Persiapkan!", "Indonesian Female",{rate: 0.8,';
                echo 'onend: function() {';
                echo 'var audio = new Audio("http://localhost/agenda/audio/tingtung.mp3");'; // Ganti dengan lokasi file audio Anda
                echo 'audio.play();'; // Memainkan audio
                echo '}';
                echo '});';
                echo '}, new Date("' . $responsiveVoiceTime . '") - Date.now());';
                echo '</script>';
                echo '<script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>';
          }
      }
  }
} else {
  echo "0 hasil";
}
$conn->close();
?>


                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAgendaModal">
  Tambah Agenda
</button>
  </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1 p-0"></i>
                  Ulang Tahun Hari Ini
                </h3>

                <!-- <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="event_list">
                <ul class="todo-list" data-widget="todo-list">
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari database
$sql = "SELECT * FROM events WHERE DATE(event_datetime) = CURDATE() AND kategori='Ulang Tahun'";
$result = $conn->query($sql);
$checkboxChecked = ''; // Mendefinisikan variabel di luar loop

// Memeriksa apakah ada data yang diambil dari database
if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        $eventDatetime = new DateTime($row["event_datetime"]);
        // Menentukan waktu 30 menit sebelum acara
        $notifyTime = clone $eventDatetime;
        $notifyTime->sub(new DateInterval('PT30M'));
        $now = new DateTime();
        // Memeriksa apakah waktu notifikasi sudah terlewati
        if ($notifyTime > $now) {
            // Hitung sisa waktu dari waktu sekarang hingga waktu acara
            $timeUntilEvent = $now->diff($eventDatetime);
            // Tampilkan sisa waktu hanya jika acara masih akan datang
            if ($timeUntilEvent->invert == 0) {
                echo '<li>';
                echo '<span class="handle">';
                echo '<i class="fas fa-ellipsis-v"></i>';
                echo '<i class="fas fa-ellipsis-v"></i>';
                echo '</span>';
                echo '<div class="icheck-primary d-inline ml-2">';
                echo '<input type="checkbox" value="" name="todo1" id="todoCheck1" ' . $checkboxChecked . '>'; // Menambahkan atribut checked jika waktu acara sudah lewat
                echo '<label for="todoCheck1"></label>';
                echo '</div>';
                echo '<span class="text">' . $row["event_name"] . '</span>';
                // Tampilkan sisa waktu dalam format yang sesuai
                // echo '<small class="badge badge-danger"><i class="far fa-clock"></i> ' . $timeUntilEvent->format(' %i minutes') . '</small>';
                // Tampilkan tanggal acara
                echo '<small class="badge badge-info"><i class="far fa-calendar"></i> ' . $eventDatetime->format('Y-m-d H:i') . '</small>';
                echo '<div class="tools">';
                echo '<i class="fas fa-edit"></i>';
                echo '<i class="fas fa-trash-o"></i>';
                echo '</div>';
                echo '</li>';

                // Jalankan ResponsiveVoice 30 menit sebelum acara
                $responsiveVoiceTime = $notifyTime->format('Y-m-d H:i:s');
                echo '<script>';
                echo 'setTimeout(function() {';
                echo 'responsiveVoice.speak("Hari ini ada yang ulang tahun nih, ' . $row["event_name"] . ', selamat ya!", "Indonesian Female", {rate: 0.8,';
                echo 'onend: function() {';
                echo 'var audio = new Audio("http://localhost/agenda/audio/musik.mp3");'; // Ganti dengan lokasi file audio Anda
                echo 'audio.play();'; // Memainkan audio
                echo '}';
                echo '});';
                echo '}, new Date("' . $responsiveVoiceTime . '") - Date.now());';
                echo '</script>';
                echo '<script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>';
            }
        }
    }
} else {
    echo "0 hasil";
}
$conn->close();
?>


                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUltahModal">
  Tambah Ulang Tahun
</button>
  </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
            
            <!-- /.card -->

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  

    <!-- Modal -->
    <div class="modal fade" id="tambahAgendaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTambahAgenda">
          <div class="form-group">
            <label for="eventName">Nama Kegiatan</label>
            <input type="text" class="form-control" id="eventName" name="eventName" required>
          </div>
          <div class="form-group">
            <label for="eventPerson">Yang Menghadiri</label>
            <input type="text" class="form-control" id="eventPerson" name="eventPerson" required>
          </div>
          <div class="form-group">
            <label for="eventLokasi">Lokasi</label>
            <input type="text" class="form-control" id="eventLokasi" name="eventLokasi" required>
          </div>
          <div class="form-group">
            <label for="eventName">Kategori</label>
            <input type="text" class="form-control" id="eventKategori" name="eventKategori" value="Agenda" disabled>
          </div>
          <!-- <div class="form-group">
            <label for="eventKategori">Kategori</label>
            <select class="form-control" id="eventKategori" name="eventKategori" required>
              <option value="">Pilih Kategori</option>
              <option value="agenda">Agenda</option>
              <option value="ulang_tahun">Ulang Tahun</option>
              
            </select>
          </div> -->
          <div class="form-group">
            <label for="eventDatetime">Waktu Acara</label>
            <input type="datetime-local" class="form-control" id="eventDatetime" name="eventDatetime" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="tambahAgenda()">Simpan</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="tambahUltahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Ulang Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTambahAgenda">
          <div class="form-group">
            <label for="eventName">Nama yg Ulang Tahun</label>
            <input type="text" class="form-control" id="eventName" name="eventName" required>
          </div>
          <div class="form-group">
            <label for="eventName">Kategori</label>
            <input type="text" class="form-control" id="eventKategori" name="eventKategori" value="Ulang Tahun" disabled>
          </div>
          <!-- <div class="form-group">
            <label for="eventKategori">Kategori</label>
            <select class="form-control" id="eventKategori" name="eventKategori" required>
              <option value="">Pilih Kategori</option>
              <option value="agenda">Agenda</option>
              <option value="ulang_tahun">Ulang Tahun</option>
              
            </select>
          </div> -->
          <div class="form-group">
            <label for="eventDatetime">Waktu Acara</label>
            <input type="datetime-local" class="form-control" id="eventDatetime" name="eventDatetime" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="tambahUltah()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script>
  function tambahAgenda() {
  // Ambil nilai dari form
  var eventName = document.getElementById('eventName').value;
  var eventPerson = document.getElementById('eventPerson').value;
  var eventLokasi = document.getElementById('eventLokasi').value;
  var eventKategori = document.getElementById('eventKategori').value;
  var eventDatetime = document.getElementById('eventDatetime').value;

  // Kirim data ke server melalui AJAX atau cara lainnya
  // Misalnya, Anda bisa menggunakan jQuery AJAX
  $.ajax({
    url: 'manage_events.php', // Ganti dengan URL yang benar
    type: 'POST',
    data: { eventName: eventName,eventPerson: eventPerson,eventLokasi: eventLokasi, eventKategori: eventKategori, eventDatetime: eventDatetime }, // Ganti dengan data yang benar sesuai form Anda
    success: function(response) {
      // Tindakan setelah data berhasil ditambahkan, misalnya menampilkan pesan sukses atau menyegarkan halaman
      alert('Agenda berhasil ditambahkan!');
      $('#tambahAgendaModal').modal('hide'); // Sembunyikan modal setelah data ditambahkan
      location.reload(); // Segarkan halaman untuk memperbarui data
    },
    error: function(xhr, status, error) {
      // Tindakan jika terjadi kesalahan, misalnya menampilkan pesan kesalahan
      alert('Terjadi kesalahan: ' + error);
    }
  });
}
</script>
<script>
  function tambahUltah() {
  // Ambil nilai dari form
  var eventName = document.getElementById('eventName').value;
  var eventKategori = document.getElementById('eventKategori').value;
  var eventDatetime = document.getElementById('eventDatetime').value;

  // Kirim data ke server melalui AJAX atau cara lainnya
  // Misalnya, Anda bisa menggunakan jQuery AJAX
  $.ajax({
    url: 'manage_events.php', // Ganti dengan URL yang benar
    type: 'POST',
    data: { eventName: eventName, eventKategori: eventKategori, eventDatetime: eventDatetime }, // Ganti dengan data yang benar sesuai form Anda
    success: function(response) {
      // Tindakan setelah data berhasil ditambahkan, misalnya menampilkan pesan sukses atau menyegarkan halaman
      alert('Data Ulang Tahun berhasil ditambahkan!');
      $('#tambahUltahModal').modal('hide'); // Sembunyikan modal setelah data ditambahkan
      location.reload(); // Segarkan halaman untuk memperbarui data
    },
    error: function(xhr, status, error) {
      // Tindakan jika terjadi kesalahan, misalnya menampilkan pesan kesalahan
      alert('Terjadi kesalahan: ' + error);
    }
  });
}
</script>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#event_name').val() == "")  
  {  
   alert("Mohon Isi Nama Agenda ");  
  }  
  else if($('#event_datetime').val() == '')  
  {  
   alert("Mohon Isi tanggal Agenda");  
  }  
  
  else 
  {  
   $.ajax({  
    url:"manage_events.php",  
    method:"POST",  
    data:$('#eventForm').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#event_list').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert
</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>
<script src="script.js"></script>
</body>
</html>
