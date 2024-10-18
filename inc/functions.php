<?php
include_once 'config.php';

/**
 * reading data from JSON file
 * @param string $filename
 * @return array[]
 */
function readData(string $filename = 'data.json'): array {
    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        return json_decode($json, true) ?? ['boys' => [], 'girls' => []];
    }
    return ['boys' => [], 'girls' => []];
}

/**
 * writing data to JSON file
 * @param array $data
 * @param string $filename
 * @return void
 */
function writeData(array $data, string $filename = 'data.json'): void {
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
}

/**
 * adding a name to the appropriate array
 * @param string $name
 * @param string $gender
 * @return void
 */
function addName(string $name, string $gender): void {
    $data = readData();
    if ($gender === 'boy') {
        $data['boys'][] = $name;
    } else {
        $data['girls'][] = $name;
    }
    writeData($data);
}

/**
 * checking if the name is valid (letters only)
 * @param string $name
 * @return bool
 */
function isValidName(string $name): bool {
    return preg_match('/^[a-zA-Zа-яА-ЯёЁіІїЇєЄ\s-]+$/u', $name);
}

/**
 * processing form submission and validating input data
 * @return void
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
            header('Location: index.php');
            exit;
        }
    }
    return $errors;
}

handleFormSubmission();

$data = readData();