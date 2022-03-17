@extends('backend.layouts.app') @section('title' ) @section('content')
<link rel="stylesheet" href="{{asset('assets/css/edit_contract.css')}}">

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
					@if (session('delete'))
                    <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('delete') }}</div>
                    @endif
					<div class="feedback">
                        <h3>Изменить контракт</h3>
                        <a href="{{route('backend.contract_page')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>
                    </div><br>
                    <form action="{{route('backend.edit_now_contract',$Contracts->id)}}" method="Post" enctype="multipart/form-data">

						<div class="form-group">
							
							<label for="exampleInputPassword1">Контактное лицо</label>   
							<p>{{$Contracts['user']->first_name}}</p>
						</div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Контактный номер</label>
                          <input type="text" name="number"  value="{{$Contracts->number}}"class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Дата начала</label>
                            <input type="date" name="date_start"  value="{{$Contracts->date_start}}" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Дата окончания</label>
                            <input type="date" name="date_end" value="{{$Contracts->date_end}}" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Файл контракта</label>

							<table class="table table-bordered">
								<thead>
								  <tr>
									<th scope="col">Имя файла</th>
									<th scope="col">Действие</th>
								  </tr>
								</thead>
								<tbody>
									@foreach ($Contracts['ContractFile'] as $data)
									 <tr>
									  <th><a href="/assets/contractfile/{{$data->file_name}}">{{$data->file_name}}</a></th>
									  <td><a href="{{route('backend.delate_file',$data->id)}}"><i  style="font-size: 20px;" class="fa fa-trash-o" aria-hidden="true"></i></a></td>
								     </tr>
								    @endforeach
								  
								  
								</tbody>
							  </table>

							  <label for="exampleInputPassword1">Добавить новый файл</label>
                            <p class="">
                                <label for="attachment">
                                    <a class="btn btn-primary text-light" role="button" aria-disabled="false">+ добавить файл</a>
                                    
                                </label>
                                <input type="file" name="file[]"  id="attachment" style="visibility: hidden; position: absolute;" multiple/><br>
								<span style="color:red">@error('file.*'){{$message}}@enderror</span>
                            </p>
                            <p id="files-area">
                                <span id="filesList">
                                    <span id="files-names"></span>
                                </span>
                            </p>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Добавлять</button>
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
