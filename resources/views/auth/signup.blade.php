@extends('app')

@section('content')
<main class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Signup</h3>
                    <div class="card-body">
                        <form action="{{ route('user.registration') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="fname" placeholder="First Name" id="fname" class="form-control">
                                @if ($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" name="lname" placeholder="Last Name" id="lname" class="form-control">
                                @if ($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="text" name="address" placeholder="Address" id="address" class="form-control">
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" name="contactNo" placeholder="Contact No." id="address" class="form-control">
                                @if ($errors->has('contactNo'))
                                <span class="text-danger">{{ $errors->first('contactNo') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <input type="text" name="email" placeholder="Email" id="email_address" class="form-control">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" name="username" placeholder="User Name" id="username" class="form-control">
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember">Remember</label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <br>
                            <div class="d-grid mx-auto">
                                <a href="/login" class="btn btn-dark">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection