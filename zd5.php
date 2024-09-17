<?php
// Регистрация событий
$bitrix24 = \Yii::$app->bitrix24->admin();

$bitrix24->call('event.bind', [
    'event' => 'onCrmDealAdd',
    'handler' => 'https://ваш_домен.com/webhook/deal-add',
]);

$bitrix24->call('event.bind', [
    'event' => 'onCrmDealUpdate',
    'handler' => 'https://ваш_домен.com/webhook/deal-update',
]);

$bitrix24->call('event.bind', [
    'event' => 'onCrmDealDelete',
    'handler' => 'https://ваш_домен.com/webhook/deal-delete',
]);

?>