<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .bg-image {
            position: absolute;
            top: -35;
            left: -35;
            width: 800px !important;
            object-fit: cover;
            z-index: -1;
        }

        .header-list{
            list-style-type: none;
            position: absolute;
            top: -15;
            left:-15;
            color: white;
        }
        .header-title{
            position: absolute;
            top: -50;
            right:18;
            color:#fff;
            font-weight: bold;
            font-size: 50px;
        }

        .body-list-left{
            list-style-type: none;
            position: absolute;
            top: 130;
            left:-15;
        }

        .body-list-right{
            list-style-type: none;
            position: absolute;
            top: 130;
            right:120;
        }
        .body-list-right-2{
            list-style-type: none;
            position: absolute;
            top: 130;
            right:-10;
        }

        .list-title{
            color: #5983b0;
        }

        .body-list-left li, .body-list-right li, .body-list-right-2 li{
            margin-bottom: 5px;  
        }

        .table-item{
            position: absolute;
            top: 300;
            left:-15;
            font-size: 20px;
            width: 740px;
        }
        .table-item thead{
            background-color: #5983b0;
            padding: 10px !important;
            text-transform: uppercase;
        }
        .table-item tbody tr td{
            padding: 7px !important;
            text-align: center;
        }

        .footer-list{
            list-style-type: none;
            position: absolute;
            bottom: -25;
            right:-15;
            color: white;
            text-align: right;
        }
        .footer-list li{
            margin-bottom: 14px;
        }
        .footer-list-title{
            font-weight: bold;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
    <img class="bg-image" 
    src="{{ storage_path().'/app/pdf/'.str_replace('/storage', '/public', 'facture_big_place.jpg') }}">
        
    <ul class="header-list">
        <li>BIG PLACE</li>
        <li>8 Bis rue Abel</li>
        <li>75012 Paris</li>
        <li>contact@bigplace.fr</li>
        <li>Siren : 952 999 589</li>
        <li>Numéro de TVA : FR21952999589</li>
    </ul>

    <h4 class="header-title">FACTURE</h4>

    <ul class="body-list-left">
        <li class="list-title">FACTURÉ À</li>
        <li>NOM DE L'ENTREPRISE</li>
        <li>[Adresse de l'entreprise]</li>
        <li>[Email]</li>
        <li>[Contact]</li>
        <li>[Siret] </li>
    </ul>

    <ul class="body-list-right">
        <li class="list-title">FACTURE N°</li>
        <li class="list-title">DATE</li>
        <li class="list-title">COMMANDE N°</li>
        <li class="list-title">ÉCHÉANCE</li>
    </ul>

    <ul class="body-list-right-2">
        <li>20240201</li>
        <li>06/01/2024</li>
        <li>[Numéro de contrat]</li>
        <li>06/01/2024</li>
    </ul>

    <table class="table-item">
        <thead>
            <tr>
                <th>Qté</th>
                <th>Désignation</th>
                <th>Prix UNIT.</th>
                <th>Montant</th>
            <tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Vitrine entreprise</td>
                <td>359,00</td>
                <td>359,00</td>
            <tr>
            <tr>
                <td>1</td>
                <td>Pack Starter</td>
                <td>404,00</td>
                <td>404,00</td>
            <tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total HT</td>
                <td>763,00</td>
            <tr>
            <tr>
                <td></td>
                <td></td>
                <td>TVA 20.0%</td>
                <td>152,60</td>
            <tr>
            <tr>
                <td></td>
                <td></td>
                <td class="list-title">TOTAL TTC</td>
                <td>915,60 €</td>
            <tr>
        </tbody>
    </table>

    <ul class="footer-list">
        <li class="footer-list-title">Moyens et conditions de paiement :</li>
        <li>Paiement : à réception de la facture</li>
        <li>Coordonnées bancaires :</li>
        <li>IBAN : FR76 1741 8000 0100 0116 0961 221</li>
        <li>CODE BIC : SNNNFR22XXX</li>
    </ul>

    
    
</body>
</html>