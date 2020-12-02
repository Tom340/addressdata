<?php
   
   function Login(){
    //   登録機能
    // テーブル名：UserData  id mail password
      session_start();
    
      include "db_config.php";
      $mail = $_POST["mail"];
      $password = $_POST["password"];
      
      $PDO = new PDO($dsn, $user, $pass); //MySQLのデータベースに接続
      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
      
      $sql = "SELECT * FROM UserData WHERE mail = :mail";
      
      $stmt = $PDO->prepare($sql);
      $params = array(':mail'=>$mail);
      $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
      $member = $stmt->fetch();
      
      if (password_verify($_POST['password'], $member['password'])){
          session_regenerate_id(TRUE);
           $_SESSION['id'] = $member['id'];
           echo "ログイン成功"."<br>";
           $regist = "regist.php";
           header("Location: {$regist}");
        exit;

      } else {
       echo 'メールアドレスもしくはパスワードが間違っています。';
      }
   }
?>