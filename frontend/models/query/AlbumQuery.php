<?php

namespace frontend\models\query;
use common\models\User;
use frontend\models\Album;

/**
 * This is the ActiveQuery class for [[\frontend\models\Album]].
 *
 * @see \frontend\models\Album
 */
class AlbumQuery extends \yii\db\ActiveQuery
{

//    public function active()
//    {
//        return $this->andWhere('[[status]]=1');
//    }
    
    public function visibleFor($user)
    {
        if ($user === null) {
            return $this->visibleForAll();
        } else {
            return $this->visibleForUser($user);
        }  
    }
    
    private function visibleForAll()
    {
        $condition = [
            'access' => Album::ACCESS_ALL
        ];
        return $this->where($condition);
    }
    
    private function visibleForUser(User $user)
    {
        return $this->where(['or',['access'=> Album::ACCESS_ALL],['access' => Album::ACCESS_MEMBERS], ['user_id' => $user->id]]);
    }
    

}
