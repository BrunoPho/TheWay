<!--    MONTAR O HTML DESTA PÁGINA - CABECALHO, MENU, E A LISTA DAS MONTADORAS LOGO ABAIXO-->

<html>
<head>

    <title> Lista de Montadoras </title>

</head>
<body>


</body>

</html>



<?php

include 'cabecalho.html';
include 'rodape.html';

// VAI GERAR A LISTA DAS MONTADORAS
foreach ($montadoras as $montadora){

    $montadoras = [Group_Daimler_AG, Volvo, BeiqiFoton, Motor, Group, Scania, Iveco, Renault, Hyundai];

    echo $montadora['nome'];
}