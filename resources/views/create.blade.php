@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Tambah Data</strong></div>

                <div class="card-body">
    <form action="{{url('item/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Barang:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" class="form-control" name="category" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" class="form-control" name="price" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" class="form-control" name="stock" placeholder="Enter email">
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