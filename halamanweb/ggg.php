<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo with Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-bg-secondary p-3">
            <br><br>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Masukkan">
                        <button class="btn btn-outline-success" type="button" onclick="search()">Cari</button>
                    </form>
                </div>
            </nav>
        </div>

        <ul id="yourListId" class="list-group">
            <!-- List items will be dynamically populated from the database -->
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function search() {
            // Implement search logic here if needed
            // You can use the current code for sorting
        }

        // Load data from the server-side (PHP in this example)
        window.onload = function () {
            // Use AJAX to fetch data from the server
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'datapondok.php', true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    populateList(data);
                }
            };

            xhr.send();
        };

        function populateList(data) {
            var ul = document.getElementById('yourListId');
            ul.innerHTML = ''; // Clear existing list items

            // Bubble Sort algorithm
            for (var i = 0; i < data.length - 1; i++) {
                for (var j = 0; j < data.length - i - 1; j++) {
                    if (data[j].toUpperCase() > data[j + 1].toUpperCase()) {
                        var temp = data[j];
                        data[j] = data[j + 1];
                        data[j + 1] = temp;
                    }
                }
            }

            // Display sorted list items
            for (var i = 0; i < data.length; i++) {
                var li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = data[i];
                ul.appendChild(li);
            }
        }
    </script>
</body>
</html>
