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

    <h1 class = "text-center">PETUGAS</h1>
    <br><br>
    <a href="santri.php"class="btn btn-info">SANTRI</a>
    <a href="test.php"class="btn btn-success">TEST</a>
    <a href="hasilseleksi.php"class="btn btn-warning">HASIL SELEKSI</a>
    <a href="operatorpondok.php"class="btn btn-primary">OPERATOR PONDOK</a>
    <a href="pembayaran.php"class="btn btn-secondary">PEMBAYARAN</a>
    <a href="datapondok.php"class="btn btn-dark">DATA PONDOK</a>
    <a href="pendaftaran.php"class="btn btn-info">PENDATARAN</a>

    
    <table class="table table-striped table-hover">
  <thead>
    <tr><br><br>
      <th scope="col">NAMA PETUGAS</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">KELAMIN</th>
      <th scope="col">ID PETUGAS</th>
      <th scope="col">NO HANDPHONE</th>
      
    </tr>
  </thead>
  <tbody>
    
  <?php
  
  include 'Konek.php';

  $data = mysqli_query($konek, "SELECT * FROM petugas");
  while ($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <th> <?php echo $d["nama_petugas"]; ?> </th>
        <th><?php echo $d["alamat"]; ?></th>
        <th><?php echo $d["kelamin"]; ?></th>
        <th><?php echo $d["id_petugas"]; ?></th>
        <th><?php echo $d["no_handphone"]; ?></th>
        
       
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