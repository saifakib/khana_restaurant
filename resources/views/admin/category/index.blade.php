@extends('layouts.app')

@section('title','Category')

@push('css')
<style>
    .margin{
        margin-top: 10px;
        margin-bottom: 30px;
    }
    
</style>
@endpush()

@section('pageTitle','Category')

@section('content')
    <div class="margin">
        <a href="{{ route('admin.category.create') }}" class="btn btn-success wave-effect wave-light" type="button">ADD CATEGORY</a>
    </div>

    <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Default</h4>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>CATEGORY</th>
								<th>ITEM</th>
								<th>CREATED AT</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>ID</th>
								<th>CATEGORY</th>
								<th>ITEM</th>
								<th>CREATED AT</th>
								<th>ACTION</th>
							</tr>
						</tfoot>
						<tbody>
                            @if($categories->count() > 0)
                            @foreach($categories as $key => $category)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $category->name }}</td>
								<td class="text-center">
									<button type="button" class="btn bg-success btn-circle">
									<span><b>{{ $category->items->count() }}</b></span></button>
								</td>
								<td>{{ $category->created_at }}</td>
								<td>
									<a class="btn btn-info btn-sm waves-effect"
										href="{{ route('admin.category.edit',$category->id) }}">
										<span>Edit</span>
									</a>
									<button class="btn btn-danger btn-sm waves-effect"
										onclick="deleteCategory( {{ $category->id }} )">
										<span>Delete</span>
									</button>
									<form id="delete-cat-{{$category->id}}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
										@csrf
										@method('DELETE')
									</form>
								</td>
                            </tr>
                            @endforeach
                            @else
                                <td>No data available now</td>
                            @endif
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
            </div>
</div>
@endsection

@push('js')

	<!-- Data Tables -->
	<script src="{{ asset('assets/backend/plugin/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/scripts/datatables.demo.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript">
		function deleteCategory(id){

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-success',
					cancelButton: 'btn btn-danger'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			reverseButtons: true
			}).then((result) => {
			if (result.value) {
				event.preventDefault();
				document.getElementById('delete-cat-'+id).submit();
			} else if (
				result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire(
				'Cancelled',
				'Your imaginary file is safe :)',
				'error'
				)
			}
			})
		}
	</script>

@endpush()