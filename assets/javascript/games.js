var selectedGame_id;

$("#delete-game-btn").click(function () {
    if (confirm("Confirmer la suppression du jeu ?")) {
        window.location.href = "../../controlers/delete_games.php?id=" + $(this).attr('name')
    }
});

$("table.selectable#game-table tbody tr").click(function () {
    console.log('click game');
    $("#" + selectedGame_id + ".game-line").removeClass("selected");
    selectedGame_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-game-btn").attr("href", "../games/edit.php?id=" + selectedGame_id);
    $("#delete-game-btn").attr("name", selectedGame_id);
});