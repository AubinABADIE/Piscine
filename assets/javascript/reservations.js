var selectedBooking_id;

$("#delete-reservation-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        window.location.href = "../../controlers/delete_bookings.php?id=" + $(this).attr('name')
    }
});

$("#logement-switch").change(function () {
    if (this.checked) {
        $("#logement-form").removeClass("hide");
    } else {
        $("#logement-form").addClass("hide");
    }
});

$("table.selectable#booking-table tbody tr").click(function () {
    $("#" + selectedBooking_id).removeClass("selected");
    selectedBooking_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#show-booking-btn").attr("href", "show.php?id=" + selectedBooking_id);
    $("#edit-booking-btn").attr("href", "edit.php?id=" + selectedBooking_id);
    $("#delete-reservation-btn").attr("name", selectedBooking_id);
});