var selectedLodgment_id;

//Page reservation
$("#delete-lodge-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        window.location.href = "../../controlers/delete_lodge.php?id=" + $(this).attr('name')
    }
});

$("table.selectable#lodge-table tbody tr").click(function () {
    console.log(selectedLodgment_id);
    $("#" + selectedLodgment_id).removeClass("selected");
    selectedLodgment_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-lodge-btn").attr("href", "../lodge/edit.php?id=" + selectedLodgment_id);
    $("#delete-lodge-btn").attr("name", selectedLodgment_id);
});

//Page logement
$("#delete-lodgment-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        window.location.href = "../../controlers/delete_lodgments.php?id=" + $(this).attr('name')
    }
});

$("table.selectable#lodgment-table tbody tr").click(function () {
    console.log(selectedLodgment_id);
    $("#" + selectedLodgment_id).removeClass("selected");
    selectedLodgment_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-lodgment-btn").attr("href", "../lodgments/edit.php?id=" + selectedLodgment_id);
    $("#delete-lodgment-btn").attr("name", selectedLodgment_id);
});
