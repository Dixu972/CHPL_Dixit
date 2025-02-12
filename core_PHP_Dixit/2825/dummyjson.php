<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- datatable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#quote").DataTable();
        });
    </script>

</head>

<body>

    <?php

    $json = file_get_contents("https://dummyjson.com/quotes");
    $new_data = json_decode($json,true );

    // print_r($new_data);

    echo "<hr>";

    ?>
    <div class="container">
        <h5 class="text-center text-uppercase text-bg-warning">Quotes Data</h5>
        <table id="quote" class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Quote</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($new_data['quotes'] as $quote) {
                ?>
                    <tr>
                        <td><?php echo $quote['id']; ?></td>
                        <td><?php echo $quote['quote']; ?></td>
                        <td><?php echo $quote['author']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>