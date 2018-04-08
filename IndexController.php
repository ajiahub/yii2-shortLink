<?php

namespace chinahub\shortlink;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use chinahub\shortlink\helpers\NumberHelper;

/**
 * ---------------------------------------
 * 短链接映射对外业务
 * Author: ligang <ligang@chexiu.cn>
 * Date: 2018/3/30 14:20
 * ---------------------------------------
 */
class IndexController extends Controller
{
    /**
     * 短链接映射对外业务
     * @throws \HttpRequestException
     */
    public function actionIndex()
    {
        $params = Yii::$app->getRequest()->queryParams;
        $hash = ArrayHelper::getValue($params, 'controller', '');
        if (!empty($hash)) {
            $number = NumberHelper::from62_to10($hash);
            $model = TUrlMap::findOne((int)$number);
            if (!empty($model)) {
                $this->redirect($model->url);
            }
        } else {
            throw new \HttpRequestException('invalid request.');
        }
    }
}