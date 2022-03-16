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