<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation d'événement</title>
</head>
<body>
    <h1>Notification d'annulation d'événement</h1>
    <p>Cher(e) {{ $user->name }},</p>
    <p>Nous regrettons de vous informer que l'événement suivant a été annulé :</p>
    <p><strong>Nom de l'événement :</strong> {{ $event->job_position }}</p>
    <p><strong>Date :</strong> {{ $event->event_date }}</p>
    <p>Nous nous excusons pour tout inconvénient que cela pourrait causer. Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>Big Place</p>
</body>
</html>
