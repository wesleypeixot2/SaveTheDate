

function esqueciMinhaSenha(){
    $.ajax({
        type:"POST",
        url:"../PHP/recuperarSenha.php",
        data: {
            email:$("#email").val(),
        },
        success: function(retorno){
            console.log("retornoou");
        },
    });
    return false;

}