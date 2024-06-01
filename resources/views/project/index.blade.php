@extends('layout.app')

@section('content')

    <div class="container-fluid">
        <div class="container-md d-flex justify-content-between align-items-center">
            <h1>{{$title}}</h1>
            <div>
                <a class="btn btn-success" href="{{url("/projects/create")}}">Create</a>
            </div>
        </div>
        <div class="container-md">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID Pek</td>
                    <td>Uraian</td>
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
                    <td>{{str_replace('_','/',$project->id)}}</td>
                    <td>{{$project->title}}</td>
                    <td>Medan</td>
                    <td>{{"Rp ".number_format($project->price,2,',','.')}}</td>
                    <td>{{date('d-M-y',$project->create_at)}}</td>
                    <td>{{date('d-M-y',$project->update_at)}}</td>
                    <td class="d-flex justify-content-center gap-3">
                        <a href="" class="btn btn-primary">Update</a>
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
