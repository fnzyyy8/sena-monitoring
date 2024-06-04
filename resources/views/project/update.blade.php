@extends('layout.app')

@section('content')
    <div class="container-fluid">
        @include('project.head.head')
        <div class="container-fluid my-2">
            <p>{{$project['idShow']}}</p>
        </div>
        <form action="#">
            <div class="row g-3 my-3">
                <div class="col-sm-6">
                    <label class="form-label" for="title">
                        Judul Pekerjaan
                    </label>
                    <input type="text" value="{{$project['title']}}" name="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Nilai Pekerjaan</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="lastName" value="{{$project['price']}}" required=""
                               name="price">
                    </div>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>
            <div class="row g-3 my-2">
                <div class="col-sm-6">
                    <label class="form-label" for="area">
                        Kontrak
                    </label>
                    <select class="form-select" name="contract_id" id="area">
                        <option selected
                                value="{{$project['contract_id']->id}}">{{$project['contract_id']->name}}</option>
                        @foreach($contracts as $contract)
                            <option value="{{$contract->id}}">{{$contract->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="area">
                        Area
                    </label>
                    <select class="form-select" name="area" id="area">
                        <option selected
                                value="{{$project['area_code']->code}}">{{$project['area_code']->area}}</option>
                        @foreach($areas as $area)
                            <option value="{{$area->code}}">{{$area->area}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label class="form-label" for="floatingTextarea2">Deskripsi</label>
                    <textarea class="form-control" id="floatingTextarea2"
                              style="height: 300px" name="description">{{$project['description']}}</textarea>
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection
