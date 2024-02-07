<?php
// ... (your existing code)

// Function to perform bubble sort
function bubbleSort($arr)
{
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Compare the first letters of "NAMA PONDOK"
            if (strtoupper(substr($arr[$j]["nama_pondok"], 0, 1)) > strtoupper(substr($arr[$j + 1]["nama_pondok"], 0, 1))) {
                // Swap if needed
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }

    return $arr;
}

// Check if the form is submitted
if (isset($_GET['searchInput'])) {
    // ... (your existing code)

    // Sort the filtered pondoks using bubble sort
    $filteredPondoks = bubbleSort($filteredPondoks);

    // ... (your existing code)
} else {
    // ... (your existing code)

    // Sort the entire pondok list using bubble sort
    $data = mysqli_query($konek, "SELECT * FROM data_pondok");
    $allPondoks = array();

    while ($d = mysqli_fetch_array($data)) {
        $allPondoks[] = $d;
    }

    $allPondoks = bubbleSort($allPondoks);

    // Display the sorted entire table
    foreach ($allPondoks as $pondok) {
        // ... (your existing code to display the table rows)
    }

    // ... (your existing code)
}
?>
