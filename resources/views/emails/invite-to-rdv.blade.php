<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <h1>{{ $data['title'] }}</h1>
    
    <p>{{ $data['body'] }}</p>
    
    @foreach ($data['creneau'] as $creneau)
        <p>{{ $creneau['time'] }}</p> 
    @endforeach


    <p>Cordialement</p>
</body>
</html>
