<?php
include_once __DIR__ . '/../validators/NameValidator.php';
include_once __DIR__ . '/../../config.php';

/**
 * обробка надсилання форми та валідація введених даних
 * @return array
 */
function handleFormSubmission(): array {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);
        $gender = $_POST['gender'];

        if (empty($name)) {
            $errors['name'] = ERRORS_MSG['empty_name'];
        } elseif (!isValidName($name)) {
            $errors['name'] = ERRORS_MSG['invalid_name'];
        } else {
            addName($name, $gender);
            header('Location: index.php'); // Переходить на індекс після успішного додавання
            exit;
        }
    }
    return $errors;
}

/**
 * виведення повідомлень про помилки
 * @param array $errors
 * @return void
 */
function displayErrors(array $errors): void {
    if (!empty($errors)) {
        echo '<ul class="error-messages">';
        foreach ($errors as $error) {
            echo '<li class="error-message">' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul>';
    }
}
