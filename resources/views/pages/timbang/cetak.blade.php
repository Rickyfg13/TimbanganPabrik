@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  
    <section class="content-header ">
        <div class="container-fluid mt-4">
          <div class="row-mb-2">
              <ol class="breadcrumb sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan Timbang</li>
              </ol>
            
          </div>  
        </div>
    </section>  

    <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h1>Laporan Timbangan</h1>
              <div class="my-3">
                <form action="{{ route('filter_tanggal') }}" method="POST">
                  @csrf
                    <div class="container">
                      <div class="row">
                          <div class="container-fluid">
                              <div class="form-group row">
                                  <label for="date" class="col-form-label col-sm-2">Data Dari Tanggal</label>
                               <div class="col-sm-3">
                                   <input type="date" class="form-control input-sm" name="dari" id="dari" required >
                               </div>
                               <label for="date" class="col-form-label col-sm-2">Data Sampai Tanggal</label>
                               <div class="col-sm-3">
                                   <input type="date" class="form-control input-sm" name="sampai" id="sampai" required >
                               </div>
                               <div class="col-sm-2">
                                   
                                <button type="submit" class="btn btn-info" title="search">Filter</button>
                                <a href="{{route ('cetak') }}" class="btn btn-danger">Reset</a>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                  </form>  
                      <a href="{{ route('printSelisihTimbang') }}" target="_blank"class="btn btn-danger" >
                        <i class="fas fa-print"> Print</i>
                      </a>
                      
                      
            </div>
    
    
            </div>
              <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-hover table align-middle table-striped table-sm display" >
                          <thead class="table-dark">
                            <tr>
                              <th>NO</th>
                              <th>Asal Afdeling</th>
                              <th>Timbang Ke</th>
                              <th>Berat Timbang Pabrik</th>
                              <th>Berat Timbang Lapangan</th>
                              <th>Selisih Timbang</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($listi as $no => $item)
                            <tr>
                              <td>{{ $no+1 }}</td>
                                <td>{{$item->afdeling->nama_afdeling}}</td>
                                <td>{{$item->timbang_ke}}</td>
                                <td>{{$item->berat}} Kg</td>
                                <td>{{ $item->timbanglapangan->berat }} Kg</td>
                                <td>{{ abs($item->berat-$item->timbanglapangan->berat) }} Kg</td>
                              </tr>  
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                <hr>
              </div>
               
              </div>
            </div>
          </div>
        </div>
</section>



</div>

@endsection