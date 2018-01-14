var selectedGame_id;

$("#delete-game-btn").click(function () {
    if (confirm("Confirmer la suppression du jeu ?")) {
        console.log("delete")
    }
});

$("tbody tr").click(function () {
    $("#" + selectedGame_id).removeClass("selected");
    selectedGame_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-game-btn").attr("href", "../games/edit.php?id=" + selectedGame_id);
});