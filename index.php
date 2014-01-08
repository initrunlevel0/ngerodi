<!doctype html>

<html>
  
  <head>
    <title>Ngerodi</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <div class="container">
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Ngerodi <small>MPI Based Grid Worker</small></a>
          </div>
        </div>
      </div>
      <h2 class="page-header">Selamat Datang di Ngerodi</h2>
      <div class="row">
        <div class="col-md-8">
          Ngerodi adalah sebuah fasilitas eksekusi program komputer paralel berbasiskan teknologi Message Passing Interface (MPI) yang dijalankan di dalam sistem Komputasi Grid milik Laboratorium Komputasi Berbasis Jaringan, Jurusan Teknik Informatika, Institut Teknologi Sepuluh Nopember. Melalui fasilitas ini, Anda dapat mengeksekusi program paralel berbasis bahasa pemrograman C + MPI yang Anda buat melalui fasilitas grid kami dengan dua syarat : kode sumber dan masukan kasus ujinya.
        <?php
        	mysql_connect("localhost", "root", "root");
		mysql_select_db("ngerodi");
		$result = mysql_query("SELECT * FROM data");
        ?>
        <h3>Daftar Eksekusi</h3>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Program</th>
              <th>Status</th>
              <th>Jumlah Prosesor</th>
              <th>Hasil Eksekusi</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysql_fetch_array($result)) { ?>
            	<tr>
            		<td><?php echo $row['id']; ?></td>
            		<td><?php echo $row['nama']; ?></td>
            		<td><?php if($row['status'] == 1) echo 'Tereksekusi'; else echo 'Memproses'; ?></td>
            		<td><?php echo $row['prosesor']; ?></td>
            		<td><a href="uploads/<?php echo $row['id']; ?>.result">Unduh</a></td>
            	</tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
        <div class="col-md-4">
          <h3>Unggah Program</h3>
          <form action="proses.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">Nama Program</label>
              <div class="controls"><input type="text" class="form-control" name="nama"></div>
            </div>
            <div class="form-group">
              <label class="control-label">Jumlah Prosesor</label>
              <div class="controls"><input type="number" class="form-control" name="prosesor" min="1" max="10" step="1" value="1"></div>
            </div>
            <div class="form-group">
              <label class="control-label">Kode Sumber (C + MPI (mpi.h))</label>
              <div class="controls"><input type="file" class="form-control" name="kode_sumber"></div>
            </div>
            <div class="form-group">
              <label class="control-label">Kasus Uji (Berkas Teks stdin)</label>
              <div class="controls"><input type="file" class="form-control" name="kasus_uji"></div>
            </div>
	    <input type="submit" class="btn" value="Proses" />
          </form>
        </div>
      </div>
    </div>
  </body>

</html>
