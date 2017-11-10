@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Imoveis</h1>
@stop

@section('content')

    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">Cadastrar Imóvel</div>
			<div class="panel-body">
			    <form action="/realestate" method="post" enctype="multipart/form-data">
			    	{{ csrf_field() }}
			    	@if(isset($realestate))
			    	<input type="hidden" name='realestate_id' value="{{$realestate->id}}">
			    	@endif
			    	<div class="form-row">
			    		<div class="form-group col-md-6">
					    	<label for="realestate_type_id">Negócio</label>
					    	<select class="form-control" name="realestate_business_id" id="realestate_business_id">
						    	@foreach($business as $b)
						    		<option value="{{$b->id}}"
							    		 @if(isset($realestate) && $realestate->realestate_business_id == $b->id)
							    		 	selected
							    		 @endif
						    		>
						    			{{$b->name}}
						    		</option>
						    	@endforeach
					    	</select>

					    </div>
					    <div class="form-group col-md-6">
					    	<label for="realestate_type_id">Tipo</label>
					    	<select class="form-control" name="realestate_type_id" id="realestate_type_id">
						    	@foreach($types as $type)
						    		<option value="{{$type->id}}"
						    			@if(isset($realestate) && $realestate->realestate_type_id == $type->id)
							    		 	selected
							    		 @endif
						    		>
						    			{{$type->name}}
						    		</option>
						    	@endforeach
					    	</select>
						</div>
				    </div>

				    <div class="form-row">
					    <div class="form-group col-md-2">
					    	<label for="bedroom">Quartos</label>
					    	<input type="text" class="form-control" name="bedroom" id="bedroom" value="@if(isset($realestate)){{$realestate->bedroom}} @endif">
					    </div>

					    <div class="form-group col-md-2">
					    	<label for="suite">Suítes</label>
					    	<input type="text" class="form-control" name="suite" id="suite" value="@if(isset($realestate)){{$realestate->suite}} @endif">
					    </div>

					    <div class="form-group col-md-2">
					    	<label for="bathroom">Banheiros</label>
					    	<input type="text" class="form-control" name="bathroom" id="bathroom" value="@if(isset($realestate)){{$realestate->bathroom}} @endif">
					    </div>

					    <div class="form-group col-md-2">
					    	<label for="livingroom">Salas</label>
					    	<input type="text" class="form-control" name="livingroom" id="livingroom" value="@if(isset($realestate)){{$realestate->livingroom}} @endif">
					    </div>

					    <div class="form-group col-md-4">
					    	<label for="garage">Garagem</label>
					    	<input type="text" class="form-control" name="garage" id="garage" value="@if(isset($realestate)){{$realestate->garage}} @endif">
					    </div>

					</div>

				    <div class="form-row">
			    		<div class="form-group col-md-6">
						    	<label for="price">Preço</label>
						    	<input type="text" class="form-control" name="price" id="price" value="@if(isset($realestate)){{$realestate->price}} @endif" required>
						</div>

					    <div class="form-group col-md-6">
					    	<label for="surface">Área</label>
					    	<input type="text" class="form-control" name="surface" id="surface" value="@if(isset($realestate)){{$realestate->surface}} @endif">
						</div>

				    </div>

			    	<div class="form-group col-md-12">
				    	<label for="title">Título</label>
				    	<input type="text" class="form-control" name="title" id="title" value="@if(isset($realestate)){{$realestate->title}} @endif" required>
				    </div>

				    <div class="form-group col-md-12">
				    	<label for="description">Descrição</label>
				    	<!--<input type="text" class="form-control" name="description" id="description" >-->
				    	<textarea class="form-control" name="description" id="description" rows="3">@if(isset($realestate)){{$realestate->description}} @endif</textarea>
				    </div>

				    <div class="form-group col-md-12">
				    	<label for="cep">CEP</label>
				    	<input type="text" class="form-control" name="cep" id="cep" style="width: 15rem;" value="@if(isset($realestate)){{$realestate->cep}} @endif">
				    </div>

				    <div class="form-row">
					    <div class="form-group col-md-10">
					    	<label for="address">Endereço</label>
					    	<input type="text" class="form-control" name="address" id="address" value="@if(isset($realestate)){{$realestate->address}} @endif">
					    </div>

					    <div class="form-group col-md-2">
					    	<label for="number">Nº</label>
					    	<input type="text" class="form-control" name="number" id="number" value="@if(isset($realestate)){{$realestate->number}} @endif">
					    </div>
					</div>

					<div class="form-row">
					    <div class="form-group col-md-5">
					    	<label for="district">Bairro</label>
					    	<input type="text" class="form-control" name="district" id="district" value="@if(isset($realestate)){{$realestate->district}} @endif">
					    </div>

					    <div class="form-group col-md-5">
					    	<label for="city">Cidade</label>
					    	<input type="text" class="form-control" name="city" id="city" value="@if(isset($realestate)){{$realestate->city}} @endif">
					    </div>

					    <div class="form-group col-md-2">
					    	<label for="state">Estado</label>
					    	<input type="text" class="form-control" name="state" id="state" value="@if(isset($realestate)){{$realestate->state}} @endif">
					    </div>
					</div>

					<div class="form-group col-md-12">
				    	<label for="complement">Complemento</label>
				    	<input type="text" class="form-control" name="complement" id="complement" value="@if(isset($realestate)){{$realestate->complement}} @endif">
				    </div>

					<div class="form-group col-md-12">
				    	<label for="file">Imagem</label>
				    	<input type="file" class="form-control" name="img" id="img">
				    </div>

				    <button type="submit" class="btn btn-primary">Salvar</button>
			    </form>
			</div>
		</div>

<script>
$(document).ready(function() {
	$('#cep').blur(function() {
		validate_cep();
	});
});

function search_cep(cep){
	
	$.ajax({
		url: ('https://webmaniabr.com/api/1/cep/' + cep +'/?app_key=5G9sxywT5N4wwf07WOO0iOX0BuRKkQtn&app_secret=6J8wKADPYl62kzDi42HFXbfmX8l3jSFrVyQ0dCCCtZS9UZMF'),
		type: 'GET',
		data: null,
		processData: false,
		contentType: false,
		success: function (data) {
			if(data.endereco.length < 1)
			{
				clear_fields();
				alert('CEP inválido');
			}
			else
			{
				$('#address').val(data.endereco);
				$('#district').val(data.bairro);
				$('#city').val(data.cidade);
				$('#state').val(data.uf);
				console.log(data);
			}
		}
	});
}

function validate_cep(){
	var cep = $('#cep').val();

	cep = cep.replace(/\D/g, '');
	var validacep = /^[0-9]{8}$/;

	if(cep.length > 0 && validacep.test(cep))
	{
		search_cep(cep);
	}
	else
	{
		clear_fields();
		alert('Cep inválido');
	}

}

function clear_fields()
{
	$('#address').val('');
	$('#district').val('');
	$('#city').val('');
	$('#state').val('');
}

</script>

@stop