<!DOCTYPE html>
<html>

<head>
    <title>Création d'un nouveau ticket</title>
</head>

<body>
    <h3>Un nouveau ticket a été créé:</h3>

    <p>Sujet: {{ $ticket->title }}</p>
    <p>Description: {{ $ticket->description }}</p>
    <p>Statut: {{ $ticket->status }}</p>

    <hr>

    <h5>Crée par:</h5>
    <p>Nom: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <p>Cordialement</p>
</body>

</html>