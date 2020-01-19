(function($)
{
	// Au chargement de la page
	$(document).ready(function()
	{
		$(this).trigger('scroll');
		$("div.login-form").addClass('revealLoginForm');
		$("textarea").val('');
	});

	// Quand on scrolle la page, l'ombre sous le headerFixed
	$(document).on('scroll' , function()
	{
		if ($(document).scrollTop() >= 20)
		{
			$(".headerFixed").addClass("ombrage");
		}
		else if ($(document).scrollTop() == 0)
		{
			$(".headerFixed").removeClass("ombrage");
		}
	});

	// Ouvrir un menu
	$("div.isExpandable").on('click' , function()
	{
		$("div.isExpandable").find("img#expandArrow").removeClass('rotateArrow');
		$("div.isExpandable").next("div.sb-submenu").slideUp('fast');
		$(this).find("img#expandArrow").toggleClass('rotateArrow');
		$(this).next("div.sb-submenu").slideToggle('fast');
	});



	// Ouvrir la barre de notifications
	$("button.btn#btn-notify").on('click' , function()
	{
		$("div.notification-bar").toggleClass('revealNotify');
	});

	$("div.cont-master").on('click' , function()
	{
		$("div.notification-bar").removeClass('revealNotify');
	});

	// My toggle button
	$("div.round").on('click' , function()
	{
		var rond = $(this);
		var bar = $("div.bar");

		rond.toggleClass('moveRoundToRight');
		bar.toggleClass('barColored');
	});

// Fermer une alerte
	$(".close").click(function() 
	{
	 	$(this).parent().hide("slow");
	});
	
	$("[role=notempty]").keydown(function() 
	{
	 	if ($(this).val() == ' ') 
	 	{
	 		$(this).val('');
	 	}
	});

	$("[role=notempty]").keyup(function() 
	{
	 	if ($(this).val() == ' ') 
	 	{
	 		$(this).val('');
	 	}
	});

	$("[role=number]").keydown(function(e) 
	{
	 	
	});

// CLic sur le bouton Paramètre
	$('#UserSettings').on('click' , function()
	{
		$('div[role=new-pwd]').css('display' , 'none');
		$('div[role=old-pwd]').css('display' , 'block');
		$('button[role=footer-success]').css('display' , 'inline-block');
		$('button#valProjetNon').html('Annuler');
		$('div[role=new-pwd-success]').css('display' , 'none');
	});


	// Ouvrir les listes de projet

	$("div.list-title-val").on('click',function()
	{
		$("div#list-projet-val").addClass('show-list-projet-val');
		$("div.list-title-val").addClass('show-list-title-val');
		$("div#list-projet-encours").removeClass('show-list-projet-encours');
		$("div.list-title-encours").removeClass('show-list-title-encours');
		$("div#list-projet-clo").removeClass('show-list-projet-clo');
		$("div.list-title-clo").removeClass('show-list-title-clo');
	});

	$("div.list-title-encours").on('click',function()
	{
		$("div#list-projet-val").removeClass('show-list-projet-val');
		$("div.list-title-val").removeClass('show-list-title-val');
		$("div#list-projet-encours").addClass('show-list-projet-encours');
		$("div.list-title-encours").addClass('show-list-title-encours');
		$("div#list-projet-clo").removeClass('show-list-projet-clo');
		$("div.list-title-clo").removeClass('show-list-title-clo');
	});

	$("div.list-title-clo").on('click',function()
	{
		$("div#list-projet-val").removeClass('show-list-projet-val');
		$("div.list-title-val").removeClass('show-list-title-val');
		$("div#list-projet-encours").removeClass('show-list-projet-encours');
		$("div.list-title-encours").removeClass('show-list-title-encours');
		$("div#list-projet-clo").addClass('show-list-projet-clo');
		$("div.list-title-clo").addClass('show-list-title-clo');
	});

	// Ouvrir les menus

	$("#logOut").on('click' , function()
	{
		window.location.href="login.php";
	});

	$("#menu-accueil").on('click' , function()
	{
		window.location.href="index.php";

	});

	// $("#menu-newProjet").on('click' , function()
	// {
	// 	window.location.href="ajouterProjet.php";
	// });

	// $("#menu-listeProjet").on('click' , function()
	// {
	// 	window.location.href="../controleurs/projet/listeProjet.php";
	// });

	// $("#menu-newMessage").on('click' , function()
	// {
	// 	$("#popupMessage").addClass('show-popupMessage');
	// });

	// $("#menu-reception").on('click' , function()
	// {
	// 	window.location.href="#";
	// });

	// $("#menu-envoie").on('click' , function()
	// {
	// 	window.location.href="#";
	// });

	// $("#menu-newUser").on('click' , function()
	// {
	// 	window.location.href="ajouterUser.php";
	// });

	// $("#menu-listeUser").on('click' , function()
	// {
	// 	window.location.href="listeUser.php";
	// });

	// $("#menu-struct").on('click' , function()
	// {
	// 	window.location.href="#";
	// });

	// $("#menu-typeStruct").on('click' , function()
	// {
	// 	window.location.href="#";
	// });


// Valider dans changer mot de passe
$('#change-pwd').on('click' , function()
{
	if ($('#pwd-old').val()) 
	{
		
		 var password = $('#pwd-old').val();
		
		$.ajax({
			url : "../controleurs/changerPwd.php",
			type : "POST",
			data : "password="+ password,
			dataType : "html",
			success : function(retour)
			{
				if (retour == 'Success') 
				{
					$('div[role=old-pwd]').css('display' , 'none');
					$('div[role=new-pwd]').css('display' , 'block');
					$('#pwd-old').val('');
				}
				else if (retour == 'Failed')
				{
					$('#pwd-old').val('');
				}	
										
			},
			error : function(resultat,statut,erreur)
			{
				alert('erreur');
			}
		});
	}
			
	if ($('#pwd-new').val() && $('#pwd-new').val() === $('#pwd-new-conf').val()) 
	{
		 var password = $('#pwd-new').val();
		
		$.ajax({
			url : "../controleurs/changerPwd.php",
			type : "POST",
			data : "newPassword="+ password,
			dataType : "html",
			success : function(retour)
			{
				if (retour == 'Success') 
				{
					$('div[role=new-pwd]').css('display' , 'none');
					$('button[role=footer-success]').css('display' , 'none');
					$('button#valProjetNon').html('Fermer');
					$('div[role=new-pwd-success]').css('display' , 'block');
					$('#pwd-new').val('');
					$('#pwd-new-conf').val('');
				}
				else if (retour == 'Failed')
				{
					$('#pwd-new').val('');
					$('#pwd-new-conf').val('');
				}	
										
			},
			error : function(resultat,statut,erreur)
			{
				alert('erreur');
			}
		});		
	}
	else
	{
		$('#pwd-new').val('');
		$('#pwd-new-conf').val('');
	}
});



}) (jQuery);