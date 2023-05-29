<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consume Rest API Students | edit</title>
</head>
<body>

<h2>EDIT DATA SISWA</h2>
@if (Session::get('errors'))
<p style="color: red;">{{Session::get('errors')}}</p>
@endif
    <form action="{{route('update' , $student['id'])}}" method="post">
        @csrf
        @method('PATCH')
        <div style="display:flex;">
        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" placeholder="ketik nama anda" value="{{ $student['nama']}}">
        </div>
        <div style="display:flex;">
        <label for="nis">nis</label>
        <input type="text" name="nis" id="nis" placeholder="ketik nis anda" value="{{ $student['nis']}}">
        </div>
        <div style="display: flex; margin-bottom:15px">
        <label for="rombel">Rombel</label>
        <select name="rombel" id="rombel">
            <option value="PPLG X {{$student['rombel'] == 'PPLG X' ? 'selected' : ''}}">PPLG X</option>
            <option value="PPLG XI {{$student['rombel'] == 'PPLG XI' ? 'selected' : ''}}">PPLG XI</option>
            <option value="PPLG XII {{$student['rombel'] == 'PPLG XII' ? 'selected' : ''}}">PPLG XII</option>
        </select>
        </div>
        <div style="display:flex;">
        <label for="rayon">rayon</label>
        <input type="text" name="rayon" id="rayon" placeholder="ketik rayon anda" value="{{ $student['rayon']}}">
        </div>
        <button type="submit">Kirim</button>
        <br>
        <a href="/" style="color:crimson;">Back</a>
    </form>
</body>
</html>