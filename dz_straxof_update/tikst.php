<center>
<h2>ФОРМА ДЛЯ ВАШЕЙ ДОЛГОЖДАННОЙ СВЯЗИ С "БАТОН И ТОЧКА"</h2>
Напишите нам
Делитесь своими отзывами и пожеланиями через форму обратной связи!
<form method="post" action="tikst.php">
   <div class="form-group">
    <label for="name">name</label>
    <input name="name" type="text" class="form-control" id="text" placeholder="Введите ваше имя">
  </div> 
  <div class="form-group">
    <label for="phone">Phone</label>
    <input name="phone" type="phone" class="form-control" id="phone" placeholder="Введите номер телефона">
  </div>
     <div class="form-group">
    <label for="text">text</label>
    <input name="text" type="text" class="form-control" id="text" placeholder="Ваши пожелания">
  </div> 
  <button type="submit" class="btn btn-primary">Передать данные</button>
</form>
</center>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = isset($_POST['name'])  ? $_POST['name']  : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $text = isset($_POST['text']) ? $_POST['text'] : '';

   $fd = fopen("betmen.txt", 'a') or die("не смог создать файлик");
    $str = 'имя пользователя:' . $name . ',' . 'номер телефона:' . $phone . ',' . 'его сообщение:' . $text . ',';
    fwrite($fd, $str);
    fwrite($fd, date('Y-m-d') . ' ' . $_SERVER['REMOTE_ADDR'] . "\n");
    fclose($fd);
        header('Location: index.html');
    exit;
}
//вывод для наглядности, у пользователей не будет таково
echo "все заявки:" . "<br>";
$f_name = "betmen.txt";
if (file_exists($f_name)) {
    $lines = file($f_name, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        echo htmlspecialchars($line) . "<br>";
    }
} else {
    echo "Файл не найден.";
}
echo "<a href='index.html'>на главную</a>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>ONAS</title>
    <body>
<script src ="bootstrap.bundle.min.js"></script>
    </body>
</html>