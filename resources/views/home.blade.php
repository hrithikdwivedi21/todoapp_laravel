@extends('layouts.main')

@section('main-section')
{{-- <img src="{{url('storage/uplaods/'.$data->profile)}}"> --}}
  <h1 class="m-5">@if(Session::has('loginId')) Welcome {{$data->name}} , Vadavision Consultancy Inc! @else Please login to create todos. @endif</h1> 

  @if(Session::has('loginId')) 

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S No</th>
        <th>Todo</th>
        <th>Description</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @php
                $sno=1;    
            @endphp
            @foreach($tododata as $t)
      <tr>
        <td>{{$sno}}</td>
        <td>{{$t->title}}</td>
        <td>{{$t->description}}</td>
        <td>{{$t->created_at}}</td>
        
      </tr>
      @php
                $sno++;    
            @endphp
            @endforeach
     
    </tbody>
  </table>
  @endif
@endsection
  