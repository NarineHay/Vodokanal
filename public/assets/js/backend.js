$('#btn1').on('click', function () {  });
$('#btn2').on('click', function () {  });

var varCount = 0;
$(function () {
    $('#addVar').on('click', function(){
        varCount++;
        $node = '<p>'
          + '<input class="form-control @error("object.*.card_number") is-invalid @enderror" placeholder="номер карты" type="number"  name="object['+varCount+'][card_number]" id="var1">'
          + '<br>'
          + '<input class="form-control @error("object.*.model") is-invalid @enderror" placeholder="модель машины" type="text"  name="object['+varCount+'][model]" >'
          + '<br>'
          + '<input class="form-control @error("object.*.car_numbers") is-invalid @enderror" placeholder="номер машины" type="text"  name="object['+varCount+'][car_numbers]" >'
          + '<br>'
          + '<span class = "removeVar"> Удалить </span> </p>';
        $(this).parent().before($node);
    });
  $('form').on('click', '.removeVar', function(){
    $(this).parent().remove();
  });
});

$('#send-form').on('submit',function(e){
  console.log($('#aaa').attr('name'));
  console.log(new FormData(this));
  e.preventDefault()
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type: 'post',
    url: "/createcard",
    data:new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    
    success: function(result){
        console.log(result);
    },
    error: function(data) {
      console.log('error');
      let bb  = data["responseJSON"]["errors"];
      console.log( data["responseJSON"]);
      // bb.forEach(element => {
      //   console.log(bb['object.0.card_number']);
      //   element['object.0.card_number'].html('inch vor mi ban')
      // });
      // for (let index = 0; index < bb.length; index++) {
        console.log(bb['object.0.card_number']);
        $('.object.0.card_number').html(111);
        
      // }
  },
})
})

$(function () {
    let selected_val=$("select option:selected" ).val()
    if(selected_val != ''){
        sel_user(selected_val)
    }

    $('.selectpicker').on('change', function(){
            let sel_val=$(this).val()
            sel_user(sel_val)
    })

    
    function sel_user(user_id){
        let sel_val=user_id
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
    }
});

function addSome(numI) {
  let namem = 'balance' + numI
  $(".addSomeCl" + numI).append(`<input class="form-control "placeholder="Card number" type="number" onkeypress="return validateNumber(event)" name="${namem}">`);
  $(".removeCl" + numI).empty();
}
function validateNumber(e) {
const pattern = /^[0-9]$/;

return pattern.test(e.key )
}

const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#attachment").on('change', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file-delete"><span>x</span></span>')
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
	};
	// Ajout des fichiers dans l'objet DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Mise à jour des fichiers de l'input file après ajout
	this.files = dt.files;

	// EventListener pour le bouton de suppression créé
	$('span.file-delete').click(function(){
		let name = $(this).next('span.name').text();
		// Supprimer l'affichage du nom de fichier
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			// Correspondance du fichier et du nom
			if(name === dt.items[i].getAsFile().name){
				// Suppression du fichier dans l'objet DataTransfer
				dt.items.remove(i);
				continue;
			}
		}
		// Mise à jour des fichiers de l'input file après suppression
		document.getElementById('attachment').files = dt.files;
	});
});
