@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('kelurahan-create') }}">Create Kelurahan</a>
                    <div class="card-header">Kelurahan</div>
                    <table class="table-kelurahan">
                        <thead>
                            <tr>
                                <th>nama kelurahan</th>
                                <th>nama kecamatan</th>
                                <th>nama kota</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('.table-kelurahan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kelurahan-list') }}",
                columns: [
                    {data: 'nama_kelurahan', name: 'nama_kelurahan'},
                    {data: 'nama_kecamatan', name: 'nama_kecamatan'},
                    {data: 'nama_kota', name: 'nama_kota'},
                ]
            });

        });
    </script>
@endsection
