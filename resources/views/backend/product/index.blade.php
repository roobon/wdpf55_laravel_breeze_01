@extends('backend.layouts.app')

@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Datatables</h5>
          <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div> 
              @endif
              <tr>
                <th>
                  ID
                </th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Description</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach($products as $item)  
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td> <img src="{{'images/'. $item->image}}" width="100" alt=""> </td>
                <td>{{$item->category->name}}</td>
                <td>
                 <!-- {{ implode(", ", $item->tags) }} -->
                <ul>
                 @foreach($item->tags as $tag)
                  <li>{{$tag}}</li>   
                 @endforeach
               </ul>
                </td>
                
                <td>{!!$item->description!!}</td>
                <td>
                  
               <a href="{{route('product.edit', $item->id)}}">Edit</a>  | 
                  
               <a href="{{route('product.delete', $item->id)}}" onclick="return confirm('Are you sure to delete?')" >Delete</a> 
               <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
              </td> 
              </tr>
            @endforeach 
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->


@endsection


