<?php
header('Content-Type: text/html; charset=utf-8');

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "books";

$connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (isset($_POST['userName'])) {
    $name = trim(strip_tags($_POST['userName']));

    $query = "SELECT * FROM books WHERE name = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        echo "
            <div class='book-info'>
                <p><strong>Название:</strong> {$book['Name']}</p>
                <p><strong>Автор:</strong> {$book['Author']}</p>
                <p><strong>Жанр:</strong> {$book['Genre']}</p>
                <p><strong>Дата:</strong> {$book['Year_publication']}</p>
                <p><strong>Издательство:</strong> {$book['Publishing']}</p>
            </div>
        ";
    } else {
        echo "
            <p class='error'>Информация о книге не найдена.</p>
        ";
    }
}
?>
