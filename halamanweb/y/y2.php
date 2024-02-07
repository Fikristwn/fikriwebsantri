<?php
include 'Konek.php';

function bubbleSort($data, $searchTerm)
{
    $n = count($data);

    // Outer loop for the number of elements in the array
    for ($i = 0; $i < $n - 1; $i++) {

        // Inner loop for comparisons
        for ($j = 0; $j < $n - $i - 1; $j++) {

            // Compare adjacent elements
            if (strcmp($data[$j]["nama_test"], $data[$j + 1]["nama_test"]) > 0) {
                // Swap the elements if they are in the wrong order
                $temp = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $temp;
            }
        }
    }

    // Perform search
    $searchResults = [];
    foreach ($data as $item) {
        if (
            stripos($item["nama_test"], $searchTerm) !== false ||
            $item["id_pendaftaran"] == $searchTerm ||
            $item["id_petugas"] == $searchTerm
        ) {
            $searchResults[] = $item;
        }
    }

    return $searchResults;
}

$data = mysqli_query($konek, "SELECT * FROM test");
$testData = [];
while ($d = mysqli_fetch_array($data)) {
    $testData[] = [
        "id_pendaftaran" => $d["id_pendaftaran"],
        "nama_test" => $d["nama_test"],
        "id_petugas" => $d["id_petugas"],
    ];
}

// Example usage for sorting and searching
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sortedAndSearchedData = bubbleSort($testData, $searchTerm);
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

        <h1 class="text-center">DATA TEST</h1>
        <br><br>

        <form method="get" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Nama Peserta Test, ID Pendaftaran, atau ID Petugas" name="search" value="<?= $searchTerm ?>">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

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
                foreach ($sortedAndSearchedData as $d) {
                ?>

                    <tr>
                        <th> <?php echo $d["id_pendaftaran"]; ?> </th>
                        <th><?php echo $d["nama_test"]; ?></th>
                        <th><?php echo $d["id_petugas"]; ?></th>
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
