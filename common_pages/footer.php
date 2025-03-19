<?php
// Check for success message in session
if (isset($_SESSION['success_message'])) {
    echo "<script>
    swal('Success!', '" . $_SESSION['success_message'] . "', 'success');
    </script>";
    unset($_SESSION['success_message']); // Unset the session after displaying the alert
}

// Check for error message in session
if (isset($_SESSION['error_message'])) {
    echo "<script>
    swal('Error!', '" . $_SESSION['error_message'] . "', 'error');
    </script>";
    unset($_SESSION['error_message']); // Unset the session after displaying the alert
}
?>

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- jQuery Validation Plugin -->
<script src="assets/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });

    // for time changes

    // Function to update time every second
    function updateTime() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_time.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('time').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Update time every second (1000ms)
    setInterval(updateTime, 1000);

    // for get Department dynamically

    $(document).ready(function() {
        $('#company_id').change(function() {
            var company_id = $(this).val();

            if (company_id) {
                $.ajax({
                    type: 'POST',
                    url: 'get_departments.php',
                    data: {
                        company_id: company_id
                    },
                    success: function(response) {
                        $('#dept_id').html(response);
                    }
                });
            } else {
                $('#dept_id').html('<option value="">Select Department</option>');
            }
        });
    });
</script>
<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>

</html>