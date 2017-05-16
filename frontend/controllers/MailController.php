<?php


namespace frontend\controllers;

use yii\web\Controller;
use Yii;

/**
 * Description of MailController
 *
 * @author admin
 */
class MailController extends Controller
{

    public function actionSend()
    {
        $result = Yii::$app->mailer->compose()
                ->setFrom('MAIL@microsoft.com')
                ->setTo('web-8dwkz@mail-tester.com')
                ->setSubject('Тема сообщения')
                ->setTextBody('Текст сообщения')
                ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
                ->send();

        var_dump($result);die;
        echo 'die';die;
    }
}
