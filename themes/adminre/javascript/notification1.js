var socket = io.connect(window.location.origin + ':8080');
var dhId = $("#dhId").val();
$("#messageForm").submit(function() {
    var nameVal = $("#nameInput").val();
    var msg = $("#messageInput").val();

    socket.emit('message', {
        name: nameVal,
        message: msg
    });

    return false;
});



var socketId = 0;
socket.on('connect_error', function(err) {
    // handle server error here
    console.log('Error connecting to server');
});
socket.on('error', function(err) {

    console.log("error found", err);
	location.reload();
});
socket.on('reconnect_failed', function() {
    console.log("reconnect failed ");
});
socket.on('reconnect_error', function() {
    console.log("reconnect failed ");
});
socket.on('connect_error', function(err) {
    // handle server error here
    console.log('Error connecting to server');
});
socket.on('connect', function(err) {
    if (err) console.log("error : ", err);
    console.log("dhId", dhId);
    socket.emit('init', dhId);

    socket.on('ID', function(data) {
        console.dir("socketId recivied  : " + JSON.stringify(data));
        socketId = data;
    });


    socket.on('message', function(data) {
        var actualContent = $("#messages").html();
        var newMsgContent = '<li> <strong>' + data.name + '</strong> : ' + data.message + '</li>';
        var content = newMsgContent + actualContent;

        $("#messages").html(content);
    });



    socket.on('new_message', function(data) {
		if($("#chat-box").data("room") === data.for){
        console.log("request received FOR NEW MESSAGE" + JSON.stringify(data));
		}
        //alert("You got a new notification" + JSON.stringify(data));
    });


    socket.on('disconnect', function() {
        //
    });

});
/*
 * function for chat interface sending messages
 *
 */
var url = "http://fc05.deviantart.net/fs70/i/2010/155/1/1/Facebook_Default_Picture_by_adnac.jpg";
var template = "<li class='media media-right'><a href='javascript:void(0);' class='media-object'><img src='{{url}}' class='img-circle' alt='' height='50' width='50'></a><div class='media-body'>{{message}}<span class='clearfix'></span>                    <p class='media-meta' style='clear:both'>on {{ondate}}</p></div></li>";

$(document).ready(function() {

    $("#btnChatBox").on("click", function() {
        console.log("send clicked");
        var msg = $("#txtChatBox").val().trim();


        var socketdata = {
            "for": $("#chat-box").data("u"),
            "from": $("#chat-box").data("room"),
            "msg": msg,
            "template": "1",
            "url": url
        };
        socket.emit("chat_message", socketdata);
        render_supplier_message(socketdata);
    });
});

function render_supplier_message(data) {
    console.log(data.url);
    var temp = template;
    temp = temp.replace('{{url}}', data.url);
    temp = temp.replace("{{message}}", data.msg.toString());
    temp = temp.replace("{{ondate}}", Date().toString());
    console.log(temp);
    $("#messages ul ").append(temp);
}
