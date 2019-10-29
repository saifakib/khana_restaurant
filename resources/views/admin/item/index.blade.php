@extends('layouts.app')

@section('title','Items')

@push('css')
@endpush()

@section('pageTitle','Items')

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.item.create') }}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Item</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                            <div class="media">
                                                <img class="media-object" width="64" height="64"
                                                src="{{ Storage::disk('public')->url('category/items/'.$item->image)}}" ><!-- here i show items Image -->  
                                            </div>
                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <button class="btn btn-danger btn-sm" type="button" onclick="if(confirm('Are you Sure, You Want to delete this ? ')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }"><i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.item.destroy', $item->id)}}" style="display: none;" method="POST">
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