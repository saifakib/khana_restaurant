@extends('layouts.app')

@section('title','Slider')

@push('css')
@endpush()

@section('pageTitle','Slider')

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Slider</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->image }}</td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>{{ $slider->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <button class="btn btn-danger btn-sm" type="button" onclick="if(confirm('Are you Sure, You Want to delete this ? ')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }"><i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy', $slider->id)}}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                                  
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush()