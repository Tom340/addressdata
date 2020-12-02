<?php
   
   function insert(){
       
       function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
        
       }
    //   登録機能
    
      include "db_config.php";
      $lastname = h($_POST["lastname"]);
      $firstname = h($_POST["firstname"]);
      $lastname_kana = h($_POST["lastname_kana"]);
      $firstname_kana = h($_POST["firstname_kana"]);
      $gender = h($_POST["gender"]);
      $bd_y = h($_POST["bd_y"]);
      $bd_m = h($_POST["bd_m"]);
      $bd_d = h($_POST["bd_d"]);
      $zipcode = h($_POST["zipcode"]);
      $pref = h($_POST["pref"]);
      $city = h($_POST["city"]);
      $address = h($_POST["address"]);
      $building = h($_POST["building"]);
      $tel = h($_POST["tel"]);
      $mail = h($_POST["mail"]);
      $memo = h($_POST["memo"]);
      
    //   $data = [$lastname,$firstname,$lastname_kana,$firstname_kana,$gender,
    //   $bd_y,$bd_m,$bd_d,$zipcode,$pref,$city,$address,$building,$tel,$mail,$memo];
    //   var_dump($data);
      
      $PDO = new PDO($dsn, $user, $pass); //MySQLのデータベースに接続
      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
      
      $sql = "INSERT INTO addressData(lastname,firstname,lastname_kana,firstname_kana,gender,bd_y,bd_m,bd_d,zipcode,pref,city,address,building,tel,mail,memo)
      VALUES (:lastname,:firstname,:lastname_kana,:firstname_kana,:gender,:bd_y,:bd_m,:bd_d,:zipcode,:pref,:city,:address,:building,:tel,:mail,:memo)";
      
      $stmt = $PDO->prepare($sql);
      $params = array(':lastname' =>$lastname,':firstname' =>$firstname,':lastname_kana'=> $lastname_kana,':firstname_kana'=>$firstname_kana,
      ':gender'=>$gender,':bd_y'=>$bd_y,':bd_m'=>$bd_m,':bd_d'=>$bd_d,':zipcode'=>$zipcode,':pref'=>$pref,':city'=>$city,
      ':address'=>$address,':building'=>$building,':tel'=>$tel,':mail'=>$mail,':memo'=>$memo);
       $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
       echo '登録完了しました'; // 登録完了のメッセージ
       
   }
?>