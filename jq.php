<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Форма бронирования</title>
<style>
.error-message {
    color: blue;
    font-style: italic;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
$.validator.addMethod("startsWithEight", function(value, element) {
        return this.optional(element) || value.indexOf("8") === 0;
    }, "Номер телефона должен начинаться с 8");
    $("#bookingForm").validate({
        rules: {
            birdSelection: "required",
            phoneNumber: {
                required: true,
                minlength: 11,
                maxlength: 11,
		startsWithEight: true,
		number: true
            },
            numberOfVisitors: {
                required: true,
                number: true,
                range: [1, 7]
            },
            visitDate: {
                required: true,
                dateISO: true,
                minDate: 0,
                maxDate: "+2W"
            },
            eggOrChicken: "required"
        },
        messages: {
            birdSelection: {
                required: "Пожалуйста, выберите птицу"
            },
            phoneNumber: {
                required: "Пожалуйста, введите номер телефона",
                minlength: "Номер телефона должен содержать не менее 11 символов",
                maxlength: "Номер телефона должен содержать не более 11 символов",
		number: "Введите корректный номер телефона"
            },
            numberOfVisitors: {
                required: "Пожалуйста, введите количество посетителей",
                number: "Пожалуйста, введите число",
		range: "Введите ччисло посетителей от 1 до 7"
            },
            visitDate: {
                required: "Пожалуйста, введите дату посещения",
                dateISO: "Пожалуйста, введите корректную дату в формате ГГГГ-ММ-ДД",
                minDate: "Дата посещения не может быть в прошлом",
                maxDate: "Пожалуйста, выберите дату не позднее, чем через две недели с текущей"
            },
            eggOrChicken: "Пожалуйста, выберите, что было раньше, яйцо или курица"
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.form-group'));
            } else {
                error.insertAfter(element);
            }
error.addClass("error-message"); // Добавляем класс error-message к сообщениям об ошибках
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function(form) {
            $('#successModal').modal('show');
        }
    });
});
</script>
</head>
<body>
<h2>Форма заявок на просмотр птиц ждущих ПМЖ</h2>
<form id="bookingForm" method="post" action="jqdone.php">
  <div class="form-group">
    <label for="birdSelection">Выбор птицы:</label>
    <select class="form-control" id="birdSelection" name="birdSelection">
      <option value="">Выберите птицу</option>
      <option value="Веник">Веник</option>
      <option value="Пулька">Пулька</option>
      <option value="Сильва">Сильва</option>
      <option value="Груша">Груша</option>
      <option value="Сэр Гордон III">Сэр Гордон III</option>
      <option value="Загадка">Загадка</option>
    </select>
  </div><br>
  <div class="form-group">
    <label for="phoneNumber">Номер телефона:</label>
    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
  </div><br>
  <div class="form-group">
    <label for="numberOfVisitors">Число посетителей:</label>
    <input type="text" class="form-control" id="numberOfVisitors" name="numberOfVisitors">
  </div><br>
  <div class="form-group">
    <label>
      <input type="checkbox" id="childrenAmongVisitors" name="childrenAmongVisitors"> Дети среди посетителей
    </label>
  </div><br>
  <div class="form-group">
    <label for="visitDate">Дата посещения:</label>
    <input type="date" class="form-control" id="visitDate" name="visitDate" min="2024-05-01" max="2024-07-01">
  </div><br>
  <div class="form-group">
    <label>Что было раньше, яйцо или курица?</label><br>
    <label>
      <input type="radio" name="eggOrChicken" value="egg"> Яйцо
    </label>
    <label>
      <input type="radio" name="eggOrChicken" value="chicken"> Курица
    </label><br>
  </div><br>
  <button type="submit" class="btn btn-primary">Отправить заявку</button>
</form>


</body>
</html>
