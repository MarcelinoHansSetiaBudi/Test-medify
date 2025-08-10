@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('master-items')}}" class="btn btn-secondary">Master Items</a>
            </div>
           <div class="form-group mb-2">
                <a href="{{url('master-categories/form/new')}}" class="btn btn-secondary">+ Master Categories Baru</a>
            </div>
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success" id='alert-success'>
                        {{session('success')}}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" id='alert-error'>
                        {{session('error')}}
                    </div>
                @endif

                <div class="card-header">Daftar Master Category</div>

                <div class="card-body">
                    @include('master_categories.index.filter')
                    @include('master_categories.index.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('master_categories.index.js')
@endsection