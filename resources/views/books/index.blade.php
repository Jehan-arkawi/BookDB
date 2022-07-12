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
        <div class="row">
          <div class="col">
            <form class="form-inline" style="padding-top:25px " action="{{route('search')}}">
                @csrf    
                <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>  
              </form>
          </div>
          <div class="col" style="padding-left:500px ">
            <div class="dropdown" style="padding-top:25px " >
              <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                select genere
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($genres as $item)
                <li><a class="dropdown-item" href="{{route('selectedResult',['id'=> $item->id])}}">{{$item->title}}</a></li>
                @endforeach
              </ul>
            </div> 
          </div>
        </div>
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
  <div class="pagination justify-content-center" style="padding-top: 50px">
  {{ $books->onEachSide(0)->links() }}
  </div>
</div>


@endsection

