<?php

class SettingsController extends BackendController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    /* public function actionCreate() {
      $model = new Settings;

      // Uncomment the following line if AJAX validation is needed
      // $this->performAjaxValidation($model);

      if (isset($_POST['Settings'])) {
      $model->attributes = $_POST['Settings'];
      if ($model->save())
      $this->redirect(array('view'
      , "id" => $model->id));
      }

      $this->render('create', array(
      'model' => $model,
      ));
      } */

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Settings'])) {
            $current_logo = $model->logo;
            $current_home_banner = $model->home_banner;
            $current_news_banner = $model->news_banner;
            $current_events_banner = $model->events_banner;
            $current_volunteer_work_banner = $model->volunteer_work_banner;
            $current_groups_banner = $model->groups_banner;
            $current_training_course_banner = $model->training_course_banner;
            $model->attributes = $_POST['Settings'];
            /*
             * logo
             */
            $uploadedlogo = CUploadedFile::getInstance($model, 'logo');
            if (!empty($uploadedlogo)) {
                if ($model->logo == '') {
                    $rndlogo = rand(0, 9999);
                    $logoName = "{$rndlogo}-{$uploadedlogo}";
                    $model->logo = $logoName;
                }

                $uploadedlogo->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->logo);
            } else {
                $model->logo = $current_logo;
            }
            
            /*
             * home banner
             */
            $uploadedhome_banner = CUploadedFile::getInstance($model, 'home_banner');
            if (!empty($uploadedhome_banner)) {
                if ($model->home_banner == '') {
                    $rndhome_banner = rand(0, 9999);
                    $home_bannerName = "{$rndhome_banner}-{$uploadedhome_banner}";
                    $model->home_banner = $home_bannerName;
                }

                $uploadedhome_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->home_banner);
            } else {
                $model->home_banner = $current_home_banner;
            }
            
            /*
             * news banner
             */
            $uploadednews_banner = CUploadedFile::getInstance($model, 'news_banner');
            if (!empty($uploadednews_banner)) {
                if ($model->news_banner == '') {
                    $rndnews_banner = rand(0, 9999);
                    $news_bannerName = "{$rndnews_banner}-{$uploadednews_banner}";
                    $model->news_banner = $news_bannerName;
                }

                $uploadednews_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->news_banner);
            } else {
                $model->news_banner = $current_news_banner;
            }
            
            /*
             * events banner
             */
            $uploadedevents_banner = CUploadedFile::getInstance($model, 'events_banner');
            if (!empty($uploadedevents_banner)) {
                if ($model->events_banner == '') {
                    $rndevents_banner = rand(0, 9999);
                    $events_bannerName = "{$rndevents_banner}-{$uploadedevents_banner}";
                    $model->events_banner = $events_bannerName;
                }

                $uploadedevents_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->events_banner);
            } else {
                $model->events_banner = $current_events_banner;
            }
            
            /*
             * volunteer work banner
             */
            $uploadedvolunteer_work_banner = CUploadedFile::getInstance($model, 'volunteer_work_banner');
            if (!empty($uploadedvolunteer_work_banner)) {
                if ($model->volunteer_work_banner == '') {
                    $rndvolunteer_work_banner = rand(0, 9999);
                    $volunteer_work_bannerName = "{$rndvolunteer_work_banner}-{$uploadedvolunteer_work_banner}";
                    $model->volunteer_work_banner = $volunteer_work_bannerName;
                }

                $uploadedvolunteer_work_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->volunteer_work_banner);
            } else {
                $model->volunteer_work_banner = $current_volunteer_work_banner;
            }
            
            /*
             * groups banner
             */
            $uploadedgroups_banner = CUploadedFile::getInstance($model, 'groups_banner');
            if (!empty($uploadedgroups_banner)) {
                if ($model->groups_banner == '') {
                    $rndgroups_banner = rand(0, 9999);
                    $groups_bannerName = "{$rndgroups_banner}-{$uploadedgroups_banner}";
                    $model->groups_banner = $groups_bannerName;
                }

                $uploadedgroups_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->groups_banner);
            } else {
                $model->groups_banner = $current_groups_banner;
            }
            
            /*
             * training course banner
             */
            $uploadedtraining_course_banner = CUploadedFile::getInstance($model, 'training_course_banner');
            if (!empty($uploadedtraining_course_banner)) {
                if ($model->training_course_banner == '') {
                    $rndtraining_course_banner = rand(0, 9999);
                    $training_course_bannerName = "{$rndtraining_course_banner}-{$uploadedtraining_course_banner}";
                    $model->training_course_banner = $training_course_bannerName;
                }

                $uploadedtraining_course_banner->saveAs(Yii::app()->basePath . '/../files/uploads/settings/' . $model->training_course_banner);
            } else {
                $model->training_course_banner = $current_training_course_banner;
            }
            
            if ($model->save())
                $this->redirect(array('view', "id" => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    /* public function actionDelete($id) {
      if (Yii::app()->request->isPostRequest) {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();

      // if AJAX request (triggered by deletion via index grid view), we should not redirect the browser
      if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
      } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
      } */

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('update', 'id' => 1));
        $model = new Settings('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Settings']))
            $model->attributes = $_GET['Settings'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Settings the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Settings::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Settings $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'settings-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
