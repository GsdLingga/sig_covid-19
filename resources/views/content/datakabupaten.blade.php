@extends('layout.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kabupaten</h1>

    @php
        if ($cek_data_hari_ini == 0) {
            echo '<a href="/copyData" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Copy Data H-1</a>';
        }else {
            echo '<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="visibility: hidden"><i class="fas fa-download fa-sm text-white-50"></i> Copy Data H-1</a>';
        }
    @endphp
    
  </div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Badung</h6>
          </div>
          <div class="card-body" id="table_badung">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Positif</th>
                    <th>Dalam Perawatan</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= sizeof($badung); $i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$badung[$i-1]->positif}} Orang</td>
                            <td>{{$badung[$i-1]->dalam_perawatan}} Orang</td>
                            <td>{{$badung[$i-1]->sembuh}} Orang</td>
                            <td>{{$badung[$i-1]->meninggal}} Orang</td>
                            <td>{{date('j F Y', strtotime($badung[$i-1]->tanggal))}}</td>
                            <td>
                                {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                    {{-- <button type="submit"> --}}
                                        <a href="/datakabupaten/{{{$badung[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                    {{-- </button> --}}
                                {{-- </form> --}}
                            </td>
                        </tr>
                    @endfor
                </tbody>
              </table>

              {{ $badung->links() }}

            </div>
          </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bangli</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($bangli); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$bangli[$i-1]->positif}} Orang</td>
                                <td>{{$bangli[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$bangli[$i-1]->sembuh}} Orang</td>
                                <td>{{$bangli[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($bangli[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$bangli[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $bangli->links() }}
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buleleng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($buleleng); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$buleleng[$i-1]->positif}} Orang</td>
                                <td>{{$buleleng[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$buleleng[$i-1]->sembuh}} Orang</td>
                                <td>{{$buleleng[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($buleleng[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$buleleng[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $buleleng->links() }}
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Denpasar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($denpasar); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$denpasar[$i-1]->positif}} Orang</td>
                                <td>{{$denpasar[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$denpasar[$i-1]->sembuh}} Orang</td>
                                <td>{{$denpasar[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($denpasar[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$denpasar[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $denpasar->links() }}
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gianyar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($gianyar); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$gianyar[$i-1]->positif}} Orang</td>
                                <td>{{$gianyar[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$gianyar[$i-1]->sembuh}} Orang</td>
                                <td>{{$gianyar[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($gianyar[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$gianyar[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $gianyar->links() }}
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jembrana</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($jembrana); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$jembrana[$i-1]->positif}} Orang</td>
                                <td>{{$jembrana[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$jembrana[$i-1]->sembuh}} Orang</td>
                                <td>{{$jembrana[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($jembrana[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$jembrana[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $jembrana->links() }}

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Karangasem</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($karangasem); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$karangasem[$i-1]->positif}} Orang</td>
                                <td>{{$karangasem[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$karangasem[$i-1]->sembuh}} Orang</td>
                                <td>{{$karangasem[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($karangasem[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$karangasem[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $karangasem->links() }}

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Klungkung</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($klungkung); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$klungkung[$i-1]->positif}} Orang</td>
                                <td>{{$klungkung[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$klungkung[$i-1]->sembuh}} Orang</td>
                                <td>{{$klungkung[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($klungkung[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$klungkung[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $klungkung->links() }}

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($tabanan); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$tabanan[$i-1]->positif}} Orang</td>
                                <td>{{$tabanan[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$tabanan[$i-1]->sembuh}} Orang</td>
                                <td>{{$tabanan[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($tabanan[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$tabanan[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $tabanan->links() }}

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kabupaten Lainnya</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($kabupaten_lain); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$kabupaten_lain[$i-1]->positif}} Orang</td>
                                <td>{{$kabupaten_lain[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$kabupaten_lain[$i-1]->sembuh}} Orang</td>
                                <td>{{$kabupaten_lain[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($kabupaten_lain[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/member/{{$member[$i-1]->id}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$kabupaten_lain[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $kabupaten_lain->links() }}

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Warga Negara Asing</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Positif</th>
                        <th>Dalam Perawatan</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= sizeof($wna); $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$wna[$i-1]->positif}} Orang</td>
                                <td>{{$wna[$i-1]->dalam_perawatan}} Orang</td>
                                <td>{{$wna[$i-1]->sembuh}} Orang</td>
                                <td>{{$wna[$i-1]->meninggal}} Orang</td>
                                <td>{{date('j F Y', strtotime($wna[$i-1]->tanggal))}}</td>
                                <td>
                                    {{-- <form action="/datakabupaten/{{{$wna[$i-1]->id}}}/edit" method="GET"> --}}
                                        {{-- <button type="submit"> --}}
                                            <a href="/datakabupaten/{{{$wna[$i-1]->id}}}/edit" method="GET" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        {{-- </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>

                    {{ $wna->links() }}

                </div>
            </div>
        </div>

        

      </div>
      <!-- /.container-fluid -->

  </div>

</div>

@endsection