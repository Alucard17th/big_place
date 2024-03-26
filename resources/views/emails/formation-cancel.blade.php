<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation de formation</title>
</head>
<body>
    <h1>Notification d'annulation de formation</h1>
    <p>Cher(e) {{ $user->name }},</p>
    <p>Nous regrettons de vous informer que la formation suivante a été annulée :</p>
    <p><strong>Titre de la formation :</strong> {{ $formation->job_title }}</p>
    <p><strong>Date :</strong> {{ $formation->start_date }}</p>
    <p>Nous nous excusons pour tout inconvénient que cela pourrait causer. Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>Big Place</p>
</body>
</html>
