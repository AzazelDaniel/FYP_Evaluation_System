@extends('lecturer.app', ['class' => 'bg-danger'])

@section('content')
    <div class="header py-7 py-lg-8" style="background-image: url(../argon/img/theme/fstm.jpg); background-size: cover; background-position: center top;">
        <span class="mask bg-success opacity-7"></span>
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6">
                        <h1 class="display-3" style="color: #f7f5f1;">{{ __('Welcome to FYP Evaluation System (Diploma Computer Science)') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-danger" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
