// задание 2

<?php

require('path/to/bitrix24/rest.php'); // Укажите правильный путь к библиотеке

$bitrix24 = new \Bitrix24\Bitrix24('your_domain', 'your_webhook_key');

try {
    // Получение контактов с фамилией "Иванов"
    $response = $bitrix24->call('crm.contact.list', [
        'filter' => ['LAST_NAME' => 'Иванов'],
        'select' => ['ID', 'LAST_NAME', 'NAME']
    ]);

    if (!empty($response['result'])) {
        // Вывод ID первого результата
        echo 'ID контакта: ' . $response['result'][0]['ID'];
    } else {
        echo 'Ничего не найдено';
    }
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
?>