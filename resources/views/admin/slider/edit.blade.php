@extends('layouts.app')

@section('title','Slider Update')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugin/dropify/css/dropify.min.css')}}">
@endpush()

@section('pageTitle','Slider Update')

@section('content')
<div class="row small-spacing">
    <form action="{{ route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
			<div class="box-content card white">
					<h4 class="box-title">Update Title</h4>
					<!-- /.box-title -->
					<div class="card-content">
							<div class="form-group">
								<label for="exampleInputTitle">Title</label>
								<input type="text" class="form-control" id="exampleInputTitle" name='title' value="{{ $slider->title }}">
							</div>
							<div class="form-group">
								<label for="exampleInputSubTitle">Sub Title</label>
								<input type="text" class="form-control" id="exampleInputSubTitle" name='sub_title' value="{{ $slider->sub_title }}">
							</div>
                            <a href="{{ route('admin.slider.index') }}" type="button" class="btn btn-danger btn-sm waves-effect waves-light">BACK</a>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">UPDATE</button>
					</div>
			</div>
		</div>
        <div class="col-md-6 col-xs-12">
			<div class="box-content">
				<h4 class="box-title">SLider</h4>
                <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
			</div>
		</div>
    </form>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/backend/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/scripts/fileUpload.demo.min.js') }}"></script>
@endpush()