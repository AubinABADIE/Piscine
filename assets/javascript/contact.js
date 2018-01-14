var selectedContact_id;

$("#delete-contact-btn").click(function () {
    if (confirm("Confirmer la suppression du contact ?")) {
        console.log("delete")
    }
});

$("tbody tr").click(function () {
    $("#" + selectedContact_id).removeClass("selected");
    selectedContact_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#show-editor-btn").attr("href", "show.php?id=" + selectedContact_id);
    $("#edit-editor-btn").attr("href", "edit.php?id=" + selectedContact_id);
});