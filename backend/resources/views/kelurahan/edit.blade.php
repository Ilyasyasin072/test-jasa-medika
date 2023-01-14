@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Kelurahan</div>
                    @include('kelurahan._form')
                </div>
            </div>
        </div>
    </div>
@endsection
