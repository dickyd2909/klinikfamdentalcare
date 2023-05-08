@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Pasien</h4>
    @include('admin.layout.alert')
<div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    Data Pasien
                    <!-----<a href="/admin-area/pasien" class="btn btn-primary btn-sm pl-4">Data Baru</a>--->
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Pasien</label>
                              </div>
                              <div class="col-auto">
                                <form action="/admin-area/pasien" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input required type="text" id="cari" class="form-control" name="cari" placeholder="Masukkan keyword...">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                                @error('judul')
                                <div class="form-text">
                                    <i class="ri-error-warning-line"></i>
                                    Masukkan keyword pencarian yang valid.
                                </div>
                                @enderror
                                </form>
                              </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('Pasien.export')}}">
                    <button class="btn btn-outline-primary" type="submit">Export</button>
                </a>
            </div>
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Janji</th>
                        <th>Email Pasien</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Keluhan</th>
                        <th>Tindakan</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pasien) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($pasien as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th> 
                        <td>{{ $data -> nama_pasien }}</td>
                        <td>{{ $data -> tanggal_janji }}</td>
                        <td>{{ $data -> email_pasien }}</td>
                        <td>{{ $data -> no_hp_pasien }}</td>
                        <td>{{ $data -> alamat_pasien }}</td>
                        <td>{{ $data -> keluhan_pasien }}</td>
                        <td>{{ $data -> tindakan_pasien }}</td>
                        <td>{{ $data -> total_harga_pasien }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin-area/pasien/edit/{{ Crypt::encrypt($data -> id_pasien) }}">
                                <span class="align-middle">Bayar</span>
                            </a>
                            
                            <a class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone={{($data -> no_hp_pasien)}}&text=Terima%20Kasih%20{{($data -> nama_pasien)}}%0AAnda%20Sudah%20Terdaftar%20di%20Klinik%20Famili%20Dental%20Care%0A%0ATanggal%20%3A%20{{($data -> tanggal_janji)}}%0ANo.%20Antrian%20%3A%20%0A%0ATerimakasih%0ASalam%20Sehat%20Gigi")>
                                <span class="align-middle">Chat</span>
                            </a>
                            <!--
                            <button onclick="if (confirm('Hapus pasien {{ $data -> nama_pasien }}')) { location.replace('/admin-area/pasien/delete/{{ Crypt::encrypt($data -> id_pasien) }}') }" class="btn btn-danger btn-sm">
                                <i class="align-middle" data-feather="trash-2"></i>
                                <span class="align-middle">Hapus</span>
                            </button>
                        -->
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
        {{ $pasien->links('admin.layout.pagination') }}
    </div>
    
</div>
@endsection