<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="p-3 text-info-emphasis bg-info-subtle border border-info-subtle rounded-3">

    <h1 class = "text-center">DATA PENDAFTARAN</h1>
    <br><br>
    <a href="santri.php"class="btn btn-secondary">SANTRI</a>
    <a href="test.php"class="btn btn-info">TEST</a>
    <a href="pembayaran.php"class="btn btn-primary">PEMBAYARAN</a>
    <a href="petugas.php"class="btn btn-warning">PETUGAS</a>
    <a href="operatorpondok.php"class="btn btn-success">OPERATOR PONDOK</a>
    <a href="hasilseleksi.php"class="btn btn-dark">HASIL SELEKSI</a>
    <a href="datapondok.php"class="btn btn-danger">DATA PONDOK</a>

    
    <table class="table table-striped table-hover">
  <thead>
    <tr><br><br>
      <th scope="col">NAMA WALI</th>
      <th scope="col">NAMA PENDAFTAR</th>
      <th scope="col">KELAMIN</th>
      <th scope="col">ALAMAT PENDAFTAR</th>
      <th scope="col">TANGGAL LAHIR</th>
      <th scope="col">NISN</th>
      <th scope="col">ASAL SEKOLAH</th>
      <th scope="col">ID PENDAFTARAN</th>
      <th scope="col">NO HANDPHONE WALI</th>

    </tr>
  </thead>
  <tbody>
    
  <?php
  
  include 'Konek.php';

  $data = mysqli_query($konek, "SELECT * FROM pendaftaran");
  while ($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <th> <?php echo $d["nama_wali"]; ?> </th>
        <th><?php echo $d["nama_pendaftar"]; ?></th>
        <th><?php echo $d["kelamin"]; ?></th>
        <th><?php echo $d["alamat_pendaftar"]; ?></th>
        <th><?php echo $d["tanggal_lahir"]; ?></th>
        <th><?php echo $d["nisn"]; ?></th>
        <th><?php echo $d["asal_sekolah"]; ?></th>
        <th><?php echo $d["id_pendaftaran"]; ?></th>
        <th><?php echo $d["no_handphone_wali"]; ?></th>
    
    </tr>

  </tbody>
  <?php
  }

  ?>


</table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 </body>
</html>