<?php
/**
 * Функція для читання даних з JSON-файлу
 * @return array[]
 */
function readData(): array {
    if (file_exists(JSON_FILE_PATH)) {
        $json = file_get_contents(JSON_FILE_PATH);
        return json_decode($json, true) ?? ['boys' => [], 'girls' => []];
    }
    return ['boys' => [], 'girls' => []];
}

/**
 * Функція для запису даних у JSON-файл
 * @param array $data
 * @param string $filename
 * @return void
 */
function writeData(array $data, string $filename = 'data.json'): void {
    file_put_contents(JSON_FILE_PATH, json_encode($data, JSON_PRETTY_PRINT));
}


/**
 * Функція для додавання ім'я до JSON-файлу
 * @param string $name
 * @param string $gender
 * @return void
 */
function addName(string $name, string $gender): void {
    $data = readData(); // Читаємо існуючі дані
    if ($gender === 'boy') {
        $data['boys'][] = $name; // Додаємо ім'я хлопчика
    } else {
        $data['girls'][] = $name; // Додаємо ім'я дівчинки
    }
    writeData($data); // Записуємо дані назад у файл
}