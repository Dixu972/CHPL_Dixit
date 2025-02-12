
$(document).ready(function () {

    // Datepicker
    $("#j_date").datepicker({
        dateFormat: "yy-mm-dd"
    });

    // Fetch Departments

    $.ajax({
        type: "GET",
        url: "department.php",
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, value) {
                $("#department").append("<option value='" + value.DepartmentID + "'>" + value.DepartmentName + "</option>");
            });
        }
    });

    // fetch designation 

    $("#department").change(function() {
        var department_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "designation.php",
            data: { department_id: department_id },
            dataType: "json",
            success: function(data) {
                $("#designation").empty();
                $("#designation").append("<option value='' selected disabled>Select Designation</option>");
                $.each(data, function(key, value) {
                    $("#designation").append("<option value='" + value.DepartmentID + "'>" + value.DesignationName + "</option>");
                });
            }
        });
    });

    // // for edit data fetch 

    // // Fetch Departments

    // $.ajax({
    //     type: "GET",
    //     url: "department_e.php",
    //     dataType: "json",
    //     success: function (data) {
    //         $.each(data, function (key, value) {
    //             $("#e_department").append("<option value='" + value.DepartmentID + "'>" + value.DepartmentName + "</option>");
    //         });
    //     }
    // });

    // // fetch designation 

    // $("#e_department").change(function() {
    //     var department_id = $(this).val();
    //     $.ajax({
    //         type: "POST",
    //         url: "designation_e1.php",
    //         data: { department_id: department_id },
    //         dataType: "json",
    //         success: function(data) {
    //             // $("#e_designation").empty();
    //             $("#e_designation").append("<option value='' selected disabled>Select Designation</option>");
    //             $.each(data, function(key, value) {
    //                 $("#e_designation").append("<option value='" + value.DepartmentID + "'>" + value.DesignationName + "</option>");
    //             });
    //         }
    //     });
    // });

    
});
