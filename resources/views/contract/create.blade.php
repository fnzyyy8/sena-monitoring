@extends('layout.app')
@section('content')

    <div class="container-fluid">
        @include('contract.head.head')
        <div class="container-fluid my-3">
            <form action="/contracts/create" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="id" class="form-label">Code</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-sm-6">
                        <label for="name" class="form-label">Contract</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="my-3">
                    <div>
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" style="height: 300px" class="form-control"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
