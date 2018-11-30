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
                alert("Ok tout c'est bien passé");
                // Mettre un bootstrap notify
                // On notify comme quoi c'est envoyé
            }
            else {
                alert("Une erreur dans l'envoi");
                // Mettre un bootstrap notify
                // On notify comme quoi il y a eu une erreur dans l'envoi du formulaire
            }
          })
          .fail(function(error){
              alert(" Fatal Erreur");
              // mettre un bootstrap notify;
              // On notify commme quoi il y a eu une erreur dans l'envoi du formulaire
          });
    }
    else{
        alert("Veuillez remplir correctement tous les champs");
      // mettre un bootstrap Notify à la place
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