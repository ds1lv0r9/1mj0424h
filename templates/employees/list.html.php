<?php $title = 'Tabela Pracowników' ?>
<?php ob_start() ?>

    <table id="employees">
        <caption>Pracownicy</caption>
        <thead>
        <tr>
            <th>Lp.</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Stanowisko</th>
            <th>Data zatrudnienia</th>
            <th>Ilość dni urlopowych</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Emil</td>
            <td>Piekarski</td>
            <td>Zoolog</td>
            <td>2003-11-01</td>
            <td>9</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Kondrat</td>
            <td>Malak</td>
            <td>Mikrobiolog</td>
            <td>2006-02-03</td>
            <td>25</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Mariusz</td>
            <td>Kubica</td>
            <td>Bibliotekarz</td>
            <td>2013-02-15</td>
            <td>25</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Gerwazy</td>
            <td>Skalka</td>
            <td>Dziennikarz</td>
            <td>2018-12-25</td>
            <td>10</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Narcyz</td>
            <td>Blazek</td>
            <td>Elektryk</td>
            <td>2020-08-14</td>
            <td>6</td>
        </tr>

        </tbody>
    </table>

    <div>
        <label for="color1">Kolor 1:</label>
        <input type="color" id="color1" name="color1" value="#a8a8f8">

        <label for="color1">Kolor 2:</label>
        <input type="color" id="color2" name="color2" value="#31f1f1">
    </div>

    <script>
        $(document).ready(function ()
        {
            $("#color2").change(function ()
            {
                $('table#employees tbody tr:nth-child(2n)').css(
                    {
                        'background-color': $(this).val(),
                    });

            });

            $("#color1").change(function () {
                $('table#employees tbody tr:nth-child(2n+1)').css(
                    {
                        'background-color': $(this).val(),
                    });
            });
        });
    </script>

<?php $rightContent = ob_get_clean() ?>
<?php include 'templates/layout.html.php' ?>