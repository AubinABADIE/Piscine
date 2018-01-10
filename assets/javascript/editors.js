$("#delete-editor-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        console.log("delete")
    }
});

$("tr").click(function () {
    var selected_id = $(this).attr('id')
    $("#show-editor-btn").attr("href", "show.php?id=" + selected_id)
    $("#edit-editor-btn").attr("href", "show.php?id=" + selected_id)
});
