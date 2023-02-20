@extends('layouts.main')

@section('main-section')
  <div class="row mt-5">
        <div class="col-lg-8">
            <h4>Create a todo</h4><hr>
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

            <form method="POST" action="{{route('addtodo')}}">
                @csrf
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" name="title" value="{{old('title')}}">
              <small class="text-danger">@error('title'){{ $message }}@enderror</small>
            </div>

           
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
                <small class="text-danger">@error('description'){{ $message }}@enderror</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
  </div>
@endsection
 