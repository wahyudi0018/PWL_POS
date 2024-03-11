<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data User</title>
</head>
<body>
    <h1>Form Data User</h1>
    <a href="{{ url('/user') }}">Kembali</a>
    <br><br>

    <form method="post" action="{{ url('/user/ubah_simpan/' . $data->user_id) }}">
    {{csrf_field()}}
    {{method_field('PUT')}}

    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan Username" value="{{$data->username}}">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" placeholder="Masukkan Nama" value="{{$data->nama}}">
    <br>
    <label>Password</label>
    <input type="passwordt" name="password" placeholder="Masukkan Password" value="{{$data->password}}">
    <br>
    <label>Username</label>
    <input type="number" name="level_id" placeholder="Masukkan ID Level" value="{{$data->level_id}}">
    <br><br>
    <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>
</html>
