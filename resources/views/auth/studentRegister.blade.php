@extends('lecturer.app', ['class' => 'bg-danger'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--9 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('student.store') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('no_matrix') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Matrix Number</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('no_matrix') ? ' is-invalid' : '' }}" placeholder="{{ __('ex. 1939...') }}" type="text" name="no_matrix" value="{{ old('no_matrix') }}" required autofocus>
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
                                        <option value="MS39 - Diploma Computer Science">Diploma Computer Science</option>
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
                                        <option value="TDCS3124 - PROGRAMMING PROJECT">TDCS3124 - PROGRAMMING PROJECT</option>
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
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" onkeyup="this.value = this.value.toUpperCase();" placeholder="{{ __('Please enter full name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif   
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <div class="input-group input-group-alternative mb-3">
                                <input type="email" name="email" id="input-email" class="form-control" placeholder="@student.kuis.edu.my" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('current_sem') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-current_sem">Current Sem</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="current_sem" id="input-current_sem" class="form-control" placeholder="Current Semester" required="">
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            @if ($errors->has('current_sem'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('current_sem') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group{{ $errors->has('session') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-current_sem">Current Session</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="session" id="input-session" class="form-control" placeholder="Current Session" required="">
                                        <option value="Session i 21/22">Session i 21/22</option>
                                        <option value="Session ii 21/22">Session ii 21/22</option>
                                    </select>
                                </div>
                                @if ($errors->has('session'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                @endif   
                            </div>
                            <div class="form-group{{ $errors->has('project_title') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-code_subject">Project Title</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control{{ $errors->has('project_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Not too long') }}" type="text" name="project_title" value="{{ old('project_title') }}" required autofocus>
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
                                        <option value="Web-based">Web-based</option>
                                        <option value="Mobile-based">Mobile-based</option>
                                        <option value="Desktop-based">Desktop-based</option>
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Describe your project in about 100 words" name="project_description" value="{{ old('project_description') }}"></textarea>
                                </div>
                            </div>
                            @if ($errors->has('project_description'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('project_description') }}</strong>
                                </span>
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Submit Registration') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
