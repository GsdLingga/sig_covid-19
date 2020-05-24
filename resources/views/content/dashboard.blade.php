@extends('layout.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Persebaran COVID-19 - {{date('j F Y', strtotime($today))}}</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Positif</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_positif}} orang</div>
          </div>
          {{-- <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dalam Perawatan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_dalam_perawatan}} orang</div>
          </div>
          {{-- <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sembuh</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_sembuh}} orang</div>
          </div>
          {{-- <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Meninggal</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_meninggal}} orang</div>
          </div>
          {{-- <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Peta Persebaran COVID-19</h6>
        </div>
        <div class="card-body" style=" height: 600px;">
          
            <div id="map"></div>

        </div>
      </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Persebaran COVID-19 Per Kabupaten</h6>
        </div>
        <div class="card-body" id="table_badung">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kabupaten</th>
                  <th>Positif</th>
                  <th>Dalam Perawatan</th>
                  <th>Sembuh</th>
                  <th>Meninggal</th>
                </tr>
              </thead>
              <tbody>
                  @for ($i = 1; $i <= sizeof($data_hari_ini); $i++)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$data_hari_ini[$i-1]->nama_kabupaten}}</td>
                          <td>{{$data_hari_ini[$i-1]->positif}} Orang</td>
                          <td>{{$data_hari_ini[$i-1]->dalam_perawatan}} Orang</td>
                          <td>{{$data_hari_ini[$i-1]->sembuh}} Orang</td>
                          <td>{{$data_hari_ini[$i-1]->meninggal}} Orang</td>
                      </tr>
                  @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
</div>

@endsection

@section('js')
<!-- Leaflet-KMZ -->
<script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
<script>
  $(document).ready(function(){
    var dataMap = null;
    var dataColorMap = null;
    var colorMap = [
      "00AFE5",
      "179EC8",
      "2F8EAB",
      "477E8F",
      "5F6E72",
      "775D55",
      "8F4D39",
      "A73D1C",
      "BF2D00"
    ];
    var tanggal = {{$today->toDateString()}};
    console.log(tanggal);
    $.ajax({
      async:false,
      url:'getDataMap',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response;
      }
    });
    console.log(dataMap);
    $.ajax({
      async:false,
      url:'getDataColorMap',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataColorMap = response;
      }
    });
    console.log(dataColorMap);

    var map = L.map('map',{
      fullscreenControl:true,
    });

    map.setView(new L.LatLng(-8.455383, 115.052969), 9);

    var OpenTopoMap = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=4oECnlCscQSAbtknotNK', {
    maxZoom: 17,
    attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
    opacity: 0.90
    });

    OpenTopoMap.addTo(map);

    var defaultStyle = {opacity: '1', color: '#000000', fillOpacity: '0', fillColor: '#CCCCCC'};
    setMapColor();

    function setMapColor(){
      var BADUNG, BULELENG, BANGLI, DENPASAR, GIANYAR, JEMBRANA, KARANGASEM, KLUNGKUNG, TABANAN;
      dataColorMap.forEach(function(value,index){

        var colorKabupaten = dataColorMap[index].nama_kabupaten.toUpperCase();
        if(colorKabupaten == "BADUNG"){
          BADUNG = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "BULELENG"){
          BULELENG = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "BANGLI"){
          BANGLI = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "DENPASAR"){
          DENPASAR = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "GIANYAR"){
          GIANYAR = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "JEMBRANA"){
          JEMBRANA = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "KARANGASEM"){
          KARANGASEM = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "KLUNGKUNG"){
          KLUNGKUNG = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }else if(colorKabupaten == "TABANAN"){
          TABANAN = {opacity: '1', color: '#000000', fillOpacity: '1', fillColor: '#'+colorMap[index]};
        }

      });

      // Instantiate KMZ parser (async)
      var kmzParser = new L.KMZParser({
      onKMZLoaded: function(kmz_layer, name) {
          control.addOverlay(kmz_layer, name);
          var layers = kmz_layer.getLayers()[0].getLayers();
          layers.forEach(function(layer, index){
            var kab = layer.feature.properties.NAME_2;
            kab = kab.toUpperCase();
            var kabLower = kab.toLowerCase();

            if (!Array.isArray(dataMap) || !dataMap.length == 0){
              // set sub layer default style positif covid
              // var STYLE = {opacity:'1',color:'#000',fillOpacity:'1',fillColor:'#'+colorMap[index]}; 
              // layer.setStyle(STYLE);
              if(kab == 'BADUNG'){
                layer.setStyle(BADUNG);
              }else if(kab == 'BANGLI'){
                layer.setStyle(BANGLI);
              }else if(kab == 'BULELENG'){
                layer.setStyle(BULELENG);
              }else if(kab == 'DENPASAR'){
                layer.setStyle(DENPASAR);
              }else if(kab == 'GIANYAR'){
                layer.setStyle(GIANYAR);
              }else if(kab == 'JEMBRANA'){
                layer.setStyle(JEMBRANA);
              }else if(kab == 'KARANGASEM'){
                layer.setStyle(KARANGASEM);
              }else if(kab == 'KLUNGKUNG'){
                layer.setStyle(KLUNGKUNG);
              }else if(kab == 'TABANAN'){
                layer.setStyle(TABANAN);
              }

              var data = '<table width="300">';
                data += '<tr>';
                data += '<th colspan="2">Keterangan</th>';
                data += '</tr>';

                data += '<tr>';
                data += '<td>Kabupaten</td>';
                data += '<td>: '+kab+' </td>';
                data += '</tr>';

                data += '<tr style="color:red">';
                data += '<td>Positif</td>';
                data += '<td>: '+dataMap[index].positif+' </td>';
                data += '</tr>';

                data += '<tr style="color:blue">';
                data += '<td>Dalam Perawatan</td>';
                data += '<td>: '+dataMap[index].dalam_perawatan+' </td>';
                data += '</tr>';

                data += '<tr style="color:green">';
                data += '<td>Sembuh</td>';
                data += '<td>: '+dataMap[index].sembuh+' </td>';
                data += '</tr>';

                data += '<tr style="color:black">';
                data += '<td>Meninggal</td>';
                data += '<td>: '+dataMap[index].meninggal+' </td>';
                data += '</tr>';

                data +='</table>'
            }else{
              var data = "Tidak ada Data Pada Tanggal Tersebut"
              layer.setStyle(defaultStyle);
            }
            layer.bindPopup(data);
          })
          kmz_layer.addTo(map);
      }
      });
          
      // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
      kmzParser.load('bali-kabupaten.kmz');
      // kmzParser.load('regions.kmz');
      // kmzParser.load('capitals.kmz', { interactive: true });
      // kmzParser.load('globe.kmz', { ballon: false });
      // kmzParser.load('multigeometry.kmz', { pointable: false });

      var control = L.control.layers(null, null, 
      { collapsed:false 
      }).addTo(map);
      $('.leaflet-control-layers').hide();
    }
  });
</script>
@endsection