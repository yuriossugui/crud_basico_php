<?php include("header.php"); ?>
<?php include("conexao.php"); ?>

<div class="box1">
<h2>TODOS OS ALUNOS</h2>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >ADICIONAR ALUNO</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>SOBRENOME</th>
            <th>IDADE</th>
            <th>ALTERAR</th>
            <th>EXCLUIR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from  `dados`";
        $result = mysqli_query($conexao, $query);
        
        if (!$result) {
            die("Query falhou: " . mysqli_error($conexao));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['sobrenome']; ?></td>
                    <td><?php echo $row['idade']; ?></td>
                    <td><a href="alterar_page1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">ALTERAR</a></td>
                    <td><a href="excluir_page1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">EXCLUIR</a></td>
                </tr>
            <?php
            }
        }
        ?>
    </tbody>
</table>

<?php 

//MENSAGEM DE VALIDAÇÃO

if(isset($_GET['nao_validacao'])){
   echo "<h6>".$_GET['nao_validacao']."</h6>";
}

?>

<?php 

//MENSAGEM DE VALIDAÇÃO

if(isset($_GET['dados_inseridos'])){
   echo "<h6>".$_GET['dados_inseridos']."</h6>";
}

?>

<?php
    if(isset($_GET["exclusao"])){
        echo "<h6>".$_GET['exclusao']."</h6>";
    }

?>

<?php
    if(isset($_GET["alteracao_feita"])){
        echo "<h6>".$_GET['alteracao_feita']."</h6>";
    }

?>


<form action="insert_data.php" method="post">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Alunos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class=form-control>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" class=form-control>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="text" name="idade" class=form-control>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-success" name="adicionar_aluno" value="Adicionar">
      </div>
    </div>
  </div>
</div>
</form>

<?php include("footer.php"); ?>
