function showapache() {
  $('#apache').show();
  document.getElementById('select_servicio').value="";
}
function hideapache() {
  $('#apache').hide();
  document.getElementById("btn-add-service").removeEventListener("click", showapache);
  document.getElementById('select_servicio').value="";
}

function shownginx() {
  $('#nginx').show();
  document.getElementById('select_servicio').value="";
}
function hidenginx() {
  $('#nginx').hide();
  document.getElementById("btn-add-service").removeEventListener("click", shownginx);
  document.getElementById('select_servicio').value="";
}

function showvsftpd() {
  $('#vsftpd').show();
  document.getElementById('select_servicio').value="";
}
function hidevsftpd() {
  $('#vsftpd').hide();
  document.getElementById("btn-add-service").removeEventListener("click", showvsftpd);
  document.getElementById('select_servicio').value="";
}

function showmysql() {
  $('#mysql').show();
  document.getElementById('select_servicio').value="";
}
function hidemysql() {
  $('#mysql').hide();
  document.getElementById("btn-add-service").removeEventListener("click", showmysql);
  document.getElementById('select_servicio').value="";
}

function showpostgresql() {
  $('#postgresql').show();
  document.getElementById('select_servicio').value="";
}
function hidepostgresql() {
  $('#postgresql').hide();
  document.getElementById("btn-add-service").removeEventListener("click", showpostgresql);
  document.getElementById('select_servicio').value="";
}

function showpostfix() {
  $('#postfix').show();
  document.getElementById('select_servicio').value="";
}
function hidepostfix() {
  $('#postfix').hide();
  document.getElementById("btn-add-service").removeEventListener("click", showpostfix);
  document.getElementById('select_servicio').value="";
}


$(document).ready(function(){
  $('#select_servicio').change(function(){
    if($('#select_servicio').val()=="apache"){
      document.getElementById("btn-add-service").addEventListener("click", showapache);
    };
    if($('#select_servicio').val()=="nginx"){
      document.getElementById("btn-add-service").addEventListener("click", shownginx);
      $('#select_servicio').val()=="";
    };
    if($('#select_servicio').val()=="vsftpd"){
      document.getElementById("btn-add-service").addEventListener("click", showvsftpd);
      $('#select_servicio').val()=="";
    };
    if($('#select_servicio').val()=="mysql"){
      document.getElementById("btn-add-service").addEventListener("click", showmysql);
      $('#select_servicio').val()=="";
    };
    if($('#select_servicio').val()=="postgresql"){
      document.getElementById("btn-add-service").addEventListener("click", showpostgresql);
      $('#select_servicio').val()=="";
    };
    if($('#select_servicio').val()=="postfix"){
      document.getElementById("btn-add-service").addEventListener("click", showpostfix);
      $('#select_servicio').val()=="";
    };

  });
});

document.getElementById("hideapache").addEventListener("click", hideapache);
document.getElementById("hidenginx").addEventListener("click", hidenginx);
document.getElementById("hidevsftpd").addEventListener("click", hidevsftpd);
document.getElementById("hidemysql").addEventListener("click", hidemysql);
document.getElementById("hidepostgresql").addEventListener("click", hidepostgresql);
document.getElementById("hidepostfix").addEventListener("click", hidepostfix);