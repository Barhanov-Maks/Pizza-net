<?php
// Путь к файлу CSV
$csvFile = 'cart.csv';

// Открываем файл для чтения
$file = fopen($csvFile, 'r');

// Первая строка - заголовки, пропускаем её
$totalPrice = 0;
$orderInfo = '';

// Читаем строки и формируем информацию о заказе
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
    // Получаем данные о пицце
    $name = $data[0];
    $description = $data[1];
    $count = $data[3];
    $price = $data[2] * $count;

    // Формируем информацию о пицце в HTML-формате
    $orderInfo .= '<div class="item">';
    $orderInfo .= '<div class="item">';
                    $orderInfo .= '<div class="top">';
                    $orderInfo .= '<img src="img/pizza-plaska.jpg" alt="" />';
                    $orderInfo .= '<div class="description">';
                    $orderInfo .= '<h4>' . $name . '</h4>';
                    $orderInfo .= '<span>' . $description . '</span>';
                    $orderInfo .= '</div>';
                    $orderInfo .= '</div>';
                    $orderInfo .= '<div class="bottom">';
                    $orderInfo .= '<div class="group-quantity">';
                    $orderInfo .= '</div>';
                    $orderInfo .= '<span>' . $price . ' &#8381;</span>';
                    $orderInfo .= '</div>';
                    $orderInfo .= '</div>';
    $orderInfo .= '</div>';

    $totalPrice += (float)$price ;
}

// Формируем информацию о заказе
$orderInfo .= '<p>Общая сумма заказа: ' . $totalPrice . '&#8381;</p>';

// Закрываем файл
fclose($file);

// Возвращаем информацию о заказе
echo $orderInfo;
?>