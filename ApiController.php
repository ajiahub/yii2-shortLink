<?php

namespace chinahub\shortlink;

use Yii;
use yii\web\Controller;
use chinahub\shortlink\helpers\NumberHelper;

/**
 * ---------------------------------------
 * ApiController.php
 * Author: ligang <ligang@chexiu.cn>
 * Date: 2018/4/8 17:32
 * ---------------------------------------
 */
class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 生成短链接API
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $params = Yii::$app->request->bodyParams;
        $url = ArrayHelper::getValue($params, 'url', '');
        if (!empty($url)) {
            /** @var TUrlMap $model */
            $model = Yii::createObject(TUrlMap::className());
            if ($model->load($params, '') && $model->save()) {
                return ['code' => 0, 'url' => NumberHelper::from10_to62($model->id), 'err' => ''];
            }
        }
        return ['code' => 500, 'url' => '', 'err' => '生成失败，请重试'];
    }
}