$.ajax({
  type:'POST',
  url:'../chat/controller/showmessage_inc.php',
  dataType: "json",
  success:function(data){
      var box = $("#dataid");
      for (i = 0; i < 10; i++) {
        box.append("<a class=' font-weight-bold main-color'>" + data[i].nickname + "</a>");
        box.append("<a class=' main-color float-right'>" + data[i].date + "</a>");
        $("<p class='text-break'></p>").text(data[i].message).appendTo(box);
      }
    /*  $.each(data, function(i, order){
      box.append("<a class=' font-weight-bold main-color'>" + data[i].nickname + "</a>");
      box.append("<a class=' main-color float-right'>" + data[i].date + "</a>");
      $("<p class='text-break'></p>").text(data[i].message).appendTo(box);
    });*/
  }
});
$(document).ready(function() {
  $('.autosend').keydown(function(event) {
    if (event.keyCode == 13) {
      document.getElementsByName("addmessage")[0].submit();
      return false;
    }
  });
});
function more()
{
  $.ajax({
    type:'POST',
    url:'../chat/controller/showmessage_inc.php',
    dataType: "json",
    success:function(data){
        var box = $("#dataid");
        $.each(data, function(i, order){
        box.append("<a class=' font-weight-bold main-color'>" + data[i].nickname + "</a>");
        box.append("<a class=' main-color float-right'>" + data[i].date + "</a>");
        $("<p class='text-break'></p>").text(data[i].message).appendTo(box);
      });
    }
  });
}
function down()
{
  $(document).ready(function() {
    $("html, body").animate({
      scrollTop: $(
        'html, body').get(0).scrollHeight
    }, 2000);
 });
}
