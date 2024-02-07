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

    <h1 class = "text-center">DATA TEST</h1>
    <br><br>
  

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Test</li>
  </ol>
</nav>

    <a href="santri.php"class="btn btn-warning">SANTRI</a>
    <a href="petugas.php"class="btn btn-secondary">PETUGAS</a>
    <a href="hasilseleksi.php"class="btn btn-dark">HASIL SELEKSI</a>
    <a href="operatorpondok.php"class="btn btn-info">OPERATOR PONDOK</a>
    <a href="pembayaran.php"class="btn btn-primary">PEMBAYARAN</a>
    <a href="datapondok.php"class="btn btn-success">DATA PONDOK</a>
    <a href="pendaftaran.php"class="btn btn-danger">PENDATARAN</a>

    
    <table class="table table-striped table-hover">
  <thead>
    <tr><br><br>
      <th scope="col">ID PENDAFTARAN</th>
      <th scope="col">NAMA PESERTA TEST</th>
      <th scope="col">ID PETUGAS</th>
    

    </tr>
  </thead>
  <tbody>
    
  <?php
  
  include 'Konek.php';

  $data = mysqli_query($konek, "SELECT * FROM test");
  while ($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <th> <?php echo $d["id_pendaftaran"]; ?> </th>
        <th><?php echo $d["nama_test"]; ?></th>
        <th><?php echo $d["id_petugas"]; ?></th>
    
       
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