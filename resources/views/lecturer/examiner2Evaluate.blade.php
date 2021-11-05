@extends('lecturer.app')

@section('content')
@include('layouts.headers.auth')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card" id="examiner2">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Student {{$student->no_matrix}} Evaluation <b>( FYP2 - Examiner )</b></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('lecturer.examiner2.index') }}" class="btn btn-sm btn-success">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Student Information</h6>
                    <div class="pl-lg-4">
                
                        <p class="lead">
                            <small> Student Name : <strong>{{$student->name}}</strong>  </small>
                        </p>
                        <p class="lead">
                            <small> Matric No. : <strong>{{$student->no_matrix}}</strong>  </small>
                        </p>
                        <p class="lead">
                            <small> Programme : <strong>{{$student->programme}}</strong>  </small>
                        </p>
                        <p class="lead">
                            <small> Project Title : <strong>{{$student->project_title}}</strong>  </small>
                        </p>
                        <p class="lead">
                            <small> Project Category : <strong>{{$student->project_category}}</strong>  </small>
                        </p>

                    </div>
                    <hr class="my-4"/>
                    <h3 class="heading-small text-muted mb-4">Evaluation</h3>
                    <h3 class="mb-4">Section A (Part A, B, C, D)</h3>
                    <div class="pl-lg-4">
                            <label class="form-control-label" for="input-code_subject">Total accumulated marks by the student (max is only 80)</label>
                            <div class="input-group input-group-alternative mb-3">
                                <input class="form-control" id="sectionA" type="number" max="80" placeholder="Lecturer may only key in here" required/>
                            </div>
                            <button type="button" class="btn btn-outline-default" onClick="calculateTotalMarks()">Calculate Total Marks</button>
                    </div>

                    <hr class="my-4"/>
                    <form action="{{ route('lecturer.examiner2.submit' ,$student->id)  }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3 class="mb-4">Total Marks Percentage</h3>                  
                        <div class="pl-lg-4">
                            
                            <div class="form-group{{ $errors->has('examiner2_mark') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Max: 20%</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input id="totalExaminer1" class="form-control{{ $errors->has('examiner2_mark') ? ' is-invalid' : '' }}" placeholder="{{ __('Cannot be empty') }}" type="number" min="0" max="60" name="examiner2_mark" value="{{ old('examiner2_mark', $student->examiner2_mark) }}" required autofocus>
                                </div>
                                @if ($errors->has('examiner2_mark'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('examiner2_mark') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Submit Evaluation') }}</button>
                            </div>
                            {{-- <div class="text-center">
                                <button type="button" class="btn btn-primary mt-4" onclick="printJS({ printable: 'examiner2', type: 'html', header: 'TDCS 3124' })">
                                    Print Evaluation
                                </button>
                            </div> --}}
                        </div>
                        </form>
                </div>
            </div>
            @include('layouts.footers.auth')
        </div>
        
    </div>
</div>

@endsection

@push('js')
<script>
    calculateTotalMarks= function()
    {
    var A = document.getElementById('sectionA').value;
    var total = (parseInt(A)/100)*20;
    var final = total.toFixed(0)
    document.getElementById('totalExaminer1').value = final
     
    }
</script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js" type="text/javascript"></script>
@endpush