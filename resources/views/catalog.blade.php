@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns wrap">
  @foreach($products as $product)

    <div class="column is-one-quarter">
      
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="{{asset($product->image)}}" alt="Placeholder image">
          </figure>
        </div>
        <div class="card-content">
          <h5>{{$product->name}}</h5>
        </div>
      </div>
      
    </div>

  @endforeach
  </div>
  
</div>
@endsection