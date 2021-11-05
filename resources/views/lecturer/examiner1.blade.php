@extends('lecturer.app')

@section('content')
@include('layouts.headers.auth')
<div class="container-fluid mt--7">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col">    
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h2 > <strong>Examiner 1 - TDCS 3124 </strong></h2>
                        </div>
                    </div>
                    <hr class="my-4"/>   
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 > Student's List (Diploma Computer Science)</h3>
                        </div>
                    </div>           
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Matrix Num.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Session</th>
                                <th scope="col">Project Title</th>
                                <th scope="col">Marks</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                            <th scope="row">{{$student->no_matrix}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->session}}</td>
                            <td>{{$student->project_title}}</td>
                            <td>{{$student->examiner1_mark}}%</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('lecturer.examiner1.evaluate', $student->id) }}">Evaluate Student</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @empty
                                <th>
                                    <h2>You are not assigned as <b>EXAMINER 1</b> to any student yet</h2>
                                </th>
                            @endforelse
                        </tbody>
                    </table>
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush