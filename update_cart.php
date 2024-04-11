<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $count = $_POST['count'];

    if ($name !== '' && $count > 0) {
        $csvFile = 'cart.csv';
        $lines = file($csvFile);

        foreach ($lines as $line) {
            $parts = explode(',', $line);
            if ($parts[0] == $name) {
                $parts[3] = $count;
                $line = implode(',', $parts);
            }
        }
        unset($line); // Очистка ссылки

        file_put_contents($csvFile, implode('', $lines));
        
        // Теперь открываем файл только для чтения и выводим его содержимое
        $file = fopen($csvFile, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                echo $line;
            }
            fclose($file);
        } else {
            echo 'Ошибка при открытии файла';
        }
    }
}
?>