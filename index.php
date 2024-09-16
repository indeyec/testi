<?php
require 'vendor/autoload.php'; // Подключаем автозагрузчик Composer

use Bitrix24\Bitrix24;

// Задайте ваши идентификаторы и токены
$webhookUrl = 'https://yourdomain.bitrix24.com/rest/';
$applicationId = 'YOUR_APPLICATION_ID'; // ID вашего приложения
$applicationSecret = 'key'; // ключ вашего приложения
$oauthAccessToken = 'token'; // Токен доступа

// Создаем экземпляр Bitrix24
$bx24 = new Bitrix24();
$bx24->setApplicationId($applicationId);
$bx24->setApplicationSecret($applicationSecret);
$bx24->setWebhookUrl($webhookUrl);
$bx24->setAccessToken($oauthAccessToken);

// Получаем контакты по фамилии "Иванов"
$result = $bx24->call('crm.contact.list', [
    'filter' => [
    'LAST_NAME' => 'Иванов'
    ],
    'select' => ['ID'] // В выборке только ID
]);

// Проверяем результат
if (!empty($result['result'])) {
    // Выводим ID первого найденного контакта
    echo 'ID контакта: ' . $result['result'][0]['ID'];
} else {
    // Если контакты не найдены
    echo 'Ничего не найдено';
}
?>

<?php

// Установите необходимые параметры
$webhookUrl = 'https:// ваш_домен.bitrix24.ru/rest/1/ваш_ключ_вебхука/contact.list';
$query = [
    'filter' => ['LAST_NAME' => 'Иванов'],
    'select' => ['ID', 'LAST_NAME', 'NAME']
];

// Выполните запрос к API Битрикс24
$result = file_get_contents($webhookUrl . '?' . http_build_query($query));
$response = json_decode($result, true);

// Проверьте наличие ошибок и данных
if (isset($response['error'])) {
    // Вывод ошибки
    echo 'Ошибка: ' . $response['error_description'];
} else {
    // Вывод ID первого контакта, если он найден
    if (!empty($response['result'])) {
        echo 'ID первого результата: ' . $response['result'][0]['ID'];
    } else {
        echo 'Ничего не найдено';
    }
}
?>

<?php

// Установите необходимые параметры
$webhookUrl = 'https:// ваш_домен.bitrix24.ru/rest/1/ваш_ключ_вебхука/contact.list';
$query = [
    'filter' => ['LAST_NAME' => 'Иванов'],
    'select' => ['ID', 'LAST_NAME', 'NAME']
];

// Выполните запрос к API Битрикс24
$result = file_get_contents($webhookUrl . '?' . http_build_query($query));
$response = json_decode($result, true);

// Проверьте наличие ошибок и данных
if (isset($response['error'])) {
    // Вывод ошибки
    echo 'Ошибка: ' . $response['error_description'];
} else {
    // Вывод ID первого контакта, если он найден
    if (!empty($response['result'])) {
        echo 'ID первого результата: ' . $response['result'][0]['ID'];
    } else {
        echo 'Ничего не найдено';
    }
}
?>