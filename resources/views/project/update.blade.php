@extends('layout.app')

@section('content')
    <div class="container-fluid">
        @include('project.head.head')
        <div class="container-fluid my-2">
            <p>{{$project['idShow']}}</p>
        </div>
        <form action="#">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label" for="title">
                        Judul Pekerjaan
                    </label>
                    <input type="text" value="{{$project['title']}}" name="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="title">
                        Nilai Pekerjaan
                    </label>
                    <input type="text" value="{{$project['price']}}" name="price" class="form-control">
                </div>
            </div>
            <div class="row g-3">
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
            </div>

        </form>
    </div>

@endsection
