<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<form class="decor" action="gotopdf2.php" method="post">

  <div class="form-left-decoration"></div>
  <div class="form-right-decoration"></div>
  <div class="circle"></div>
  <div class="form-inner">
	<h3>Выберите тип написания букв</h3>
		<p>
            серый <input type="radio" name="type_letter_propisi" value=0 checked>
            пунктирный <input type="radio" name="type_letter_propisi" value=1>
        </p>
    <h3>Оформление страницы</h3>
        <p>
            наклонная черта <input type="checkbox" name="inclined_line" checked="checked" value="Yes">
            поля <input type="checkbox" name="border_line" checked="checked" value="Yes">
        </p>
    <h3>Отступы линий</h3>
        <p>
            слева <select name="margin_left">
                <option value="1">1px</option>
                <option value="2">2px</option>
                <option value="3">3px</option>
                <option value="4">4px</option>
                <option value="5" selected="selected">5px</option>
            </select>

            справа <select name="margin_right">
                <option value="1">1px</option>
                <option value="5"  selected="selected">5px</option>
                <option value="10">10px</option>
                <option value="15">15px</option>
                <option value="20">20px</option>
                <option value="25">25px</option>
            </select>
        </p>
    <h3>Место для прописи:</h3>
	<textarea name="data1"rows="10">
    </textarea>
    <input type="submit" value="Создать пропись">
  </div>
</form>
</body>
</html>
