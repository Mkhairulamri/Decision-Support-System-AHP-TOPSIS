@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Panitia PPDB</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Data Panitia</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Panitia</h3>
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambah_kategori">
                            <i class="fas fa-plus"></i>Tambah Panitia
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- alert --}}
                        @if ($message = Session::get('exist'))
                            <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                            </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                            </div>
                        @endif
                        @if ($message = Session::get('failed'))
                            <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                            </div>
                        @endif

                        {{-- Tabel data panitia --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$user->id}}">Edit</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{$user->id}}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/Footer')

{{-- modal Tambah Kategori --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="tambah_kategori">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah User Panitia PPDB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('SaveUser')}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Panitia</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required="" name="username">
                      <div class="invalid-feedback">
                        Maaf Form Tidak Boleh Kosong
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required="" name="email">
                      <div class="invalid-feedback">
                        Maaf Form Tidak Boleh Kosong
                      </div>
                    </div>
                  </div>
              </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($users as $user)

{{-- Modal Edit --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$user->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Data Panitia PPDB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="{{route('UpdateUser',$user->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Panitia</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="nama" value="{{$user->name}}">
                    <div class="invalid-feedback">
                      Maaf Form Tidak Boleh Kosong
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required="" name="username" value="{{$user->username}}">
                      <div class="invalid-feedback">
                        Maaf Form Tidak Boleh Kosong
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required="" name="email" value="{{$user->email}}">
                      <div class="invalid-feedback">
                        Maaf Form Tidak Boleh Kosong
                      </div>
                    </div>
                  </div>
              </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Hapus --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$user->id}}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hapus Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan Menghapus User <strong>{{ucfirst($user->username)}}</strong>?</p>
            </div>
            <div class="modal-footer">
              <a href="{{route('DeleteUser',$user->id)}}">
                <button class="btn btn-primary">Hapus</button>
              </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
  </div>
@endforeach
