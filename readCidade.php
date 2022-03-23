<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Procurar Cidades";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $cnst = isset($_POST["cnst"]) ? $_POST["cnst"] : "1";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <style> 
    body{
        background-color: lightcyan;
    }
    header{
        background-color: lightblue;
        padding-top: 20px;
        font-size: 20px;
    }
    form{
        margin: 20px;
    }
    td{
        padding-right: 20px;
    }
    .icon{
        width: 25px;
    }
    .tr{
        background-color: lightblue;
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <strong><?php include_once "menu.php";?></strong>
        </nav>
    </header>
    <br><br>
    <form method="post">
    <fieldset>
        <legend>Procurar Cidade</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table border="1">
	    <tr class="tr">
            <td><b>ID</b></td>
            <td><b>Nome</b></td>
            <td><b>ID do Estado</b></td>
            <!--
            <td><b>Alterar</b></td>
            <td><b>Excluir</b></td>
-->
        </tr>
        <fieldset>
        <legend>Procurar por:</legend>
           <input type="radio" id="1" name="cnst" value="1" <?php if($cnst == 1) echo "checked" ?>>ID<br>
           <input type="radio" id="2" name="cnst" value="2" <?php if($cnst == 2) echo "checked" ?>>Nome<br>
        </fieldset>
        <br>
        <?php 
            $pdo = Conexao::getInstance();

            if($cnst == 1) {
                $consulta = $pdo->query("SELECT * FROM cidade
                                        WHERE idC LIKE '$procurar%' 
                                        ORDER BY idC");
    
            }else if($cnst == 2) {
                $consulta = $pdo->query("SELECT * FROM cidade
                                        WHERE nome LIKE '$procurar%' 
                                        ORDER BY nome");  
            }
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
	    <tr>
            <td><?php echo $linha['idC'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['idE'];?></td>
            
            <!--
            <td><a href='createCidade.php?acao=editar&idC=<?php echo $linha['idC'];?>'>
            <img class="icon" src="img/edit.svg"></a></td>
            <td><?php echo "<a href=javascript:excluirRegistro('acao.php?acao=excluir&idC={$linha['idC']}')>
            <img src='img/excluir.svg' class='icon'></a><br>";?></td>
            -->
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>