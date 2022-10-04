@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <section class="content-header ">
        <div class="container-fluid mt-4">
          <div class="row-mb-2">
           
              <ol class="breadcrumb sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Timbang Pabrik</li>
                <li class="breadcrumb-item active">Tambah Data</li>
              </ol>
            
          </div>  
        </div>
    </section>       


      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h1>Data Timbangan Pabrik</h1>
            </div>
              <div class="card-body">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                          <form action="{{  route('timbang.store')  }}" method="POST">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group mb-3">
                                        <input type="date" name="tanggal" id="date" class="form-control">  
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Jam</label>
                                        <div class="input-group mb-3">
                                        <input type="time" name="jam" id="jam" class="form-control">  
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                      <label>Timbang Ke</label>
                                      <div class="input-group mb-3">
                                        <select name="timbang_ke" class="form-control" id="timbang_ke"  >
                                          <option selected>Pilih Urutan Timbang</option>  
                                          <option value="1">1</option>  
                                          <option value="2">2</option>  
                                          <option value="3">3</option>  
                                        </select>  
                                      </div>
                                    </div>

                                
                                    <div class="form-group">
                                      <label>Asal Afdeling</label>
                                      <div class="input-group mb-3">
                                          <select class="form-control " name="afdeling_id"  id="afdeling">
                                            @foreach($afdeling as $item)
                                                  <option value="{{ old('afdeling_id') ? old ('afdeling_id') : $item->afdeling_id }}">
                                                      {{ $item->nama_afdeling }}
                                                  </option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Nomor Plat Truk</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control"  name="truk_id" id="no_pol">
                                              @foreach($truk as $item)
                                                    <option value="{{ old('truk_id') ? old ('truk_id') : $item->truk_id }}">
                                                        {{ $item->no_polisi }}
                                                    </option>
                                              @endforeach
                                            </select>
                                          </div>
                                    </div>

                          

                                  <div class="col"> 
                                    <div class="mb-1">
                                      <label class="col-form-label">Berat</label>
                                        <div class="row">
                                          <input type="number" class="form-control" name="berat" style="width: 100px;" id="berat"> 
                                          <div class="col-6 col-6"  >
                                              <label class="col-form-label" style="margin-left:80px ;">Kg</label>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label>Nama Supir</label>
                                    <div class="input-group mb-3">
                                    <input type="text" name="supir" id="nama_supir" class="form-control">  
                                    </div>
                                  </div>

                                

                                  <div class="form-group">
                                    <label>Timbang Lapangan</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="timbangl_id"  id="timbangl_id">
                                          @foreach($timbangl as $item)
                                                <option value="{{ old('timbangl_id') ? old ('timbangl_id') : $item->timbangl_id }}">
                                                    {{ $item->timbangl_id }}
                                                </option>
                                          @endforeach
                                        </select>
                                      </div>
                                  </div>

                               
                                      <div>
                                      <a href="{{ route('timbang.index') }}" class="btn btn-secondary">Kembali</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" onclick="cetak()" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                          Proses
                                        </button>
                                      </div>
                          
                       
                                  </div>               
                                 <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                      <div class="modal-header ">
                                        <h5 class="modal-title " id="exampleModalLabel"> 
                                          <label class="label"> Apakah Data Ini Sudah Benar?</label>
                                        </h5>
                                
                              </div>
                              <div class="modal-body">
                                <table class="table" >
                                  <thead class="table">
                                    <tr>
                                      <th>Tanggal</th>
                                      <th>Jam</th>
                                      <th>Timbang Ke</th>
                                      <th>Asal Afdeling</th>
                                      <th>No Plat</th>
                                      <th>Berat</th>
                                      <th>Sopir</th>
                                    </tr>
                                  </thead>
                                    @csrf
                                  <tbody>
                                    <tr>
                                      <td id="a" name="tanggal" ></td>
                                      <td id="b" name="jam"></td>
                                      <td id="c" name="timbang_ke" ></td>
                                      <td id="d"  name="afdeling_id" >
                                      </td>
                                      <td id="e"  name="truk_id" ></td>
                                      <td id="g" name="berat"></td>
                                      <td id="h" name="supir"></td>
                                  
                                    </tr>
                                  </tbody>
                                  </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                              <button type="submit"  class="btn btn-primary">Kirim</button>
                            </form>
                              </div>
                            </div>
                          </div>
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
  function cetak() {
    var tanggal = document.getElementById("date").value;
    var waktu = document.getElementById("jam").value;
    var timbang_ke = document.getElementById("timbang_ke").value;
    var afdeling = document.getElementById("afdeling").value;
    var plat = document.getElementById("no_pol").value;
   
    var berat = document.getElementById("berat").value;
    var nama_supir = document.getElementById("nama_supir").value;

    document.getElementById("a").innerHTML=tanggal;
    document.getElementById("b").innerHTML=waktu;
    document.getElementById("c").innerHTML=timbang_ke;
    document.getElementById("d").innerHTML=afdeling;
    document.getElementById("e").innerHTML=plat;
   
    document.getElementById("g").innerHTML=berat;
    document.getElementById("h").innerHTML=nama_supir;



    
  }
</script>

@endsection
