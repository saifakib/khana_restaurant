@extends('layouts.app')

@section('title','contact')

@push('css')
<style>
    .margin{
        margin-top: 10px;
        margin-bottom: 30px;
    }
    
</style>
@endpush()

@section('pageTitle','contact')

@section('content')

    <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Contact</h4>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>SUBJECT AT</th>
								<th>CREATE</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>SUBJECT AT</th>
								<th>CREATE</th>
								<th>ACTION</th>
							</tr>
						</tfoot>
						<tbody>
                            @if($contacts->count() > 0)
                            @foreach($contacts as $key => $contact)
							<tr>
								<td>{{ $contact->name }}</td>
								<td class="text-center">
									<button type="button" class="btn bg-success btn-circle">
									<span><b>{{ $contact->items->count() }}</b></span></button>
								</td>
								<td>{{ $contact->created_at }}</td>
								<td>
									<a class="btn btn-info btn-sm waves-effect"
										href="{{ route('admin.contact.edit',$contact->id) }}">
										<span>Edit</span>
									</a>
									<button class="btn btn-danger btn-sm waves-effect"
										onclick="deletecontact( {{ $contact->id }} )">
										<span>Delete</span>
									</button>
									<form id="delete-cat-{{$contact->id}}" action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST">
										@csrf
										@method('DELETE')
									</form>
								</td>
                            </tr>
                            @endforeach
                            @else
                                <td>No contact available now</td>
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
		function deletecontact(id){

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