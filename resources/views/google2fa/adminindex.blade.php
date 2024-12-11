@extends('layouts.custommaster')
@section('content')
<div class="pb-0 px-5 pt-0 text-center">
        <h3 class="mb-2">{{lang('2 - Step Verification')}}</h1>
</div>
<form class="card-body pt-3 pb-0" method="POST" action="{{ route('admingoogle2falogin.otpverify') }}">
    @csrf
    <input type="hidden" name='email' value="{{$email}}">

    @honeypot

    <div class="form-group">
        <div class="text-center">
                    <label class="form-label">{{lang('Please enter the OTP generated on your Google Authenticator App.')}}</label>

        </div>
        <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
        @error('email')

            <span class="invalid-feedback" role="alert">
                <strong>{{ lang($message) }}</strong>
            </span>
        @enderror

    </div>
    <div class="submit">
        <input class="btn btn-secondary btn-block" type="submit" value="{{lang('Submit')}}" onclick="this.disabled=true;this.form.submit();">
    </div>
</form>

@endsection
