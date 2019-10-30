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
            @if($contacts->count() > 0)
            @foreach($contacts as $contact)
                <div class="col-lg-4 col-md-6">
                    <div class="box-contact">
                        <img src="{{ asset('assets/backend/images/avatar-3.jpg') }}" alt="" class="avatar">
                        <h3 class="name margin-top-10">{{ $contact->name }}</h3>
                        <!-- /.name -->
                        <h4 class="job">{{ $contact->email }} </h4> <h6>{{ $contact->created_at->diffForHumans() }}</h6>
                        <!-- /.job -->
                        <div class="text-muted">
                            <h4>{{ $contact->subject }}</h4>
                            <p class="margin-bottom-20">{{ $contact->message }}</p>
								<button class="btn btn-danger btn-sm waves-effect"
									onclick="deletecontact( {{ $contact->id }} )">
									<span>Delete</span>
								</button>
								<form id="delete-contact-{{$contact->id}}" action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST">
									@csrf
									@method('DELETE')
								</form>
                        </div>
                    </div>
                    <!-- /.box-contact -->
                </div>
            @endforeach
            @else
                <h4>No contact available now</h4>
            @endif
</div>
@endsection

@push('js')

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
				document.getElementById('delete-contact-'+id).submit();
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