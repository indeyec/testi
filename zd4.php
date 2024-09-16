<?php
public static function getCompanies() {
    $result = [];
    $batchSize = 50; // Количество запросов в одном батче
    $companiesPerRequest = 100; // Количество компаний за один запрос
    $totalCompanies = 5000; // Ожидаемое количество компаний
    $batchRequests = [];

    // Формируем батчи запросов
    for ($i = 0; $i < $totalCompanies / $companiesPerRequest; $i++) {
        $start = $i * $companiesPerRequest;
        $batchRequests["batch_{$i}"] = [
            'method' => 'crm.company.list',
            'params' => [
                'order' => ['TITLE' => 'ASC'],
                'filter' => [],
                'select' => ["ID", "TITLE", "COMPANY_TYPE"],
                'start' => $start,
            ]
        ];
    }

    // Отправляем первый батч
    $response = \Yii::$app->bitrix24->admin()->call('batch', ['cmd' => array_slice($batchRequests, 0, $batchSize)]);
    foreach ($response['result']['result'] as $batchResult) {
        $result = array_merge($result, $batchResult);
    }

    // Отправляем второй батч
    $response = \Yii::$app->bitrix24->admin()->call('batch', ['cmd' => array_slice($batchRequests, $batchSize)]);
    foreach ($response['result']['result'] as $batchResult) {
        $result = array_merge($result, $batchResult);
    }

    return $result;
}
?>