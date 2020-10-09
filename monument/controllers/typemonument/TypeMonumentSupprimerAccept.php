<?php

    require_once("../../models/typemonument/typeMonumentModel.php");
    session_start();

    $vTypeMonumentId = $_POST['idTypeMonument'];

    //controle si libelle est vide
    

    typeMonument_Delete($vTypeMonumentId);

    Header("Location: ../../controllers/typemonument/typeMonumentListerAccept.php");

?>