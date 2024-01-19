<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="../../Assets/img/calendario.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../../Assets//Css//login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="parent clearfix">

    <div class="login">
      <div class="container">
        <h1>Controle<br />monetário</h1>

        <div class="login-form" style="margin-top:90px">
          <form action="login.php" method="post">
            <input type="hidden" name="status_login" value="FAZENDO LOGIN">
            <input type="email" placeholder="E-mail" name="email" required>
            <input type="password" placeholder="Senha" name="senha" required>

            <div class="forget-pass">
              <a href="nova_conta.php">Criar Conta</a>
            </div>

            <button type="submit">Acessar</button>

          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>