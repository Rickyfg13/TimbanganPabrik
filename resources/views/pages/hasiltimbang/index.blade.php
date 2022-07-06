@extends('layouts.app')
@section('content')
<div class="content-wrapper">

  <section class="content-header ">
    <div class="container-fluid mt-4">
      <div class="row-mb-2">
       
          <ol class="breadcrumb sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Laporan Selisih Timbang</li>
          </ol>
        
      </div>  
    </div>
  </section>
               
 
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1>Laporan Selisih Timbang</h1>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="form-group">
      
                <form class="form-inline" method="get" action="{{ url('laporan/periode') }}">

                  <div class="form-group">
                    <label for="email">Tanggal awal:</label>
                    <input type="text" name="tanggal_awal" class="form-control datepicker" id="email" autocomplete="off" value="{{ date('Y-m-d') }}">
                  </div>

                  <div class="form-group">
                    <label for="pwd" style="margin-left:10px;">Tanggal akhir:</label>
                    <input  type="text" name="tanggal_akhir" class="form-control datepicker" id="pwd" autocomplete="off" value="{{ date('Y-m-d') }}">
                  </div>
                 
                  <button style="margin-left:10px;" type="submit" class="btn btn-info">Submit</button>
                </form>
              </div>
              <table  class="table table-hover table align-middle table-striped table-bordered table-sm display" >
                    <thead class="table-dark">

                      <tr>
                        <th>No</th>
                        <th>Nomor Polisi Truk </th>
                        <th>Afdeling</th>
                        <th>Total Timbangan Pabrik</th>
                        <th>Total Timbangan Lapangan</th>
                        <th>Selisih Timbang</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                          {{-- @foreach ($hasiltimbang as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->tanggal}}</td>
                                  <td>{{$item->truk}}</td>
                                  <td>{{$item->timlap}}</td>
                                  <td>{{$item->timpab}}</td>
                              </tr>
                          @endforeach --}}
                    </tbody>
              </table>
          </div>
          </div>
           {{-- {{ $list_truk->links() }} --}}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection
