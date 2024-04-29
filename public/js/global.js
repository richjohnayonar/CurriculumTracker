document.addEventListener("livewire:load", function () {

    Livewire.on("showEditModal", () => {
        const modal = document.querySelector("#editUserModal");
        if (modal) {
            modal.classList.remove("hidden");
        }
    });

    livewire.on("showNotifications", (data) => {
        showNotification(data.type, data.message);
    });

    livewire.on("confirmUpdate", () => {
         update();
    });

    Livewire.on("confirmDeletePassers", () => {
         // Handle the confirmDeletePassers event here
        confirmDeletePassers();
    });
      
    Livewire.on("showToast", function (data) {
         toastr.options = {
             closeButton: true,
             progressBar: true,
             positionClass: "toast-top-right",
             showDuration: "300",
             hideDuration: "1000",
             timeOut: "3000",
             extendedTimeOut: "1000",
             showEasing: "swing",
             hideEasing: "linear",
             showMethod: "fadeIn",
             hideMethod: "fadeOut",
         };
        toastr[data.type](data.message);
    });
});


    function showNotification(type, message) {
        swal({
            title: type === "success" ? "Success!" : "Error!",
            text: message,
            icon: type,
            buttons:
                type === "error"
                    ? {
                          confirm: {
                              text: "OK",
                              value: true,
                              visible: true,
                              className: "",
                              closeModal: true,
                          },
                      }
                    : false,
            timer: type === "error" ? false : 1500,
        });
    }


        function confirmDelete(id, componentIdentifier) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    Livewire.emit("deleteRecord", id, componentIdentifier);
                } else {
                    swal("Deletion canceled.", {
                        icon: "info",
                        buttons: false,
                        timer: 1500, // Display for 1.5 seconds
                    });
                }
            });
        }

    function confirmDeletePassers() {
        console.log('trigger');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                Livewire.emit("deleteRecordPassers");
            } else {
                swal("Deletion canceled.", {
                    icon: "info",
                    buttons: false,
                    timer: 1500, // Display for 1.5 seconds
                });
            }
        });
    }

    function update() {
        swal({
            title: "Are you sure?",
            text: "Once updated, the changes will be saved!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willUpdate) => {
            if (willUpdate) {
                Livewire.emit("updateRecord");
            } else {
                swal("Update canceled.", {
                    icon: "info",
                    buttons: false,
                    timer: 1500, 
                });
            }
        });
    }

