@extends('snippets.main')

@section('konten')

<section class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inputpenerbit">
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
                        <th>Nomor Penerbit</th>
                        <th>Nama Penerbit</th>
                        <th>Jumlah Buku Terbit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbit as $p)
                        <tr>
                            <td>{{ $p['id'] }}</td>
                            <td>{{ $p['nama_penerbit'] }}</td>
                            <td>{{ sizeOf($p->bukus) }}</td>    
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

          <div class="modal fade" id="modal-inputpenerbit">
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
            <form action="/penerbit" method="POST">
                @csrf
                <div class="form-group">
                  <label for="penerbitinput">Nama Penerbit</label>
                  <input type="text" class="form-control" id="penerbitinput" name="nama_penerbit" placeholder="Masukkan Nama Penerbit">
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

<section class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inputbuku">
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
                        <th>Id Buku</th>
                        <th>Nama Buku</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Penerbit</th>
                        <th>Peminjam</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $b)
                        <tr>ara
                            <td>{{ $b['id'] }}</td>
                            <td>{{ $b['nama_buku'] }}</td>
                            <td>{{ $b['tahun_terbit'] }}</td>    
                            <td>{{ $b['stok'] }}</td>    
                            <td>{{ $b->penerbit->nama_penerbit }}</td>    
                            @if ($b['peminjam_id']== null)
                            <td>Belum dipinjam</td>  
                            @else 
                            <td>{{ $b->peminjam->nama_peminjam }}</td>    
                            @endif
                            <td><a href="/buku/hapus/{{ $b['id'] }}">Hapus</a> 
                                <a href="/buku/edit/{{ $b['id'] }}">Edit</a></td>    
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

          <div class="modal fade" id="modal-inputbuku">
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
            <form action="/buku" method="POST">
                @csrf
                <div class="form-group">
                  <label for="penerbitinput">Nama Buku</label>
                  <input type="text" class="form-control" id="penerbitinput" name="nama_buku" placeholder="Masukkan Nama Buku">
                  
                  <label>Nama Penerbit</label>
                  <select class="form-control select2" name='penerbit_id' style="width: 100%;">
                    @foreach ($penerbit as $p)
                    <option value="{{ $p['id'] }}">{{ $p['nama_penerbit'] }}</option>
                    
                    @endforeach
                </select>

                <label>Tahun Terbit</label>
                <input type="nummber" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit">
                
                <label>Stok</label>
                <input type="nummber" class="form-control" name="stok" placeholder="Masukkan Stok">

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

<a href="/logout">Logout</a>
    <a href="/petugas"><h3>Form petugas</h3></a>
    <a href="/peminjam"><h3>Form Pinjaman Buku</h3></a>
    
        
@endsection
    
    
