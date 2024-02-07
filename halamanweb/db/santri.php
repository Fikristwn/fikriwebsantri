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

    <h1 class = "text-center">SANTRI</h1>
    <br><br>
    <a href="test.php"class="btn btn-dark">TEST</a>
    <a href="pendaftaran.php"class="btn btn-success">PENDAFTARAN</a>
    <a href="operatorpondok.php"class="btn btn-primary">OPERATOR PONDOK</a>
    <a href="datapondok.php"class="btn btn-danger">DATA PONDOK</a>
    <a href="petugas.php"class="btn btn-warning">PETUGAS</a>
    <a href="pembayaran.php"class="btn btn-info">PEMBAYARAN</a>
    <a href="hasilseleksi.php"class="btn btn-secondary">HASIL SELEKSI</a>
    
    <table class="table table-striped table-hover">
  <thead>
    <tr><br><br>
      <th scope="col">NAMA SANTRI</th>
      <th scope="col">NISN</th>
      <th scope="col">TANGGAL LAHIR</th>
      <th scope="col">ALAMAT SANTRI</th>
      <th scope="col">KELAMIN</th>

    </tr>
  </thead>
  <tbody>
    
  <?php
  
  include 'Konek.php';

  $data = mysqli_query($konek, "SELECT * FROM santri");
  while ($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <th> <?php echo $d["nama_santri"]; ?> </th>
        <th><?php echo $d["nisn"]; ?></th>
        <th><?php echo $d["tanggal_lahir"]; ?></th>
        <th><?php echo $d["alamat_santri"]; ?></th>
        <th><?php echo $d["kelamin"]; ?></th>
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