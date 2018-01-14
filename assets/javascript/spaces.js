$("#delete-space-btn").click(function () {
    if (confirm("Confirmer la suppression de l'espace ?")) {
        console.log("delete")
    }
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