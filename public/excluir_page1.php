<?php include("conexao.php"); ?>

<?php

    if(isset($_GET['id'])){ 
        $id = $_GET['id'];
    

    $query = "delete from `dados` where `id`= '$id'";

    $result = mysqli_query($conexao, $query);

    if(!$result){
        die("Query falhou");
    }
    
    else{
        header("location:index.php?exclusao=Voce excluiu com sucesso");
    }
    }
?>