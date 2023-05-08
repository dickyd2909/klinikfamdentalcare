@extends('admin.layout.main')

@section('content')
@if ((count($pasien) != 0))
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/pasien"
        class="a-breadcrumbs">Data Pasien</a> / </span> Pasien Bayar</h4>
    <div class="mb-3">
        <i class="text-middle" data-feather="file-plus"></i>
        <h1 class="h3 d-inline align-middle">Form Pembayaran</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/admin-area/pasien/edit/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h5 class="card-title mb-0">Bayar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" readonly class="form-control" placeholder="Nama Pasien" value="{{ old('nama_pasien', $pasien[0] -> nama_pasien) }}" required>
                                    @error('nama_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">No Telepon</label>
                                    <input type="text" name="no_hp_pasien" readonly class="form-control" placeholder="No Telepon" value="{{ old('no_hp_pasien', $pasien[0] -> no_hp_pasien) }}" required>
                                    @error('no_hp_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Janji</label>
                                    <input type="text" name="tanggal_janji" readonly class="form-control" placeholder="Nama Pasien" value="{{ old('tanggal_janji', $pasien[0] -> tanggal_janji) }}" required>
                                    @error('tanggal_janji')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email_pasien" readonly class="form-control" placeholder="email" value="{{ old('email_pasien', $pasien[0] -> email_pasien) }}" required>
                                    @error('email_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat_pasien" readonly class="form-control" placeholder="alamat" value="{{ old('alamat_pasien', $pasien[0] -> alamat_pasien) }}" required>
                                    @error('alamat_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Keluhan</label>
                                    <input type="text" name="keluhan_pasien" readonly class="form-control" placeholder="keluhan" value="{{ old('keluhan_pasien', $pasien[0] -> keluhan_pasien) }}" required>
                                    @error('keluhan_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tindakan</label>
                                    <input type="text" name="tindakan_pasien" class="form-control" placeholder="Tindakan" value="{{ old('tindakan_pasien', $pasien[0] -> tindakan_pasien) }}" required>
                                    @error('tindakan_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Pembayaran</label>
                                    <input type="number" name="total_harga_pasien" class="form-control" placeholder="Jumlah pembayaran" value="{{ old('total_harga_pasien', $pasien[0] -> total_harga_pasien) }}" required>
                                    @error('total_harga_pasien')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <div class="text-start">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="align-middle">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="text-end">
                                    <a class="btn btn-warning" href="/admin-area/pasien">
                                        <span class="align-middle">Kembali</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection