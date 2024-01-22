<?php

/**
 * ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
 * ║                                               CONTROLE FINANCEIRO                                                 ║
 * ║  ┌─────────────────────────────────────────────────────────────────────────────────────────────────────────────┐  ║
 * ║  │ @description: Homepage                                                                                      │  ║
 * ║  | @dir: View                                                                                                  │  ║
 * ║  │ @author: Tiago César da Silva Lopes                                                                         │  ║
 * ║  │ @date: 25/01/23                                                                                             │  ║
 * ║  └─────────────────────────────────────────────────────────────────────────────────────────────────────────────┘  ║
 * ║═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════║
 */

require_once "conexao.php";

//Atualizando session
$_SESSION['nomeMes'] = null;
$_SESSION['statusMes'] = null;
$_SESSION['quinzena'] = null;

//Variáveis
if (!isset($_SESSION['ano'])) {
  $_SESSION['ano'] = date("Y");;
}

if (isset($_POST['limpaFiltro']) && $_POST['limpaFiltro'] == 1) {
  $_SESSION['ano'] = null;
} else if (isset($_POST['ano']) != null) {
  $_SESSION['ano'] = $_POST['ano'];
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

  <title>Planeja Finanças</title>
</head>

<body>
  <?php require_once "Recursos/Navegacao.php"; ?>
  <form method="POST" action="home.php" class="input-pesquisar">
    <select name="ano" class="input-pesquisar-items">
      <?php
      for ($year = (int)date('Y'); 1900 <= $year; $year--) : ?>
        <option value="<?= $year; ?>" n><?= $year; ?></option>
      <?php endfor; ?>
    </select>
    <button type="submit" class="input-pesquisar-items">Pesquisar</button>
  </form>
  <h2 class="actual-year"><?php echo $_SESSION['ano']; ?></h2>
  <div class="gallery">
    <form action="mes.php" method="post">
      <input type="hidden" value="1" name="statusMes">
      <input type="hidden" value="Janeiro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//1.png' alt="january"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="2" name="statusMes">
      <input type="hidden" value="Fevereiro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//february.png' alt="february"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="3" name="statusMes">
      <input type="hidden" value="Março" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//march.png' alt="march"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="4" name="statusMes">
      <input type="hidden" value="Abril" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//april.png' alt="april"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="5" name="statusMes">
      <input type="hidden" value="Maio" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//may.png' alt="may"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="6" name="statusMes">
      <input type="hidden" value="Junho" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//june.png' alt="june"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="7" name="statusMes">
      <input type="hidden" value="Julho" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//july.png' alt="july"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="8" name="statusMes">
      <input type="hidden" value="Agosto" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//august.png' alt="August"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="9" name="statusMes">
      <input type="hidden" value="Setembro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//september.png' alt="september"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="10" name="statusMes">
      <input type="hidden" value="Outubro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//october.png' alt="october"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="11" name="statusMes">
      <input type="hidden" value="Novembro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//november.png' alt="november"></button>
    </form>
    <form action="mes.php" method="post">
      <input type="hidden" value="12" name="statusMes">
      <input type="hidden" value="Dezembro" name="nomeMes">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//december.png' alt="december"></button>
    </form>
    <form action="poupancas.php" method="post">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//savings.png' alt="savings"></button>
    </form>
    <form action="graficos.php" method="post">
      <input type="hidden" value="<?php echo $_SESSION['ano']; ?>" name="ano">
      <button type="submit"><img src='../../Assets//img//pie-chart.png' alt="Tela de exibição de gráficos"></button>
    </form>
  </div>
</body>

</html>