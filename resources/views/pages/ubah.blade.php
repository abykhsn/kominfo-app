<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Ubah Data Menara</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('table') }}">Ke Daftar Menara</a>
        </div>
    </nav>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-primary text-white text-center">
                UBAH DATA MENARA
            </div>
            <div class="card-body">

                @foreach($menara as $mnr)

                <form action="/update" method="post" enctype="multipart/form-data">l̥
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $mnr->id }}">
                        <input type="hidden" name="gambarLama" value="{{$mnr->gambar}}">
                    </div>
                    <div class="form-group">
                        <label for="id_kom">ID Site Kominfo :</label>
                        <input type="text" name="id_kom" id="id_kom" class="form-control" required value="{{ $mnr->id_kom}}">
                    </div>
                    <div class="form-group">
                        <label for="id_name">ID Site Name :</label>
                        <input type="text" name="id_name" id="id_name" class="form-control" required value="{{ $mnr->id_name}}">
                    </div>
                    <div class="form-group">
                        <label for="new_provider">Provider/Operator :</label>
                        <input type="text" name="new_provider" id="new_provider" class="form-control" required value="{{ $mnr->new_provider}}">
                    </div>
                    <div class="form-group">
                        <label for="ex_provider">Provider :</label>
                        <input type="text" name="ex_provider" id="ex_provider" class="form-control" required value="{{ $mnr->ex_provider}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ $mnr->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa :</label>
                        <input type="text" name="desa" id="desa" class="form-control" required value="{{ $mnr->desa}}">
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan :</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" required value="{{ $mnr->kecamatan}}">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude :</label>
                        <input type="text" name="latitude" id="latitude" class="form-control value = " {{ $mnr->latitude}}"">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude :</label>
                        <input type="decimal" name="longitude" id="longitude" class="form-control" required value="{{ $mnr->longitude}}">
                    </div>
                    <div class="form-group">
                        <label for="tinggi_menara">Tinggi Menara :</label>
                        <input type="decimal" name="tinggi_menara" id="tinggi_menara" class="form-control" required value="{{ $mnr->tinggi_menara}}">
                    </div>
                    <div class="form-group">
                        <label for="kunci">Key :</label>
                        <select name="kunci" id="tipe" class="form-select" value="{{ $mnr->kunci}}" aria-label="Default select example">
                            <option selected>{{ $mnr->kunci}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stat">Status :</label>
                        <select name="stat" id="stat" class="form-select" value="{{ $mnr->stat}}" aria-label="Default select example">
                            <option selected>{{ $mnr->stat}}</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Potensi">Potensi</option>
                            <option value="Bongkar">Bongkar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pembayaran">Pembayaran :</label>
                        <select name="pembayaran" id="pembayaran" class="form-select" value="{{ $mnr->pembayaran}}" aria-label="Default select example">
                            <option selected>{{ $mnr->pembayaran}}</option>
                            <option value="-">-</option>
                            <option value="Lunas">Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar :</label><br>
                        <img src="img/{{$mnr->gambar}}" width="40"><br>
                        <input type="file" name="gambar" id="gambar">
                    </div><br>
                <button type="submit" class="btn btn-success" name="submit">Update Data</button>

                </form>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>