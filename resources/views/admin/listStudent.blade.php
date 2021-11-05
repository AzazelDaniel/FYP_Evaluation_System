@extends('admin.app')

@section('content')
@include('layouts.headers.auth')    
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<div class="container-fluid mt--7">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col">    
            <div class="card" >
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 >Student's List (Diploma Computer Science - TDCS 3124)</h3>
                        </div>
                        <div class="col-4 text-right"> 
                            
                        </div>   
                    </div>           
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="marksTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="not-export-col" scope="col"></th>
                                <th scope="col">Matrix</th>
                                <th scope="col">Name</th>
                                <th scope="col">Session</th>
                                <th scope="col">Supervisor</th>
                                <th scope="col">Examiner1</th>
                                <th scope="col">Examiner2</th>
                                <th scope="col">Total</th>
                                <th scope="col">Grade</th>
                                <th class="not-export-col" scope="col">EVALUATED</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                            <tr>
                                <input type="hidden" class="serdelete_student_id" value="{{$student->id}}">
                                <input type="hidden" class="serdelete_student_matrix" value="{{$student->no_matrix}}">
                                
                                <th scope="row" class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('admin.students.edit', $student->id)}}">Update</a>
                                                {{-- <form method="post" id="delete-student-form" action="{{ route('admin.students.destroy', $student->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>    --}}
                                                    
                                                <button type="button" class="dropdown-item deleteStudentbtn">Delete</button>
                                                
                                                
                                        </div>
                                    </div>
                                </th>
                                <td >{{$student->no_matrix}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->session}}</td>
                                <td>{{$student->supervisor_mark}}%</td>
                                <td>{{$student->examiner1_mark}}%</td>
                                <td>{{$student->examiner2_mark}}%</td>
                                <td>{{$student->total_mark}}%</td>
                                @if ($student->total_mark >=90)
                                <td>A+</td>
                                @elseif ($student->total_mark >=80 and $student->total_mark <90)
                                <td>A</td>
                                @elseif ($student->total_mark >=75 and $student->total_mark <80)
                                <td>A-</td>
                                @elseif ($student->total_mark >=70 and $student->total_mark <75)
                                <td>B+</td>
                                @elseif ($student->total_mark >=65 and $student->total_mark <70)
                                <td>B</td>
                                @elseif ($student->total_mark >=60 and $student->total_mark <65)
                                <td>B-</td>
                                @elseif ($student->total_mark >=55 and $student->total_mark <60)
                                <td>C+</td>
                                @elseif ($student->total_mark >=50 and $student->total_mark <55)
                                <td>C</td>
                                @elseif ($student->total_mark >=47 and $student->total_mark <50)
                                <td>C-</td>
                                @elseif ($student->total_mark >=44 and $student->total_mark <47)
                                <td>D+</td>
                                @elseif ($student->total_mark >=40 and $student->total_mark <44)
                                <td>D</td>
                                @elseif ($student->total_mark >=0.1 and $student->total_mark <39)
                                <td>F</td>
                                @else
                                <td>TH</td>
                                @endif
                                <td>
                                    <style>
                                        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
                                        .toggle.ios .toggle-handle { border-radius: 20px; }
                                      </style>
                                    <input type="checkbox" class="toggle-class" data-id="{{ $student->id }}" data-toggle="toggle" data-style="ios" data-onstyle="success" data-width="70" data-height="15" data-offstyle="warning" data-on="Yes" data-off="No" {{ $student->isEvaluated == true ? 'checked' : ''}}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-center">
                        {!! $students->links() !!}
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

            $('.deleteStudentbtn').click(function (e) {
                    e.preventDefault();
                    
                    var delete_id = $(this).closest("tr").find('.serdelete_student_id').val();
                    var no_matrix = $(this).closest("tr").find('.serdelete_student_matrix').val();
                    // alert(delete_id);

                    swal({
                        title: "Confirm to delete student MATRIX: "+no_matrix+"?",
                        text: "Once deleted, you will not be able to recover this student's record!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            var data = {
                                "_token" : $('input[name=_token]').val(),
                                "id" : delete_id,
                            }
                            $.ajax({
                                type: "DELETE",
                                url: '/admin/students/'+delete_id,
                                data: data,
                                success: function (response) {
                                    swal("Student record has been deleted", {
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
        $(function() {
          $('#toggle-two').bootstrapToggle({
            on: 'Yes',
            off: 'No'
          });
        })
    </script>
    <script>
        $('.toggle-class').on('change', function() {
       var isEvaluated = $(this).prop('checked') == true ? 1 : 0;
       var student_id = $(this).data('id');
       
       $.ajax({
           type: 'GET',
           dataType: 'JSON',
           url: '{{ route('admin.changeStatus') }}',
           data: {
               'isEvaluated': isEvaluated,
               'student_id': student_id
           },
           success:function(data) {
               $('#notifDiv').fadeIn();
               $('#notifDiv').css('background', 'green');
               $('#notifDiv').text('Status Updated Successfully');
               setTimeout(() => {
                   $('#notifDiv').fadeOut();
               }, 3000);
           }
       });
   });
   </script>
    <script>
        $(document).ready(function() {
            $('#marksTable').DataTable({
                dom: "Bfrtip",
                "bPaginate": false,
                buttons: [
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        title: function(){
                        var excelTitle = 'Diploma Computer Science - TDCS 3124';
                        return excelTitle
                        }
                    },
                    {
                        text: 'print or PDF',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)',
                            modifier: {
                                page: 'all',
                                search: 'none'
                            }
                        },
                        title: function(){
                        var printTitle = 'Diploma Computer Science - TDCS 3124';
                        return printTitle
                        }
                    },
                    
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
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
                    