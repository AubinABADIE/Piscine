var selectedSpace_id;

$("#delete-space-btn").click(function () {
    if (confirm("Confirmer la suppression ?")) {
        window.location.href = "../../controlers/delete_reservedplace.php?id=" + $(this).attr('name')
    }
});


$("table.selectable#spacetype-table tbody tr").click(function () {
    console.log(selectedSpace_id);
    $("#" + selectedSpace_id + ".spacetype-line").removeClass("selected");
    selectedSpace_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-spacetype-btn").attr("href", "../spaces/edit.php?id=" + selectedSpace_id);
    $("#delete-spacetype-btn").attr("name", selectedSpace_id);
});

$("table.selectable#spaceeditor-table tbody tr").click(function () {
    console.log(selectedSpace_id);
    $("#" + selectedSpace_id + ".spaceeditor-line").removeClass("selected");
    selectedSpace_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-spaceeditor-btn").attr("href", "../spaces/edit.php?id=" + selectedSpace_id);
    $("#delete-spaceeditor-btn").attr("name", selectedSpace_id);
});

$("table.selectable#spaces-table tbody tr").click(function () {
    console.log(selectedSpace_id);
    $("#" + selectedSpace_id).removeClass("selected");
    selectedSpace_id = $(this).attr('id');
    $(this).addClass("selected");
    $("#edit-space-btn").attr("href", "../spaces/edit.php?id=" + selectedSpace_id);
    $("#delete-space-btn").attr("name", selectedSpace_id);
});


function changeForm()
{
	if(document.getElementById("ZoneType").checked)
	{
		document.getElementById("NewEditor").disabled=true;
		document.getElementById("NewType").disabled=false;
	}
	else
	{
		document.getElementById("NewType").disabled=true;
		document.getElementById("NewEditor").disabled=false;
	}
}
