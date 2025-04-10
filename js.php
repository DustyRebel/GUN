<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отправка формы с проверкой</title>
<script>
function validateForm() {
    var name = document.getElementById("uname").value;
    var bird = document.getElementById("notification-text").value;
    var number = document.getElementById("unumber").value;

// Проверка заполнения полей
        if (name == "" || bird == "" || number =="") {
            alert("Пожалуйста, заполните все поля.");
            return false;
        }
    // Открытие нового окна
    var myWin1 = window.open("", "TestWindow", "width=500, height=400, status=no, toolbar=no, resizable=yes, scrollbars=no, menubar=no");
    // Отправка данных в новое окно
    myWin1.document.write("<form id='popupForm' action='done.php' method='post'>");
    myWin1.document.write("<label for='uname_popup'>Ваше имя:</label>");
    myWin1.document.write("<input type='text' id='uname_popup' name='uname_popup' value='" + name + "' required>");
    myWin1.document.write("<br>");
    myWin1.document.write("<label for='notification-text_popup'>Выберите птицу:</label>");
    myWin1.document.write("<select id='notification-text_popup' name='notification-text_popup'>");
    myWin1.document.write("<option value='Голубь' " + (bird == 'Голубь' ? 'selected' : '') + ">Голубь</option>");
    myWin1.document.write("<option value='Филин' " + (bird == 'Филин' ? 'selected' : '') + ">Филин</option>");
    myWin1.document.write("<option value='Синица' " + (bird == 'Синица' ? 'selected' : '') + ">Синица</option>");
    myWin1.document.write("<option value='Тукан' " + (bird == 'Тукан' ? 'selected' : '') + ">Тукан</option>");
    myWin1.document.write("<option value='Пингвин' " + (bird == 'Пингвин' ? 'selected' : '') + ">Пингвин</option>");
    myWin1.document.write("<option value='Утка' " + (bird == 'Утка' ? 'selected' : '') + ">Утка</option>");
    myWin1.document.write("</select>");
    myWin1.document.write("<br>");
    myWin1.document.write("<label for='unumber_popup'>Ваше любимое число:</label>");
    myWin1.document.write("<input type='text' name='unumber_popup' id='unumber_popup' value='" + number + "' required><br>");

    myWin1.document.write("<br><br>");
    myWin1.document.write("<input type='submit' value = 'Отправить'>");
    myWin1.document.write("<br><br>");
    myWin1.document.write("<input type='button' value='Закрыть' onclick='self.close();'>");
    myWin1.document.write("</form>");
}
</script> 


</head>
<body>

<form id="myForm" action="done.php" method="post">
    <label for="notification-text">Выберите птицу:</label>
    <select name="notification-text" id="notification-text">
        <option value="Голубь">Голубь</option>
        <option value="Филин">Филин</option>
        <option value="Синица">Синица</option>
        <option value="Тукан">Тукан</option>
        <option value="Пингвин">Пингвин</option>
        <option value="Утка">Утка</option>
    </select>
    <br>
    <label for="uname">Ваше имя:</label>
    <input type="text" name="uname" id="uname"><br>
    <label for="unumber">Ваше любимое число:</label>
    <input type="text" name="unumber" id="unumber"><br>

    <button type="button" onclick="validateForm()">Cохранить</button>
</form>
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">

</body>
</html>
