// clique sur un bouton du forum dans la partie admin
$(".btnForumAdmin").click(function(){
    var idTopic= this.id;
    var idButton= this.value;
    var btn=this;
    $.ajax({
        method: "GET",
        url:environnement.serviceUrl +"forumMajEtatTopic.php?topic="+idTopic+"&etat="+idButton
      }).done(function(data) {
        // Modification de l'état du topic
        $(btn).parent().prev().text(data.etat);
        // Modification des boutons ??? Voir le php car PB boutons
        if($(btn).prev().length==0){
          $(btn).text(data.actionValid);
          $(btn).val(data.codeActionValid);
          $(btn).next().text(data.actionRefuse);
          $(btn).next().val(data.codeActionRefuse);
        }
        else{
          $(btn).prev().text(data.actionValid);
          $(btn).prev().val(data.codeActionValid);
          $(btn).text(data.actionRefuse);
          $(btn).val(data.codeActionRefuse);
        }
        
      });
});