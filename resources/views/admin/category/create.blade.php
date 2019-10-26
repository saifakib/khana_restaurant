@extends('layouts.app')

@section('title','Category Create')

@push('css')
@endpush()

@section('pageTitle','Category Create')

@section('content')
    <div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Create Category</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="{{ route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="form-group">
								<label for="categoryName">Category</label>
								<input type="text" class="form-control" name="name" id="categoryName" placeholder="category">
							</div>
						
							<div class="form-group">
								<label for="file">Feature</label>
								<input type="file" name="image" id="file">
                            </div>
                            <a href="{{ route('admin.category.index' ) }}" class="btn btn-danger btn-sm waves-effect waves-light">BACK</a>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">SUBMIT</button>
						</form>
					</div>
				</div>				
			</div>           
    </div>
@endsection

@push('js')

@endpush()