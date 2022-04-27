<?php

$senha = $_POST["senhaLogin"];

$senhaSegura = password_hash($senha, PASSWORD_DEFAULT)
