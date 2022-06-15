function validaToken() {

    var cid = window.location.href;

    myId = cid.split('cid=');
    console.log(myId);
    $.ajax({
        type: "POST",
        url: "../PHP/validaToken.php",
        data: {
            token: $('#tokenConfirmacao').val(),
            id: myId[1],
        },
        success: function(retorno){
            if(retorno == "updated"){
                localStorage.setItem('logado', true);
                window.location.href = "../webpages/dashboard.html";    
            }
        },
        error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Token de acesso inválido!</div>"
        }
    });

}