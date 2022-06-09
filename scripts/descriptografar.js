function descriptografar (txtCripto){
    $.ajax({
        type: 'post',
        url: "../PHP/descriptografar.php",
        data: {
            "mensagem": txtCripto.toString()
        }
    })
}