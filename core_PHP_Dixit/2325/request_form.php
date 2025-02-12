<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Method - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h3 class="mt-3">Request Global Variable method</h3>
    <hr>
    <div class="col-md-8 offset-2">

        <form action="request.php" method="post" >

            <div class="mb-3">
                <label for="uname" class="form-label">Full Name :</label>
                <input type="text" class="form-control" id="uname" name="uname" required>
            </div>
            <div class="mb-3">
                <label for="mno" class="form-label">Mobile No :</label>
                <input type="number" class="form-control" id="mno" name="mno" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age :</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Id :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>