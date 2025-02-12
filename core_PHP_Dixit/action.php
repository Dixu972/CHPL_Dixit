<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $selectedCountry = $_POST['result'];

    if ($selectedCountry == 'India') {
        echo "<option >Gujrat</option>";
        echo "<option >MP</option>";
        echo "<option >CG</option>";
    } elseif ($selectedCountry == 'USA') {
        echo "<option >Delaware</option>";
        echo "<option >Alaska</option>";
        echo "<option >Connecticut</option>";
    } elseif ($selectedCountry == 'UK') {
        echo "<option >England</option>";
        echo "<option >Scotland</option>";
        echo "<option >Wales</option>";
    }
} else {
    echo "Invalid Data";
}
