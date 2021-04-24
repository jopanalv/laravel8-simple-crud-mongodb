@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Dashboard</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('item/create') }}"> Create New Item</a>
        </div>
    </div>
</div>
<div class="table-responsive-sm">
<table class="table table-bordered">
    <tr class="thead-light text-center">
        <th>Name</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th>
        <th width="180px">Action</th>
    </tr>
    @foreach ($items as $item)
    <tr class="text-center">
        <td>{{ $item->name }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->stock }}</td>
        <td width="180px"><img src="{{ Storage::url('public/items/'.$item->image) }}" width="100px" height="100px"></td>
        <td>
            <form action="{{url('item/destroy/'.$item->_id)}}" method="POST">
                <a class="btn btn-primary" href="{{url('item/edit/'.$item->_id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection