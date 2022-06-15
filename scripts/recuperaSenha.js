function esqueciMinhaSenha(){
    $.ajax({
        type:"POST",
        url:"../PHP/recuperarSenha.php",
        data: {
            email: $("#email").val(),
        },
        success: function(retorno){
            if(retorno == "success"){
                window.location.href = "../webpages/recuperarSenha.html";    
            }
        },
        error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>E-mail inválido!</div>"
        }
    });
    return false;
}

function salvarNovaSenha(){
    console.log("entrei");
    var senha1 = $("#senha1").val();
    var senha2 = $("#senha2").val();
    if(senha1 == senha2){
        var hash = CryptoJS.SHA256($("#senha1").val());
        var hashCritografada = criptografar(hash);
        $("#senha_hash").val(hashCritografada);

        $.ajax({
            type: "POST",
            url:"../PHP/atualizarSenha.php",
            data: {
                email: $("#email").val(),
                token: $("#tokenConfirmacao").val(),
                senha: $("#senha_hash").val(),
            },
            success: function(retorno){
                console.log(retorno)
                if(retorno == 'success'){
                    window.location.href = "../webpages/login.html";    
                } else {
                    document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Dados inválidos, tente novamente!</div>"    
                }
            },
            error(a,b,c){
                document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Dados incorretos, tente novamente!</div>"
            }
        });
    } else {
        document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>As senhas não são iguais, favor validar.</div>"
    }
}

function salvarNovaSenhaLogado(){
    console.log("entrei");
    var senha1 = $("#senha1").val();
    var senha2 = $("#senha2").val();
    if(senha1 == senha2){
        var hash = CryptoJS.SHA256($("#senha1").val());
        var hashCritografada = criptografar(hash);
        $("#senha_hash").val(hashCritografada);
        $.ajax({
            type: "POST",
            url:"../PHP/atualizarSenhaLogado.php",
            data: {
                senha: $("#senha_hash").val(),
            },
            success: function(retorno){
                console.log(retorno)
                if(retorno == 'success'){
                    document.getElementById('messages').innerHTML = "<div class='alert alert-success' role='alert'>Senha Alterada com Sucesso!</div>"    
                } else {
                    document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Dados inválidos, tente novamente!</div>"    
                }
            },
            error(a,b,c){
                document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Dados incorretos, tente novamente!</div>"
            }
        });
    } else {
        document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>As senhas não são iguais, favor validar.</div>"
    }
}