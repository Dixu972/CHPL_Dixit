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
            $('#user').DataTable();
        });
    </script>

</head>

<body>
    <div class="container mt-3">
        <h2>Data Table</h2>
        <hr>
        <table id="user" class="table table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $user = array(
                    array("name" => "Dixit", "id" => 54, "city" => "ahmedabad"),
                    array("name" => "vaibhav", "id" => 78, "city" => "rajkot"),
                    array("name" => "jay", "id" => 30, "city" => "surat"),
                    array("name" => "surya", "id" => 85, "city" => "surat"),
                    array("name" => "mrunal", "id" => 96, "city" => "ahmedabad"),
                    array("name" => "himanshu", "id" => 108, "city" => "rajkot"),
                    array("name" => "divy", "id" => 546, "city" => "baroda"),
                    array("name" => "surya", "id" => 85, "city" => "surat"),
                    array("name" => "vaibhav", "id" => 78, "city" => "rajkot"),
                    array("name" => "jay", "id" => 30, "city" => "surat"),
                    array("name" => "jay", "id" => 30, "city" => "surat"),
                    array("name" => "vaibhav", "id" => 78, "city" => "rajkot"),
                    array("name" => "mrunal", "id" => 96, "city" => "ahmedabad"),
                    array("name" => "jay", "id" => 30, "city" => "surat"),
                );

                foreach ($user as $u) {
                ?>
                    <tr>
                        <td><?php echo $u['name']; ?></td>
                        <td><?php echo $u['city']; ?></td>
                        <td><?php echo $u['id']; ?></td>
                    </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>