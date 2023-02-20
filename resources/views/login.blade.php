@extends('layouts.main')

@section('main-section')
  <div class="row mt-5">
        <div class="col-lg-8">
            <h4>Login</h4><hr>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('failed'))
            <div class="alert alert-danger" role="alert">
              {{Session::get('failed')}}
            </div>
            @endif
            <form method="POST" action="{{route('login-user')}}">
              @csrf
            <div class="form-group">
              <label for="">Enter your email address</label>
              <input type="email" class="form-control" name="email"  value="{{old('email')}}">
              <small class="text-danger">@error('email'){{ $message }}@enderror</small>
            </div>

            <div class="form-group">
                <label for="">Enter your password</label>
                <input type="password" class="form-control" name="password"  value="{{old('password')}}">
                <small class="text-danger">@error('password'){{ $message }}@enderror</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>
            <p>Don't have an account? <a href="register" class="text-danger">Register Now</a>
        </div>
  </div>
@endsection
 