@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <section class="content-header ">
        <div class="container-fluid mt-4">
          <div class="row-mb-2">
           
              <ol class="breadcrumb sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Timbang</li>
                <li class="breadcrumb-item active">Edit Data</li>
              </ol>
            
          </div>  
        </div>
    </section>       


      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h1>Edit Data Timbangan </h1>
            </div>
              <div class="card-body">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                          <form action="/timbang/{{ $timbang->timbang_id }}" method="POST">
                            @csrf
                            @method('PUT')  
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <div class="input-group mb-3">
                                  <input type="date" class="form-control" name="tanggal"
                                    value="{{ old('tanggal') ? old('tanggal') : $timbang->tanggal }}"
                                   >
                                  </div>
                              </div>
                           
                              <div class="form-group">
                                  <label>Jam</label>
                                  <div class="input-group mb-3">
                                  <input type="time" name="jam" id="jam" class="form-control"
                                  value="{{ old('jam') ? old('jam') : $timbang->jam }}"
                                  >  
                                  </div>
                              </div>

                              
                              <div class="form-group">
                                <label>Timbang Ke</label>
                                <div class="input-group mb-3">
                                  <select name="timbang_ke" class="form-control" >
                                  <option value="{{ old('timbang_ke') ? old('timbang_ke') : $timbang->timbang_ke }}">{{ $timbang->timbang_ke }}</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  </select>  
                                </div>
                              </div>

                           
                              <div class="form-group">
                                <label>Asal Afdeling</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="afdeling_id"  id="afdeling">
                                      <option value="{{ old('afdeling_id') ? old ('afdeling_id') : $timbang->afdeling_id }}">
                                          {{ $timbang->afdeling->nama_afdeling }}
                                      </option>
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
                                        <option value="{{ old('truk_id') ? old ('truk_id') : $timbang->truk_id }}">
                                          {{ $timbang->truk->no_polisi }}
                                         </option>

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
                                    <input type="number" class="form-control" name="berat" style="width: 100px;" id="berat" value="{{ old('berat') ? old('berat') : $timbang->berat }}"> 
                                    <div class="col-6 col-6"  >
                                        <label class="col-form-label" style="margin-left:80px ;">Kg</label>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label>Nama Supir</label>
                              <div class="input-group mb-3">
                              <input type="text" name="supir" id="nama_supir" class="form-control" value="{{ old('supir') ? old('supir') : $timbang->supir }}">  
                              </div>
                          </div>
                                <div>
                                <a href="{{ route('timbang.index') }}" class="btn btn-secondary">Kembali</a>
                                   <!-- Button trigger modal -->
                                  <button type="submit" class="btn btn-primary" >
                                    Ubah
                                  </button>
                                </div>
                        </div>                      
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


@endsection