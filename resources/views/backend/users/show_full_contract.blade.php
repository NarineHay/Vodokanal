@extends('backend.layouts.app') @section('title' ) @section('content')
<link href="{{ asset('assets/css/feedback.css') }}" rel="stylesheet">

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}</div>
                    @endif
					<div class="d-flex justify-content-between">
                        <h3>Показать контракт</h3>
                        <a href="{{route('backend.contract_page')}}"><button  type="submit" class="btn btn-primary">Добавлять</button></a>
                    </div><br>
                        <div class="form-group_m">
                           <label for="exampleInputEmail1">Имя пользователя</label>:
                         <p>
                               <option>{{$Contracts['User']->first_name}}</option>
						 </p>

                        </div>
                        <div class="form-group_m">
                          <label for="exampleInputPassword1">Контактный номер</label>:
                          <p>{{$Contracts->number}}</p>
                        </div>

                        <div class="form-group_m">
                            <label for="exampleInputPassword1">Дата начала</label>:
                             <p>{{$Contracts->date_start}}</p>
                        </div>

                        <div class="form-group_m">
                            <label for="exampleInputPassword1">Дата окончания</label>:
                            <p>{{$Contracts->date_end}}</p>
                        </div>

                        <div class="form-group_m">
                            <label for="exampleInputPassword1">Файл контракта</label>:
                           @foreach ($Contracts['ContractFile'] as $data)
                               <a href="/assets/contractfile/{{$data->file_name}}"><p>{{$data->file_name}}</p></a>
                           @endforeach
                        </div><br>
                        <a href="{{route('backend.edit_contract',$Contracts->id)}}"><button type="submit" class="btn btn-primary">Редактировать</button></a>
                      </form><br><br>
                   </div>
                <!--card-body-->
            </div>
            <!--card-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--animated-->
<script>
    const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#attachment").on('change', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file-delete"><span>+</span></span>')
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
</script>
@endsection
