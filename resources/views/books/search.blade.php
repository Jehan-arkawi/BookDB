<style type="text/css">
    
</style>    
  
@extends('books.layout')

@section('content')


<div class="container">
    <nav class="navbar navbar-light bg-light" style="padding:20px">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-center">
          
          </a>
          <a href="#">Dashboard</a> 
        </div>
      </nav>
  </div>
 <div class="container">
  </div>
<div class="container" style="padding-top:50px">
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($books as $item)
    <div class="col">
      <div class="card h-100">     
        <img src="{{asset('images/'.$item->cover)}}" class="card-img-top" alt="">
        <div class="card-body">
          <h3 class="card-title">{{$item->title}}</h3>
          <h6 class="card-title d-inline">{{$item->author->name}}</h6>
          <p class="card-text d-inline" style="padding-left: 50px">{{$item->created_at->diffForhumans() }}</p>
          <br><br>
          <p class="card-text">{{$item->description}}</p>
          <p class="card-text" style="padding-left: 220px">{{$item->likes}} Likes</p>
        
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>


@endsection

