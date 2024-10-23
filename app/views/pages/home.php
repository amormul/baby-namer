<?php
$errors = handleFormSubmission();
$data = readData();
?>

<main>
    <form method="POST" class="name-form" novalidate>
        <input type="text" name="name" placeholder="Ім'я" required>
        <select name="gender" required>
            <option value="boy">Хлопчик</option>
            <option value="girl">Дівчинка</option>
        </select>
        <button type="submit">Додати</button>
    </form>

    <?php displayErrors($errors); ?>

    <div class="names-container">
        <div class="column boys">
            <h2>Імена для хлопчиків</h2>
            <ul>
                <?php foreach ($data['boys'] as $boy): ?>
                    <li><?= htmlspecialchars($boy) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="column girls">
            <h2>Імена для дівчаток</h2>
            <ul>
                <?php foreach ($data['girls'] as $girl): ?>
                    <li><?= htmlspecialchars($girl) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</main>
