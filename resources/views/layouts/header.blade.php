<!doctype html>
<html lang="en">
  <head>
    <title>Vadavision Consultancy INC!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
        <a class="navbar-brand" href="/">Vadavision</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>

                
                @if(Session::has('loginId')) 

                    @if(Route::has('todo'))
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('todo')}}">Create To Dos</a>
                    </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/register')}}">Register</a>
                    </li>
                @endif
 
            </ul>

            <span class="float-right text-white" >
               Welcome  @if(Session::has('loginId')) {{$data->name}} @else Guest @endif
            </span>
            
            
        </div>
    </nav>