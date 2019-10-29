@extends('layouts.app')

@section('title','Item Update')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugin/dropify/css/dropify.min.css')}}">
@endpush()

@section('pageTitle','Item Update')

@section('content')
<div class="row small-spacing">
    <form action="{{ route('admin.item.update', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-xs-12">
			<div class="box-content card white">
					<h4 class="box-title">Update Item</h4>
					<!-- /.box-title -->
					<div class="card-content">
							<div class="form-group">
								<label for="exampleInputTitle">Name</label>
								<input type="text" class="form-control" id="exampleInputTitle" name='name' value="{{ $item->name }}">
							</div>
							<div class="form-group">
								<label for="exampleInputSubTitle">Description</label>
								<input type="text" class="form-control" id="exampleInputSubTitle" name='description' value="{{ $item->description }}">
							</div>
                            <div class="form-group">
								<label for="price">Price</label>
								<input type="number" class="form-control" id="price" name='price' value="{{ $item->price }}">
							</div>
                            <div class="form-group form-float">
                                    <div class="form-line {{ $errors->has('categories') ? 'focused error' : ''}}">
                                        <label for="category">Select Category</label>
                                        <select name="category" id="category" class="form-control
                                         show-tick" data-live-search="true">
                                            @foreach($categories as $category)
                                            {
                                                <option {{ $item->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name}}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <a href="{{ route('admin.item.index') }}" type="button" class="btn btn-danger btn-sm waves-effect waves-light">BACK</a>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">UPDATE</button>
					</div>
			</div>
		</div>
        <div class="col-md-6 col-xs-12">
			<div class="box-content">
				<h4 class="box-title">item</h4>
                <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{ Storage::disk('public')->url('category/items/'.$item->image) }}"/>
			</div>
		</div>
    </form>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/backend/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/scripts/fileUpload.demo.min.js') }}"></script>
@endpush()