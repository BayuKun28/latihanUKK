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
                    <form action="/edit_product" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" class="form-control" id="id" name="id"
                                    placeholder="Masukan Kode Produk" value="{{ $data['detail']->id }}" hidden>
                                <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                    placeholder="Masukan Kode Produk" value="{{ $data['detail']->kode_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Masukan Nama Produk" value="{{ $data['detail']->nama_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($data['kategori'] as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $data['detail']->id_kategori == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select class="form-control" name="satuan" id="satuan">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($data['satuan'] as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $data['detail']->id_satuan == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            placeholder="Masukan Harga" value="{{ $data['detail']->harga_jual }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="stok">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok"
                                            placeholder="Masukan Stok" value="{{ $data['detail']->stok }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <a href="/product" class="btn btn-danger">Batal</a>
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
