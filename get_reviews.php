<?php
// 1. Данные для подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crabbase";

// 2. Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
} else {
    echo "<!-- Подключение к базе данных успешно установлено. -->"; // Временно для проверки
}

// 4. Подготовка и выполнение запроса
$sql = "SELECT * FROM crabtable ORDER BY id DESC";
$result = $conn->query($sql);

// 5. Отображение результатов
if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h4>" . $row["name"] . "</h4>"; // 1 столбец - name
        echo "<p>" . $row["message"] . "</p>"; // 2 столбец - message
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "Пока нет отзывов.";
}

// 6. Закрытие соединения
$conn->close();
?>
