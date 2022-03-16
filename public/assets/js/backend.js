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


$(function () {

  $('.selectpicker').on('change', function(){
    let sel_val=$(this).val()
    console.log(sel_val)
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                    type: 'post',
                    url: "select_user",
                    data: {sel_val},
                    success: function(result){
                        $(".user-info").html(result)
                    }
            })
  })
});

function addSome(numI) {
  $(".addSomeCl" + numI).append('<input class="form-control "placeholder="Card number" type="number" onkeypress="return validateNumber(event)" name="balance">');
  $(".removeCl" + numI).empty();
}
function validateNumber(e) {
const pattern = /^[0-9]$/;

return pattern.test(e.key )
}