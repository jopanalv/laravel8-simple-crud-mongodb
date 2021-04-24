@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Ubah Data</strong></div>

                <div class="card-body">
    <form action="{{url('item/update/'.$book->_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Nama Barang:</label>
            <input type="text" class="form-control" name="name" value="{{old('name',$book->name)}}">
        </div>
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" class="form-control" name="category" value="{{old('category',$book->category)}}">
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" class="form-control" name="price" value="{{old('price',$book->price)}}">
        </div>
        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" class="form-control" name="stock" value="{{old('stock',$book->stock)}}">
        </div>
        <div class="form-group">
            <label for="image">Gambar:</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
        <a href="{{URL::previous()}}" class="btn btn-secondary btn-md btn-block">Back</a>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection