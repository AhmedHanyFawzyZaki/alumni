<?php

class DashboardController extends BackendController {

    /**
     * Displays the landing page
     */
    public function actionIndex() {
        $this->render('index');
    }

    public function actionProfile() {
        $id = Yii::app()->user->id;
        $model = User::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                Yii::app()->user->setFlash('done', 'Your Information has been updated successfully.');
                $this->refresh();
            }
        }

        $this->render('update-user', array(
            'model' => $model,
        ));
    }

}
