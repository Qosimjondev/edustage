<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Events]].
 *
 * @see \common\models\Events
 */
class EventsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Events[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Events|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
