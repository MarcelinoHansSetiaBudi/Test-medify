@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('master-categories')}}" class="btn btn-secondary">Kembali ke Daftar Category</a>
            </div>
            <div class="card">

                @if($method == 'new')
                <div class="card-header">Buat Master Category Baru</div>
                @else
                <div class="card-header">Edit Master Category</div>
                @endif

                <div class="card-body">
                    @include('master_categories.form.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection