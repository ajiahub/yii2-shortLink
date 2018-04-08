<?php

namespace chinahub\shortlink;

use Yii;

/**
 * This is the model class for table "t_url_map".
 *
 * @property string $id
 * @property string $url 原URL地址
 * @property string $created_at
 */
class TUrlMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_url_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => '原URL地址',
            'created_at' => 'Created At',
        ];
    }
}
