<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consume Rest API Students | create</title>
</head>
<body>

<h2>TAMBAH DATA SISWA</h2>
@if (Session::get('errors'))
<p style="color: red;">{{Session::get('errors')}}</p>
@endif
    <form action="{{route('send')}}" method="post">
        @csrf
        <div style="display:flex;">
        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" placeholder="ketik nama anda">
        </div>
        <div style="display:flex;">
        <label for="nis">nis</label>
        <input type="text" name="nis" id="nis" placeholder="ketik nis anda">
        </div>
        <div style="display: flex; margin-bottom:15px">
        <label for="rombel">Rombel</label>
        <select name="rombel" id="rombel">
            <option value="PPLG X">PPLG X</option>
            <option value="PPLG XI">PPLG XI</option>
            <option value="PPLG XII">PPLG XII</option>
        </select>
        </div>
        <div style="display:flex;">
        <label for="rayon">rayon</label>
        <input type="text" name="rayon" id="rayon" placeholder="ketik rayon anda">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>