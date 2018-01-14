var selectedLodgment_id;

$("#delete-lodgment-btn").click(function () {
    if (confirm("Confirmer la suppression la réservation du logement ?")) {
        console.log("delete")
    }
});

$("tbody tr").click(function () {
    $("#" + selectedLodgment_id).removeClass("selected");
    selectedLodgment_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-contact-btn").attr("href", "../lodgments/edit.php?id=" + selectedLodgment_id);
});