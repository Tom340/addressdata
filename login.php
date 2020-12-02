<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
   <script>
    function itemCheck() {
      let email = document.registform.mail.value;
      let password = document.registform.password.value;
      let reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
      let arg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/;
      // メールアドレスチェック
      if(email !== ""){
        if (reg.test(email)) {
          return true;
        } else {
          alert("正しいメールアドレスを入力してください");
        return false;
        }
      }else{
        alert("メールアドレスを入力してください");
        return false;
      }
      
    }
    </script>
</head>
<body>
  <div class="login">
    <h1>ログイン画面</h1>
    <form action="./login.php" method="post" name="registform" onsubmit="return itemCheck();">
      <p>
        <input type="text" name="mail" placeholder="mail">
      </p>
      <p>
        <input type="password" name="password" placeholder="password">
      </p>
      <input type="submit" value="login" class="btn" name="login" >
      <p>テスト用アカウント</p>
      <p>email:Test@gmail.com</p>
      <p>pass:Test1234</p>
    </form>
  </div>
   <?php
    if(isset($_POST['login'])){
      try{
        require("function/Login.php");
        
        Login();
        
        } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
        }
    }
    
      ?>
</body>
</html>