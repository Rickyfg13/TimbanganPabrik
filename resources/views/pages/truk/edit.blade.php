@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="ml-5">Form Edit Data Truk</h1>
    </section>

    <section class="content">
      
        <div class="col-lg-5 ml-5">
            <form action="/truk/{{$truk->id}}" method="post" >    
                @csrf
                @method('PUT')  
                <div class="form-group">
                    <label for="title">Nomor Polisi</label>
                    <input type="text" class="form-control" name="no_polisi"
                    value="{{ old('no_polisi') ? old('no_polisi') : $truk->no_polisi }}"
                    >
                    @error('no_polisi')
                    <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Jenis Truk</label>
                    <input type="text" class="form-control" name="jenis_truk"
                    value="{{ old('jenis_truk') ? old('jenis_truk') : $truk->jenis_truk }}"
                    >
                    @error('jenis_truk')
                    <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Sopir</label>
                    <input type="text" class="form-control" name="sopir"
                    value="{{ old('sopir') ? old('sopir') : $truk->sopir }}"
                    >
                    @error('sopir')
                    <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Status Truk</label>
                    <input type="text" class="form-control" name="status"
                    value="{{ old('status') ? old('status') : $truk->status }}"
                    >
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>

                
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route('truk.index') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
    </section>
    
</div>

        
@endsection