<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Catagory;


class CatagoryController extends \yii\web\Controller
{
    public function actionIndex(){
        //Create the Query String
        $query = Catagory::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),

        ]);
        $catagories = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'catagories' => $catagories,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
{
    $catagory = new Catagory();

    if ($catagory->load(Yii::$app->request->post())) {
        if ($catagory->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('create', [
        'catagory' => $catagory,
    ]);
}

   

}
