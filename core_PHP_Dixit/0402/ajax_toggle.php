<?php include('country.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   

</head>

<body>

    <!-- User Form -->
    <div class="container mt-3">
        <h2 class="text-center">User Form</h2>
        <hr>
        <form class="col-md-6 offset-3" action="action.php" method="post">
            <div class="mb-3 mt-3">
                <label for="fname">Name:</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter Your Full Name" name="fname" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="country" class="form-label">Select Country :</label>
                <select class="form-select" id="country" name="country" required onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                    <?php foreach ($country as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo ucfirst($key); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="state" class="form-label">Select State :</label>
                <select class="form-select" id="state" name="state" required onchange="getCities(this.value)">
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="city" class="form-label">Select City :</label>
                <select class="form-select" id="city" name="city" required>
                    <option value="">Select City</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
       
        // ajax
        function getStates(country) {
            $.ajax({
                type: "POST",
                url: "get_states.php",
                data: {
                    country: country
                },
                success: function(data) {
                    $('#state').html(data);
                }
            });
        }

        function getCities(state) {
            var country = $('#country').val();
            $.ajax({
                type: "POST",
                url: "get_cities.php",
                data: {
                    state: state,
                    country: country
                },
                success: function(data) {
                    $('#city').html(data);
                }
            });
        }
    </script>

</body>

</html>