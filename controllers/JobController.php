<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Job;
use app\models\Catagory;

class JobController extends \yii\web\Controller
{
    public function actionIndex(){
        //Create the Query String
        $query = Job::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),

        ]);
        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        //Render The View
        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

    public function actionDetails($id)
        //Get Job
    {
        $job = Job::find()
            ->where(['id'=>$id])
            ->one(); 
        //RENDER THE VIEW
        return $this->render('details', ['job'=> $job]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    

}
