document.addEventListener("livewire:load", function () {
    Livewire.on("showEditModal", () => {
        const modal = document.querySelector("#editUserModal");
        if (modal) {
            modal.classList.remove("hidden");
        }
    });
});
