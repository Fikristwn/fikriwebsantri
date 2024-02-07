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

        <!-- Search Form -->
        <form method="GET" class="mb-3">
            <label for="searchInput" class="form-label">Search by NAMA PONDOK:</label>
            <input type="text" name="searchInput" class="form-control" id="searchInput" placeholder="Enter name to search">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>

        <?php
        include 'Konek.php';

        // Check if the form is submitted
        if (isset($_GET['searchInput'])) {
            $searchInput = strtoupper($_GET['searchInput']);

            $data = mysqli_query($konek, "SELECT * FROM data_pondok");
            $filteredPondoks = array();

            while ($d = mysqli_fetch_array($data)) {
                if (strtoupper(substr($d["nama_pondok"], 0, 1)) === $searchInput) {
                    $filteredPondoks[] = $d;
                }
            }

            // Display the filtered list
            echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">NAMA PONDOK</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">ID PONDOK</th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($filteredPondoks as $pondok) {
                echo '<tr>
                        <th>' . $pondok["nama_pondok"] . '</th>
                        <th>' . $pondok["alamat"] . '</th>
                        <th>' . $pondok["id_pondok"] . '</th>
                      </tr>';
            }

            echo '</tbody></table>';
        } else {
            // If the form is not submitted, display the entire table
            $data = mysqli_query($konek, "SELECT * FROM data_pondok");

            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NAMA PONDOK</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">ID PONDOK</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($d = mysqli_fetch_array($data)) {
                echo '<tr>
                        <th>' . $d["nama_pondok"] . '</th>
                        <th>' . $d["alamat"] . '</th>
                        <th>' . $d["id_pondok"] . '</th>
                      </tr>';
            }

            echo '</tbody></table>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
