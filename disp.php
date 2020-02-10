<?php

    require ("config.php");

    if(isset($_POST["page"])){
      if( $_POST["sort_type"] == "standard"){
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=". $_POST["q"] ."&page=" . $_POST["page"] ."&hits=28&applicationId=" . APPLICATIONID;
      }
      else {
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=". $_POST["q"] ."&page=" . $_POST["page"] . "&hits=28&sort=". $_POST['sort_order']  . $_POST['sort_type'] . "&applicationId=" . APPLICATIONID;
      }
    }
    else if( $_POST["sort_type"] == "standard"){
      $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=". $_POST["q"] ."&page=1&hits=28&applicationId=" . APPLICATIONID;
    }
    else {
      $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=". $_POST["q"] ."&page=1&hits=28&sort=". $_POST['sort_order']  . $_POST['sort_type'] . "&applicationId=" . APPLICATIONID;
    }
    // cURLセッションを初期化
    $ch = curl_init();

    // オプションを設定
    curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

    // URLの情報を取得
    $response =  curl_exec($ch);

    //jsonデータを連想配列に変換
    $arr = json_decode($response,true);
    curl_close($ch);

    $rakuten = $arr["Items"];
 ?>
<div class="row" style="display: flex; flex-wrap: wrap;">
 <?php
 foreach ($rakuten as $item) :
 ?>
 <div class="col s12 m6 l3">
   <div class="card">
    <div class="card-image center">
      <img src=' <?= reset($item['Item']['mediumImageUrls'][0]);?>' style="width: 100%;height:auto;object-fit: cover; ">
    </div>
    <div class="card-content">
      <h5><?=   number_format($item['Item']["itemPrice"]) ?>円</h5>
      <p>
        <?php
        if(strlen($item['Item']['itemName']) > 50){
          $item['Item']['itemName'] = mb_substr($item['Item']['itemName'],0,50);
          $item['Item']['itemName'] = $item['Item']['itemName'] . " ･･･" ;
        }
        echo $item['Item']['itemName'];
        ?>
      </p>
      <a class="btn" href="<?= $item['Item']['itemUrl']?>">楽天へ</a>
    </div>
   </div>
 </div>
 <?php
 endforeach;
  ?>
</div>
