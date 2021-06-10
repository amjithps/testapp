    /**
     * sweet alert status change confirmation
     * function name confirmation with event ev
     */

    function confirmation(ev,status) {
        event.preventDefault();
        var link = $('#change_status'+ev).attr('href');
        if ( status == 1) {
            var showText = " Do you want to change the status Active to Inactive ? ";
        } else {
            var showText = " Do you want to change the status Inactive to Active ? ";
        }
            swal({
                title: "Are you sure?",
                text: showText,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonColor: "#FF0000",
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
            if (isConfirm) {
                swal("Status Changed ", "Status successfully changed.", "success");
                window.location.href = link;
            } else {
                // swal("Cancelled", "No change in your status.", "error");
            }
            });
        }


    /**
 * sweet alert delete confirmation
 * function name deleteData
 * parameter : id
 * form id form-delete+id
 */
function deleteData(id){
    event.preventDefault();
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonColor: "#FF0000",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel !",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm) {
    if (isConfirm) {
        // swal("Deleted!", "Your Data Deleted.", "success");
        $( "#form-delete"+ id).submit();
    } else {
        // swal("Cancelled", "Deletion Cancelled.", "error");
    }
    });
}