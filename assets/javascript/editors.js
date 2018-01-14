var selectedEditor_id;

$("#delete-editor-btn").click(function () {
    if (confirm("Confirmer la suppression de l'éditeur ?")) {
        console.log("delete")
    }
});

$("tbody tr").click(function () {
    $("#" + selectedEditor_id).removeClass("selected");
    selectedEditor_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#show-editor-btn").attr("href", "show.php?id=" + selectedEditor_id);
    $("#edit-editor-btn").attr("href", "edit.php?id=" + selectedEditor_id);
});