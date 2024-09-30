<?php

    if(!empty($_GET['id']))
    {
        include_once('assets/php/conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM pet WHERE id=$id";

        $result = $mysqli->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM pet WHERE id=$id";
            $resultDelete = $mysqli->query($sqlDelete);
        }
    }
    header('Location: my-account.php');
   
?>