<?php

/**
 * ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
 * ║                                               CONTROLE FINANCEIRO                                                 ║
 * ║  ┌─────────────────────────────────────────────────────────────────────────────────────────────────────────────┐  ║
 * ║  │ @description: Change of a register                                                                          │  ║
 * ║  | @dir: View                                                                                                  │  ║
 * ║  │ @author: Tiago César da Silva Lopes                                                                         │  ║
 * ║  │ @date: 27/02/23                                                                                             │  ║
 * ║  └─────────────────────────────────────────────────────────────────────────────────────────────────────────────┘  ║
 * ║═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════║
 */

require_once "conexao.php";

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                                Poupancas's section                                                            │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

require_once "../Model/Poupancas_repositorio.php";

use model\Poupancas_repositorio;

$Poupancas_repositorio = new Poupancas_repositorio();

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                                Despensas's section                                                            │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

require_once "../Model/Despensas_repositorio.php";

use model\Despensas_repositorio;

require_once "../Model/Despensas.php";

use model\Despensas;

$Despensas_repositorio = new Despensas_repositorio();
$Despensas = new Despensas();


/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                               TipoDespensa's section                                                          │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/
require_once "../Model/Tipo_despensa.php";
require_once "../Model/Tipo_despensa_repositorio.php";

use model\tipo_despensa;
use model\Tipo_despensa_repositorio;

$tipo_despensa = new tipo_despensa();
$tipo_despensa_repositorio = new Tipo_despensa_repositorio();

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                               Variables                                                                       │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

$id = $_POST['id'];

$pagina_inicial = $_POST['pagina_inicial'];


if ($pagina_inicial == "POUPANCA") {
  $Despensas = $Poupancas_repositorio->consultaById($id, $pdo);
} else {
  $Despensas = $Despensas_repositorio->consultaById($id, $pdo);

  /**
   * Exibição dos options de Tipo_Despensa
   * Data: 08/05/23
   */

  $listar = $tipo_despensa_repositorio->listar($tipo_despensa, $pdo);
  $listagem_tipoDespensa = "";

  foreach ($listar as $tipo_despensa) {
    if ($tipo_despensa->getId() == $Despensas->getIdTipoDespensa()) {
      $listagem_tipoDespensa .= "<option selected value='{$tipo_despensa->getId()}'>{$tipo_despensa->getNome()}</option>";
    } else {
      $listagem_tipoDespensa .= "<option value='{$tipo_despensa->getId()}'>{$tipo_despensa->getNome()}</option>";
    }
  }
}


