@extends('adminlte::page')

@section('title', 'GroupSoftware')

@section('content_header')
    <h1>Imoveis</h1>
@stop

@section('content')
    <div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<form method="get" action="{{route('realestate_search')}}">
			    <div class="form-group col-md-3">
					<input type="text" name="search" class="form-control" id="search">
				</div>
				<div class="form-group col-md-6">
					<button class="btn" type="submit" onclick="search(this)" style="margin-top:.25rem;"><span class=" 	glyphicon glyphicon-search"></span></button>
				</div>
				</form>
			</div>
		</div>
			<div class="panel-body">

				@foreach($realestates as $realestate)
					<div class="row">
						<div class="col-md-3">
							<div class="thumbnail" style="width:200px; height:200px;">
					      		@if(count($realestate->files) > 0)
					        		<img src="{{Storage::disk('public')->url($realestate->files[0]->path)}}" alt="Lights" style="width:200px; height:200px;">
					        	@else
					        		<img src="/images/noimage.png" alt="Lights" style="width:200px; height:200px;">
					        	@endif
						    </div>
						</div>
						
						<div class="col-md-4">
							<h3 >{{$realestate->title}}</h3>
							
							<p><b>Descrição:</b></p>
							<p>{{$realestate->description}}</p>

						</div>
						<div class="col-md-5" >
							<div class="pull-right">
								<h3 >R$ {{$realestate->price}}</h3>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="pull-left" style="padding-left:20px;">
							<p>Criado em: {{$realestate->created_at}}</p>
						</div>

						<div class="pull-right" style="display:inline-block;padding-right:20px;">

							<a href="{{route('realestate_edit', ['id' => $realestate->id])}}" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>

							<a href="{{route('realestate_destroy', ['id' => $realestate->id])}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
							
						</div>
					</div>
				

						

				@endforeach
			</div>
			<div class="panel-footer">
				{{ $realestates->links() }}
			</div>
	</div>
@stop