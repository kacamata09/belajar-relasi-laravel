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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $p)
                        <tr>
                            <td>{{ $p['id'] }}</td>
                            <td>{{ $p['nama_petugas'] }}</td>
                            @if (sizeOf($p->peminjams) > 0)
                            <td>
                            @foreach ($p->peminjams as $peminjam)
                            <li>{{ $peminjam->buku->nama_buku }} dipinjam {{ $peminjam->nama_peminjam }}</li>
                            <br>
                            @endforeach
                            </td>
                            @else
                        
                            <td>Belum ada aktivitas</td>
                            @endif
                            <td>{{ $p['status'] }}</td>
                            @if ($p['status'] == 'nonaktif')
                            <td>
                                <a class="btn btn-success" href="/petugas/hapus/{{ $p['id'] }}">Aktifkan</a>
                            </td>    
                            @else
                            <td>
                                <a class="btn btn-warning" href="/petugas/hapus/{{ $p['id'] }}">Nonaktifkan</a>
                            </td>    
                            @endif
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
                  <label>Pilih User</label>
                  <select name="id" class="form-control select2" style="width: 100%;">
                    @foreach ($users as $u)
                    
                    @if ($u['petugas_id'] == null)
                    <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                    
                    @else
                    <option disabled="disabled">{{ $u['name'] }} (Sudah jadi Petugas)</option>

                    @endif

                    @endforeach
                   
                  </select>

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
    