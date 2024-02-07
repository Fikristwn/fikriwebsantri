<?php
include 'Konek.php';

function bubbleSort($data, $sortBy)
{
    $n = count($data);

    // Outer loop for the number of elements in the array
    for ($i = 0; $i < $n - 1; $i++) {

        // Inner loop for comparisons
        for ($j = 0; $j < $n - $i - 1; $j++) {

            // Compare adjacent elements
            if (strcmp($data[$j][$sortBy], $data[$j + 1][$sortBy]) > 0) {
                // Swap the elements if they are in the wrong order
                $temp = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $temp;
            }
        }
    }

    return $data;
}

$data = mysqli_query($konek, "SELECT * FROM data_pondok");
$pondokData = [];
while ($d = mysqli_fetch_array($data)) {
    $pondokData[] = [
        "nama_pondok" => $d["nama_pondok"],
        "alamat" => $d["alamat"],
        "id_pondok" => $d["id_pondok"],
    ];
}

// Sorting and searching based on nama_pondok
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'nama_pondok';
$sortedData = bubbleSort($pondokData, $sortBy);

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$searchResults = [];

foreach ($sortedData as $item) {
    if (stripos($item["nama_pondok"], $searchTerm) !== false) {
        $searchResults[] = $item;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="p-3 text-info-emphasis bg-info-subtle border border-info-subtle rounded-3">

        <h1 class="text-center">DATA PONDOK</h1>
        <br><br>

        <form method="get" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Nama Pondok" name="search" value="<?= $searchTerm ?>">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

        <table class="table table-striped table-hover">
            <thead>
                <tr><br><br>
                    <th scope="col"><a href="?sort=nama_pondok">NAMA PONDOK</a></th>
                    <th scope="col"><a href="?sort=alamat">ALAMAT</a></th>
                    <th scope="col"><a href="?sort=id_pondok">ID PONDOK</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($searchResults as $d) {
                ?>
                    <tr>
                        <th> <?php echo $d["nama_pondok"]; ?> </th>
                        <th><?php echo $d["alamat"]; ?></th>
                        <th><?php echo $d["id_pondok"]; ?></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
