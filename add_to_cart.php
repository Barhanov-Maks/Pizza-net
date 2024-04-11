<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $count = $_POST['count'];

    // Открыть файл cart.csv для чтения
    $file = fopen('cart.csv', 'r');
    $pizzaExists = false;
    if ($file !== false) {
        // Проверить наличие пиццы в файле
        while (($data = fgetcsv($file, 1000, ",")) !== false) {
            if ($data[0] == $name && $data[1] == $description && $data[2] == $price && $data[4] == $count ) {
                $pizzaExists = true;
                break;
            }
        }
        fclose($file);
    } else {
        echo 'Ошибка при открытии файла для чтения';
        exit;
    }

    if (!$pizzaExists) {
        // Открыть файл cart.csv для добавления данных
        $file = fopen('cart.csv', 'a');
        if ($file !== false) {
            // Записать данные о пицце в файл
            fputcsv($file, array($name, $description, $price, $count));
            fclose($file);
            echo 'Данные успешно добавлены в корзину';
        } else {
            echo 'Ошибка при открытии файла для записи';
        }
    } else {
        echo 'Такая пицца уже есть в корзине';
    }
} else {
    echo 'Неверный метод запроса';
}
?>