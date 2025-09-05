<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "ilya1313120@gmail.com"; // ← укажи свою почту
    $subject = "Новое сообщение с сайта";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $body = "Имя: $name\nПочта: $email\nСообщение:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Сообщение отправлено!');window.history.back();</script>";
    } else {
        echo "<script>alert('Ошибка при отправке.');window.history.back();</script>";
    }
} else {
    echo "Метод не POST.";
}
?>
