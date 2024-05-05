<?php
include 'conexao.php';

if(isset($_POST["adicionar_aluno"])){

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $idade = $_POST["idade"];
}

//validação

if($nome == ""|| $sobrenome == ""|| $idade == ""){
    header("location:index.php?nao_validacao=VOCÊ PRECISA PREENCHER TODOS OS DADOS");
}

else{

    $query = "insert into `dados` (nome, sobrenome, idade) values('$nome', '$sobrenome', '$idade')";

    $result = mysqli_query($conexao, $query);
    if(!$result){
        die("query falhou".mysqli_error($conexao));
    }

    else{
        header("location:index.php?dados_inseridos=Aluno Inserido com sucesso");
    }
}
?>