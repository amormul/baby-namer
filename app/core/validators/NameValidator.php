<?php
/**
 * перевірка, чи є ім'я дійсним (лише літери)
 * @param string $name
 * @return bool
 */
function isValidName(string $name): bool {
    return preg_match('/^[a-zA-Zа-яА-ЯёЁіІїЇєЄ\s-]+$/u', $name);
}