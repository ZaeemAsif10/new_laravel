@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="mb-4">
        <h2>ADD PRODUCT</h2>
        <a class="btn btn-success" href="{{ url('products/create') }}">ADD NEW</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url('products/edit/'.$product->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ url('products/delete/'.$product->id) }}" onclick="return confirm('Are you sure delete this data..?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $(document).ready(function () {
     @if(Session::has('status'))
       Swal.fire({
        title: 'Success',
        text: '{{Session::get('status')}}',
        icon: 'success',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
            @endif
  });
</script>