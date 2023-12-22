<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
</head>

<body>
    <h1>{{ $data['title'] }}</h1>

    <p>{{ $data['body'] }}</p>
    
    @foreach ($data['creneau'] as $key => $creneau)
    <p>
        <a href="{{ route('candidat.creneau.choose', ['time' => $data['rdvs'][$key]]) }}">
            {{ $creneau['time'] }}
        </a>
    </p>
    @endforeach

    <p>Rendez-vous : {{ $data['type'] }}</p>
    <p>Adresse : {{ $data['address'] }}</p>

    <p>Cordialement</p>
</body>

</html>