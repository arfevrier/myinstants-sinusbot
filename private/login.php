<!-- Opensource Github: https://github.com/arlextra/myinstants-sinusbot -->
<!-- 					By ArLextra https://arlextra.fr/ 				-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sinusbot - Myinstants | Login</title>
<link rel="stylesheet" href="public/style.css">
</head>
<body style="font-family: 'Roboto', sans-serif;margin-top: 8px;background-color: white!important;">
<div class="login-card">
  <h1>Sinusbot | Myinstants</h1>
  <br><?php if(isset($login_incorrect)){echo $login_incorrect;} ?></br>
  <form method="post">
    <input type="text" name="user" placeholder="Username / eMail">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="Login">
  </form>
  <div class="login-help"> <a href="#">Use your Sinusbot login</a></div>
</div>
</body>
</html>
