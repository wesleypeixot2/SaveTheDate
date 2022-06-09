//Faz a validação de uma senha forte
var senhaForte = false;
function validaSenhaForca(){
    var senha = document.getElementById("senha1").value;
    var forca = 0;
    if((senha.length >= 8)){
        forca+=10;
        if(senha.match(/[a-z]/)){
            forca+=10;
        }
        if(senha.match(/[A-Z]/)){
            forca+=10;
        }
        if(senha.match(/[@#$%&;*]/)){
            forca+=10;
        }
        if(senha.match(/[0-9]/)){
            forca+=10;
        }
    } 
    if(forca >= 50){
        document.getElementById('password_fraca').innerHTML = "";
        document.getElementById('password_forte').innerHTML = "Senha Forte!";
        senhaForte = true;
    } else {
        document.getElementById('password_forte').innerHTML = "";
        document.getElementById('password_fraca').innerHTML = "  Senha fraca, é obrigatório ter: ";
        document.getElementById('password_fraca').innerHTML += "<br> - Ao menos um caracter maiúsculo e um minúsculo;";
        document.getElementById('password_fraca').innerHTML += "<br> - Ao menos um caracter especial (@#$%&;*);";
        document.getElementById('password_fraca').innerHTML += "<br> - Ao menos 8 caracteres (números e letras);";
    }
}

//Confirma se é uma senha forte e faz o envio do email para finaliza o cadastro do usuário
function validaSenha(){
    if(senhaForte){
        senha1 = document.getElementById("senha1").value;
        senha2 = document.getElementById("senha2").value;
        if(senha1==senha2){
            var hash = CryptoJS.SHA256($("#senha1").val());
            $("#senha_hash").val(hash);
            var dados = $("#formulario_cadastro").serialize();
            $.ajax({
                type: "POST",
                data: dados,
                url: "../PHP/cadastro.php",
                success: function(retorno){
                    if(retorno == 'fail'){
                        document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Errro ao cadastrar usuário!</div>"                
                    } else {
                        document.getElementById('messages').innerHTML = "<div class='alert alert-success' role='alert'>Finalize seu cadastro fazendo o login e confirmando o código via e-mail!</div>"
                        window.location.href = "../open/login.html";
                    }
                },
            });
        } else {
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>As senhas não são iguais!</div>"
        }
    } else {
        validaSenhaForca();
        document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>A senha não respeita os parametros de segurança solicitados pela empresa.!</div>"
    }
    return false;
}
