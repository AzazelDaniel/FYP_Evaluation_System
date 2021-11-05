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
                            <h3 class="mb-0">Student Registration</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admin.lecturers.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br/>
                    @endif
                    <form method="post" action="{{ route('admin.lecturers.store') }}">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Lecturer information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">    
                                <label class="form-control-label" for="input-id_staff">ID Staff</label>
                                <input type="number" name="id_staff" id="input-id_staff" class="form-control" placeholder="ID Staff" value="{{ old('id_staff') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-department">Department</label>
                                <input type="text" name="department" id="input-department" class="form-control" placeholder="Department" value="{{ old('department') }}" required autofocus>
                            </div>                 
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">Name</label>
                                <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input type="email" name="email" id="input-email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input type="password" name="password" id="input-password" class="form-control" placeholder="Password" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="Confirm Password" required autofocus>
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