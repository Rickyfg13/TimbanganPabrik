@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <section class="content-header ">
        <div class="container-fluid mt-4">
          <div class="row-mb-2">
           
              <ol class="breadcrumb sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Timbang Lapangan</li>
                <li class="breadcrumb-item active">Tambah Data</li>
              </ol>
            
          </div>  
        </div>
    </section>       


      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h1>Data Timbangan Lapangan</h1>
            </div>
              <div class="card-body">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                         <form action="{{ route('timbanglapangan.store') }}" method="POST">
                                @csrf

                           
                          
                              <div class="form-group">
                                  <label>Nomor Polisi Truk</label>
                                  <div class="input-group mb-3">
                                      <select class="form-control"  name="truk_id">
                                        @foreach($truk as $item)
                                              <option value="{{ old('truk_id') ? old ('truk_id') : $item->truk_id }}">
                                                  {{ $item->no_polisi }}
                                              </option>
                                        @endforeach
                                      </select>
                                    </div>
                              </div>

                              <div class="form-group">
                                  <label>Asal Afdeling</label>
                                  <div class="input-group mb-3">
                                      <select class="form-control" name="afdeling_id">
                                        @foreach($afdeling as $item)
                                              <option value="{{ old('afdeling_id') ? old ('afdeling_id') : $item->afdeling_id }}">
                                                  {{ $item->nama_afdeling }}
                                              </option>
                                        @endforeach
                                      </select>
                                    </div>
                              </div>

                             

                            <div class="col"> 
                                    <div class="mb-1">
                                    <label class="col-form-label">Timbang 1</label>
                                    <input type="number" id="a" onkeyup="tambah();" class="form-control" name="timbang_1" style="width: 100px;">
                                    </div>
                            </div>
                
                            <div class="col">
                                <div class="mb-1">
                                    <label  class="col-form-label">Timbang 2</label>
                                    <input type="number" id="b" onkeyup="tambah();" class="form-control" name="timbang_2" style="width: 100px;">
                                   
                                </div>
                            </div>
                
                            <div class="col">
                                <div class="mb-3">
                                    <label  class="col-form-label">Timbang 3</label>
                                    <input type="number" id="c"  onkeyup="tambah();" class="form-control" name="timbang_3" style="width: 100px;">
                            </div>
                            <div class="mb-3">
                                    <label  class="col-form-label">Hasil</label>
                                    <input type="number" id="total_timbang_lapangan" onkeyup="tambah();" class="form-control" name="total_timbang_lapangan" readonly>
                            </div>
                                <div class="modal-footer">
                                <a href="{{route ('timbanglapangan.index') }}" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                         </form>
                        </div>
                    </div>
                </div>
                <hr>

              </div>
            </div>
          </div>
        </div>
      </section>

  
</div>

<script type="text/javascript" >
    function tambah() {
      var timbang_1 = document.getElementById("a").value;
      var timbang_2 = document.getElementById("b").value;
      var timbang_3 = document.getElementById("c").value;
      var total_timbang_lapangan = document.getElementById("total_timbang_lapangan").value;
      var total_timbang_lapangan = parseInt(timbang_1) + parseInt(timbang_2) + parseInt(timbang_3);
      document.getElementById("total_timbang_lapangan").value = total_timbang_lapangan;
    }
</script>

@endsection