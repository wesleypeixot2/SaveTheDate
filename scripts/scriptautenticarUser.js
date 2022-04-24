function login(){
    console.log("faço a validação aqui")
    var login = $("#email").val();
    var senha = $("#senha").val();
    console.log('foiiiiii');
    $.post('../PHP/sessao.php',
    {
        login: login,
        senha: senha,
    }, function (data) {
        location.href = "../restrict/dashboard.php";
    }).fail(function(response, textStatus, errorThrown){
        if(response.status == 404){
            console.log("erro");
        }
    });
}

//Faz a validação de uma senha forte
var senhaForte = false;
function validaSenhaForca(){
    var senha = document.getElementById("senha1").value;
    //document.getElementById('impSenha').innerHTML = "Senha: "+ senha;
    var forca = 0;
    if((senha.length >= 8)){
        console.log("entra aqui");
        forca+=10;
        if(senha.match(/[a-z]/)){
            forca+=10;
            console.log("Força1 "+forca);
        }
        if( senha.match(/[A-Z]/)){
            forca+=10;
            console.log("Força2 "+forca);
        }
        if(senha.match(/[@#$%&;*]/)){
            forca+=10;
            console.log("Força3 "+forca);
        }
        if(senha.match(/[0-9]/)){
            forca+=10;
            console.log("Força4 "+forca);
        }
    } 
    if(forca >= 50){
        document.getElementById('password_fraca').innerHTML = "";
        document.getElementById('password_forte').innerHTML = "<h5>Senha Forte! :)<h5>";
        senhaForte = true;
    } else {
        document.getElementById('password_forte').innerHTML = "";
        document.getElementById('password_fraca').innerHTML = "<h5>Senha Fraca! :(<h5>";
    }
}

//Confirma se é uma senha forte e entra no sistema
function validaSenha(){
    validaSenhaForca();
    if(senhaForte){
        senha1 = document.getElementById("senha1").value;
        senha2 = document.getElementById("senha2").value;
        //console.log("Senha 01:"+ senha1);
        //console.log("Senha 02:"+ senha2);
        if(senha1==senha2){
            alert("Usuário Cadastrado com uma senha forte." + $("#email").val())
                $.ajax({
                    type:"POST",
                    url:"../PHP/confirmacaoInscricao.php",
                    data: {
                        email:$("#email").val(),
                    },
                    success: function(retorno){
                        console.log("retornoou");
                    },
                });
                return false;
        } else {
            alert("As senhas são diferentes.")
        }
    } else {
        alert("A senha não respeita os parametros de segurança solicitados pela empresa.");
    }
    return false;
}