@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header ">
        <div class="container-fluid mt-4">
          <div class="row-mb-2">
           
              <ol class="breadcrumb sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Timbang Pabrik</li>
                <li class="breadcrumb-item active">Edit Data</li>
              </ol>
            
          </div>  
        </div>
    </section>       
    
    <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h1>Edit Timbangan Pabrik</h1>
            </div>
              <div class="card-body">
                <div class="container">
                    <div class="col-lg-5 ml-5">
                            <form action="/timbanglapangan/{{ $timlap->id }}" method="post" >    
                                @csrf
                                @method('PUT')  




                               

                                <div class="form-group">
                                    <label for="title">Nama Afdeling</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="afdeling_id" value="{{ old('afdeling_id') ? old('afdeling_id') : $timlap->nama_afdeling }}">
                                        @foreach($afdeling as $item)
                                                <option value="{{ old('afdeling_id') ? old ('afdeling_id') : $item->afdeling_id }}">
                                                    {{ $item->nama_afdeling }}
                                                </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('nama_afdeling')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                
                                <div class="form-group">
                                    <label for="title">Nomor Polisi</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="truk_id" value="{{ old('truk_id') ? old('truk_id') : $timlap->no_polisi }}">
                                        @foreach($truk as $item)
                                                <option value="{{ old('truk_id') ? old ('truk_id') : $item->truk_id }}">
                                                    {{ $item->no_polisi }}
                                                </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('no_polisi')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="title">Timbang 1</label>
                                    <input type="text" class="form-control" name="timbang_1"
                                    value="{{ old('timbang_1') ? old('timbang_1') : $timlap->timbang_1 }}"
                                    id="a" onkeyup="tambah();"
                                    >
                                    @error('timbang_1')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="title">Timbang 2</label>
                                    <input type="text" class="form-control" name="timbang_2"
                                    value="{{ old('timbang_2') ? old('timbang_2') : $timlap->timbang_2 }}"
                                    id="b" onkeyup="tambah();"
                                    >
                                    @error('timbang_2')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="title">Timbang 3</label>
                                    <input type="text" class="form-control" name="timbang_3"
                                    value="{{ old('timbang_3') ? old('timbang_3') : $timlap->timbang_3 }}"
                                    onkeyup="tambah();" id="c"
                                    >
                                    @error('timbang_3')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="title">Hasil</label>
                                    <input type="text" class="form-control" name="total_timbang_lapangan"
                                    value="{{ old('total_timbang_lapangan') ? old('total_timbang_lapangan') : $timlap->total_timbang_lapangan }}"
                                    onkeyup="tambah();" id="total_timbang_lapangan" readonly
                                    >
                                    @error('total_timbang_lapangan')
                                    <div class="alert alert-danger">{{ $message }}</div>   
                                    @enderror
                                </div>
                    
                                
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="{{ route('timbanglapangan.index') }}" class="btn btn-danger">Back</a>
                            </form>
                    </div>
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