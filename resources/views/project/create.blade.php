@extends('layout.app')

@section('content')

    <div class="container-fluid">
        <div class="container-md d-flex justify-content-between align-items-center">
            <h1>{{$title}}</h1>
            <div>
                <a class="btn btn-danger" href="{{url("/projects")}}">Kembali</a>
            </div>
        </div>
        <div class="container-md my-3">
            <form method="post" action="/projects/create">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Judul Pekerjaan</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required=""
                               name="title" autofocus>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nilai Pekerjaan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required=""
                                   name="price">
                        </div>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Area</label>
                        <select class="form-select" name="area_code" required>
                            <option value="MDN">Medan</option>
                            <option value="BTM">Batam</option>
                            <option value="PKB">Pekanbaru</option>
                            <option value="DUM">Dumai</option>
                            <option value="PLB">Palembang</option>
                            <option value="LPG">Lampung</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="form-label" for="floatingTextarea2">Deskripsi</label>
                        <textarea class="form-control" id="floatingTextarea2"
                                  style="height: 300px" name="description"></textarea>
                    </div>

                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
