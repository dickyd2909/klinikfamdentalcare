@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/dokter"
        class="a-breadcrumbs">Data Dokter</a> / </span> Dokter Baru</h4>
    <div class="mb-3">
        <i class="text-middle" data-feather="file-plus"></i>
        <h1 class="h3 d-inline align-middle">Form Dokter Baru</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/admin-area/dokter/submit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Umum</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Dokter</label>
                                    <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter" value="{{ old('nama_dokter') }}" required>
                                    @error('nama_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nomer HP</label>
                                    <input type="text" name="no_hp_dokter" class="form-control" placeholder="08*********" value="{{ old('no_hp_dokter') }}" required>
                                    @error('no_hp_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email_dokter" class="form-control" placeholder="email" value="{{ old('email_dokter') }}" required>
                                    @error('email_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Jadwal</label>
                                    <input type="text" name="jadwal_dokter" class="form-control" placeholder="Jadwal" value="{{ old('jadwal_dokter') }}" required>
                                    @error('jadwal_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Surat Tanda Regristasi</label>
                                    <input type="text" name="str_dokter" class="form-control" placeholder=" " value="{{ old('str_dokter') }}" required>
                                    @error('str_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Surat Ijin Praktek</label>
                                    <input type="text" name="sip_dokter" class="form-control" placeholder=" " value="{{ old('sip_dokter') }}" required>
                                    @error('sip_dokter')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="../img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                            height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Unggah Foto</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input name="foto" type="file" id="upload" class="account-file-input" hidden
                                                    accept="image/png, image/jpeg" />
                                            </label>
                                            <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                            <p class="text-muted mb-0">Tipe file : .jpg atau .png. Ukuran maks 800KB</p>
                                            @error('images')
                                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
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
                                    <a class="btn btn-warning" href="/admin-area/dokter">
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
@endsection