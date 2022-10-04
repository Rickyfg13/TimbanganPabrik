@extends('layouts.app')

@section('content')
<div class="content-wrapper">

  <section class="content-header ">
    <div class="container-fluid mt-4">
      <div class="row-mb-2">
       
          <ol class="breadcrumb sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Truk</li>
          </ol>
        
      </div>  
    </div>
  </section>
               
 
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1>Data Unit Truk</h1>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Truk</h5>
                </div>
                <div class="modal-body">

                  <form action="{{ url('truk') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label  class="col-form-label">Nomor Polisi :</label>
                      <input type="text" class="form-control" name="no_polisi">
                    </div>
                    
                    <div class="mb-3">
                      <label  class="col-form-label">Jenis Truk :</label>
                      <select class="form-control" name="jenis_truk">
                       <option> Colt Diesel PS 120 </option>
                       <option> Toyota Ps  115</option>
                       <option> Toyota Dyna 110 PS</option>
                       <option> Isuzu </option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label  class="col-form-label">Nama Sopir :</label>
                      <input type="text" class="form-control" name="sopir">
                    </div>

                    <div class="mb-3">
                      <label  class="col-form-label">Status truk :</label>
                      <input type="text" class="form-control" name="status">
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </form>

                </div>
              </div>
            </div>
          </div>

        </div>
          <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table align-middle table-striped table-sm display" >
                      <thead class="table-dark">
                        <tr >
                          <th >NO</th>
                          <th>Nomor Polisi</th>
                          <th>Jenis Truk</th>
                          <th>Sopir Utama</th>
                          <th>Status Truk</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list_truk as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                                <td>{{$item->no_polisi}}</td>
                                <td>{{$item->jenis_truk}}</td>
                                <td>{{$item->sopir}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                  <a href="/truk/{{ $item->truk_id }}/edit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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
                                        <h5 class="modal-title" id="hapusModalLabel">Hapus Unit Truk</h5>
                                      </div>
                                      <div class="modal-body">
                      
                                        <form action="/truk/{{ $item->truk_id }}" method="POST">
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
          </div>
            {{ $list_truk->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection
