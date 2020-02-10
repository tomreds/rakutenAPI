<?php

  require ("config.php");
 ?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= TITLENAME ?></title>
  </head>
  <body class="grey lighten-5">

    <div class="container">

      <!-- 検索フィールド -->
      <div class="row" style="margin: 10px 0 0;">
        <div class="card">
          <div class="card-content row s12">

            <div class="col s3">
                <div class="input-field col s12">
                   <select id="sort_type">
                     <option value="standard" selected>標準</option>
                     <option class="active" value="reviewCount">レビュー件数</option>
                     <option class="active" value="reviewAverage">レビュー平均点</option>
                     <option class="active" value="itemPrice">価格順</option>
                     <option class="active" value="updateTimestamp">商品更新日時順</option>
                   </select>
                   <label>並び順</label>
                 </div>
              </div>

            <div class="col s2">
              <div class="input-field col s12">
                 <select id="sort_order">
                    <option class="active" value="-">降順</option>
                    <option value="+">昇順</option>
                 </select>
                 <label>降順 / 昇順</label>
               </div>
            </div>

            <div class="input-field col s4">
              <input id="input" placeholder="検索ワードを入力してください"></input>
              <p id="invalid" class="red-text">検索ワードが入力されていません</p>
            </div>

            <div class="input-field col s2">
              <button class = "btn" id = "search"><i class="material-icons left">search</i>検索</button>
            </div>

          </div>
        </div>
      </div>

      <ul class="pagination center">
        <li id="prev" class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect active"><a id="pagenum" href="#!">1</a></li>
        <li id="next" class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
      </ul>


      <div id="Container">
      </div>

        <!-- ローディングの時の画像 -->
      <div id="loading" class="center" class="row">
          <div class="col s2 offset-s5">
              <div class="preloader-wrapper big active">
                  <div class="spinner-layer spinner-red-only">
                      <div class="circle-clipper left">
                          <div class="circle"></div>
                      </div><div class="gap-patch">
                          <div class="circle"></div>
                      </div><div class="circle-clipper right">
                          <div class="circle"></div>
                      </div>
                    </div>
                </div>
                <h5>NOW LOADING</h5>
            </div>
      </div>

    </div>
  </body>
  <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="script.js"></script>
</html>
