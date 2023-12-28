<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
</head>

<body>
    <h1>{{ $data['title'] }}</h1>

    <p>Votre proposition de RDV a bien été envoyée au candidat :</p>
    
    @foreach ($data['participants'] as $participant)
    <p>
        {{ $participant['name'] }}
    </p>
    @endforeach

    <p>Le rendez-vous doit être validé dans les 24H, passé ce délai vous pourrez proposer ce créneau à d'autres candidats</p>

    <p>Cordialement</p>
</body>

</html>

