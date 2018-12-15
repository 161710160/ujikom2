@extends('layouts.global')

@section('title') Edit Produk @endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if(session('status'))
			<div class="alert alert-success">
		{{session('status')}}
	</div>
		@endif

		<form
			enctype="multipart/form-data"
			method="POST"
			action="{{route('produks.update', ['id' => $produk->id])}}"
			class="p-3 shadow-sm bg-white">
		
		@csrf
		
		<input type="hidden" name="_method" value="PUT">
		<label for="title">Title</label><br>
		<input
			type="text"
			class="form-control"
			value="{{$produk->title}}"
			name="title"
			placeholder="Produk title"/>
		<br>
		
		<label for="cover">Cover</label><br>
		<small class="text-muted">Current cover</small><br>
		@if($produk->cover)
		<img src="{{asset('storage/' . $produk->cover)}}" width="96px"/>
		@endif
		<br>
		<br>
		
		<input
			type="file"
			class="form-control"
			name="cover">
		
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
		cover</small>
		<br>
		<br>
		<label for="slug">Slug</label><br>
		<input
			type="text"
			class="form-control"
			value="{{$produk->slug}}"
			name="slug"
			placeholder="enter-a-slug"/>
		<br>

		<label for="description">Description</label> <br>
		<textarea name="description" id="description"  class="form-control">
		{{$produk->description}}</textarea>
		<br>

		<label class="control-label">Kategori</label>	
			  			<select name="id_categories" class="form-control">
			  				<option>Pilih Kategori</option>
			  				@foreach($categories as $data)
			  				<option value="{{ $data->id }}">{{ $data->name }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_categories'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_categories') }}</strong>
                            </span>
                        @endif

		<label for="stock">Stock</label><br>
		<input type="number" class="form-control" placeholder="Stock" id="stock"
			   name="stock" value="{{$produk->stock}}">
		<br>

		<label for="price">Price</label><br>
		<input type="number" class="form-control" name="price"
			   placeholder="Price" id="price" value="{{$produk->price}}">
		<br>

		<label for="">Status</label>
		<select name="status" id="status" class="form-control">
			<option {{$produk->status == 'PUBLISH' ? 'selected' : ''}}value="PUBLISH">PUBLISH</option>
			<option {{$produk->status == 'DRAFT' ? 'selected' : ''}}value="DRAFT">DRAFT</option>
		</select>
		<br>

		<button class="btn btn-primary" value="PUBLISH">Update</button>
		</form>
	</div>
</div>
	@endsection
@section('footer-scripts')
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
		rc.0/css/select2.min.css" rel="stylesheet" />
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
		rc.0/js/select2.min.js"></script>
		
		<script>
		$('#categories').select2({ajax: {url: 'http://e-asleather.pro/ajax/categories/search',
		processResults: function(data){return {
		results: data.map(function(item){return {id: item.id, text:item.name} })
		}
	}
}
		});
		var categories = {!! $produk->categories !!}
		categories.forEach(function(category){
		var option = new Option(category.name, category.id, true, true);
		$('#categories').append(option).trigger('change');
		});
	</script>

<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
  };
  CKEDITOR.replace( 'text',options);
</script>

@endsection