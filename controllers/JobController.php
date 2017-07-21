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

    public function behaviors(){
        return[
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'edit', 'delete'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ]
        ];
    }

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
      $job = new Job();

            if ($job->load(Yii::$app->request->post())) {
                if ($job->validate()) {
                //Save the form data
                    $job->save();
                //show Message
                    Yii::$app->getSession()->setFlash('success', 'Job Added');
                    //redirect
                    return $this->redirect('index.php?r=job');
                }
            }

            return $this->render('create', [
            'job' => $job,
            ]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);

         if(Yii::$app->user->identity->id != $job->user_id){
                return $this->redirect('index.php?r=job');
        }

        $job->delete();
        //show message
        Yii::$app->getSession()->setFlash('success', 'Job Deleted');
        //redirect
        return $this->redirect('index.php?r=job');
        
    }

    public function actionEdit($id){
        $job = Job::findOne($id);
        //check job->id == user->id
        if(Yii::$app->user->identity->id != $job->user_id){
                return $this->redirect('index.php?r=job');
        }
         if ($job->load(Yii::$app->request->post())) {
                if ($job->validate()) {
                //Save the form data
                    $job->save();
                //show Message
                    Yii::$app->getSession()->setFlash('success', 'Job Updated');
                    //redirect
                    return $this->redirect('index.php?r=job');
                }
            }

            return $this->render('edit', [
            'job' => $job,
            ]);
    }

    

}
