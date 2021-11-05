@extends('admin.app')

@section('content')
@include('layouts.headers.auth')    
<div class="container-fluid mt--7">
@include('sweetalert::alert')
    <div class="row">
        <div class="col">    
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 >Lecturer's List</h3>
                            
                        </div> 
                        <div class="col-4 text-right"> 
                            <a href="{{ route('admin.lecturers.create') }}" class="btn btn-sm btn-success">Add Lecturer</a>
                        </div>
                    </div>
                                
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="lecturersTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID Staff</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>    
                                <th scope="col">Email</th>                   
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($lecturers as $key => $lecturer)
                                <tr>
                                    <input type="hidden" class="serdelete_lecturer_id" value="{{$lecturer->id}}">
                                    <input type="hidden" class="serdelete_lecturer_idstaff" value="{{$lecturer->id_staff}}">
                                    <th class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('admin.lecturers.edit', $lecturer->id)}}">Update</a>
                                                    <button type="button" class="dropdown-item deleteLecturerbtn">Delete</button>
                                            </div>
                                        </div>
                                    </th>
                                    <td scope="row">{{ $lecturer->id_staff }}</td>
                                    <td>{{ $lecturer->name }}</td>
                                    <td>{{ $lecturer->department }}</td>  
                                    <td>{{ $lecturer->email }}</td>
                                    
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                
                    <div class="pagination justify-content-center">
                        {!! $lecturers->links() !!}
                    </div>
                    
                </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        @include('layouts.footers.auth')
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.deleteLecturerbtn').click(function (e) {
                    e.preventDefault();
                    
                    var del_id = $(this).closest("tr").find('.serdelete_lecturer_id').val();
                    var id_staff = $(this).closest("tr").find('.serdelete_lecturer_idstaff').val();
                    // alert(delete_id);

                    swal({
                        title: "Confirm to delete lecturer ID STAFF: "+id_staff+"?",
                        text: "Any students assigned under this lecturer must be reassigned",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            var data = {
                                "_token" : $('input[name=_token]').val(),
                                "id" : del_id,
                            }
                            $.ajax({
                                type: "DELETE",
                                url: '/admin/lecturers/'+del_id,
                                data: data,
                                success: function (response) {
                                    swal("Lecturer record has been deleted", {
                                        icon: "success",
                                        
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                                }
                            });

                            
                        } 
                    });
            });
        });
    </script>
<script>
    $(document).ready(function() {
        $('#lecturersTable').DataTable({
            "bPaginate": false
        });
    });
    
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
@endpush