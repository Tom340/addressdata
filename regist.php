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
  <title>アドレス登録画面</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="function/validation.js"></script>
</head>
<body>
  <h1>アドレス帳登録画面</h1>
  <div class = "link">
    <p class = "regist"><a href="./regist.php">アドレス帳登録</a></p>
    <p class = "admin"><a href="./admin.php">検索・管理画面</a></p>
    <p class="signup"><a href="signup.php">アカウント追加登録</a></p>
    <p class = "logout"><a href="./logout.php">ログアウト</a></p>
  </div>
  <form action="./regist.php" method="post" name="registform" onsubmit="return itemCheck();">
  <table border='0' class = "input">
    <tr>
      <th colspan = 2>新規登録</th>
    </tr>
    <tr>
      <th>名前<span>(必須)</span></th>
      <td>
        姓   :<input type="text" name="lastname" >
        名   :<input type="text" name="firstname">
  </script>
      </td>
    </tr>
    <tr>
      <th>名前・フリガナ<span>(必須)</span></th>
      <td>
        セイ:<input type="text" name="lastname_kana" >
        メイ:<input type="text" name="firstname_kana" >
      </td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        <input type="radio" name="gender" value="男性" checked>男性
        <input type="radio" name="gender" value="女性">女性
      </td>
    </tr>
    <tr>
      <th>生年月日</th>
      <td>
        <input type="text" name="bd_y">年
        <select name="bd_m">
          <option value="" selected></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select> 月
          
        <select name="bd_d">
          <option value="" selected></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select> 日
      </td>
    </tr>
    <tr>
      <th>住所</th>
      <td>
        <!--onKeyUp="AjaxZip3.zip2addr(this,'','pref','city','address');"-->
        郵便番号：<input type="text" name="zipcode" onKeyUp="AjaxZip3.zip2addr(this,'','pref','city','address');"><br>
        都道府県：<select name="pref">
                    <option value="" selected></option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                    </select><br>
        市区町村：<input type="text" name="city"><br>
        番地等  ：<input type="text" name="address"><br>
        建物名  ：<input type="text" name="building"><br>
      </td>
    </tr>
    <tr>
      <th>電話番号<span>(必須)</span></th>
      <td>
        <input type="text" name="tel" class="width-max">
      </td>
    </tr>
    <tr>
      <th>メールアドレス<span>(必須)</span></th>
      <td>
        <input type="text" name="mail" class="width-max">
      </td>
    </tr>
    <tr>
      <th>メモ</th>
      <td>
        <textarea name="memo" rows="8" cols="80" class="width-max"></textarea>
      </td>
    </tr>
  </table>
  <input type="submit" value="新規登録" class="btn" name="insert">
  </form>
  <!--CREATE TABLE addressData id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,-->
  <!--lastname VARCHAR(20), firstname VARCHAR(20), lastname_kana VARCHAR(20), -->
  <!--firstname_kana VARCHAR(20), gender VARCHAR(20), bd_y VARCHAR(10), -->
  <!--bd_m VARCHAR(5), bd_d VARCHAR(5), zipcode VARCHAR(10), pref VARCHAR(10), -->
  <!--city VARCHAR(32), address VARCHAR(64), building VARCHAR(64), -->
  <!--tel VARCHAR(20), mail VARCHAR(32), memo VARCHAR(128)-->
    <?php
    if(isset($_POST['insert'])){
    try{
      require("function/insert.php");
      insert();
      
       } catch (PDOException $e) {
       exit('データベースに接続できませんでした。' . $e->getMessage());
       }
    }
      ?>
    <!--<script src="validation.js"></script>-->
</body>
</html>