var fenPopup = $("div#popup");
var fenPopupSupp = $("div#popupSupp");


var _projet = {
	_lib : "Libellé",
	_des : "Description",
	_dateDeb : "20-05-2015",
	_dateFin : "31-07-2016"
};

var champs = new Array ("Libellé", "Description", "Date début", "Date fin");
var valeurs = new Array ("exemple", "exemple 2", "2015-05-15", "2015-07-15");

var champTemplate = "";

(function($)
{
	
		


	// // Ouvrir le popup modifier projet
	// $("div.editProjet img").on('click' , function()
	// {
	// 	popupModifier("Modifier projet", champs, valeurs, "1");
	// });

	// // Fermer le popup modifier projet
	// $("i#popupClose").on('click' , function()
	// {
	// 	fenPopup.removeClass("showPopup");
	// 	$("div.backFace-off").removeClass("backFace-on");	
	// });

	// // Ouvrir le popup supprimer projet
	// $("div.deleteProjet img").on('click' , function()
	// {
	// 	popupSupp("Voulez-vous vraiment supprimer ce projet ?");
	// });

	// // Fermer le popup supprimer projet
	// $("button#suppProjetNon").on('click' , function()
	// {
	// 	fenPopupSupp.removeClass('showPopupSupp');
	// 	$("div.backFace-off").removeClass("backFace-on");

	// });

	// // Supprimer projet
	// $("button#suppProjetOui").on('click' , function()
	// {
	// 	$("button#suppProjetNon").trigger('click');
	// });



}) (jQuery);






	
function popupModifier (titre, tabChamp, tabValeur, isTextArea)
{
	var indiceChampsTextArea = [];
	indiceChampsTextArea = isTextArea.split('#');

	fenPopup.find('.popupTitle').find('h3').text(titre);
	var mySpace = $("div#listeChamps");
	var i = 0;

	mySpace.html("");
	for (i = 0; i < tabChamp.length; i++)
	{
		if (indiceChampsTextArea.indexOf('' + i + '') > -1)
		{
			champTemplate = '<div class = "col-xs-12 oneInput">' +
								'<div class = "col-xs-12 oneInput-label">' + tabChamp[i] + '</div>' +
								'<div class = "col-xs-12 oneInput-textField">' +
									'<textarea class = "form-control">' +
									tabValeur[i] +
									'</textarea>' +
								'</div>' +
							'</div>';

		}
		else if ( /^(\d{4})-(\d{2})-(\d{2})$/.test(tabValeur[i]))
		{
			champTemplate = '<div class = "col-xs-12 oneInput">' +
								'<div class = "col-xs-12 oneInput-label">' + tabChamp[i] + '</div>' +
								'<div class = "col-xs-12 oneInput-textField">' +
									'<input type = "text" class = "form-control" role = "datePicker" placeholder = "' +  tabValeur[i] + '">' +
								'</div>' +
							'</div>';
		}
		else
		{
			champTemplate = '<div class = "col-xs-12 oneInput">' +
								'<div class = "col-xs-12 oneInput-label">' + tabChamp[i] + '</div>' +
								'<div class = "col-xs-12 oneInput-textField">' +
									'<input type = "text" class = "form-control" placeholder = "" value = "' +  tabValeur[i] + '">' +
								'</div>' +
							'</div>';
		}

		mySpace.append(champTemplate);
	}
	
	$('input[role=datePicker]').val('');
	$('input[role=datePicker]').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
	
	$("div.backFace-off").addClass("backFace-on");
	fenPopup.addClass('showPopup');
}

function popupSupp (titre)
{
	fenPopupSupp.find('div.popupSupp-title').text(titre);
	$("div.backFace-off").addClass("backFace-on");
	fenPopupSupp.addClass('showPopupSupp');
}


function afficherListeProjet(liste)
{
	var mySpace = $("#list-projet-val");

	mySpace.html("");
	var i=0;

	for (i = 0; i < liste.length; i++)
	{
		champ = '<div class = "col-xs-12 data-single" name="'+liste['PROJETID']+'">
					<div class = "col-xs-12 data-presentation">'+
						'<div class = "col-xs-4 rmp data-name">'+ liste['PROJETLIB']+'</div>
						<div class = "col-xs-8 data-description">'+ liste['PROJETDES']+'
						</div>
					</div><!-- Présentation du projet -->

					<div class = "col-xs-12 data-details"><!-- Détails sur le projet (date enregistrement, date debut-fin, créateur) -->
						
						<div class = "col-xs-5 data-details-identity">
							<div class = "col-xs-12">
								<div class = "col-xs-1">par</div><div class = "col-xs-11">'+ liste['USERPRENOM']+ ' '+ liste['USERNOM']+ '</div>
							</div>
							<div class = "col-xs-12">
								<div class = "col-xs-1">le</div><div class = "col-xs-11">'+liste['dateenr']+'</div>
							</div>
						</div>

						<div class = "col-xs-2 rmp data-gest">
							
							<div class = "col-xs-4 data-action submitProjet" data-action = "submitData"><img src="images/ico/submit.png"></div>
							<div class = "col-xs-4 data-action editProjet" data-action = "editData"><img src="images/ico/edit.png"></div>
							<div class = "col-xs-4 data-action deleteProjet" data-action = "delData"><img src="images/ico/delete.png"></div>
							
						</div>

						<div class = "col-xs-5 data-details-others"> <!-- <div class = "col-xs-12 data-delay-jauge"></div> -->
							Du <span>'+liste['datedbt']+'</span>
							<br>
							Au <span>'+liste['datefin']+'</span>
						</div>
					</div>
				</div>'
			 
		mySpace.append(champ);
	}
}


