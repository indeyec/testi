<?php
public function actionDealAdd()
{
    $signature = Yii::$app->request->post('signature');
    $expectedSignature = hash_hmac('sha256', json_encode(Yii::$app->request->post()), 'секретный_ключ');

    if ($signature !== $expectedSignature) {
        return 'Invalid signature';
    }

    // Логика обработки события
}
?>