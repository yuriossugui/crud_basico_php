<?php include('header.php');?>
<?php include('conexao.php');?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "select * from  `dados` where `id`= '$id'";
        $result = mysqli_query($conexao, $query);
        
        if (!$result) {
            die("Query falhou");
        } 
        else{ 
            
            $row = mysqli_fetch_assoc($result);
        }
    }
?>

            <?php 
            
                if(isset($_POST["alterar_aluno"])){

                    if(isset($_GET['id_new'])){
                        $idnew = $_GET['id_new'];
                    }

                        $nome = $_POST["nome"];
                        $sobrenome = $_POST["sobrenome"];
                        $idade = $_POST["idade"];

                        $query = "update `dados` set `nome` = '$nome', `sobrenome` = '$sobrenome', `idade` = '$idade' 
                        where `id`= '$idnew' ";

                        $result = mysqli_query($conexao, $query);
        
                        if (!$result) {
                            die("Query falhou");
                        } 

                        else{
                            header('location:index.php?alteracao_feita=Alteracao bem sucedida');
                        }
                }
            
            ?>

            <form action="alterar_page1.php?id_new=<?php echo $id;?>" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class=form-control value="<?php echo $row['nome']?>">
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" class=form-control value="<?php echo $row['sobrenome']?>">
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="text" name="idade" class=form-control value="<?php echo $row['idade']?>">
                </div>
                <input type="submit" class="btn btn-success" name="alterar_aluno" value="Alterar">
            </form>

<?php include('footer.php')?>