@extends('admin.app')

@section('content')
@include('layouts.headers.auth')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Student <b>{{$student->no_matrix}}</b> Information</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-success">Back to list</a>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <form action="{{ route('admin.students.update' ,$student->id)  }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group{{ $errors->has('no_matrix') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Matrix Number</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('no_matrix') ? ' is-invalid' : '' }}" placeholder="{{ __('Matrix Number') }}" type="text" name="no_matrix" value="{{ old('no_matrix', $student->no_matrix) }}" required autofocus>
                                </div>
                                @if ($errors->has('no_matrix'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('no_matrix') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('programme') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-role">Programme</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="programme" id="input-role" class="form-control" placeholder="Programme" required="">
                                        <option value="MS39 - Diploma Computer Science" {{ ( "MS39 - Diploma Computer Science" == old('programme',$student->programme)) ? 'selected' : '' }}>Diploma Computer Science</option>
                                    </select>
                                </div>
                                @if ($errors->has('programme'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('programme') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('code_subject') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Code Subject (FYP)</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="code_subject" id="input-code_subject" class="form-control" placeholder="Code Subject" required="">
                                        <option value="TDCS3124 - PROGRAMMING PROJECT" {{ ( "TDCS3124 - PROGRAMMING PROJECT" == old('code_subject',$student->code_subject)) ? 'selected' : '' }}>TDCS3124 - PROGRAMMING PROJECT</option>
                                    </select>
                                </div>
                                @if ($errors->has('code_subject'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                      <strong>{{ $errors->first('code_subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Name</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" onkeyup="this.value = this.value.toUpperCase();" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name', $student->name) }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif   
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">Email</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input type="email" name="email" id="input-email" class="form-control" placeholder="@student.kuis.edu.my" value="{{ old('email', $student->email) }}" required autofocus>
                                </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="form-group{{ $errors->has('current_sem') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-current_sem">Current Sem</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="current_sem" id="input-current_sem" class="form-control" placeholder="Current Semester" required="">
                                        <option value="5" {{ ( 5 == old('current_sem',$student->current_sem)) ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ ( 6 == old('current_sem',$student->current_sem)) ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ ( 7 == old('current_sem',$student->current_sem)) ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ ( 8 == old('current_sem',$student->current_sem)) ? 'selected' : '' }}>8</option>
                                    </select>
                                </div>
                                @if ($errors->has('current_sem'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('current_sem') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('project_title') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Project Title</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('project_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Project Title') }}" type="text" name="project_title" value="{{ old('project_title', $student->project_title) }}" required autofocus>
                                </div>
                                @if ($errors->has('project_title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('project_title') }}</strong>
                                    </span>
                                @endif   
                            </div>
                            <div class="form-group{{ $errors->has('project_category') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-project_category">Project Category</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="project_category" id="input-project_category" class="form-control" placeholder="Project Category" required="">
                                        <option value="Web-based" {{ ( "Web-based" == old('project_category',$student->project_category)) ? 'selected' : '' }}>Web-based</option>
                                        <option value="Mobile-based" {{ ( "Mobile-based" == old('project_category',$student->project_category)) ? 'selected' : '' }}>Mobile-based</option>
                                        <option value="Desktop-based" {{ ( "Desktop-based" == old('project_category',$student->project_category)) ? 'selected' : '' }}>Desktop-based</option>
                                    </select>
                                </div>
                                @if ($errors->has('project_category'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('project_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('project_description') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Project Description</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <textarea class="form-control" id="project_description" rows="5" placeholder="Describe your project in about 200 words" name="project_description">{{ old('project_description', $student->project_description) }}</textarea>
                                </div>
                                @if ($errors->has('project_description'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('project_description') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('supervisor') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-supervisor">Supervisor</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="supervisor" id="input-supervisor" class="form-control" placeholder="Cannot be same as examiners" required="">
                                        @foreach($lecturers as $id => $lecturer)
                                            @if ($id!==1)
                                            <option value="{{$id}}" {{ ( $id == old('supervisor',$student->supervisor)) ? 'selected' : '' }}>{{ $lecturer }}</option>
                                            @endif
                                        @endforeach                             
                                    </select>
                                </div>
                                @if ($errors->has('supervisor'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('supervisor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('examiner1') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-examiner1">Examiner 1</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="examiner1" id="input-examiner1" class="form-control" placeholder="Cannot be same as examiners">
                                        <option value="">none</option>
                                        @foreach($lecturers as $id => $lecturer)
                                            @if ($id!==1)
                                            <option value="{{$id}}" {{ ( $id == old('examiner1',$student->examiner1)) ? 'selected' : '' }}>{{ $lecturer }}</option>
                                            @endif
                                        @endforeach                             
                                    </select>
                                </div>        
                                @if ($errors->has('examiner2'))
                                  <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('examiner2') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('examiner2') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-examiner2">Examiner 2</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="examiner2" id="input-examiner2" class="form-control" placeholder="Cannot be same as examiners">
                                            <option value="">none</option>
                                        @foreach($lecturers as $id => $lecturer)
                                            @if ($id!==1)
                                            <option value="{{$id}}" {{ ( $id == old('examiner2',$student->examiner2)) ? 'selected' : '' }}>{{ $lecturer }}</option>
                                            @endif
                                        @endforeach                             
                                    </select>
                                </div>
                                @if ($errors->has('examiner2'))
                                 <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('examiner2') }}</strong>
                                 </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('supervisor_mark') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Supervisor's Mark</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('supervisor_mark') ? ' is-invalid' : '' }}" placeholder="{{ __('Cannot be empty') }}" type="number" name="supervisor_mark" value="{{ old('supervisor_mark', $student->supervisor_mark) }}" required autofocus>
                                </div>
                                @if ($errors->has('supervisor_mark'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('supervisor_mark') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('examiner1_mark') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Examiner 1's Mark</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('examiner1_mark') ? ' is-invalid' : '' }}" placeholder="{{ __('Cannot be empty') }}" type="number" name="examiner1_mark" value="{{ old('examiner1_mark', $student->examiner1_mark) }}" required autofocus>
                                </div>
                                @if ($errors->has('examiner1_mark'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('examiner1_mark') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('examiner2_mark') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Examiner 2's Mark</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('examiner2_mark') ? ' is-invalid' : '' }}" placeholder="{{ __('Cannot be empty') }}" type="number" name="examiner2_mark" value="{{ old('examiner2_mark', $student->examiner2_mark) }}" required autofocus>
                                </div>
                                @if ($errors->has('examiner2_mark'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('examiner2_mark') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Update Student') }}</button>
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush