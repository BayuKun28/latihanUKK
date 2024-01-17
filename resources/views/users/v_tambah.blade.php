@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary center">
                    <div class="card-header">
                        <h3 class="card-title">{{ $data['submenu'] }}</h3>
                    </div>
                    <form action="/tambah_user" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Pengguna</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukan Nama Pengguna">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan Password">
                            </div>
                            <div class="form-group">
                                <label for="level">Level Pengguna</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <a href="/users" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    @if ($errors->any())
        <script>
            Toast.fire({
                icon: 'error',
                title: '{{ $errors->first() }}'
            })
        </script>
    @endif
@endpush
