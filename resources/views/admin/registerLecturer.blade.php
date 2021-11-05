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
                            <h3 class="mb-0">Lecturer Registration</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admin.lecturers.index') }}" class="btn btn-sm btn-success">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.lecturers.store') }}">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Lecturer information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('id_staff') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('ID Staff') }}</label>
                                <input type="text" name="id_staff" id="input-id_staff" class="form-control form-control-alternative{{ $errors->has('id_staff') ? ' is-invalid' : '' }}" placeholder="{{ __('ID Staff') }}" value="{{ old('id_staff') }}" autofocus >

                                @if ($errors->has('id_staff'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_staff') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" onkeyup="this.value = this.value.toUpperCase();" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-department">Department</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <select name="department" id="input-department" class="form-control" placeholder="Department of.." required=""autofocus>
                                        <option value="Computer Science">Computer Science</option>
                                    </select>
                                </div>
                            @if ($errors->has('department'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                            @endif
                            </div> 
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative" placeholder="Atleast 6 characters" autofocus>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Must be same as above" required autofocus>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush