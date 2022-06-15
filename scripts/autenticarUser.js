function login2(){
    var senha = CryptoJS.SHA256($("#senha").val());
    var senhaCripto = criptografar(senha);
    $.ajax({
        type: "post",
        url: "../PHP/sessao.php",
        data:{
            login: $("#email").val(),
            senha: senhaCripto
        },
        success: function(retorno){
            console.log("retorno "+retorno)
            if(retorno == "requireValidation"){ 
                location.href = "../webpages/confirmacaoCadastro.html";
            } else if(retorno == "enviarTokenConfirmacao"){
                enviaEmailConfirmacao();
                location.href = "../webpages/confirmacaoCadastro.html";
            }
        }
        ,error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Usuário ou senha inválidas!</div>"
        }
    });
    return;
}

function enviaEmailConfirmacao(){
    $.ajax({
        type: "post",
        url: "../PHP/enviaEmailValidacao.php",
        success: function(retorno){
            console.log("sucesso");
        }
        ,error(a,b,c){
            console.log("Erro no email");
        }
    });
}
