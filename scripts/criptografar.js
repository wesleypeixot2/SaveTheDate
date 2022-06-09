function criptografar(data){
    var mensagem = JSON.stringify(data).toString();
    //var salt = CryptoJS.lib.WordArray.random(128 / 8);
    var salt = CryptoJS.enc.Utf8.parse("1234567890123456");
    var iv = CryptoJS.enc.Utf8.parse("1234567890");
    //CryptoJS.lib.WordArray.random();
    var txtCripto  = CryptoJS.AES.encrypt(mensagem, salt, {
        iv: iv,
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.ZeroPadding
    });
    return txtCripto;
    /*
    $.ajax({
        type: 'post',
        url: "../PHP/descriptografar.php",
        data: {
            "mensagem": txtCripto.toString()
        }
    });*/
}