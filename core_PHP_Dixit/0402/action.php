<?php
"<meta http-equiv='refresh' content='0'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fname"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $msg = "User Unblock";

    $user_data = array(
        "name" => $name,
        "country" => $country,
        "state" => $state,
        "city" => $city,
        "status" => $msg
    );

    $json_file = 'users.json';
    if (file_exists($json_file)) {
        $json_data = json_decode(file_get_contents($json_file), true);
        array_push($json_data, $user_data);
        json_encode($json_data);
        file_put_contents($json_file, json_encode($json_data, JSON_PRETTY_PRINT));
    } else {
        $json_data = array($user_data);
        json_encode($json_data);
        file_put_contents($json_file, json_encode($json_data, JSON_PRETTY_PRINT));
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

     <!-- datatable -->

     <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>

</head>

<body>
    <div class="container mt-3">
        <h2>User Table</h2>
        <table id="mytable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json_file = 'users.json';
                if (file_exists($json_file)) {
                    $json_data = json_decode(file_get_contents($json_file), true);
                    foreach ($json_data as $key => $user) {
                ?>
                        <tr>
                            <td><?php echo $user["name"]; ?></td>
                            <td><?php echo $user["country"]; ?></td>
                            <td><?php echo $user["state"]; ?></td>
                            <td><?php echo $user["city"]; ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleSwitch<?php echo $key; ?>" onchange="toggle(this, <?php echo $key; ?>)">
                                    <label class="form-check-label" for="toggleSwitch<?php echo $key; ?>"><span id="status<?php echo $key; ?>"><b><?php echo $user["status"]; ?></b></span></label>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
         $(document).ready(function(){
            $("#mytable").DataTable();
        });



        function toggle(checkbox, key) {
            if (checkbox.checked) {
                $.ajax({
                    type: 'POST',
                    url: 'block_user.php',
                    data: {
                        action: 'Block',
                        key: key
                    },
                    success: function(data) {
                        $('#mytable tr').prop('disabled', 'disabled').css('background-color', 'grey');
                        $('#status' + key).html('<span style="color:red">User Block</span>');
                        alert('User blocked successfully!');
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'unblock_user.php',
                    data: {
                        action: 'Unblock',
                        key: key
                    },
                    success: function(data) {
                        $('#status' + key).html('<span>User Unblock</span>');
                        alert('User Unblocked successfully!');
                    }
                });
            }
        }
    </script>
</body>

</html>