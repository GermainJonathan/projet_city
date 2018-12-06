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
        let comment = $("<div class='UnCommentaire'><div class='titreCommentaire'><h5>" + data.nom + "</h5><h5>" + data.date + "</h5><div class='commentaireTxt'><p>" + data.commentaire + "</p></div></div>");
        $("#commentaireTable").append(comment);
        $("#bodyCommentaires").find("textarea#commentaire").val("");
    });
}

function openCommentaireModal(button) {
    $('#commentaireModal').find('input#idModal').val(button.attr('id'));
    $("#commentaireModal").modal('show');
}

function confirmDeleteCommentaire(idMessage) {
    $("#commentaireModal").modal('hide');
    $.ajax({
        method: 'GET',
        url: environnement.serviceUrl + "adminDeleteCommentaireQuartier.php?id=" + idMessage
    }).done(function () {
        $.notify({
            message: "Object deleted with id : " + idMessage
        }, {
            type:'success'
        });
        $("#commentaireTable > tr > td > button#" + idMessage).parents("tr").remove();
    }).fail(function() {
        $.notify({
            message: "Error on delete object with id : " + idMessage
        }, {
            type:'warning'
        });
    });
}