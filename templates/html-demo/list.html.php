<?php $title = 'Różne kontrolki HTML' ?>
<?php ob_start() ?>

    <div class="html-demo">
        <form action="">
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip" placeholder="">


            <label for="">REGON</label>
            <input type="text" id="" name="" placeholder="">

            <label for="">NAZWA</label>
            <input type="text" id="" name="" placeholder="">

            <label for="">DATA POWSTANIA</label>
            <input type="date" id="" name="" placeholder="">

            <label for="">ULICA</label>
            <input type="text" id="" name="" placeholder="">

            <label for="">NUMER DOMU</label>
            <input type="text" id="" name="" placeholder="">

            <label for="">NUMER MIESZKANIA</label>
            <input type="text" id="" name="" placeholder="">

            <label for="">UWAGI</label>
            <textarea type="" id="" name="" placeholder="AAAAAAAAAAAA"></textarea>

            <label for=""></label>
            <input type="text" id="" name="" placeholder="">

            <label for=""></label>
            <input type="text" id="" name="" placeholder="">

        </form>
    </div>

    <div class="html-demo">
        <label for="colors">Wybierz kolor:</label>
        <select name="colors" id="colors">
            <option value="green">zielony</option>
            <option value="blue">niebieski</option>
            <option value="grey">szary</option>
            <option value="cyan">turkusowy</option>
            <option value="darkblue">granatowy</option>
            <option value="red">czerwony</option>
            <option value="white">biały</option>
        </select>

        <label for="vat">Wybierz stawkę VAT:</label>
        <select name="vat" id="vat">
            <option value="zw">ZW</option>
            <option value="np">NP.</option>
            <option value="0">0%</option>
            <option value="3">3%</option>
            <option value="8">8%</option>
            <option value="23">23%</option>
        </select>
    </div>

    <div class="html-demo">
        <ol>
            <li>Element</li>
            <li>Element</li>
            <li>Element</li>
            <li>Element</li>
        </ol>
    </div>


<?php $rightContent = ob_get_clean() ?>
<?php include 'templates/layout.html.php' ?>