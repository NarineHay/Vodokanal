$('#btn1').on('click', function () {  });
$('#btn2').on('click', function () {  });

var varCount = 0;
$(function () {
    $('#addVar').on('click', function(){
        varCount++;
        $node = '<p>'
          + '<input class="form-control "placeholder="номер карты" type="number" name="object['+varCount+'][card_number]" id="var1">'
          + '<br>'
          + '<input class="form-control "placeholder="модель машины" type="text" name="object['+varCount+'][model]" >'
          + '<br>'
          + '<input class="form-control "placeholder="номер машины" type="text" name="object['+varCount+'][car_numbers]" >'
          + '<br>'
          + '<span class = "removeVar"> Удалить </span> </p>';
        $(this).parent().before($node);
    });
  $('form').on('click', '.removeVar', function(){
    $(this).parent().remove();
  });
});