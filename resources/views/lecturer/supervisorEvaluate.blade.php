@extends('lecturer.app')

@section('content')
@include('layouts.headers.auth')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Student {{$student->no_matrix}} Evaluation <b>( FYP2 - Supervisor )</b></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('lecturer.supervisor.index') }}" class="btn btn-sm btn-success">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Student {{$student->no_matrix}} Information</h6>
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
                    <h1 class="heading-small text-muted mb-4">Evaluation</h1>
                    <h3 class="mb-4">Section A (Part A, B, C, D)</h3>
                    <div class="pl-lg-4">
                            <label class="form-control-label" for="input-code_subject">Total accumulated marks by the student (max is only 100)</label>
                            <div class="input-group input-group-alternative mb-3">
                                <input class="form-control" id="sectionA" type="number" max="100" placeholder="Lecturer may only key in here" onblur="calculatePercentageA()"/>
                            </div>
                            <label class="form-control-label" for="input-code_subject">Percentage (max: 40%)</label>
                            <div class="input-group input-group-alternative mb-3">
                                <input class="form-control" id="percentageA" type="number" placeholder="Auto generated based on input above" />
                            </div>
                    </div>

                    <h3 class="mb-4">Section B (Part E)</h3>
                    <div class="pl-lg-4">
                            <label class="form-control-label" for="input-code_subject">Total accumulated marks by the student (max is only 35)</label>
                            <div class="input-group input-group-alternative mb-3">
                                <input class="form-control" id="sectionB" type="number" max="35" placeholder="Lecturer may only key in here" onblur="calculatePercentageB()"/>
                            </div>
                            <label class="form-control-label" for="input-code_subject">Percentage (max: 20%)</label>
                            <div class="input-group input-group-alternative mb-3">
                                <input class="form-control" id="percentageB" type="number" placeholder="Auto generated based on input above" />
                            </div>
                            <button type="button" class="btn btn-outline-default" onClick="calculateTotalMarks()">Calculate Total Marks</button>
                    </div>
                    <hr class="my-4"/>
                    <form action="{{ route('lecturer.supervisor.submit' ,$student->id)  }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3 class="mb-4">Total Marks Percentage</h3>                  
                        <div class="pl-lg-4">
                            
                            <div class="form-group{{ $errors->has('supervisor_mark') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Section A (%) + Section B (%)</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input id="totalSupervisor" class="form-control{{ $errors->has('supervisor_mark') ? ' is-invalid' : '' }}" placeholder="{{ __('Cannot be empty') }}" type="number" name="supervisor_mark" value="{{ old('supervisor_mark', $student->supervisor_mark) }}" required autofocus>
                                </div>
                                @if ($errors->has('supervisor_mark'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('supervisor_mark') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Submit Evaluation') }}</button>
                            </div>
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
    
    calculatePercentageA= function()
    {
    var A = document.getElementById('sectionA').value;
    var total = (parseInt(A)/100)*40;
    var final = total.toFixed(0)
    document.getElementById('percentageA').value = final
        
    }

   calculatePercentageB= function()
    {
    var B = document.getElementById('sectionB').value;
    var total = (parseInt(B)/35)*20;
    var final = total.toFixed(0)
    document.getElementById('percentageB').value = final
      
    }

    calculateTotalMarks= function()
    {
    var A = document.getElementById('percentageA').value;
    var B = document.getElementById('percentageB').value;
    var total = parseInt(A)+parseInt(B);
    document.getElementById('totalSupervisor').value = total
     
    }
</script>
@endpush