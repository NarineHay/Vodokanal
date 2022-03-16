$('input[type=radio]').on('click', function(){
    $status=$(this).val()
    $('.user-status').val($status)
    console.log($status)
})
