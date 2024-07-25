<?php
// 1. Подключение к базе данных (аналогично get_reviews.php)
$servername = "localhost"; // Замените на адрес сервера базы данных, если необходимо
$username = "root";
$password = "";
$dbname = "crabbase"; // Изменено на crabbase

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
// 2. Получение данных из формы
$name = $_POST["name"];
$message = $_POST["message"];

// 3. Проверка на пустые поля (добавьте валидацию по необходимости)
if (empty($name) || empty($message)) {
    // Обработка ошибки, например, перенаправление с сообщением об ошибке
    die("Ошибка: имя и отзыв не могут быть пустыми.");
}

// 4. Подготовка и выполнение запроса на добавление
$sql = "INSERT INTO crabtable (name, message) VALUES ('$name', '$message')"; // Изменено на crabtable

if ($conn->query($sql) === TRUE) {
    // Перенаправление на страницу отзывов после успешного добавления
    header("Location: reviews.html");
    exit();
} else {
    echo "Ошибка при добавлении отзыва: " . $conn->error;
}

// 5. Закрытие соединения
$conn->close();
?>
