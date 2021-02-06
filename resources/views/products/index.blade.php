@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quote Builder</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ URL::to('products/create') }}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Qty</th>
            <th>Name</th>
            <th>description</th>
            <th>Price</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
<?php $total = 0;?>
@foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                        <a href="{{ URL::to('products/' . $product->id ) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ URL::to('products/' . $product->id . '/edit') }}" name="products.update" title="update">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
<?php $total = (intval($product->qty)*intval($product->price))+$total;?>
@endforeach
        <tr>
            <td colspan="4"><strong>Total Quotation</strong></td>
            <td><?php echo $total;?></td>
            <td></td>
        </tr>
    </table>

    {!! $products->links() !!}
    <div><strong>Customer Details</strong></div>
    <form method="post" action="{{url('send')}}">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Name</label>
     <input type="text" name="name" class="form-control" value="" />
    </div>
    <div class="form-group">
     <label>Email</label>
     <input type="text" name="email" class="form-control" value="" />
    </div>
    <div class="form-group">
     <label>Address</label>
     <textarea name="address" class="form-control"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="send" class="btn btn-info" value="Send" />
    </div>
   </form>
@endsection
