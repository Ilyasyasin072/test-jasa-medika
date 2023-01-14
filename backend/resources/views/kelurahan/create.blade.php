@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Kelurahan</div>
                    @include('kelurahan._form')
                </div>
            </div>
        </div>
    </div>
@endsection
