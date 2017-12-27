$("#delete-reservation-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        console.log("delete")
    }
});

$("#logement-switch").change(function () {
    if (this.checked) {
        $("#logement-form").removeClass("hide");
    } else {
        $("#logement-form").addClass("hide");
    }
});