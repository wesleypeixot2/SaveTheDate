function toggleMenu() {
    const nav = document.getElementById('navBarMobile');
    nav.classList.toggle('active');
}

function sair(){
    $.ajax({
        type: "post",
        url: "../PHP/sair.php",
        success: function(retorno){
            location.href = "../webpages/index.html";
        }
        ,error(a,b,c){
            document.getElementById('messages').innerHTML = "<div class='alert alert-danger' role='alert'>Usuário ou senha inválidas!</div>"
        }
    });
    return;
}
