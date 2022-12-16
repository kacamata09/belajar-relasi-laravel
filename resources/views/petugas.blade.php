@extends('snippets.main')

@section('konten')

<section class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inputpetugas">
            Tambah
          </button>
        <div class="row">
            <div class="col-12">
                
              <div class="card">
                  <div class="card-header">
                    
                  <h3 class="card-title">Data Penerbit Buku</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Buku yang dipinjamkan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $p)
                        <tr>
                            <td>{{ $p['id'] }}</td>
                            <td>{{ $p['nama_petugas'] }}</td>
                            @if (sizeOf($p->bukus) > 0)
                            <td>
                            @foreach ($p->bukus as $buku)
                            <li>{{ $buku->nama_buku }}</li>
                            @endforeach
                            </td>
                            @else
                        
                            <td>Belum ada aktivitas</td>
                            @endif
                                
                            <td>
                                <a href="/petugas/edit/{{ $p['id'] }}">Edit</a>
                                <a href="/petugas/hapus/{{ $p['id'] }}">Hapus</a>
                            </td>    
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
   
            </div>
            <!-- /.col -->
          </div>

          <div class="modal fade" id="modal-inputpetugas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                              <!-- Form input  -->
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/petugas" method="POST">
                @csrf
                <div class="form-group">
                  <label for="petugasinput">Nama Petugas</label>
                  <input type="text" class="form-control" id="petugasinput" name="nama_petugas" placeholder="Masukkan Nama Petugas">
            
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>



    </div>

</section>
    

@endsection
    