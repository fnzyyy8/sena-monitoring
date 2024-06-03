@extends('layout.app')

@section('content')

    <div class="container-fluid">
        @include('project.head.head')
        <div class="container-fluid my-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID Pek</td>
                    <td>Uraian</td>
                    <td>Contract</td>
                    <td>Area</td>
                    <td>Nilai Rencana</td>
                    <td>Inisiasi</td>
                    <td>Update</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project['idShow']}}</td>
                        <td>{{$project['title']}}</td>
                        <td>{{$project['contract_id']}}</td>
                        <td>{{$project['area_code']}}</td>
                        <td>{{$project['price']}}</td>
                        <td>{{$project['updated_at']}}</td>
                        <td>{{$project['updated_at']}}</td>
                        <td class="d-flex justify-content-center gap-3">
                            <form action="/projects/update/{{$project['id']}}/edit">
                                @csrf
                                <button class="btn btn-primary" type="submit" >Update</button>
                            </form>
                            <form method="post" action="/projects/delete/{{$project['id']}}">
                                @csrf
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
