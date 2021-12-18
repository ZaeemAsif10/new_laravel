@extends('layouts.master')

@section('content')

<div class="container mt-5">
<div class="mb-4">
        <h2>Product Edit</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('products/update/'.$products->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $products->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="4">{{ $products->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" value="{{ $products->price }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
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