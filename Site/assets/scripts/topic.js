function sendMessage(idTopic) {
    if($("#topicBody").find("input#nomTopic").val() === "") {
        $("#topicBody").find("input#nomTopic").addClass("is-invalid");
    } else {
        $("#topicBody").find("input#nomTopic").removeClass("is-invalid");
    }
    if($("#topicBody").find("textarea#messageTopic").val() === "") {
        $("#topicBody").find("textarea#messageTopic").addClass("is-invalid")
    } else {
        $("#topicBody").find("textarea#messageTopic").removeClass("is-invalid")
    }
    if($("#topicBody").find("textarea#messageTopic").val() === "" || $("#topicBody").find("input#nomTopic").val() === "") {
        return;
    }
    data = {
        'nom': $("#topicBody").find("input#nomTopic").val(),
        'message': $("#topicBody").find("textarea#messageTopic").val(),
        'idTopic': idTopic
    }
    $.ajax({
        method: 'POST',
        url: environnement.serviceUrl + "sendMessageForum.php",
        data : JSON.stringify(data),
        contentType : 'application/json'
    }).done(function(data) {
        $.notify({
            message: "Message sended !"
        }, {
            type:'success'
        });
        let message;
        if(data.codeProfile == null)
            message = $("<tr><td>" + data.nom + "</td><td>" + data.message + "</td><td>" + data.date + "</td></tr>");
        else
            message = $("<tr><td>" + data.nom + " ★" + "</td><td>" + data.message + "</td><td>" + data.date + "</td><td><button id=" + data.idMessage + " class='btn btn-danger' onClick='deleteMessage($(this));'>X</button></td></tr>");
        $("#topicBody > table > tbody").append(message);
        $("#topicBody").find("textarea#messageTopic").val("");
    }).fail(function() {
        $.notify({
            message: "Fail to send message. Please contact the administrator."
        }, {
            type:'warning'
        });
    });
}

function deleteMessage(button) {
    let idMessage = button.attr('id');
    $(".modal-body > input").val(idMessage);
    $("#messageModal").modal('show');
}

function confirmDelete(idMessage) {
    $("#messageModal").modal('hide');
    $.ajax({
        method: 'GET',
        url: environnement.serviceUrl + "adminDeleteMessageTopic.php?id=" + idMessage
    }).done(function () {
        $.notify({
            message: "Object deleted with id : " + idMessage
        }, {
            type:'success'
        });
        $("td > button#" + idMessage).parents("tr").remove();
    }).fail(function() {
        $.notify({
            message: "Error on delete object with id : " + idMessage
        }, {
            type:'warning'
        });
    });
}