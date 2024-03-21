<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation d'événement</title>
</head>
<body>
    <h1>Notification d'annulation d'événement</h1>
    <p>Cher(e) {{ $userName }},</p>
    <p>Nous regrettons de vous informer que l'événement suivant a été annulé :</p>
    <p><strong>Nom de l'événement :</strong> {{ $eventName }}</p>
    <p><strong>Date :</strong> {{ $eventDate }}</p>
    <p>Nous nous excusons pour tout inconvénient que cela pourrait causer. Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>{{ $senderName }}</p>
</body>
</html>
