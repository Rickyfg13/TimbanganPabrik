@extends('layouts.app')

@section('content')
<div class="content-wrapper">

  <section class="content-header ">
    <div class="container-fluid mt-4">
      <div class="row-mb-2">
       
          <ol class="breadcrumb sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Timbang Pabrik</li>
          </ol>
        
      </div>  
    </div>
  </section>       
 
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1>Data Timbangan Pabrik</h1>
          <a href="{{ route('timbangpabrik.create') }}" class="btn btn-info">Tambah</a>

        </div>
          <div class="card-body">
            <table class="table table-hover table align-middle table-striped table-bordered table-sm display">
                  <thead class="table-dark">
                    <tr >
                      <th>NO</th>
                      <th>Nomor Polisi</th>
                      <th>Asal Afdeling</th>
                      <th>Timbang 1</th>
                      <th>Timbang 2</th>
                      <th>Timbang 3</th>
                      <th>Total</th>
                      <th>Tanggal Input</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                            <td>{{$item->truk->no_polisi}}</td>
                            <td>{{$item->afdeling->nama_afdeling}}</td>
                            <td>{{$item->timbang_1}}</td>
                            <td>{{$item->timbang_2}}</td>
                            <td>{{$item->timbang_3}}</td>
                            <td>{{$item->timbang_3}}</td>
                            <td>{{date('d F Y',strtotime($item->created_at))}}</td>
                            <td>
                              <a href="timbangpabrik/{{ $item->id }}/edit" class="btn btn-primary "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                            
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-whatever="@getbootstrap"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg></button>

                            <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Hapus!!!</h5>
                                  </div>
                                  <div class="modal-body">
                  
                                    <form action="timbangpabrik/{{ $item->id }}" method="POST">
                                      @csrf
                                      @method("delete")
                                      Apakah Anda Yakin?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
            <hr>
            {{ $list->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
