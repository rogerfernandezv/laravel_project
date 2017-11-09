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
    <form action="/realestate" method="post">
    	{{ csrf_field() }}
	    <div class="form-group">
	    	<label for="title">Title</label>
	    	<input type="text" class="form-control" name="title" id="title">
	    </div>
    </form>
@stop