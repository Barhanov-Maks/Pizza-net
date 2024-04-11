<?php
// Путь к файлу корзины
$cartFile = 'cart.csv';

// Открываем файл для записи (очищаем его)
$file = fopen($cartFile, 'w');

// Закрываем файл
fclose($file);

// Возвращаем успешный HTTP-ответ
http_response_code(200);
?>