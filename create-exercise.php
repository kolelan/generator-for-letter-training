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
            линии <input type="checkbox" name="lines" checked="checked" value="Yes">
            сверху <input type="checkbox" name="line_up" checked="checked" value="Yes">
            снизу <input type="checkbox" name="line_down" checked="checked" value="Yes">
            наклонная <input type="checkbox" name="inclined_line" checked="checked" value="Yes">
            поля <input type="checkbox" name="border_line" checked="checked" value="Yes">
            нотный стан <input type="checkbox" name="stave" checked="checked" value="Yes">
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
            сверху <select name="margin_top">
                <option value="1">1px</option>
                <option value="2">2px</option>
                <option value="3">3px</option>
                <option value="4">4px</option>
                <option value="5" selected="selected">5px</option>
            </select>
        </p>
      <p>
          Высота грида
          <select name="grid">
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18" selected="selected">Стандартная (18)</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
          </select>
          Смещение текст-ноты
          <select name="offset_t_n">
              <option value="1">-3</option>
              <option value="2">-2</option>
              <option value="3">-1</option>
              <option value="4" selected="selected">Центр</option>
              <option value="5">+1</option>
              <option value="6">+2</option>
              <option value="7">+3</option>
          </select>
      </p>
    <h3>Текст, который мы превратим в пропись:</h3>
	<textarea name="data1"rows="10">
    </textarea>
    <input type="submit" value="Создать пропись">
  </div>
</form>
</body>
</html>
