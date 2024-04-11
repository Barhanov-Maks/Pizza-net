<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style-delivery.css" />
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
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
            <section class="basket group__section">
                <div class="group-top">
                    <div class="group-left">
                        <h3 class="title_section margin-null">Корзина</h3>
                        <p class="number">(8)</p>
                    </div>
                    <div class="group-right" id="clear-cart">
                        <button type="reset">
                            <p class="btn-reset">Удалить всё</p>
                            <img src="img/trashcan-black-32.png" alt="trashcan" />
                        </button>
                    </div>
                </div>
                <?php
// Путь к файлу CSV
$csvFile = 'cart.csv';

// Открываем файл для чтения
$file = fopen($csvFile, 'r');

$totalPrice = 0;
// Читаем строки и выводим данные
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
    // Получаем данные о пицце
    $name = $data[0];
    $description = $data[1];
    $price = $data[2];

    // Выводим данные о пицце в нужном формате
    echo '<div class="item">';
    echo '<div class="top">';
    echo '<img src="img/pizza-plaska.jpg" alt="" />';
    echo '<div class="description">';
    echo '<h4>' . $name . '</h4>';
    echo '<span>' . $description . '</span>';
    echo '</div>';
    echo '</div>';
    echo '<div class="bottom">';
    echo '<div class="group-quantity">';
    echo '<button class="minus">-</button>';
    echo '<p class="count">1</p>';
    echo '<button class="plus">+</button>';
    echo '</div>';
    echo '<span>' . $price . ' &#8381;</span>';
    echo '<button class="close remove-from-cart" data-name="' . $data[0] . '" data-description="' . $data[1] . '" data-price="' . $data[2] . '" type="button"" type="button">×</button>';
    echo '</div>';
    echo '</div>';
    $totalPrice += (float)$price;
}
fclose($file);
?>


                <div class="total">
                    <span>Итого:</span>
                    <p><?php echo $totalPrice; ?> &#8381;</p>
                </div>
            </section>
            <section class="contact-information group__section">
                <div class="group-top group---top">
                    <h3 class="title_section">Контактная информация</h3>
                </div>
                <div class="group-info">
                    <input type="text" class="INFO" name="fio" id="FIO" placeholder="Имя" />
                    <input type="tel" class="INFO" name="telephon" id="TELEPHON" placeholder="*Номер телефона" />
                </div>
            </section>
            <section class="shipping-information group__section">
                <div class="group-top group---top">
                    <h3 class="title_section">Доставка</h3>
                </div>
                <div class="group-info">
                    <div class="group--left">
                        <div class="group-_contact">
                            <input type="text" class="INFO INFO-NULL" name="city" id="CITY" placeholder="Город" />
                        </div>
                        <div class="group--two">
                            <div class="group-_contact">
                                <input type="tel" class="INFO INFO-NULL" name="street" id="STREET"
                                    placeholder="Улица" />
                            </div>
                            <div class="group-_contact">
                                <input type="tel" class="INFO INFO-NULL" name="house" id="HOUSE" placeholder="Дом" />
                            </div>
                        </div>
                        <div class="group--three">
                            <div class="group-_contact">
                                <input type="tel" class="INFO INFO-NULL" name="kv/of" id="KV/OF" placeholder="Кв/оф" />
                            </div>
                            <div class="group-_contact">
                                <input type="tel" class="INFO INFO-NULL" name="entrance" id="ENTRANCE"
                                    placeholder="Подъезд" />
                            </div>
                            <div class="group-_contact">
                                <input type="tel" class="INFO INFO-NULL" name="floor" id="FLOOR" placeholder="Этаж" />
                            </div>
                        </div>
                    </div>
                    <div class="group--right">
                        <div class="group-_contact">
                            <textarea name="comment" id="COMMENT" cols="50" rows="8" class="INFO INFO-NULL"
                                placeholder="Комментарий"></textarea>
                        </div>
                    </div>
                </div>
            </section>
            <section class="delivery-information group__section">
                <div class="group-top group---top">
                    <h3 class="title_section">Оплата</h3>
                </div>
                <div class="group-info" style="display: block">
                    <div class="group_radiobtn">
                        <input type="radio" name="DELIVERY" id="DELIVERY1" required checked /><label for="DELIVERY1"
                            style="margin-right: 30px">Наличными курьеру</label>
                        <input type="radio" name="DELIVERY" id="DELIVERY2" required /><label for="DELIVERY2">Банковской
                            картой курьеру</label>
                    </div>
                    <div class="group-_contact">
                        <input type="number" class="INFO INFO-NULL" style="width: 130px" name="money" id="MONEY"
                            placeholder="Сдача с" />
                    </div>
                </div>
            </section>
            <section class="decoration-information group__section">
                <div class="group-top group---top group---top-config">
                    <h5>
                        Нажимая “Оформить заказ”, Вы даете согласие на
                        обработку <a href="#">Персональных данных</a> и
                        принимаете
                        <a href="#">Пользовательское соглашение</a>
                    </h5>
                    <div class="bottom-group " id="orderButton">
                        <button>Оформить заказ</button>
                    </div>
                </div>
            </section>
            <div id="orderModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" id="close-button">&times;</span>
                    <div id="orderInfo" class="order-info delivery-info">

                    </div>

                    <button id="confirmOrderButton" id="close-button" class="confirm-order-button ">Подтвердить
                        заказ</button>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="footer-top">
                <div class="group-footer">
                    <a href="#" class="nav-foot">О компании</a>
                    <a href="#" class="nav-foot">Оплата</a>
                    <a href="#" class="nav-foot">Доставка</a>
                </div>
                <div class="group-footer">
                    <a href="#" class="nav-foot">Личный кабинет</a>
                    <a href="#" class="nav-foot">Акции</a>
                </div>
                <div class="group-footer">
                    <p class="nav-foot">Режим работы:</p>
                    <p class="nav-footer_discript">
                        (с 9:30 до 18:00 без выходных)
                    </p>
                    <p class="nav-foot">Адрес:</p>
                    <p class="nav-footer_discript address-footer">
                        Lorem ipsum dolor sit amet consectetur. Lacinia
                        volutpat tincidunt eu arcu.
                    </p>
                </div>
                <div class="group-footer">
                    <p class="nav-foot">Телефон:</p>
                    <a class="nav-footer_discript" href="tel:+7 (000) 000-00-00">+7 (000) 000-00-00</a>
                    <p class="nav-foot">Мы в соц. сетях:</p>
                    <div class="group-messenger">
                        <a href="http://vk.com"><img src="img/vk-64-black.png" alt="vk" class="messenger" /></a>
                        <a href="http://web.telegram.org/"><img src="img/tg-64-black.png" alt="tg"
                                class="messenger" /></a>
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
    </div>
    <script>
        var order = {};
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', function () {
                var name = button.getAttribute('data-name');
                var description = button.getAttribute('data-description');
                var price = button.getAttribute('data-price');
                removeFromCart(name, description, price);
            });
        });

        function removeFromCart(name, description, price) {
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
            xhr.send('name=' + encodeURIComponent(name) + '&description=' + encodeURIComponent(description) +
                '&price=' + encodeURIComponent(price));
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
        document.addEventListener('DOMContentLoaded', function () {
            // Находим элементы радиокнопок
            var radioButtons = document.querySelectorAll('input[name="DELIVERY"]');

            // Находим поле ввода для денег
            var moneyInput = document.getElementById('MONEY');

            // Добавляем обработчик события для каждой радиокнопки
            radioButtons.forEach(function (button) {
                button.addEventListener('change', function () {
                    // Проверяем, выбрана ли оплата картой
                    if (button.id === 'DELIVERY2') {
                        // Если оплата картой выбрана, скрываем поле ввода денег
                        moneyInput.style.display = 'none';
                    } else {
                        // Если оплата наличными выбрана, отображаем поле ввода денег
                        moneyInput.style.display = 'block';
                    }
                });
            });

            // Находим кнопку "Оформить заказ"
            var orderButton = document.querySelector('#orderButton');


            // Добавляем обработчик события для кнопки "оформить заказ"
            orderButton.addEventListener('click', function () {
                var modal = document.querySelector('#orderModal');
                var orderInfo = document.querySelector('#orderInfo');

                // Открываем модальное окно
                modal.style.display = 'block';

                // Создаем объект для хранения информации о заказе
                var order = {};

                // Получаем значения из полей ввода
                var fio = document.getElementById('FIO').value;
                var telephon = document.getElementById('TELEPHON').value;
                var city = document.getElementById('CITY').value;
                var street = document.getElementById('STREET').value;
                var house = document.getElementById('HOUSE').value;
                var kvOf = document.getElementById('KV/OF').value;
                var entrance = document.getElementById('ENTRANCE').value;
                var floor = document.getElementById('FLOOR').value;
                var comment = document.getElementById('COMMENT').value;
                var deliveryMethod = document.querySelector('input[name="DELIVERY"]:checked').id;
                var money = document.getElementById('MONEY').value;

                // Заполняем объект order полученными значениями
                order.fio = fio;
                order.telephon = telephon;
                order.city = city;
                order.street = street;
                order.house = house;
                order.kvOf = kvOf;
                order.entrance = entrance;
                order.floor = floor;
                order.comment = comment;
                order.deliveryMethod = deliveryMethod;
                order.money = money;

                // Выводим объект order в консоль для проверки
                console.log(order);

                // Выводим информацию о пиццах в модальном окне
                // Здесь должен быть код вывода информации о пиццах, который у вас есть

                // Выводим информацию о доставке в модальном окне
                orderInfo.innerHTML = `
            <h3>Информация о доставке:</h3>
            <p><strong>Имя:</strong> ${order.fio}</p>
            <p><strong>Телефон:</strong> ${order.telephon}</p>
            <p><strong>Город:</strong> ${order.city}</p>
            <p><strong>Улица:</strong> ${order.street}</p>
            <p><strong>Дом:</strong> ${order.house}</p>
            <p><strong>Квартира/Офис:</strong> ${order.kvOf}</p>
            <p><strong>Подъезд:</strong> ${order.entrance}</p>
            <p><strong>Этаж:</strong> ${order.floor}</p>
            <p><strong>Комментарий:</strong> ${order.comment}</p>
            <p><strong>Способ оплаты:</strong> ${order.deliveryMethod}</p>
        `;
            });
            orderButton.addEventListener('click', function () {
                var modal = document.querySelector('#orderModal');

                // Открываем модальное окно
                modal.style.display = 'block';
                var orderInfo = document.querySelector('#orderInfo');
                // Загружаем информацию о заказе из файла с помощью AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_order_info.php');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Выводим информацию о заказе в модальном окне
                        orderInfo.innerHTML += xhr.responseText;
                        // После вывода информации о пиццах в модальном окне, добавляем информацию о доставке


                    }

                };
                xhr.send();

                modal.style.display = 'block';
            });

            // Добавляем обработчик события для кнопки закрытия модального окна
            var closeButton = document.querySelector('#close-button');
            closeButton.addEventListener('click', function () {
                // Закрываем модальное окно
                var modal = document.querySelector('#orderModal');
                modal.style.display = 'none';
            });
        });
    </script>
</body>

</html>