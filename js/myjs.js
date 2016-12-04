//time out pour notifcation
setTimeout(function() {
        $('#toast-container').hide();
    }, 5000);

//Fonction test égalité mot de passe avant inscription
$("#password_confirmation").blur(function(){
  if (document.getElementById('password_confirmation').value == "" || document.getElementById('password1').value == "") {
    document.getElementById('password_confirmation').className = "";
    document.getElementById('password1').className = "";
  } else if(document.getElementById('password1').value == document.getElementById('password_confirmation').value){
    document.getElementById('password_confirmation').className = "valid";
    document.getElementById('password1').className = "valid";
  } else {
    document.getElementById('password_confirmation').className = "invalid";
    document.getElementById('password1').className = "invalid";
  }
});
$("#password1").blur(function(){
  if (document.getElementById('password_confirmation').value == "" || document.getElementById('password1').value == "") {
    document.getElementById('password_confirmation').className = "";
    document.getElementById('password1').className = "";
  } else if(document.getElementById('password1').value == document.getElementById('password_confirmation').value){
    document.getElementById('password_confirmation').className = "valid";
    document.getElementById('password1').className = "valid";
  } else {
    document.getElementById('password_confirmation').className = "invalid";
    document.getElementById('password1').className = "invalid";
  }
});


// Fonction test login existant avant inscription
$("#username1").keyup(function() {
  if($("#username1").val().length  > 2  ){
    $.post(CFG.url + 'utilisateurs/exist_username',
    {
      token: CFG.token,
      username : $("#username1").val()
    },
    function(data) {
      if (data['exist']){
        $("#username1").addClass("invalid").removeClass("valid");
      }else {
        $("#username1").addClass("valid").removeClass("invalid");
      }
    },
    'json');
  } else {
    $("#username1").removeClass("valid").removeClass("invalid");
  }
});

//Fonction verifiant l'email
$("#email").blur(function(data) {
  if ($("#email").val() == "") {
    $("#email").removeClass("invalid").removeClass("valid");
  } else if($("#email").val().indexOf('@') > -1 && !$("#email").val().endsWith('@') && !$("#email").val().startsWith('@')){
    $.post(CFG.url + 'utilisateurs/exist_email',
    {
      token : CFG.token,
      email : $("#email").val()
    },
    function(data){
      if (data['exist']){
        $("#email").addClass("invalid").removeClass("valid");
      }else {
        $("#email_label").attr('data-error','Un compte est déja enregistré avec cet email !');
        $("#email").addClass("valid").removeClass("invalid");
      }
    },
    'json');
  } else {
    $("#email_label").attr('data-error','Veuillez entrez une addresse mail valide !');
    $("#email").addClass("invalid").removeClass("valid");
  }
});
