<?php $title = 'Dane Kontrahentów' ?>
<?php ob_start() ?>

    <table id="new-client">
        <caption>Dodaj nowego klienta</caption>
        <thead>
        <tr>
            <th>Akcje</th>
            <th>NIP</th>
            <th>REGON</th>
            <th>NAZWA</th>
            <th>CZY PŁATNIK VAT?</th>
            <th>ULICA</th>
            <th>NUMER DOMU</th>
            <th>NUMER MIESZKANIA</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><button class="save_new" id="new_client_save" name="new_client_save">zapisz</button></td>
            <td><input type="text" id="new_client_nip" name="new_client_nip" value=""></td>
            <td><input type="text" id="new_client_regon" name="new_client_regon" value=""></td>
            <td><input type="text" id="new_client_name" name="new_client_name" value=""></td>
            <td><input type="checkbox" id="new_client_is_vat" name="new_client_is_vat"></td>
            <td><input type="text" id="new_client_address_street_name" name="new_client_address_street_name" value=""></td>
            <td><input type="text" id="new_client_address_street_number" name="new_client_address_street_number" value=""></td>
            <td><input type="text" id="new_client_address_apartment_number" name="new_client_address_apartment_number" value=""></td>
        </tr>
        </tbody>
    </table>

    <table id="clients">
        <caption>Dane Kontrahentów</caption>
        <thead>
        <tr>
            <th>Akcje</th>
            <th>NIP</th>
            <th>REGON</th>
            <th>NAZWA</th>
            <th>CZY PŁATNIK VAT?</th>
            <th>ULICA</th>
            <th>NUMER DOMU</th>
            <th>NUMER MIESZKANIA</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <script>

        $(document).ready(function ()
        {
            $.ajax(
                {
                    type: 'GET',
                    url: 'clients/api',
                    async: true,
                    contentType: 'application/json;charset=utf-8',
                    dataType: 'json',
                    success: function (json)
                    {
                        let lp = 1;
                        $.each(json.clients, function (idx, entry)
                        {
                            $("table#clients tbody").append(
                                '<tr id=' + entry.id + '>' +
                                '<td><button class="save" id="client_save_' + entry.id + '" name="client_save_' + entry.id + '">zapisz</button>' +
                                '<button class="delete"  id="client_delete_' + entry.id + '" name="client_delete_' + entry.id + '">usuń</button></td>' +
                                '<td><input type="text" id="client_nip_' + entry.id + '" name="client_nip_' + entry.id + '" value="' + entry.nip + '"></td>' +
                                '<td><input type="text" id="client_regon_' + entry.id + '" name="client_regon_' + entry.id + '" value="' + entry.regon + '"></td>' +
                                '<td><input type="text" id="client_name_' + entry.id + '" name="client_name_' + entry.id + '" value="' + entry.name + '"></td>' +
                                '<td><input type="checkbox" id="client_is_vat_' + entry.id + '" name="client_is_vat_' + entry.id + '" ' + ((parseInt(entry.is_vat) === 1) ? 'checked' : '') + '></td>' +
                                '<td><input type="text" id="client_address_street_name_' + entry.id + '" name="client_address_street_name_' + entry.id + '" value="' + entry.address_street_name + '"></td>' +
                                '<td><input type="text" id="client_address_street_number_' + entry.id + '" name="client_address_street_number_' + entry.id + '" value="' + entry.address_street_number + '"></td>' +
                                '<td><input type="text" id="client_address_apartment_number_' + entry.id + '" name="client_address_apartment_number_' + entry.id + '" value="' + entry.address_apartment_number + '"></td>' +
                                '</tr>'
                            );
                        });
                    },
                    error: function (e)
                    {
                        console.log(e);
                    }
                });


            $('table#new-client td > button').click(function ()
            {
                let client =
                    {
                        'client':
                            {
                                'nip': $('input#new_client_nip').val(),
                                'regon': $('input#new_client_regon').val(),
                                'name': $('input#new_client_name').val(),
                                'is_vat': $('input#new_client_is_vat').prop('checked'),
                                'address_street_name': $('input#new_client_address_street_name').val(),
                                'address_street_number': $('input#new_client_address_street_number').val(),
                                'address_apartment_number': $('input#new_client_address_apartment_number').val()
                            }
                    };

                $.ajax({
                    type: 'POST',
                    url: 'clients/api',
                    async: true,
                    contentType: "application/json;charset=utf-8",
                    dataType: 'json',
                    data: JSON.stringify(client),


                    success: function (data, textStatus, xhr)
                    {
                        if (xhr.status === 201)
                        {
                            let entry = xhr.responseJSON.client;

                            $("table#clients tbody").append(
                                '<tr id=' + entry.id + '>' +
                                '<td><button class="save" id="client_save_' + entry.id + '" name="client_save_' + entry.id + '">zapisz</button>' +
                                '<button class="delete"  id="client_delete_' + entry.id + '" name="client_delete_' + entry.id + '">usuń</button></td>' +
                                '<td><input type="text" id="client_nip_' + entry.id + '" name="client_nip_' + entry.id + '" value="' + entry.nip + '"></td>' +
                                '<td><input type="text" id="client_regon_' + entry.id + '" name="client_regon_' + entry.id + '" value="' + entry.regon + '"></td>' +
                                '<td><input type="text" id="client_name_' + entry.id + '" name="client_name_' + entry.id + '" value="' + entry.name + '"></td>' +
                                '<td><input type="checkbox" id="client_is_vat_' + entry.id + '" name="client_is_vat_' + entry.id + '" ' + ((parseInt(entry.is_vat) === 1) ? 'checked' : '') + '></td>' +
                                '<td><input type="text" id="client_address_street_name_' + entry.id + '" name="client_address_street_name_' + entry.id + '" value="' + entry.address_street_name + '"></td>' +
                                '<td><input type="text" id="client_address_street_number_' + entry.id + '" name="client_address_street_number_' + entry.id + '" value="' + entry.address_street_number + '"></td>' +
                                '<td><input type="text" id="client_address_apartment_number_' + entry.id + '" name="client_address_apartment_number_' + entry.id + '" value="' + entry.address_apartment_number + '"></td>' +
                                '</tr>'
                            );
                        }

                    },
                    error: function (xhr)
                    {
                        console.log('Something went wrong.');
                        console.log('error', xhr);
                    }
                });
            });

            $('body').on( 'click', '.save', function ()
            {
                let row = $(this).attr('id').match(/(?:_\D+)(\d+)/);

                let client =
                    {
                        'client':
                            {
                                'id': row[1],
                                'nip': $('input#client_nip_' + row[1]).val(),
                                'regon': $('input#client_regon_' + row[1]).val(),
                                'name': $('input#client_name_' + row[1]).val(),
                                'is_vat': $('input#client_is_vat_' + row[1]).prop('checked'),
                                'address_street_name': $('input#client_address_street_name_' + row[1]).val(),
                                'address_street_number': $('input#client_address_street_number_' + row[1]).val(),
                                'address_apartment_number': $('input#client_address_apartment_number_' + row[1]).val(),
                            }
                    };


                $.ajax({
                    type: 'PUT',
                    url: 'clients/api/' + row[1],
                    async: true,
                    contentType: "application/json;charset=utf-8",
                    dataType: "json",
                    data: JSON.stringify(client),

                    success: function (data, textStatus, xhr)
                    {
                        if (xhr.status === 200)
                        {
                            alert('Entry saved.');
                        }
                    },
                    error: function (xhr)
                    {
                        if (xhr.status === 400)
                        {
                            alert('No change or bad request.');
                        }
                        else
                            alert('Error while trying to save the entry!')
                    },
                });
            }
            );

            $('body').on( 'click', '.delete', function ()
            {
                let row = $(this).attr('id').match(/(?:_\D+)(\d+)/);

                $.ajax({
                    type: 'DELETE',
                    url: 'clients/api/' + row[1],
                    async: true,
                    contentType: 'application/json;charset=utf-8',
                    dataType: 'json',

                    success: function (data, textStatus, xhr)
                    {
                        console.log('success', xhr.status);

                        if (xhr.status === 204)
                        {
                            $('table tr#' + row[1]).fadeOut(300, function ()
                            {
                                $(this).remove();
                            });
                        }

                    },
                    error: function (xhr)
                    {
                        console.log('error', xhr);
                        alert('Error while trying to delete the entry!');
                    },
                    complete: function (xhr, textStatus)
                    {
                        console.log('complete', xhr.status);
                    }
                });
            });
        });
    </script>

<?php $rightContent = ob_get_clean() ?>
<?php include 'templates/layout.html.php' ?>