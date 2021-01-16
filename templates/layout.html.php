<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
            integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div id="container">
        <div id="left">
            <ul>
                <li><a href="/index.php/html-demo">Różne kontrolki HTML</a></li>
                <li><a href="/index.php/employees">Tabela Pracowników</a></li>
                <li><a href="/index.php/vat">Tabela Faktur VAT</a></li>
                <li><a href="/index.php/business-trip">Tabela Delegacji BD</a></li>
                <li><a href="/index.php/clients">Dane Kontrahentów</a></li>
            </ul>
        </div>

        <div id="right">
            <?= $rightContent ?>
        </div>
    </div>
</body>
</html>