@extends('layouts.global')

@section('title') Carts List @endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if(session('status'))
			<div class="alert alert-success">
		{{session('status')}}
	</div>
		@endif

<div class="row">
	<div class="col-md-6">
		<form action="{{route('carts.index')}}">
			<div class="input-group">
		
		<input 
			name="keyword" type="text" value="
			{{Request::get('keyword')}}" class="form-control" placeholder="Filter by
			title">
		
		<div class="input-group-append">
		<input type="submit" value="Filter" class="btn btn-primary">
		</div>
	</div>
</form>
		</div>
		

		<hr class="my-3">

		<div class="row mb-3">
			<div class="col-md-12 text-right">
		<a
		href="{{route('carts.create')}}" class="btn btn-primary">Create Cart</a>
		</div>
	</div>

		<table class="table table-bordered table-stripped">
			<thead>
				<tr>
					<th><b>Nama Produk</b></th>
					<th><b>Subtotal</b></th>
					<th><b>Jumlah</b></th>
					<th><b>User</b></th>
				</tr>
		</thead>
	<tbody>
		@foreach($carts as $cart)
		<tr>
        <td>
		{{ $cart->produks->title }}
		</td>

		<td>{{$cart->subtotal}}</td>
        <td>{{$cart->jumlah}}</td>
		
		<td>		
		{{ $cart->users->name }}
		</td>
					<td>
	<a href="{{route('carts.edit', ['id' => $cart->id])}}"class="btn btn-info btn-sm"> Edit </a>
	
		<form
			method="POST"
			class="d-inline"
			onsubmit="return confirm('Move cart to trash?')"
			action="{{route('carts.destroy', ['id' => $cart->id
			])}}">
		
		@csrf
		
		<input
			type="hidden"
			value="DELETE"
			name="_method">
		<input
			type="submit"
			value="Trash"
			class="btn btn-danger btn-sm">
		</form>
	</td>
</tr>
			@endforeach
		</tbody>
			<tfoot>
				<tr>
					<td colspan="10">
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection