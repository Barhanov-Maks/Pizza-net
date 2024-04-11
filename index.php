<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-tablet.css" />
    <link rel="stylesheet" href="css/style-mobile.css" />
    <title>Главная</title>
</head>


<body>
    <header class="header">
        <div class="left-section">
            <a href="index.php"><img class="navbar-brand" src="img/logo.svg" alt="logo" /></a>

        </div>
        <div class="right-section">

            <div class="address">
                <img src="img/location-white-32.png" alt="location" />
                <input type="text" name="imput-address" placeholder="Адрес" id="" />
            </div>

        </div>
    </header>
    <main class="main">
        <section class="menu menu-none">
            <h3 class="title_section">Меню</h3>
            <ul class="navbar-menu">
                <li><a href="#PIZZA">Пицца HOT</a></li>
                <li><a href="#PIZZA ICE">Пицца ICE</a></li>
            </ul>
        </section>
        <section class="conveyor">
            <h2 class="title-menu"><a name="PIZZA">Пицца</a></h2>
            <div class="rows-1">
                <?php
                // Чтение данных из файла pizza.csv
                $file = fopen("pizza.csv", "r");
                if ($file !== false) {
                    while (($data = fgetcsv($file, 1000, ",")) !== false) {
                        // $data содержит массив данных о пицце
                        // $data[0] - название пиццы
                        // $data[1] - описание пиццы
                        // $data[2] - цена пиццы

                        // Вывод информации о пицце в указанном формате
                        if ($data[3] == 'normal') {
                            echo '<div class="product-card">';
                        echo '<img src="img/pizza-plaska.jpg" alt="товар">';
                        echo '<h4>' . $data[0] . '</h4>';
                        echo '<span>' . $data[1] . '</span>';
                        echo '<div class="bottom-group">';
                        echo '<button class="choose-btn" data-name=" '. $data[0] .' " data-description=" '. $data[1] .' " data-price=" '. $data[2] .' " data-count="' . $data[4] .'">Выбрать</button>';
                        echo '<span>' . $data[2] . ' &#8381;</span>';
                        echo '</div>';
                        echo '</div>';
                        }
                    }
                    fclose($file);
                } else {
                    echo "Ошибка при открытии файла";
                }
                ?>

            </div>
            <h2 class="title-menu"><a name="PIZZA ICE">Пицца ICE</a></h2>
            <div class="rows-1">
                <?php
                // Чтение данных из файла pizza.csv
                $file = fopen("pizza.csv", "r");
                if ($file !== false) {
                    while (($data = fgetcsv($file, 1000, ",")) !== false) {
                        // $data содержит массив данных о пицце
                        // $data[0] - название пиццы
                        // $data[1] - описание пиццы
                        // $data[2] - цена пиццы

                        // Вывод информации о пицце в указанном формате
                        if ($data[3] == 'ice') {
                            echo '<div class="product-card">';
                        echo '<img src="img/pizza-plaska.jpg" alt="товар">';
                        echo '<h4>' . $data[0] . '</h4>';
                        echo '<span>' . $data[1] . '</span>';
                        echo '<div class="bottom-group">';
                        echo '<button class="choose-btn" data-name="' . $data[0] . '" data-description="' . $data[1] . '" data-price="' . $data[2] . '"data-count="' . $data[4] .'">Выбрать</button>';
                        echo '<span>' . $data[2] . ' &#8381;</span>';
                        echo '</div>';
                        echo '</div>';
                        }
                       
                    }
                    fclose($file);
                } else {
                    echo "Ошибка при открытии файла";
                }
                ?>
            </div>
        </section>

        <section class="basket basket-none ">
            <img src="img/basket-black-64.png" alt="basket" />
            <div class="group-top">
                <h3 class="title_section margin-null">
                    <a href="delivery.php">Корзина</a>
                </h3>
                <button type="reset" id="clear-cart">Очистить</button>
            </div>
            <?php
                // Путь к файлу CSV
                $csvFile = 'cart.csv';

                // Открываем файл для чтения
                $file = fopen($csvFile, 'r');

                // Первая строка - заголовки, пропускаем её
                $totalPrice = 0;
                // Читаем строки и выводим данные
                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    // Получаем данные о пицце
                    $name = $data[0];
                    $description = $data[1];
                    $count = $data[3];
                    $price = $data[2] * $count;

                    // Выводим данные о пицце в нужном формате
                    echo '<div class="item">';
                    echo '<div class="top">';
                    echo '<img src="img/pizza-plaska.jpg" alt="" />';
                    echo '<div class="description">';
                    echo '<h4>' . $name . '</h4>';
                    echo '<span>' . $description . '</span>';
                    echo '</div>';
                    echo '<button class="close remove-from-cart" data-name="' . $data[0] . '" data-description="' . $data[1] . '" data-price="' . $data[2] . '" type="button">×</button>';
                    echo '</div>';
                    echo '<div class="bottom">';
                    echo '<div class="group-quantity">';
                    echo '<button class="minus"  data-name="' . $data[0] . '" data-description="' . $data[1] . '" data-count="' . $data[3] . '">-</button>';
                    echo '<p class="count">' . $count . '</p>';
                    echo '<button class="plus" data-name="' . $data[0] . '" data-description="' . $data[1] . '" data-count="' . $data[3] . '">+</button>';
                    echo '</div>';
                    echo '<span>' . $price . ' &#8381;</span>';
                    echo '</div>';
                    echo '</div>';
                    $totalPrice += (float)$price;
                }

        
                
                ?>

            <div class="total">
                <span>Сумма заказа:</span>
                <p><?php echo $totalPrice; ?>&#8381;</p>
            </div>
            <div class="bottom-group " id="orderButton">
                        <a href="delivery.php">Оформить</a>
                    </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-top">
            <div class="foot-one">
                <div class="group-footer">
                    <a href="#" class="nav-foot">О компании</a>
                    <a href="#" class="nav-foot">Оплата</a>
                    <a href="#" class="nav-foot">Доставка</a>
                </div>
                <div class="group-footer">
                    <a href="#" class="nav-foot">Личный кабинет</a>
                    <a href="#" class="nav-foot">Акции</a>
                </div>
            </div>
            <div class="group-footer group-footer-none">
                <p class="nav-foot">Режим работы:</p>
                <p class="nav-footer_discript">
                    (с 9:30 до 18:00 без выходных)
                </p>
                <p class="nav-foot">Адрес:</p>
                <p class="nav-footer_discript address-footer">
                    Lorem ipsum dolor sit amet consectetur. Lacinia volutpat
                    tincidunt eu arcu.
                </p>
            </div>
            <div class="group-footer">
                <p class="nav-foot">Телефон:</p>
                <a class="nav-footer_discript" href="tel:+7 (000) 000-00-00">+7 (000) 000-00-00</a>
                <p class="nav-foot">Мы в соц. сетях:</p>
                <div class="group-messenger">
                    <a href="http://vk.com"><img src="img/vk-64-black.png" alt="vk" class="messenger" /></a>
                    <a href="http://web.telegram.org/"><img src="img/tg-64-black.png" alt="tg" class="messenger" /></a>
                    <a href="https://ok.ru/"><img src="img/ok-64-black.png" alt="ok" class="messenger" /></a>
                </div>
            </div>
        </div>
        <div class="footer-bot">
            <a href="#">Copyright 2023 &copy; PizzaNet</a>
            <a href="#">Политика обработки персональных данных</a>
            <a href="#">Пользовательское соглашение</a>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.choose-btn');
            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var name = button.getAttribute('data-name');
                    var description = button.getAttribute('data-description');
                    var price = button.getAttribute('data-price');
                    var count = button.getAttribute('data-count');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'add_to_cart.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            console.log(xhr.responseText); // Ответ от сервера
                            location.reload()

                        }
                    };
                    xhr.send('name=' + encodeURIComponent(name) + '&description=' +
                        encodeURIComponent(description) + '&price=' + encodeURIComponent(
                            price) + '&count=' + encodeURIComponent(count));
                });
            });
        });
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', function () {
                var name = button.getAttribute('data-name');
                var description = button.getAttribute('data-description');
                var price = button.getAttribute('data-price');
                var count = button.getAttribute('data-count');

                removeFromCart(name, description, price, count);
            });
        });

        function removeFromCart(name, description, price, count) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'remove_from_cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // alert(xhr.responseText);
                        location.reload()
                        // Обновить содержимое корзины или перезагрузить страницу
                    } else {
                        alert('Произошла ошибка при удалении из корзины');
                    }
                }
            };
            xhr.send('name=' + encodeURIComponent(name) + '&description=' +
                encodeURIComponent(description) + '&price=' + encodeURIComponent(
                    price) + '&count=' + encodeURIComponent(count));
        }
        document.getElementById('clear-cart').addEventListener('click', function () {
            // Очистка содержимого файла cart.csv
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'clear_cart.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Перезагрузка страницы после очистки корзины
                    location.reload();
                }
            };
            xhr.send();
        });
        // Находим все кнопки "плюс"
        var plusButtons = document.querySelectorAll('.plus');

        // Для каждой кнопки "плюс" добавляем обработчик события
        plusButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Находим родительский элемент, содержащий информацию о товаре
                var item = this.closest('.item');

                // Находим элемент с количеством товара
                var countElement = item.querySelector('.count');

                // Получаем текущее количество товара
                var count = parseInt(countElement.textContent);

                // Увеличиваем количество на 1 и обновляем отображаемое количество
                count++;
                countElement.textContent = count;

                // Отправляем AJAX-запрос на сервер для обновления количества в файле cart.csv
                var formData = new FormData();
                formData.append('action', 'updateQuantity');
                formData.append('name', item.querySelector('h4')
                    .textContent); // Получаем название товара
                formData.append('count', count); // Передаем новое количество товара

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_cart.php');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        console.log(xhr.responseText); // Ответ от сервера


                    }
                };
                xhr.send(formData);
            });
        });

        // Находим все кнопки "минус"
        var minusButtons = document.querySelectorAll('.minus');

        // Для каждой кнопки "минус" добавляем обработчик события
        minusButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Находим родительский элемент, содержащий информацию о товаре
                var item = this.closest('.item');

                // Находим элемент с количеством товара
                var countElement = item.querySelector('.count');

                // Получаем текущее количество товара
                var count = parseInt(countElement.textContent);

                // Уменьшаем количество на 1, если оно больше 1, и обновляем отображаемое количество
                if (count > 1) {
                    count--;
                    countElement.textContent = count;

                    // Отправляем AJAX-запрос на сервер для обновления количества в файле cart.csv
                    var formData = new FormData();
                    formData.append('action', 'updateQuantity');
                    formData.append('name', item.querySelector('h4')
                        .textContent); // Получаем название товара
                    formData.append('count', count); // Передаем новое количество товара

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update_cart.php');
                    xhr.send(formData);
                }
            });
        });
    </script>
    </script>

</body>

</html>