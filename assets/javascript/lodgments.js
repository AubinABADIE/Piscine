var selectedLodgment_id;

$("#delete-lodgment-btn").click(function () {
    if (confirm("Confirmer la suppression la réservation du logement ?")) {
        console.log("delete")
    }
});

$("table.selectable#lodgment-table tbody tr").click(function () {
    console.log(selectedLodgment_id);
    $("#" + selectedLodgment_id).removeClass("selected");
    selectedLodgment_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-lodgment-btn").attr("href", "../lodgments/edit.php?id=" + selectedLodgment_id);
});