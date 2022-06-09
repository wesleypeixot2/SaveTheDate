function login2(){
    console.log("faço a validação aqui");

    var login = $("#email").val();
    var senha = CryptoJS.SHA256($("#senha").val()).toString();

    $.ajax({
        type: "post",
        url: "../PHP/sessao.php",
        data:{
            login: login,
            senha: senha
        },
        success: function(retorno){
            console.log("retorno "+retorno)
            if(retorno == "requireValidation"){ 
                location.href = "../open/confirmacaoCadastro.html";
            }
        }
        ,error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Usuário ou senha inválidas!</div>"
        }
    });
    return;
}

function sair(){
    $.ajax({
        type: "post",
        url: "../PHP/sair.php",
        success: function(retorno){
            location.href = "../open/index.html";
        }
        ,error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Usuário ou senha inválidas!</div>"
        }
    });
    return;
}

