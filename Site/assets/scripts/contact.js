// clique sur sur le bouton valider de la page contact
$("#btnValiderContact").click(function(){

    var formulaireOk =verifFormulaire();
    
    if(formulaireOk){
        var nom= $("#inputNom").val();
        var prenom=$("#inputPrenom").val();
        var mail =$("#inputEmail").val();
        var message=$("#TextAreaMessage").val();
        var sujet=$("#inputSujet").val(); 
    
        var mesDatas={ nom :nom,
                       prenom: prenom,
                       message: message,
                       mail :mail,
                       sujet:sujet };
        $.ajax({
            method: "POST",
            url:environnement.serviceUrl +"sendMessageContact.php",
            data: mesDatas
          }).done(function(data) {
            $("#inputNom").val("");
            $("#inputPrenom").val("");
            $("#inputEmail").val("");
            $("#TextAreaMessage").val("");
            $("#inputSujet").val(""); 
            if(data== null){
                alert("renvoyer un IsOk dans data ou sinon renommer la variable dans contact.js");
            }
            if(data.IsOk===true){
                //  bootstrap notify
                var message= data.message || "Ajouter un message de succès";
                MakeNotify("success",message);
            }
            else {
                //  bootstrap notify
               var message= data.message || "Ajouter un message d'erreur";
               MakeNotify("danger",message);
            }
          })
          .fail(function(error){
              // bootstrap notify
              MakeNotify("danger","Erreur Fatale de l'envoi du formulaire");
          });
    }
    else{
        // bootstrap notify
        MakeNotify("danger","Veuillez remplir tout les champs");
    }
   
});

// Verifie un champ texte lorsque que le focus s'en va du champ
$('input[type="text"]').blur(function(){
    verifChampComplet($(this));
});


// Verifie un champ email lorsque que le focus s'en va du champ
$('input[type="email"]').blur(function(){
    verifMail($(this));
});

// Fonction qui met un champ en Erreur
function SetOnError(HTMLChamp, bErreur){
   if(bErreur)
   $(HTMLChamp).addClass("SetOnError");

   else
   $(HTMLChamp).removeClass("SetOnError");

}

// function qui vérifie qu'un champ soit compléter 

function verifChampComplet(HTMLChamp){
   if(HTMLChamp.val().length < 3){
        SetOnError(HTMLChamp, true);
        return false;
   }

   else{
        SetOnError(HTMLChamp, false);
        return true;
   }
}	

// Fonction qui vérifie le mail
function verifMail(HTMLChamp){
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   
   if(!regex.test(HTMLChamp.val()))   {
    SetOnError(HTMLChamp, true);
      return false;
   }

   else{
    SetOnError(HTMLChamp, false);
      return true;
   }
}

// Fonction qui vérifie tout le formulaire
function verifFormulaire(){
   var nomOk = verifChampComplet($("#inputNom"));
   var prenomOk= verifChampComplet($("#inputPrenom"));
   var mailOk = verifMail($("#inputEmail"));
   var sujetOk= verifChampComplet($("#inputSujet"));
    
   if(nomOk && prenomOk && mailOk && sujetOk)
      return true;
	
  else{
      return false;
   }
}

function MakeNotify(nameClass, message){
    
    var message=$('<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-'+nameClass+ ' animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px; animation-iteration-count: 1;">'
    +'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>'
    +'<span data-notify="icon"></span> '
    +'<span data-notify="title"></span> '
    +'<span data-notify="message">'+message+'</span>'
    +'<a href="#" target="_blank" data-notify="url"></a></div>');

    $("#basePage").prepend(message);
}