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
  <meta charset="UTF-8">
  <title>アドレス編集画面</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgL2W8xDohrTrVjYM4_K0coF3sPazo5ks&callback=initMap" async></script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="function/validation.js"></script>
</head>
<body>
  <?php
  
  // 検索画面からきた時
    if(isset($_GET['id'])){
    try {
    
        include "function/db_config.php";
        $id = str_replace('"', '', $_GET['id']);
        $PDO = new PDO($dsn, $user, $pass);
        $stmt = $PDO->prepare('SELECT * FROM addressData WHERE id = :id');
        
        $stmt->execute(array(':id' => $id));
    
        $result = "";
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_GET['id'] = "";
    } catch (Exception $e) {
              echo 'エラーが発生しました。:' . $e->getMessage();
    }
    }
    
    // 更新ボタン後の処理
    if(isset($_POST['updata'])){
      try{
        require("function/updata.php");
        
        updata();
        
        } catch (PDOException $e) {
        exit('データベースに接続できませんでした。' . $e->getMessage());
        }
        $message = "更新完了";
    }
    
    // 更新後の表示
    if(isset($_POST['id'])){
    try {
        include "function/db_config.php";
        $id = $_POST['id'];
        $PDO = new PDO($dsn, $user, $pass);
        $stmt = $PDO->prepare('SELECT * FROM addressData WHERE id = :id');
        
        $stmt->execute(array(':id' => $id));
    
        $result = "";
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $addressdata = $result['pref'].$result['city'].$result['address'];
        // echo $addressdata;
    } catch (Exception $e) {
              echo 'エラーが発生しました。:' . $e->getMessage();
    }
    }
?>
<!--地図表示-->
<script type="text/javascript">
  var map;
  var marker;
  var geocoder;
  function initMap() {
    var addressdata = '<?php echo $addressdata?>';
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
    'address': addressdata //住所
    }, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
      map = new google.maps.Map(document.getElementById('gmap'), {
        center: results[0].geometry.location,
        zoom: 17 //ズーム
     });
    marker = new google.maps.Marker({
    position: results[0].geometry.location,
    map: map
    });
    infoWindow = new google.maps.InfoWindow({
    content: '<h4>お住まい</h4>'
    });
    marker.addListener('click', function() {
      infoWindow.open(map, marker);
    });
    } else {
      alert(status);
    }
  });
}
</script>

  <h1>アドレス帳編集画面</h1>
  <div class = "link">
    <p class = "regist"><a href="./regist.php">アドレス帳登録</a></p>
    <p class = "admin"><a href="./admin.php">検索・管理画面</a></p>
    <p class ="signup"><a href="signup.php">アカウント追加登録</a></p>
    <p class = "logout"><a href="./logout.php">ログアウト</a></p>
  </div>
  <form action="./edit.php" method="post" name="registform" onsubmit="return itemCheck();">
  <table border='0' class = "input">
    <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo $result['id'];?>">
    <tr>
      <th colspan = 2>登録内容編集</th>
    </tr>
    <tr>
      <th>名前<span>(必須)</span></th>
      <td>
        姓   :<input type="text" name="lastname" value="<?php if (!empty($result['lastname'])) echo $result['lastname'];?>">
        名   :<input type="text" name="firstname" value="<?php if (!empty($result['firstname'])) echo $result['firstname'];?>">
      </td>
    </tr>
    <tr>
      <th>名前・フリガナ<span>(必須)</span></th>
      <td>
        セイ:<input type="text" name="lastname_kana" value="<?php if (!empty($result['lastname_kana'])) echo $result['lastname_kana'];?>">
        メイ:<input type="text" name="firstname_kana" value="<?php if (!empty($result['firstname_kana'])) echo $result['firstname_kana'];?>">
      </td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        <input type="radio" name="gender" value="男性" <?php if ($result['gender'] == "男性") echo "checked";?>>男性
        <input type="radio" name="gender" value="女性" <?php if ($result['gender'] == "女性") echo "checked";?>>女性
      </td>
    </tr>
    <tr>
      <th>生年月日</th>
      <td>
        <input type="text" name="bd_y" value="<?php if (!empty($result['bd_y'])) echo $result['bd_y'];?>">年
        <select name="bd_m" value="<?php if (!empty($result['bd_m'])) echo $result['bd_m'];?>">
          <option value=""></option>
          <script>
            let month = <?php if (!empty($result['bd_m'])) echo $result['bd_m']; else echo "0";?>;
            for (let i = 1; i <= 12; i++) {
              if (i == month) {
                document.write('<option value="' + i + '" selected>' + i + '</option>');
              } else {
                document.write('<option value="' + i + '">' + i + '</option>');
              }
            }
          </script>
        </select> 月
          
        <select name="bd_d" value="<?php if (!empty($result['bd_d'])) echo $result['bd_d']; else echo "0";?>">
          <option value=""></option>
          <script>
            let day = <?php if (!empty($result['bd_d'])) echo $result['bd_d']; else echo "0";?>;
          for (let i = 1; i <= 31; i++) {
              if (i == day) {
                document.write('<option value="' + i + '" selected>' + i + '</option>');
              } else {
                document.write('<option value="' + i + '">' + i + '</option>');
              }
            }
            </script>
        </select> 日
      </td>
    </tr>
    <tr>
      <th>住所</th>
      <td>
        郵便番号：<input type="text" name="zipcode" value="<?php if (!empty($result['zipcode'])) echo $result['zipcode'];?>" onKeyUp="AjaxZip3.zip2addr(this,'','pref','city','address');"><br>
        都道府県：<select name="pref" value="<?php if (!empty($result['pref'])) echo $result['pref']; else echo "0";?>">
                    <option value=""></option>
                    <script>
                    let pref = '<?php if (!empty($result['pref'])) echo $result['pref']; else echo "0";?>';
                    let prefs = ['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'];
                    
                    for (let i = 0; i <= prefs.length-1; i++) {
                    if (prefs[i] == pref) {
                     document.write('<option value="' + prefs[i] + '" selected>' + prefs[i] + '</option>');
                     } else {
                     document.write('<option value="' + prefs[i]  + '">' + prefs[i] + '</option>');
                     }
                    }
                    </script>
                    </select><br>
        市区町村：<input type="text" name="city" value="<?php if (!empty($result['city'])) echo $result['city'];?>"><br>
        番地等  ：<input type="text" name="address" value="<?php if (!empty($result['address'])) echo $result['address'];?>"><br>
        建物名  ：<input type="text" name="building" value="<?php if (!empty($result['building'])) echo $result['building'];?>"><br>
      </td>
    </tr>
    <tr>
      <th>電話番号<span>(必須・ハイフンナシ)</span></th>
      <td>
        <input type="text" name="tel" class="width-max" value="<?php if (!empty($result['tel'])) echo $result['tel'];?>">
      </td>
    </tr>
    <tr>
      <th>メールアドレス<span>(必須)</span></th>
      <td>
        <input type="text" name="mail" class="width-max" value="<?php if (!empty($result['mail'])) echo $result['mail'];?>">
      </td>
    </tr>
    <tr>
      <th>メモ</th>
      <td>
        <textarea name="memo" rows="8" cols="80" class="width-max" value="<?php if (!empty($result['memo'])) echo $result['memo'];?>"></textarea>
      </td>
    </tr>
  </table>
  <input type="submit" value="更新" class="btn" name="updata" >
  </form>
  <p><?php if(isset($message)){echo $message;}?></p> 
  
<div id="gmap"></div>

</body>
</html>