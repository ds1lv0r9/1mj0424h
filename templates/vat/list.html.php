<?php $title = 'Tabela Faktur VAT' ?>
<?php ob_start() ?>

    <table id="employees">
        <caption>Faktury VAT</caption>
        <thead>
        <tr>
            <th>Lp.</th>
            <th>Opis</th>
            <th>MPK</th>
            <th>Kwota Netto</th>
            <th>Ilość</th>
            <th>VAT</th>
            <th>Kwota Brutto</th>
            <th>Wartość Netto</th>
            <th>Wartość Brutto</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Opis 1</td>
            <td>Leszno</td>
            <td><input type="number" id="netValue1" name="netValue1" min="0" step="any" placeholder="" value="0.00">
            </td>
            <td><input type="number" id="amount1" name="amount1" min="0" step="1" placeholder="0" value="0"></td>
            <td>
                <select name="vat1" id="vat1">
                    <option value="zw">ZW</option>
                    <option value="np">NP.</option>
                    <option value="0">0%</option>
                    <option value="3">3%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
            </td>
            <td id="grossValue1">0.00</td>
            <td id="totalNetValue1">0.00</td>
            <td id="totalGrossValue1">0.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Opis 2</td>
            <td>Poznań</td>
            <td><input type="number" id="netValue2" name="netValue2" min="0" step="any" placeholder="" value="0.00">
            </td>
            <td><input type="number" id="amount2" name="amount2" min="0" step="1" placeholder="0" value="0"></td>
            <td>
                <select name="vat2" id="vat2">
                    <option value="zw">ZW</option>
                    <option value="np">NP.</option>
                    <option value="0">0%</option>
                    <option value="3">3%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
            </td>
            <td id="grossValue2">0.00</td>
            <td id="totalNetValue2">0.00</td>
            <td id="totalGrossValue2">0.00</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Opis 3</td>
            <td>Wrocław</td>
            <td><input type="number" id="netValue3" name="netValue3" min="0" step="any" placeholder="" value="0.00">
            </td>
            <td><input type="number" id="amount3" name="amount3" min="0" step="1" placeholder="0" value="0"></td>
            <td>
                <select name="vat3" id="vat3">
                    <option value="zw">ZW</option>
                    <option value="np">NP.</option>
                    <option value="0">0%</option>
                    <option value="3">3%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
            </td>
            <td id="grossValue3">0.00</td>
            <td id="totalNetValue3">0.00</td>
            <td id="totalGrossValue3">0.00</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Opis 4</td>
            <td>Warszawa</td>
            <td><input type="number" id="netValue4" name="netValue4" min="0" step="any" placeholder="" value="0.00">
            </td>
            <td><input type="number" id="amount4" name="amount4" min="0" step="1" placeholder="0" value="0"></td>
            <td>
                <select name="vat4" id="vat4">
                    <option value="zw">ZW</option>
                    <option value="np">NP.</option>
                    <option value="0">0%</option>
                    <option value="3">3%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
            </td>
            <td id="grossValue4">0.00</td>
            <td id="totalNetValue4">0.00</td>
            <td id="totalGrossValue4">0.00</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Opis 5</td>
            <td>Zielona Góra</td>
            <td><input type="number" id="netValue5" name="netValue5" min="0" step="any" placeholder="" value="0.00">
            </td>
            <td><input type="number" id="amount5" name="amount5" min="0" step="1" placeholder="0" value="0"></td>
            <td>
                <select name="vat5" id="vat5">
                    <option value="zw">ZW</option>
                    <option value="np">NP.</option>
                    <option value="0">0%</option>
                    <option value="3">3%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
            </td>
            <td id="grossValue5">0.00</td>
            <td id="totalNetValue5">0.00</td>
            <td id="totalGrossValue5">0.00</td>
        </tr>

        </tbody>
    </table>

    <div>
        <button id="show1000net">Powyżej 1000,00 zł Netto</button>
    </div>

    <script>

        $(document).ready(function ()
        {
            function grossValue(netValue, vat)
            {
                if ($.isNumeric(netValue) && $.isNumeric(vat))
                    return parseFloat(netValue) * (100 + parseInt(vat)) / 100;

                return false;
            }

            function totalNetValue(netValue, amount)
            {
                if ($.isNumeric(netValue) && $.isNumeric(amount))
                    return parseFloat(netValue) * parseInt(amount);

                return false;
            }

            function totalGrossValue(netValue, amount, vat)
            {
                if ($.isNumeric(netValue) && $.isNumeric(amount) && $.isNumeric(vat))
                    return parseFloat(netValue) * parseInt(amount) * (100 + parseInt(vat)) / 100;

                return false;
            }


            $("table td > input, table td > select").change(function ()
            {
                let row = $(this).attr('id').match(/(?:\D+)(\d+)/);

                let grossVal = 0;
                let totalNetVal = 0;
                let totalGrossVal = 0;
                let netValue = 0, amount = 0, vat = 0;

                netValue = $('#netValue' + row[1]).val();
                amount = $('#amount' + row[1]).val();
                vat = $('#vat' + row[1]).val();

                console.log(netValue, amount, vat);

                // grossValue($('#netValue'+row[1]), $('#vat'+row[1]));
                console.log($('#netValue' + row[1]).val(), $('#vat' + row[1]).val());

                if (vat === 'zw' || vat === 'np')
                    vat = 0;

                grossVal = grossValue(netValue, vat)
                totalNetVal = totalNetValue(netValue, amount);
                totalGrossVal = totalGrossValue(netValue, amount, vat);
                console.log(grossVal, totalNetVal, totalGrossVal);

                const formatter = new Intl.NumberFormat('pl-PL',
                    {
                        style: 'currency',
                        currency: 'PLN',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })

                $('#grossValue' + row[1]).html(formatter.format(grossVal));
                $('#totalNetValue' + row[1]).html(formatter.format(totalNetVal));
                $('#totalGrossValue' + row[1]).html(formatter.format(totalGrossVal));
            });


            $('button#show1000net').click(function()
            {
                let row = 1;
                $('table#employees tbody tr').each(function()
                {
                    $this = $(this);

                    let fieldName ='input#netValue' + row++;
                    let quantity = $this.find(fieldName).val();

                    if(parseFloat(quantity) >= 1000)
                    {
                        $(this).css(
                                {
                                    'background-color': 'green',
                                });
                    }
                });
            });
        });

    </script>

<?php $rightContent = ob_get_clean() ?>
<?php include 'templates/layout.html.php' ?>