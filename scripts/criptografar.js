function criptografar(data){
    var mensagem = JSON.stringify(data).toString();
    var chave = CryptoJS.enc.Utf8.parse("1234567887654321");
    var iv = CryptoJS.enc.Utf8.parse("1234567890");
    var txtCripto  = CryptoJS.AES.encrypt(mensagem, chave, {
        iv: iv,
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.ZeroPadding,
    });
    console.log(txtCripto.toString());
    return txtCripto.toString();
}