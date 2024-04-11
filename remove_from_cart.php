<?php
// Проверяем, был ли запрос отправлен методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из запроса
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Читаем содержимое файла корзины в массив
    $cart = [];
    if (($handle = fopen("cart.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $cart[] = $data;
        }
        fclose($handle);
    }

    // Удаляем выбранную пиццу из массива
    foreach ($cart as $key => $item) {
        if ($item[0] === $name && $item[1] === $description && $item[2] === $price) {
            unset($cart[$key]);
        }
    }

    // Перезаписываем файл корзины
    if (($handle = fopen("cart.csv", "w")) !== false) {
        foreach ($cart as $item) {
            fputcsv($handle, $item);
        }
        fclose($handle);
        echo "Пицца успешно удалена из корзины";
    } else {
        echo "Ошибка при открытии файла корзины для записи";
    }
} else {
    echo "Неверный метод запроса";
}
?>