@extends('home.home')

@section('content')


<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome Guys!</h1>
            <p class="lead mb-0">This show product page only</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            
            <!-- Nested row for non-featured blog posts-->
            <div class="row">

                @foreach ($items as $item)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!">
                            
                            <img class="card-img-top" src="{{$item->image_url}}" alt="{{$item->name}}" width="700" height="250"/>
                        </a>
                        
                        <div class="card-body">
                            
                            <h2 class="card-title h4">{{$item->name}}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
               
               
                
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {!! $items->links("pagination::bootstrap-4") !!}
                </ul>                 
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>

@endsection