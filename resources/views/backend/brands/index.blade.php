@extends('backend.layouts.app')

@section('content')
<main id="main" class="main">
<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->description }}</td>
            <td>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <!-- {!! $brands->links() !!} -->

    <br>
    {!! $brands->withQueryString()->links('pagination::bootstrap-5') !!}

</main>
@endsection