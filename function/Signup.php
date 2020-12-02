<?php
   
   function Signup(){
       
       function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
        
       }
    //   登録機能
    // テーブル名：UserData  id mail password
      include "db_config.php";
      $mail = h($_POST["mail"]);
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      
    //   $data = [$lastname,$firstname,$lastname_kana,$firstname_kana,$gender,
    //   $bd_y,$bd_m,$bd_d,$zipcode,$pref,$city,$address,$building,$tel,$mail,$memo];
    //   var_dump($data);
      
      $PDO = new PDO($dsn, $user, $pass); //MySQLのデータベースに接続
      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
      
      $sql = "SELECT * FROM UserData WHERE mail = :mail";
      $stmt = $PDO->prepare($sql);
      $stmt->bindValue(':mail', $mail);
      $stmt->execute();
      $member = $stmt->fetch();
      
      if ($member['mail'] === $mail) {
      echo '同じメールアドレスが存在します。';
    //   echo '<a href="signup.php">戻る</a>';
      } else {
      
      
      
      $sql = "INSERT INTO UserData(mail,password)
      VALUES (:mail,:password)";
      
      $stmt = $PDO->prepare($sql);
      $params = array(':mail'=>$mail,':password'=>$password);
       $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
       $regist = "login.php";
       header("Location: {$regist}");
       echo '登録完了しました'; // 登録完了のメッセージ
      }
   }
?>