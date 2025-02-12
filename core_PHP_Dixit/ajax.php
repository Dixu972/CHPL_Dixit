<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <form id="mycountry">
        <h2>Select a Country</h2>
        <select id="country" onchange="change(this.value)">
            <option value="">-- Select Country --</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
        </select>
        <p id="answer"></p>
    </form>
    <hr>
    <h2>Select City</h2>
    <select id="state">
        <option value="">-- Select State --</option>
    </select>



    <script>
        function change(value) {
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    result: value
                },
                success: function(response) {
                    $("#state").html(response);
                    setTimeout("alert('Your Data Saved !')",5000)
                }
            });
        }
    </script>

</body>

</html>