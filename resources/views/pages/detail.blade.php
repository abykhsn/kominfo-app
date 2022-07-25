<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($data as $item)
            @foreach (json_decode($item->gambar) as $gambar) 
            <img src="{{ asset('/menara/' . $gambar) }}" alt="" width="100px">
            @endforeach
    @endforeach
</body>
</html>