<?php
include_once 'inc/functions.php';
$errors = handleFormSubmission();
?>
<!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baby Namer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>BABY NAMER 🎉👶</h1>
        </header>
        <main>
            <form method="POST" class="name-form" novalidate>
                <input type="text" name="name" placeholder="Ім'я" required>
                <select name="gender" required>
                    <option value="boy">Хлопчик</option>
                    <option value="girl">Дівчинка</option>
                </select>
                <button type="submit">Додати</button>
            </form>

            <?php if (!empty($errors)): ?>
                <ul class="error-messages">
                    <?php foreach ($errors as $error): ?>
                        <li class="error-message"><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="names-container">
                <div class="column boys">
                    <h2>Імена для хлопчиків</h2>
                    <ul>
                        <?php foreach ($data['boys'] as $boy): ?>
                            <li><?= $boy ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="column girls">
                    <h2>Імена для дівчаток</h2>
                    <ul>
                        <?php foreach ($data['girls'] as $girl): ?>
                            <li><?= $girl ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </main>

        <footer>
            <p>Мормуль Антон, PHP-24</p>
        </footer>
    </body>
</html>
