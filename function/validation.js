{
    function itemCheck() {
      let lastname = document.registform.lastname.value;
      let firstname = document.registform.firstname.value;
      let lastname_kana = document.registform.lastname_kana.value;
      let firstname_kana = document.registform.firstname_kana.value;
      let email = document.registform.mail.value;
      let tel = document.registform.tel.value;
      let reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
      // 名前チェック
      if (lastname == "" || firstname == ""){
        // 名前が空入力の場合
        alert("氏名を入力してください");  
        return false;
      }
      // フリガナチェック
      if (lastname_kana !== ""){
        if(lastname_kana.match(/[^ァ-ン]/)){
          alert("フリガナはカタカナで入力してください");
        return false;
        }
        if(firstname_kana.match(/[^ァ-ン]/)){
          alert("フリガナはカタカナで入力してください");
        return false;
        }
      }else{
        alert("フリガナを入力してください");  
        return false;
      }
      // 電話番号チェック
      if (tel !== ""){
        if(!tel.match(/^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/)){
          alert("正しい電話番号を入力してください");
        return false;
        }
        
      }else{
        alert("電話番号を入力してください");  
        return false;
      }
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
}