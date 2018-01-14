var selectedEditor_id;

$("#delete-editor-btn").click(function () {
    if (confirm("Confirmer la suppression de l'éditeur ?")) {
        window.location.href = "../../controlers/delete_editors.php?id=" + $(this).attr('name')
    }
});

$("table.selectable#editors-table tbody tr").click(function () {
    $("#" + selectedEditor_id).removeClass("selected");
    selectedEditor_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#show-editor-btn").attr("href", "show.php?id=" + selectedEditor_id);
    $("#edit-editor-btn").attr("href", "edit.php?id=" + selectedEditor_id);
    $("#delete-editor-btn").attr("name", selectedEditor_id);
});

$("tr.clickable").click(function () {
    console.log("click")
    window.location.href = "../reservations/show.php?id="+$(this).attr('id')
});