<?php
// Set timezone to Kolkata
date_default_timezone_set('Asia/Kolkata');

// Return the current time in Kolkata timezone in the same format
echo "Current Access : " . date('l, d Y  H:i:s', time()) . " &nbsp; <a href='logout.php' class='btn btn-danger square-btn-adjust'>Logout</a>";
?>
