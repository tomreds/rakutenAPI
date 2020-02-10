
$(function() {


  $('select').formSelect();

  $('.pagination').hide();
  $("#loading").hide();
  $('#invalid').hide();

  //  検索フィールドでエンターを押した時にボタンクリックのトリガー
  $("#input").on("keydown", function(e) {
    if(e.keyCode === 13) {
      $("#search").trigger("click");
    }
  });


    //  検索ボタンが押された時
  $("#search").on("click", function() {
    click_load();
  });

    //  ソートボタン（タイプ）が押された時
  $("#sort_type").change(function() {
    click_load();
  });

    //  ソートボタン（順）が押された時
  $("#sort_order").change(function() {
    click_load();
  });

    //ページボタンが押された時
  $('.pagination li').on("click", function() {
    click_load_page($(this).index());
  });

});

function click_load(){
  if($('#input').val() == ""){
    $('#invalid').show();
    $('.pagination').hide();
  }
  else{
    $('#invalid').hide();
    $("#loading").show();
    $( "#Container" ).load( "disp.php", { q: $('#input').val(), sort_type: $('#sort_type').val(),
    sort_order: $('#sort_order').val()}, function() {
      $('.pagination').show();
      $('li').removeClass("active");
      $('#li1').addClass("active");
      $("#loading").hide();
      $('#pagenum').text("1");
    });
  }
}

function click_load_page( index ){

  var num;
  if($('#input').val() == ""){
    $('#invalid').show();
    $('.pagination').hide();
  }
  else {

      if( index == 0 && $('#pagenum').text() != "1" ){
        num =  parseInt($('#pagenum').text(), 10) - 1;
        if( num == 1){
          $("#prev").addClass("disabled");
          $('#pagenum').text(num);
        }
        else{
          $('#pagenum').text(num);
        }
        load_page( num );
      }
    if( index == 2 ){
      if($('#pagenum').text() == "1"){
        $("#prev").removeClass("disabled");
      }
      num =  parseInt($('#pagenum').text(), 10) + 1;

      $('#pagenum').text(num);
      load_page( num );
    }
  }

}


function load_page( num ){
  $('#invalid').hide();
  $("#Container").hide();
  $("#loading").show();
  $( "#Container" ).load( "disp.php", { q: $('#input').val(), sort_type: $('#sort_type').val(),
  sort_order: $('#sort_order').val() , page: num}, function() {
    $("#Container").show();
    $('.pagination').show();
    $("#loading").hide();
  });

}
