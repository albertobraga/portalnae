<?php
$conectar = mysqli_connect('localhost','root','', 'portalnae') or die ("Erro na conexão");

mysqli_select_db($conectar,'portalnae');
mysqli_set_charset( $conectar, 'utf8');
?>