function sendMessage() {
    if($("#bodyCommentaires").find("input#nomCommentaire").val() === "") {
        $("#bodyCommentaires").find("input#nomCommentaire").addClass("is-invalid");
    } else {
        $("#bodyCommentaires").find("input#nomCommentaire").removeClass("is-invalid");
    }
    if($("#bodyCommentaires").find("textarea#commentaire").val() === "") {
        $("#bodyCommentaires").find("textarea#commentaire").addClass("is-invalid")
    } else {
        $("#bodyCommentaires").find("textarea#commentaire").removeClass("is-invalid")
    }
    if($("#bodyCommentaires").find("textarea#commentaire").val() === "" || $("#bodyCommentaires").find("input#nomCommentaire").val() === "") {
        return;
    }
    data = {
        'nom': $("#bodyCommentaires").find("input#nomCommentaire").val(),
        'message': $("#bodyCommentaires").find("textarea#commentaire").val(),
        'idQuartier': idQuartier
    }
    $.ajax({
        method: 'POST',
        url: environnement.serviceUrl + "sendCommentaireQuartier.php",
        data : JSON.stringify(data),
        contentType : 'application/json'
    }).done(function(data) {
        $.notify({
            message: "Thanks for comment !"
        }, {
            type:'success'
        });
        let comment = $("<tr><td>" + data.nom + "</td><td>" + data.commentaire + "</td><td>" + data.date + "</td></tr>");
        $("#commentaireTable").append(comment);
        $("#bodyCommentaires").find("input#nomCommentaire").val("");
        $("#bodyCommentaires").find("textarea#commentaire").val("");
    });
}

function openCommentaireModal() {
    $("#commentaireModal").modal('show');
}