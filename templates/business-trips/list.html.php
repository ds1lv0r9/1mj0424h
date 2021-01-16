<?php $title = 'Tabela Delegacji BD' ?>
<?php ob_start() ?>

    <table id="business-trips">
        <caption>Delegacje</caption>
        <thead>
        <tr>
            <th>Lp.</th>
            <th>Imię i Nazwisko</th>
            <th>Data od:</th>
            <th>Data do:</th>
            <th>Miejsce wyjazdu:</th>
            <th>Miejsce przyjazdu:</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>

        $(document).ready(function ()
        {
            $.ajax({
                type: 'GET',
                url: 'business-trip/json',
                async: true,
                contentType: 'application/json;charset=utf-8',
                dataType: 'json',
                success: function (json)
                {
                    let lp = 1;
                    $.each(json, function (idx, entry) {
                        console.log(JSON.stringify(entry));
                        $("table#business-trips tbody").append(
                            '<tr>' +
                            '<td>' + lp++ + '</td>' +
                            '<td>' + entry.first_name + ' ' + entry.last_name + '</td>' +
                            '<td>' + entry.date_from + '</td>' +
                            '<td>' + entry.date_to + '</td>' +
                            '<td>' + entry.departure + '</td>' +
                            '<td>' + entry.destination + '</td>' +
                            '</tr>'
                        );

                    });
                },
                error: function (e) {
                    console.log(e.message);
                }
            });

        });
    </script>

<?php $rightContent = ob_get_clean() ?>
<?php include 'templates/layout.html.php' ?>