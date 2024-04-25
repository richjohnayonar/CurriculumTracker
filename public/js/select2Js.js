// Function to initialize Select2
function initSelect2() {
    // Listen for change event in Select2 and emit Livewire event
    $("#schoolSelect").select2();

    $("#schoolSelect").on("change", function (e) {
        Livewire.emit("EditAcademicSelect2", e.target.value);
    });

    $("#schoolSelecttvl").select2();
    $("#schoolSelecttvl").on("change", function (e) {
        Livewire.emit("editTVLSelect2", e.target.value);
    });

    $("#schoolSelectSSES").select2();
    $("#schoolSelectSSES").on("change", function (e) {
        Livewire.emit("SSESAddSchoolSelect2", e.target.value);
    });

    $("#schoolSelectSSES").select2();
    $("#schoolSelectSSES").on("change", function (e) {
        Livewire.emit("SSESEditSchoolSelect2", e.target.value);
    });

}

// Call the function when the page is ready
document.addEventListener("DOMContentLoaded", function () {
    initSelect2();
});

// Reinitialize Select2 whenever Livewire updates the DOM
document.addEventListener("livewire:load", function () {
    Livewire.hook("message.processed", (message, component) => {
        initSelect2();
    });
});