if (isset($_POST['foiAlterado']) && $_POST['foiAlterado'] == "ALTERADO") {

  //Variables
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];
  $dataDespensa = $_POST['dataDespensa'];


  if (isset($_POST['dataDespensa'])) {
    $dataDividida = explode("-", $_POST['dataDespensa']);
  }

  // Mês para validação
  if ($_SESSION['statusMes'] < 10) {
    $mes_selecionado = "0" . $_SESSION['statusMes'];
  } else {
    $mes_selecionado = $_SESSION['statusMes'];
  }

  /**
   * mes limite
   * Funcionamento: A quinzena 2 permite registro do dia 20/mes atual até o dia 04/próximo mes. Para isso, vamos limitar o registro para registrar apenas
   * o mes atual ou o próximo mes
   * Data: 03/03/23
   */

  if ($mes_selecionado == 12) {
    $mes_limite = 1;
  } else {
    $mes_limite = $mes_selecionado + 1;
  }


  /**
   * Mensagem Vermelha
   * Funcionamento: A validação começa com ela definida como verdadeira. Se depois de todas as validações as informações estiverem corretas, então o sistema
   * vai exibir uma mensagem de sucesso e informar que o cadastro foi feito com sucesso
   * Data: 16/02/23
   */

  if ($pagina_inicial == "POUPANCA") {
    $mensagemVermelha = true;
    if (!isset($_POST['dataDespensa'])) {
      $mensagem = "Informe uma data";
    } else if ($dataDividida[0] != $_SESSION['ano']) {
      $mensagem = "Faça um registro no ano de " . $_SESSION['ano'];
    } else if ($descricao == null) {
      $mensagem = "Por favor, preencha a descrição sobre o registro";
    } else if ($valor <= 0) {
      $mensagem = "Por favor, informe um valor positivo do dinheiro";
    } else {

      $mensagemVermelha = false;
      $mensagem = "Registro alterado!";


      $Poupancas_repositorio->alterar($descricao, $valor, $dataDespensa, $id, $pdo);
    }

  } else {
    $mensagemVermelha = true;
    if (!isset($_POST['dataDespensa'])) {
      $mensagem = "Informe uma data";
    } else if ($_SESSION['quinzena'] == "Quinzena 1" && $dataDividida[1] != $mes_selecionado) {
      $mensagem = "Selecione uma data do mes de " . $_SESSION['nomeMes'];
    } else if ($_SESSION['quinzena'] == "Quinzena 2" && $dataDividida[1] != $mes_selecionado && $dataDividida[2] > 5) {
      $mensagem = "Informe um valor da segunda quinzena até o dia 4";
    } else if (($dataDividida[1] > $mes_limite ) && $dataDividida[1] != 12 ) {
      $mensagem = "Para cadastrar na 2ª quinzena, insira registro entre o mês atual e o próximo mês.";
    } else if ($dataDividida[0] != $_SESSION['ano']) {
      $mensagem = "Faça um registro no ano de " . $_SESSION['ano'];
    } else if ($descricao == null) {
      $mensagem = "Por favor, preencha a descrição sobre o registro";
    } else if ($valor <= 0) {
      $mensagem = "Por favor, informe um valor positivo do dinheiro";
    } else if ($_SESSION['quinzena'] == "Quinzena 1" && ($dataDividida[2] < 5 || $dataDividida[2] > 19)) {
      $mensagem = "Por favor, insira um registro dentro dos dias da primeira quinzena (dia 5 até dia 19)";
    } else if ($_SESSION['quinzena'] == "Quinzena 2" && ($dataDividida[2] <= 4 || $dataDividida[2] > 31)) {
      $mensagem = "Por favor, insira um registro dentro dos dias da segunda quinzena (20 até dia 4 do próximo mês)";
    } else {
      $mensagemVermelha = false;
      $mensagem = "Registro alterado!";


      $Despensas_repositorio->alterar($descricao, $valor, $dataDespensa, $id, $_POST['tipo_despensa_selecionado'] , $pdo);
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="../../Assets/img/calendario.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../Assets//Css//styles.css" rel="stylesheet">
  <link href="../../Assets//Css//dropdown.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
  <title> Despensas de <?php echo $_SESSION['nomeMes']; ?> de <?php echo $_SESSION['ano']; ?></title>
</head>

<body>
  <?php require_once "Recursos/Navegacao.php"; ?>

  <?php
  if ($pagina_inicial == "POUPANCA") {
    echo "<form action='poupancas.php' method='post'>";
  } else {
    echo "<form action='despensas.php' method='post'>";
  }
  ?>
  <input type="hidden" name="statusMes" value="<?php echo $_SESSION['statusMes']; ?>">
  <button class="voltar-menu" style="border:none;">Voltar</button>
  </form>

  <main class="main-alterar">
    <img src="../../Assets/img/dia 15.png" alt="Calendário com a data 15" width="72" height="70">
    <h2><?php echo strtolower($pagina_inicial) . ": gastos pessoais"; ?></h2>
    <h3>Verifique o registro abaixo e o modifique</h3>

    <?php
    if (!isset($_POST['foiAlterado'])) {

      if ($pagina_inicial == "POUPANCA") {

        /*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        * │                               View da Poupança                                                                │
        * └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
    ?>
        <form action="alterar.php" method="post">
          <input type="hidden" name="foiAlterado" value="ALTERADO">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="pagina_inicial" value="<?php echo $pagina_inicial; ?>">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Descrição: </label>
            <input type="text" value="<?php echo $Despensas->getDescricao();  ?> " name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Valor:</label>
            <input type="text" value="<?php echo $Despensas->getValor();  ?> " name="valor" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Data:</label>
            <input type="text" value="<?php echo $Despensas->getData();  ?> " name="dataDespensa" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-danger">Alterar</button>
        </form>
      <?php
      } else {
        /*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        * │                               View da Despensa                                                                │
        * └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
      ?>
        <form action="alterar.php" method="post">
          <input type="hidden" name="foiAlterado" value="ALTERADO">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="pagina_inicial" value="<?php echo $pagina_inicial; ?>">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Descrição: </label>
            <input type="text" value="<?php echo $Despensas->getDescricao();  ?> " name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Valor:</label>
            <input type="text" value="<?php echo $Despensas->getValor();  ?> " name="valor" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Data:</label>
            <input type="text" value="<?php echo $Despensas->getData();  ?> " name="dataDespensa" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipo de despensa:</label>
            <select name="tipo_despensa_selecionado" required>
              <?= $listagem_tipoDespensa; ?>
            </select>
          </div>

          <button type="submit" class="btn btn-danger">Alterar</button>
        </form>
      <?php
      }
    } else {


      // Mensagem do resultado
      if ($mensagemVermelha) {
      ?>
        <div class="alert alert-danger" role="alert">
        <?php
      } else {
        ?>
          <div class="alert alert-success" role="alert">
          <?php
        }
          ?>





          <h3 class="resultado"> <?php echo $mensagem; ?> </h3>
          </div>
        <?php
      }
        ?>
  </main>



</body>

</html>