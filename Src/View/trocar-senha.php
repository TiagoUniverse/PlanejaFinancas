<?php

/**
 * ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
 * ║                                               CONTROLE FINANCEIRO                                                 ║
 * ║  ┌─────────────────────────────────────────────────────────────────────────────────────────────────────────────┐  ║
 * ║  │ @description: Register of all money spent                                                                   │  ║
 * ║  | @dir: View                                                                                                  │  ║
 * ║  │ @author: Tiago César da Silva Lopes                                                                         │  ║
 * ║  │ @date: 02/02/23                                                                                             │  ║
 * ║  └─────────────────────────────────────────────────────────────────────────────────────────────────────────────┘  ║
 * ║═══════════════════════════════════════════════════════════════════════════════════════════════════════════════════║
 */

require_once "conexao.php";
require_once "Recursos/Navegacao.php";

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                                Usuario's section                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

require_once "../Model/Usuario_repositorio.php";

use model\Usuario_repositorio;

require_once "../Model/Usuario.php";

use model\Usuario;

$Usuario = new Usuario();
$Usuario_repositorio = new Usuario_repositorio();

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │                                Function's section                                                             │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

if (isset($_POST['status_alteracao']) && $_POST['status_alteracao'] == "ALTERANDO A SENHA") {

  $mensagemVermelha = true;

  if ($_POST['senha'] != $_POST['repitaSenha']) {
    $mensagem = "Informe senhas iguais!";
  } else {

    $return = $Usuario_repositorio->alterar_senha($_POST['senha'], $_SESSION['user_id'], $pdo);

    if ($return) {
      $mensagem = "Alteração de senha com sucesso!";
      $mensagemVermelha = false;
    } else {
      $mensagem = "Falha na alteração de senha! Por favor, tente novamente.";
    }
  }

  // Mensagem do resultado
  if ($mensagemVermelha) {
    echo "<div class='mensagem-alertDanger'> ";
  } else {
    echo "<div class='mensagem-alertSucess'> ";
  }
  echo $mensagem;
  echo "</div>";
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

  <title>Alteração de senha</title>
</head>

<body>
  <?php require_once "Recursos/Navegacao.php"; ?>
  <a href="home.php" class="voltar-menu">Voltar</a>
  <div class="Senha-group">
    <main class="main-Senha">
      <h2>Trocar senha</h2>
      <form action="trocar-senha.php" method="post">
        <input type="hidden" name="status_alteracao" value="ALTERANDO A SENHA">
        <label>• Senha:</label><input type="password" name="senha" required>
        <label>• Repita a senha:</label><input type="password" name="repitaSenha" required>
        <button type="submit">Alterar a senha</button>
      </form>
    </main>
  </div>


</body>

</html>