<?php
    $arquivo = $_FILES["file"];

   //move_uploaded_file($arquivo["tmp_name"], "../imagens/01.png")

   $imagem_temp = imagecreatefrompng($arquivo["tmp_name"]);
   $largura = 200;
   $largura_original = imagesx($imagem_temp);
   $altura_original = imagesy($imagem_temp);
   $porcentagem = (($largura*100) / $largura_original)*0.01;
   $largura_nova = $largura_original*$porcentagem;
   $altura_nova = $altura_original*$porcentagem;
   $imagem_redimensionada = imagecreatetruecolor($largura_nova, $altura_nova);
   imagecopyresampled($imagem_redimensionada, $imagem_temp, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original, $altura_original);
   imagepng($imagem_redimensionada, "../imagens/01.png");


?>
