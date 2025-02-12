<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h3 class="mt-3">File Upload Using Fom</h3>
    <hr>
    <div class="col-md-8 offset-2">

        <form action="file.php" method="post" enctype="multipart/form-data" >

            <div class="mb-3">
                <label for="pic" class="form-label">Profile Pic :</label>
                <input type="file" class="form-control" id="pic" name="pic" required>
            </div>
            
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>