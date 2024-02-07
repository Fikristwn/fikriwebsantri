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

    <h1 class = "text-center">PEMBAYARAN </h1>
    <br><br>
    <a href="santri.php"class="btn btn-danger">SANTRI</a>
    <a href="test.php"class="btn btn-success">TEST</a>
    <a href="hasilseleksi.php"class="btn btn-dark">HASIL SELEKSI</a>
    <a href="petugas.php"class="btn btn-info">PETUGAS</a>
    <a href="operatorpondok.php"class="btn btn-secondary">OPERATOR PONDOK</a>
    <a href="datapondok.php"class="btn btn-primary">DATA PONDOK</a>
    <a href="pendaftaran.php"class="btn btn-warning">PENDATARAN</a>

    
    <table class="table">
  <thead>
    <tr><br><br>
      <th scope="col">METODE BAYAR</th>
      <th scope="col">ID OPERATOR</th>
      <th scope="col">NAMA SANTRI</th>
      <th scope="col">ID PEMBAYARAN</th>

    </tr>
  </thead>
  <tbody>
    
  <?php
  
  include 'Konek.php';

  $data = mysqli_query($konek, "SELECT * FROM pembayaran");
  while ($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <th> <?php echo $d["Metode_bayar"]; ?> </th>
        <th><?php echo $d["id_operator"]; ?></th>
        <th><?php echo $d["nama_santri"]; ?></th>
        <th><?php echo $d["id_pembayaran"]; ?></th>
       
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