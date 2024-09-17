<?php
class WebhookController extends Controller
{
    // Обработчик создания сделки
    public function actionDealAdd()
    {
        $dealData = Yii::$app->request->post('data')['FIELDS'];
        
        // Логика сохранения сделки в базу данных
        $deal = new Deal();
        $deal->id = $dealData['ID'];
        $deal->title = $dealData['TITLE'];
        $deal->stage_id = $dealData['STAGE_ID'];
        $deal->save();

        return 'OK';
    }

    // Обработчик обновления сделки
    public function actionDealUpdate()
    {
        $dealData = Yii::$app->request->post('data')['FIELDS'];
        
        // Логика обновления сделки в базе данных
        $deal = Deal::findOne($dealData['ID']);
        if ($deal) {
            $deal->title = $dealData['TITLE'];
            $deal->stage_id = $dealData['STAGE_ID'];
            $deal->save();
        }

        return 'OK';
    }

    // Обработчик удаления сделки
    public function actionDealDelete()
    {
        $dealData = Yii::$app->request->post('data')['FIELDS'];

        // Логика удаления сделки из базы данных
        $deal = Deal::findOne($dealData['ID']);
        if ($deal) {
            $deal->delete();
        }

        return 'OK';
    }
}
?>