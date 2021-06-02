@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-1">
</div>


<div class="col-md-10 bg-secondary text-white rounded m-3 p-3">
<span class="font-weight-bold h3 m-3 p-3">change username</span>
            <form action="/profile/changeusername" method="post">
<div class="bg-dark rounded m-3 p-3">
            @csrf
            <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" placeholder="{{$user->username}}" type="name" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="new-password">

            @error('username')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    change
                                </button>
                            </div>
                        </div>
</div>
            </form>

<br><span class="font-weight-bold h3 m-3 p-3">Change email</span>
<form action="/profile/changeemail" method="post">
<div class="bg-dark rounded m-3 p-3">

<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>


@csrf

@error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
                        </div>
            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    change
                                </button>
                            </div>
                        </div>
</div>
</form>
<br>



<span class="font-weight-bold h3 m-3 p-3">Change password</span>
<form action="/profile/changepassword" method="post">
    @csrf
    <div class="bg-dark rounded m-3 p-3">
    <div class="form-group row">
     <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    change
                                </button>
                            </div>
                        </div>
</form>

</div>



<br>


<br>
<span class="font-weight-bold h3 m-3 p-3">Delete account</span>

<form action="/profile/delete" method="post">
@csrf

    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            <label for="submit" class=" col-form-label ">permanently delete your account</label>
                                <button type="submit" id="submit" class="btn btn-danger">
                                    delete
                                </button>
                            </div>
                        </div></form>







</div>
<div class="col-2">
</div>
</div>

                        </div>








@endsection