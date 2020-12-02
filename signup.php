<?php 
 
 session_start();
 
  if(!isset($_SESSION['id'])){
    $url = "login.php";
    header("Location: {$url}");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function itemCheck() {
      let email = document.registform.mail.value;
      let password = document.registform.password.value;
      let reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
      let arg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/;
      // メールアドレスチェック
      if (email !== ""){
        if(!email.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)){
          alert("正しいメールアドレスを入力してください");
        return false;
        }
        
        }else{
        alert("メールアドレスを入力してください");  
        return false;
        }
     
      if (password !== ""){
        if(!password.match(/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/)){
          alert("半角英小文字大文字数字をそれぞれ含む8文字以上で入力してください");
        return false;
        }
        
      }else{
        alert("パスワードを入力してください");  
        return false;
      }
    }
  </script>
</head>
<body>
  <div class="login">
    <h1>ユーザー登録画面</h1>
    <form action="./signup.php" method="post" name="registform" onsubmit="return itemCheck();">
      <p>
        <input type="text" name="mail" placeholder="mail">
      </p>
      <p>
        <input type="password" name="password" placeholder="password"><br>
        *半角英小文字大文字数字をそれぞれ含む8文字以上
      </p>
      <input type="submit" value="Sign UP" class="btn" name="signup" >
      <p><a href="login.php">Log In</a></p>
    </form>
  </div>
  <?php
    if(isset($_POST['signup'])){
      try{
        require("function/Signup.php");
        
        Signup();
        
        } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
        }
    }
    
      ?>
</body>
</html>