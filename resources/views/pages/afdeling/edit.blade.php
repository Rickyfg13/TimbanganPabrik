@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="ml-5">Form Edit Data Afdeling</h1>
    </section>

    <section class="content">
      
        <div class="col-lg-5 ml-5">
            <form action="/afdeling/{{ $afdeling->afdeling_id }}" method="post" >    
                @csrf
                @method('PUT')  
                <div class="form-group">
                    <label for="title">Nama Afdeling</label>
                    <input type="text" class="form-control" name="nama_afdeling"
                    value="{{ old('nama_afdeling') ? old('nama_afdeling') : $afdeling->nama_afdeling }}"
                    >
                    @error('nama_afdeling')
                    <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>

                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route('afdeling.index') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
    </section>
    
</div>

        
@endsection