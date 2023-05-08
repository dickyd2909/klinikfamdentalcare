<table>
    <thead>
        <tr>
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
        @foreach ($pasien as $data
            <tr>
            <td>{{ $data -> nama_pasien }}</td>
            <td>{{ $data -> tanggal_janji }}</td>
            <td>{{ $data -> email_pasien }}</td>
            <td>{{ $data -> no_hp_pasien }}</td>
            <td>{{ $data -> alamat_pasien }}</td>
            <td>{{ $data -> keluhan_pasien }}</td>
            <td>{{ $data -> tindakan_pasien }}</td>
            <td>{{ $data -> total_harga_pasien }}</td>
            </tr>
        @endforeach
    </tbody>
</table>