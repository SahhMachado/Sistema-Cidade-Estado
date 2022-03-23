<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastrar Cidade</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <script>
        function validaPagina(){
    		var objNome = document.getElementById("nome");
    		if (objNome.value == ""){
    			alert("Informe o nome");
    			objNome.focus();
    			return false;
    		}
    		return true;
    	} 
    </script>
    <?php
    include_once "acao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
    $idC = isset($_GET['idC']) ? $_GET['idC'] : "";
    if ($idC > 0)
        $dados = buscarDados($idC);
}
?>
<style>
   body{
      margin: 20px;
      background-color: lightcyan;
   }
   .cons{
      font-size: 20px;
      font-weight: bold;
   }
   input{
      background-color: lightblue;
   }
</style>
</head>
<body>
</br></br>
   <a href="readCidade.php" class="cons">Consulta</a>
</br></br>
    <form method="post" action="acao.php">
    <br>
    <div class="form-group">
        <label for="id">ID:</label><br>
           <input readonly name="idC" id="idC" type="text" value="<?php if ($acao == "editar") echo $dados['idC']; else echo 0;?>"><br>
        </div> 

        <div class="form-group">
        <label for="nome">NOME:</label><br>
           <input required=true  name="nome" id="nome" type="text" value="<?php if ($acao == "editar") echo $dados['nome'];?>"><br>
        </div> 

        <div class="form-group">
        <label>ESTADO:</label>
        <br>
        <select name="idE" id="idE">
           <?php
           $pdo = Conexao::getInstance();
           $consulta = $pdo->query("SELECT idE, nome FROM estado");
           while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>

           <option value="<?php echo $linha['idE']?>">
           <?php echo $linha['nome'];?>
         </option>
         <?php } ?>
        </select>
        </div>
        <br>
        <button name="acao" value="salvar" id="acao" type="submit" 
        onclick="return validaPagina();">
                Salvar
                </button>
    </form>
</body>
</html>