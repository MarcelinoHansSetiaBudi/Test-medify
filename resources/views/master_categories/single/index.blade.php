@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('master-categories')}}" class="btn btn-secondary">Kembali ke Daftar Category</a>
            </div>
            <div class="card">
                <div class="card-header">Master Category</div>

                <div class="card-body">
                    <table>
                        <tr>
                            <th>Kode</th>
                            <td>:</td>
                            <td>{{$data->kode}}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{$data->nama}}</td>
                        </tr>
                    </table>
                    <a class="btn btn-info" href="{{url('master-categories/form/edit')}}/{{$data->id}}">Edit</a>
                    <a class="btn btn-danger" href="{{url('master-categories/delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">List Item</div>

                <div class="card-body">
                   <table>
                    @foreach ($item as $itm)
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{$itm->nama}}</td>
                        </tr>
                        {{-- <tr>
                            <th>Harga Beli</th>
                            <td>:</td>
                            <td>{{$itm->harga_beli}}</td>
                        </tr>
                        <tr>
                            <th>Laba</th>
                            <td>:</td>
                            <td>{{$itm->laba}}</td>
                        </tr>
                        <tr>
                            <th>Harga Jual</th>
                            <td>:</td>
                            <td>{{$itm->harga_beli + $itm->harga_beli * $itm->laba / 100 }}</td>
                        </tr> --}}
                        <tr>
                            <th>Supplier</th>
                            <td>:</td>
                            <td>{{$itm->supplier}}</td>
                        </tr>
                        {{-- <tr>
                            <th>Jenis</th>
                            <td>:</td>
                            <td>{{$itm->jenis}}</td>
                        </tr> --}}
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection