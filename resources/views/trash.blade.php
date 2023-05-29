<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DATA SAMPAH</h1>
    @if (Session::get('errors'))
    <p style="color:red;">{{Session::get('errors')}}</p>
    @endif
    @if (Session::get('success'))
    <p style="color: green;">{{Session::get('success')}}</p>
    @endif
    @foreach($trashdata as $ts)
    <ul>
    <li>{{ $ts['nis']}}</li>
    <li>{{ $ts['nama']}}</li>
    <li>{{ $ts['rombel']}}</li>
    <li>{{ $ts['rayon']}}</li>
    <li>deleted at: {{\Carbon\Carbon::parse($ts['deleted_at'])->format('j, F, Y')}}</li>
    <li>
        <a href="{{route('restore', $ts['id'])}}">Restore Data</a> ||
        <a href="{{route('permanent', $ts['id'])}}">Delete Permanent</a>
    </li>
    </ul>
    @endforeach 
</body>
</html>