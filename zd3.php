<?php
require('path/to/bitrix24/rest.php'); // Укажите правильный путь к библиотеке

$bitrix24 = new \Bitrix24\Bitrix24('domain', 'key');

try {
    // Пакетный запрос для получения контакта и его сделок
    $batch = [
        'contact' => [
            'method' => 'crm.contact.list',
            'params' => [
                'filter' => ['LAST_NAME' => 'Иванов'],
                'select' => ['ID', 'LAST_NAME', 'NAME']
            ]
        ],
        'deals' => [
            'method' => 'crm.deal.list',
            'params' => [
                'filter' => ['CONTACT_ID' => '=contact.ID'],
                'select' => ['ID', 'TITLE']
            ]
        ]
    ];

    $response = $bitrix24->call('batch', $batch);

    // Проверка наличия контакта
    if (!empty($response['result']['contact'][0]['result'])) {
        $contactId = $response['result']['contact'][0]['result'][0]['ID'];
        echo 'ID контакта: ' . $contactId . "\n";

        // Проверка наличия сделок
        if (!empty($response['result']['deals'][0]['result'])) {
            // Вывод информации о первой сделке
            echo 'ID сделки: ' . $response['result']['deals'][0]['result'][0]['ID'];
        } else {
            echo 'Сделки не найдены для контакта с ID: ' . $contactId;
        }
    } else {
        echo 'Контакт не найден';
    }
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
?>