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
	<div class="container">
	    <form action="/realestate" method="post" enctype="multipart/form-data">
	    	{{ csrf_field() }}

	    	<div class="form-row">
	    		<div class="form-group col-md-2">
			    	
			    	<label for="realestate_type_id">Negócio</label>
			    	<select class="form-control" name="realestate_type_id" id="realestate_type_id">
				    	@foreach($business as $b)
				    		<option value="{{$b->id}}">{{$b->name}}</option>
				    	@endforeach
			    	</select>
				    
			    </div>
			    <div class="form-group col-md-2">

			    	<label for="realestate_business_id">Tipo</label>
			    	<select class="form-control" name="realestate_business_id" id="realestate_business_id">
				    	@foreach($types as $type)
				    		<option value="{{$type->id}}">{{$type->name}}</option>
				    	@endforeach
			    	</select>
				    
				</div>
				<div class="form-group col-md-8">
				    	<label for="cod_realestate">Código</label>
				    	<input type="text" class="form-control" name="cod_realestate" id="cod_realestate" style="width: 10rem;">
				</div>

		    </div>

	    	<div class="form-group col-md-12">
		    	<label for="title">Title</label>
		    	<input type="text" class="form-control" name="title" id="title" style="width: 80rem;">
		    </div>

		    <div class="form-group col-md-12">
		    	<label for="description">Descrição</label>
		    	<input type="text" class="form-control" name="description" id="description" style="width: 80rem;">
		    </div>

		    <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="price">Preço</label>
			    	<input type="text" class="form-control" name="price" id="price" style="width: 30rem;">
			    </div>

			    <div class="form-group col-md-8">
			    	<label for="surface">Área</label>
			    	<input type="text" class="form-control" name="surface" id="surface" style="width: 30rem;">
			    </div>
			 </div>

		    <div class="form-group col-md-12">
		    	<label for="cep">CEP</label>
		    	<input type="text" class="form-control" name="cep" id="cep" style="width: 15rem;">
		    </div>

		    <div class="form-row">
			    <div class="form-group col-md-10">
			    	<label for="address">Endereço</label>
			    	<input type="text" class="form-control" name="address" id="address">
			    </div>

			    <div class="form-group col-md-2">
			    	<label for="number">Nº</label>
			    	<input type="text" class="form-control" name="number" id="number">
			    </div>
			</div>

			<div class="form-group col-md-12">
		    	<label for="complement">Complemento</label>
		    	<input type="text" class="form-control" name="complement" id="complement">
		    </div>

		    <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="district">Bairro</label>
			    	<input type="text" class="form-control" name="district" id="district" style="width: 15rem;">
			    </div>

			    <div class="form-group col-md-4">
			    	<label for="city">Cidade</label>
			    	<input type="text" class="form-control" name="city" id="city" style="width: 15rem">
			    </div>

			    <div class="form-group cold-md-4">
			    	<label for="state">Estado</label>
			    	<input type="text" class="form-control" name="state" id="state" style="width: 15rem">
			    </div>
			</div>

			<div class="form-row">
			    <div class="form-group col-md-2">
			    	<label for="bedroom">Quartos</label>
			    	<input type="text" class="form-control" name="bedroom" id="bedroom">
			    </div>

			    <div class="form-group col-md-2">
			    	<label for="suite">Suítes</label>
			    	<input type="text" class="form-control" name="suite" id="suite">
			    </div>

			    <div class="form-group col-md-2">
			    	<label for="bathroom">Banheiros</label>
			    	<input type="text" class="form-control" name="bathroom" id="bathroom">
			    </div>

			    <div class="form-group col-md-2">
			    	<label for="livingroom">Salas</label>
			    	<input type="text" class="form-control" name="livingroom" id="livingroom">
			    </div>

			    <div class="form-group col-md-4">
			    	<label for="garage">Garagem</label>
			    	<input type="text" class="form-control" name="garage" id="garage">
			    </div>

			</div>
			<div class="form-group col-md-12">
		    	<label for="file">Imagem</label>
		    	<input type="file" class="form-control" name="file" id="file">
		    </div>

		    <button type="submit" class="btn btn-primary">Cadastrar</button>
	    </form>
    </div>
@stop