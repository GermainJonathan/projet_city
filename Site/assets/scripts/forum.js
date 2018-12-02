// clique sur un bouton du forum dans la partie admin
$(".btnForumAdmin").click(function(){
    var idTopic= this.id;
    var idButton= this.value;
    var btn=this;
    console.log(idTopic);
    console.log(idButton);
    console.log(btn);
    $.ajax({
        method: "GET",
        url:environnement.serviceUrl +"forumMajEtatTopic.php?topic="+idTopic+"&etat="+idButton
      }).done(function(data) {
        console.log(data);
        // Modification de l'état du topic
        $(btn).parent().prev().text(data.etat);
        // Modification des boutons 
        // SI le bouton cliquer est celui de gauche (action valider)
        if($(btn).prev().length==0){
          // Si il y a un code action valide on l'affiche
          if(data.codeActionValid!=0){
            $(btn).show();
            $(btn).text(data.actionValid);
            $(btn).val(data.codeActionValid);
          }
          // Sinon on le cache
          else {
            $(btn).hide();
          }
          if(data.codeActionRefuse!=0){
            $(btn).next().show();
            $(btn).next().text(data.actionRefuse);
            $(btn).next().val(data.codeActionRefuse);
          }
          else{
            $(btn).next().hide();
          }
         
        }
        // Si le bouton cliquer est celui de droite
        else{
          if(data.codeActionValid !=0){
            $(btn).prev().show();
            $(btn).prev().text(data.actionValid);
            $(btn).prev().val(data.codeActionValid);
          }
          else{
            $(btn).prev().hide();
          }
         
          if(data.codeActionRefuse !=0){
            $(btn).show();
            $(btn).text(data.actionRefuse);
            $(btn).val(data.codeActionRefuse);
          }
          else{
            $(btn).hide();
          }
        }
      });
});

