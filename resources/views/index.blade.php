<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consume Rest API Students</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <form action="" method="get">
        @csrf
        <input type="text" name="search" placeholder="search by name...">
        <button type="submit">search</button>
    </form>
    <br>
    @if (Session::get('errors'))
    <p>{{Session::get('errors')}}</p>
    @endif
    @if (Session::get('success'))
    <p style="color: green;">{{Session::get('success')}}</p>
    @endif
    <a href="{{route('add')}}">tambah data baru</a>
    <a href="{{route('trash')}}">Recently Delete</a>

    <table border="1">
        <tr>
        <th>Nis</th>
        <th>Nama</th>
        <th>Rombel</th>
        <th>Rayon</th>
        <th>Action</th>
        </tr>
        @foreach ($students as $dt)
        <tr>
            <td>{{ $dt['nis']}}</td>
            <td>{{ $dt['nama']}}</td>
            <td>{{ $dt['rombel']}}</td>
            <td>{{ $dt['rayon']}}</td>
            <td><a href="{{route('edit' , $dt['id'])}}" >Edit</a>
                <form action="{{route('delete' , $dt['id'])}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form></td>
        </tr>
        @endforeach
    </table>
</body>
</html>