@extends('layout.app')

@section('content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit</h1>
            </div>
            <form action="/datakabupaten/{{$table_id->id}}" method="POST" class="user">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <p class="mb-1" style="padding-left: 20px">Positif</p>
                  <input type="number" name="positif" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Jumlah Positif" value="{{$table_id->positif}}">
                </div>

                <div class="form-group">
                    <p class="mb-1" style="padding-left: 20px">Dalam Perawatan</p>
                  <input type="number" name="dalam_perawatan" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Jumlah Dalam Perawatan" value="{{$table_id->dalam_perawatan}}">
                </div>

                <div class="form-group">
                    <p class="mb-1" style="padding-left: 20px">Sembuh</p>
                  <input type="number" name="sembuh" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Jumlah Sembuh" value="{{$table_id->sembuh}}">
                </div>

                <div class="form-group">
                    <p class="mb-1" style="padding-left: 20px">Meninggal</p>
                  <input type="number" name="meninggal" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Jumlah Meninggal" value="{{$table_id->meninggal}}">
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Save
                </button>
                
            </form>


        </div>
        <!-- /.container-fluid -->

    </div>

</div>
    
@endsection