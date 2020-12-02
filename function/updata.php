 <?php
 
 function updata(){
    
        include "function/db_config.php";
        $id = $_POST['id'];
        // $id = str_replace("'", "", $_POST['id']);
        $lastname = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $lastname_kana = $_POST["lastname_kana"];
        $firstname_kana = $_POST["firstname_kana"];
        $gender = $_POST["gender"];
        $bd_y = $_POST["bd_y"];
        $bd_m = $_POST["bd_m"];
        $bd_d = $_POST["bd_d"];
        $zipcode = $_POST["zipcode"];
        $pref = $_POST["pref"];
        $city = $_POST["city"];
        $address = $_POST["address"];
        $building = $_POST["building"];
        $tel = $_POST["tel"];
        $mail = $_POST["mail"];
        $memo = $_POST["memo"];
        
        $PDO = new PDO($dsn, $user, $pass); 
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
        
        $stmt = $PDO->prepare('UPDATE addressData SET lastname = :lastname, firstname = :firstname, lastname_kana = :lastname_kana, firstname_kana = :firstname_kana,
        gender = :gender, bd_y = :bd_y, bd_m = :bd_m, bd_d = :bd_d, zipcode = :zipcode, pref = :pref, city = :city, address = :address,
        building = :building, tel = :tel, mail = :mail, memo = :memo WHERE id = :id');
        
        $stmt->execute(array(':lastname' => $lastname, ':firstname' => $firstname, ':lastname_kana' => $lastname_kana, ':firstname_kana' => $firstname_kana,
        ':gender' => $gender, ':bd_y' => $bd_y, ':bd_m' => $bd_m, ':bd_d' => $bd_d, ':zipcode' => $zipcode, ':pref' => $pref, ':city' => $city, ':address' => $address,
        ':building' => $building, ':tel' => $tel, ':mail' => $mail, ':memo' => $memo ,':id' => $id));
        
        
        
    }
 
      ?>