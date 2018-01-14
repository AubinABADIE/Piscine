var selectedContact_id;

$("#delete-contact-btn").click(function () {
    if (confirm("Confirmer la suppression du contact ?")) {
        window.location.href = "../../controlers/delete_contacts.php?id=" + $(this).attr('name')
    }
});

$("table.selectable#contacts-table tbody tr").click(function () {
    console.log('click contact');
    $("#" + selectedContact_id).removeClass("selected");
    selectedContact_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-contact-btn").attr("href", "../contacts/edit.php?id=" + selectedContact_id);
    $("#delete-contact-btn").attr("name", selectedContact_id);
});