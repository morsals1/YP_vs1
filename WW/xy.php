<?php
$surname = trim(strip_tags($_POST["userSurName"]));
$name = trim(strip_tags($_POST["userName"]));
$date_bd = trim(strip_tags($_POST["userDate"]));
$mail = trim(strip_tags($_POST["userEmail"]));
$login = trim(strip_tags($_POST["userLogin"]));
$password = trim(strip_tags($_POST["userPassword"]));
$subject = "Регистрация на сайте url_вашего сайта";
$msg = "Ваши данные формы решистрации:\n " ."фамилия: $surname\n" ."Имя: $name" ."Дата: $date_bd\n" ."Почта: $login\n" ."Логин: $login\n" ."Пароль: $password\n";
$headers = "Content-type: text/plain; charset=UTF-8" . "\r\n";
if(!empty($surname) && !empty($name) && !empty($date_bd) && !empty($mail) && !empty($login) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mail($email, $subject, $msg, $headers);
    echo "Данные внесены в систему"
}
?>