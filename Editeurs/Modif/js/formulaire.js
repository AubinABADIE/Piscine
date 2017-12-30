$(document).foundation();

var formulaire = document.getElementById('Formulaire');
var dateRDV = document.getElementById('DateRDV');
var nomResp = document.getElementById('NomResp');
var prenomResp = document.getElementById('PrenmResp');
var posteEnt = document.getElementById('PosteResp');
var mailResp = document.getElementById('MailResp');
var telResp = document.getElementById('TelResp');

var nomEd = document.getElementById('NomEd');
var adrEd = document.getElementById('AdrEd');
var ville = document.getElementById('VilleEd');
var codePostal = document.getElementById('CPEd');
var mailEd = document.getElementById('MailEd');
var telEd = document.getElementById('TelEd');

function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
  }
  
  document.onkeypress = stopRKey;
  