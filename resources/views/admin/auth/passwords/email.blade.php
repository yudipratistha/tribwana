@extends('layouts.auth')

<!-- Main Content -->
@section('content')

<div class="spacer form2">
        <div class="container">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-6 p-r-40" data-aos="fade-right" data-aos-duration="1200">
                    <img src="{{asset('assets/images/logo.png')}}" class="img-responsive" alt="HMTI" />
                </div>
                <div class="col-lg-6">
                    <div class="text-box" data-aos="fade-left" data-aos-duration="1200">
                        <h1 class="font-light">Masuk HMTI.</h1>
                        <p>Reset Password Admin HMTI</p>

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="m-t-20" data-aos="fade-left" data-aos-duration="1200" method="POST" action="{{ url('/admin/password/email') }}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Email address" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-lg-12 d-flex">
                                    <button type="submit" class="btn btn-md1 btn-outline-style"><span> Kirim Reset Password </span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
