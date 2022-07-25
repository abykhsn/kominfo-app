
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('table.create') }}" class="btn btn-primary">Tambah Data</a>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">TABEL DAFTAR MENARA</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">ID Site Kominfo</th>
                                    <th class="text-center">ID Site Name</th>
                                    <th class="text-center">Provider/Operator</th>
                                    <th class="text-center">Ex Provider</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Desa</th>
                                    <th class="text-center">Kecamatan</th>
                                    <th class="text-center">Latitude</th>
                                    <th class="text-center">Longitude</th>
                                    <th class="text-center">Tinggi Menara</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Pembayaran</th>
                                </thead>
                                <tbody>
                                
                                <?php $i = 1 ?>
                                @foreach($menara as $p)
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center">{{ $p->id_kom }}</td>
                                        <td class="text-center">{{ $p->id_name }}</td>
                                        <td class="text-center">{{ $p->new_provider }}</td>
                                        <td class="text-center">{{ $p->ex_provider }}</td>
                                        <td class="text-center">{{ $p->alamat }}</td>
                                        <td class="text-center">{{ $p->desa }}</td>
                                        <td class="text-center">{{ $p->kecamatan }}</td>
                                        <td class="text-center">{{ $p->latitude }}</td>
                                        <td class="text-center">{{ $p->longitude }}</td>
                                        <td class="text-center">{{ $p->tinggi_menara }}</td>
                                        <td class="text-center">{{ $p->nominal }}</td>
                                        <td class="text-center">{{ $p->stat }}</td>
                                        <td class="text-center">{{ $p->pembayaran }}</td>
                                        <td class="text-center">
                                            <a href="/ubah/{{ $p->id }}" class="btn btn-warning">Ubah</a> 
                                            <a href="" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
                                            <a href="{{ route('table.detail', $p->id) }}" class="btn btn-warning">Detail</a> 
                                            <a href="" class="btn btn-warning">SKRD</a> 

                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection