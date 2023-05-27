<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Register</h1>
                <hr>
                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nik">NIK</label>
                        <input
                            type="text"
                            class="form-control @error('nik') is-invalid @enderror"
                            id="nik"
                            name="nik"
                            value="{{ old('nik') }}"
                            >
                        @error('nik')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            value="{{ old('nama') }}"
                            >
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email') }}"
                        >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="d-flex mb-3">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender"
                                id="laki_laki" value="L" @checked(old('gender') == 'L')>
                                <label class="form-check-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender"
                                id="perempuan" value="P" @checked(old('gender') == 'P')>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                        <label class="form-label" for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-select">
                            <option selected>Pilih Jurusan</option>
                            <option value="Programming" @selected(old('jurusan') == 'Programming')>Programming</option>
                            {{--  old('jurusan') == 'design' ? 'selected' : ''  --}}
                            <option value="Design" @selected(old('jurusan') == 'Design')>Design</option>
                            @error('jurusan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
