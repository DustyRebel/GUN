<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Выбор птиц</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#birds").change(function(){
            var birdType = $(this).val();
            $.getJSON('ajaxdata.php', {birdType: birdType}, function(data){
                var options = '<option value="">Выберите кличку птицы</option>';
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i] + '">' + data[i] + '</option>';
                }
                $("#bird-names").html(options);
            });
        });
    });
</script>
</head>
<body>
    <h2>Выберите вид птицы и её кличку:</h2>
    <form id="myForm" action="ajaxdone.php" method="post">
        <label for="birds">Выберите вид птицы:</label>
        <select id="birds" name = "birds">
            <option value="">Выберите вид птицы</option>
            <option value="Ворон">Ворон</option>
            <option value="Сорока">Сорока</option>
            <option value="Дрозд рябинник">Дрозд рябинник</option>
            <option value="Сизая чайка">Сизая чайка</option>
        </select>
        <br><br>
        <label for="bird-names">Выберите кличку птицы:</label>
        <select id="bird-names" name = "bird-names">
            <option value="">Сначала выберите вид птицы</option>
        </select><br><br>
        <input type='submit' value = 'Отправить'>
    </form>
<br><img width = "398" height = "222" src="https://media1.tenor.com/m/n8xD-qPW0_0AAAAd/crow.gif">

</body>
</html>
