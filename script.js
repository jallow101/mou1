// Add Record 
function addRecord() {
    // get values
    var name = $("#name").val();
    var surname = $("#surname").val();
    var dob = $("#dob").val();
    var address = $("#address").val();

    // Add record
    $.post("addperson.php", {
        name: name,
        surname: surname,
        dob: dob,
        address: address,
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#name").val("");
        $("#surname").val("");
        $("#dob").val("");
        $("#address").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
