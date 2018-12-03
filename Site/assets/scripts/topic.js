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
        let comment = $("<tr><td></td><td>" + data.nom + "</td><td>" + data.message + "</td></tr>");
        $("#messageTopic").append(comment);
        $("#topicBody").find("input#nomTopic").val("");
        $("#topicBody").find("textarea#messageTopic").val("");
    });
}