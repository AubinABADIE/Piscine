var selected_id;

$("#delete-editor-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        console.log("delete")
    }
});

$("tr").click(function () {
    $("#" + selected_id).removeClass("selected");
    selected_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#show-editor-btn").attr("href", "show.php?id=" + selected_id);
    $("#edit-editor-btn").attr("href", "edit.php?id=" + selected_id);
});
