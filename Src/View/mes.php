<?php

/**
 * ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
 * ║                                               CONTROLE FINANCEIRO                                                 ║
 * ║  ┌─────────────────────────────────────────────────────────────────────────────────────────────────────────────┐  ║
 * ║  │ @description: Homepage of a specific month and year                                                         │  ║
 * ║  | @dir: View                                                                                                  │  ║
 * ║  │ @author: Tiago César da Silva Lopes                                                                         │  ║
 * ║  │ @date: 01/02/23                                                                                             │  ║
 * ║  └─────────────────────────────────────────────────────────────────────────────────────────────────────────────┘  ║
 * ║═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════║
 */

require_once "conexao.php";

//Variáveis
if (isset($_POST['nomeMes'])) {
  $_SESSION['nomeMes'] = $_POST['nomeMes'];
}


if (isset($_POST['statusMes'])) {
  $_SESSION['statusMes'] = $_POST['statusMes'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="../../Assets/img/calendario.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../Assets//Css//styles.css" rel="stylesheet">
  <link href="../../Assets//Css//dropdown.css" rel="stylesheet">
  <!-- Google fonts -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:ital,wght@0,300;0,500;0,900;1,500;1,900&display=swap" rel="stylesheet">

  <title><?php echo $_SESSION['nomeMes']; ?> de <?php echo $_SESSION['ano']; ?></title>
</head>

<body>
  <?php require_once "Recursos/Navegacao.php"; ?>
  <a href="home.php" class="voltar-menu">Voltar</a>
  <?php
  if ($_SESSION['nomeMes'] == "" || $_SESSION['ano'] == "") {
  ?>
    <main class='main-Mes'>
      <div class="main-mes-itens">
        <img src="../../Assets/img/error.png" alt="Error icon" width="42" height="40">
        <h2>Error de consulta</h2>
        <p>Por favor, informe um ano e mês válido na tela inicial e tente novamente.</p>
        <form action="home.php" method="post">
          <button>Voltar ao menu</button>
        </form>
       
      </div>
    </main>
  <?php
  } else {
  ?>
    <main class='main-Mes'>
      <div class="main-mes-itens">
        <img src="../../Assets/Icons/bank.png" alt="a pig bank" width="42" height="40">
        <h2><?php echo "Poupança de " . $_SESSION['ano'];  ?></h2>
        <p>Registre o dinheiro guardado nas economias.</p>
        <form action="poupancas.php" method="post">
          <button>Registrar poupanças</button>
        </form>
      </div>
      <div class="main-mes-itens">
        <img src="../../Assets/img/dia 15.png" alt="a calendar with the number 15" width="42" height="40">
        <h2>Despensas: Primeira quinzena</h2>
        <p>Registre os gastos entre o dia 05 até o dia 19, que são os dias da entrada de salário da casa.</p>
        <form action="despensas.php" method="post">
          <input type="hidden" value="<?php echo $_SESSION['statusMes'];  ?>" name="statusMes">
          <input type="hidden" value="Quinzena 1" name="quinzena">
          <button>Registrar despensas</button>
        </form>
      </div>
      <div class="main-mes-itens">
        <img src="../../Assets/img/dia 30.png" alt="a calendar with the number 30" width="42" height="40">
        <h2>Despensas: Segunda quinzena</h2>
        <p>Registre os gastos entre o dia 20 até dia 04 do próximo mês, antes de começar uma nova quinzena.</p>
        <form action="despensas.php" method="post">
          <input type="hidden" value="<?php echo $_SESSION['statusMes'];  ?>" name="statusMes">
          <input type="hidden" value="Quinzena 2" name="quinzena">
          <button>Registrar despensas</button>
        </form>
      </div>
    </main>
  <?php
  }
  ?>
</body>

</html>