@extends('layout.app')

@section('content')

    <div class="container-fluid">
        @include('project.head.head')
        <div class="container-fluid my-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID Pek</th>
                    <th>Uraian</th>
                    <th>Contract</th>
                    <th>Area</th>
                    <th>Nilai Rencana</th>
                    <th>Inisiasi</th>
                    <th>Update</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->idShow}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->contract_id}}</td>
                        <td>{{$project->area->name}}</td>
                        <td>{{$project->priceShow}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->updated_at}}</td>
                        <td class="d-flex justify-content-center gap-3">
                            <form action="/projects/update/{{$project->id}}/edit">
                                @csrf
                                <button class="btn btn-primary" type="submit" >Update</button>
                            </form>
                            <form method="post" action="/projects/delete/{{$project->id}}">
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
