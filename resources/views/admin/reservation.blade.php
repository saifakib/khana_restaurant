@extends('layouts.app')

@section('title','Reservation')

@push('css')
@endpush()

@section('pageTitle','Reservation')

@section('content')
<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Reservation</h4>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Time and Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @if($reservation->count() > 0)
                                @foreach($reservation as $key => $reserv)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $reserv->name }}</td>
                                    <td>{{ $reserv->phone }}</td>
                                    <td>{{ $reserv->email }}</td>
                                    <td>{{ $reserv->date_and_time }}</td>
                                    <td>{{ $reserv->message }}</td>
                                    <td>
                                        @if($reserv->status == true)
                                            <span class="label label-info">Confirmed</span>
                                        @else
                                            <span class="label label-danger">Waiting</span>
                                        @endif
                                    </td>
                                    <td>{{ $reserv->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if($reserv->status == false)
                                            <button class="btn btn-danger btn-sm waves-effect"
                                                onclick="approveReserve( {{ $reserv->id }} )">
                                                <i class="material-icons">done</i>
                                            </button>
                                            <form id="reserv-apr-{{ $reserv->id }}" action="{{ route('admin.reservation.update', $reserv->id)}}" method="POST">
                                                @csrf 
                                                @method('PUT')
                                            </form>
                                        @endif
                                            <form id="delete-form-{{ $reserv->id }}" action="{{ route('admin.reservation.destroy',$reserv->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $reserv->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                }"><i class="material-icons">delete</i>
                                            </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td>No Reservation Available Now</td>
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
		function approveReserve(id){

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
			confirmButtonText: 'Yes, Approve it!',
			cancelButtonText: 'No, cancel!',
			reverseButtons: true
			}).then((result) => {
			if (result.value) {
				event.preventDefault();
				document.getElementById('reserv-apr-'+id).submit();
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