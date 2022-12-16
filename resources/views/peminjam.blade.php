
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
                    
                  <h3 class="card-title">Data Peminjam</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Nama Peminjam</th>
                        <th>Alamat</th>
                        <th>Buku Pinjaman</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjam as $p)
                        <tr>
                            <td>{{ $p['updated_at'] }}</td>
                            <td>{{ $p['nama_peminjam'] }}</td>
                            <td>{{ $p['alamat'] }}</td>    
                            <td>{{ $p->buku->nama_buku }}</td>    
                            <td><a class="btn btn-danger" href="/peminjam/kembalikan/{{ $p['id'] }}">Kembalikan Buku</a></td>  
                        </tr>  
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
                  <h4 class="modal-title">Pinjam Buku</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                              <!-- Form input  -->
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/peminjam" method="POST">
                @csrf
                <div class="form-group">
                  <label for="peminjaminput">Nama Peminjam</label>
                  <input type="text" class="form-control" id="peminjaminput" name="nama_peminjam" placeholder="Masukkan Nama Peminjam">
                  <label>Alamat Peminjam</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                  <label>Buku yang ingin dipinjam</label>
                  <select name="buku_id" class="form-control select2" style="width: 100%;">
                    @foreach ($buku as $b)
                    
                    @if ($b['peminjam_id'] == null)
                    <option value="{{ $b['id'] }}">{{ $b['nama_buku'] }}</option>
                    
                    @else
                    <option disabled="{{ $b['id'] }}">{{ $b['nama_buku'] }} (sudah dipinjam)</option>

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
    