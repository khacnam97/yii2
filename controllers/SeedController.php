<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        $user = new User();
        for ($i = 1; $i <= 4; $i++) {
//            $user->setIsNewRecord(true);

            $user->username = $faker->username;
            $user->password = '123456';
            $user->save();
        }

    }
}