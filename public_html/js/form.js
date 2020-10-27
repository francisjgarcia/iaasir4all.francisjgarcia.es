function cargaSendMail(){


    $("#c_send").attr("disabled", true);

    $(".c_error").remove();

    var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
    var s_email = $('#c_email').val();
    var s_subject = $('#c_subject').val();
    var s_name = $('#c_name').val();
    var s_msg = $('#c_msg').val();


    if (filter.test(s_email)){
        $('#c_email').css("border-color","#aaa");
        $('#c_email').css("background","transparent");
        var sendMail = "true";
    }
    else{
        $('#c_email').css("border-color","#ee5253");
        $('#c_email').css("background","rgba(238,82,83,.05)");
        var sendMail = "false";
    }

    if (s_name.length == 0 ){
        $('#c_name').css("border-color","#ee5253");
        $('#c_name').css("background","rgba(238,82,83,.05)");
        var sendMail = "false";
    }
    else {
        $('#c_name').css("border-color","#aaa");
        $('#c_name').css("background","transparent");
    }

    if (s_msg.length == 0 ){
        $('#c_msg').css("border-color","#ee5253");
        $('#c_msg').css("background","rgba(238,82,83,.05)");
        var sendMail = "false";
    }
    else {
        $('#c_msg').css("border-color","#aaa");
        $('#c_msg').css("background","transparent");
    }

    if (s_subject.length == 0 ){
        $('#c_subject').css("border-color","#ee5253");
        $('#c_subject').css("background","rgba(238,82,83,.05)");
        var sendMail = "false";
    }
    else {
        $('#c_subject').css("border-color","#aaa");
        $('#c_subject').css("background","transparent");
    }


    if(sendMail == "true"){

     var datos = {

             "name" : $('#c_name').val(),

             "email" : $('#c_email').val(),

             "subject" : $('#c_subject').val(),

             "message" : $('#c_msg').val()

     };

     $.ajax({

             data:  datos,
             url:   '/contacto.php',

             type:  'post',

             beforeSend: function () {
                     $("#c_send").val("Enviando...");
             },

             success:  function (response) {
                document.getElementById("c_form").submit();
                $("#c_form")[0].reset();
                $("#c_send").val("Enviar");
                $("#c_information p").html(response);
                $("#c_information").fadeIn('slow');
                $("#c_send").removeAttr("disabled");
                $('#c_email').css("border-color","#aaa");
                $('#c_name').css("border-color","#aaa");
                $('#c_msg').css("border-color","#aaa");
                $('#c_subject').css("border-color","#aaa");

             }

     });

} else{
    $("#c_send").removeAttr("disabled");
}

}