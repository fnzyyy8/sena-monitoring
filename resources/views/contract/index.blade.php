@extends('layout.app')

@section('content')
    <div class="container-fluid">
        @include('contract.head.head')
        <div class="container-fluid my-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>
                        Code
                    </td>
                    <td>
                        Contract
                    </td>
                    <td>
                        Keterangan
                    </td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{$contract['id']}}</td>
                        <td>{{$contract['name']}}</td>
                        <td>{{$contract['description']}}</td>
                        <td class="">
                            @if($contract['haveChild'] == false )
                                <form action="/contracts/delete/{{$contract['id']}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
