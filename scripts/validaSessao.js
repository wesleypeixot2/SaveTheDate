$(document).ready(function(){
    $.ajax({
        type: "post",
        url: "../PHP/validaSessao.php",
        success: function(retorno){
            if(retorno == "logado"){ 
                localStorage.setItem('logado', true);
            } else {
                localStorage.setItem('logado', false);
                window.location.href = "../webpages/index.html";   
            }
        },error(a,b,c){
            localStorage.setItem('logado', false);
            window.location.href = "../webpages/index.html";    
        }
    });
    return;
});



