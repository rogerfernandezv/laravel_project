@extends('adminlte::page')

@section('title', 'GroupSoftware')

@section('content_header')
    <h1>Imoveis</h1>
@stop

@section('content')
    <div class="panel panel-default">
		<div class="panel-heading">
			Importar xml
		</div>
		<div class="panel-body">
			<form method="post" action="/realestate/xml_post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group col-md-6">
				    	<input type="file" class="form-control" name="xml" id="xml">
				    </div>
				<div class="form-group col-md-6">
					<button class="btn" type="submit" style="margin-top:.25rem;"><span class="glyphicon glyphicon-upload"></span></button>
				</div>

			</form>
		</div>
@stop
