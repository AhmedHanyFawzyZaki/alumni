<?php

class HomeController extends FrontendController {

    /**
     * Displays the landing page
     */
    public function actionIndex() {
        $news = News::model()->findAll(array('condition' => 'active=1', 'limit' => 6, 'order' => 'news_id desc'));
        $events = Event::model()->findAll(array('condition' => 'active=1', 'limit' => 3, 'order' => 'event_id desc'));
        $this->render('index', array('news' => $news, 'events' => $events));
    }

    public function actionNews() {
        $news = News::model()->findAll(array('condition' => 'active=1', 'limit' => 50, 'order' => 'news_id desc'));
        $this->render('news', array('news' => $news));
    }

    public function actionNewsDetails($slug) {
        $model = News::model()->findByAttributes(array('news_url' => $slug));
        $this->render('newsDetails', array('model' => $model));
    }

    public function actionEvents() {
        $events = Event::model()->findAll(array('condition' => 'active=1', 'limit' => 50, 'order' => 'event_id desc'));
        $this->render('events', array('events' => $events));
    }

    public function actionEventDetails($slug) {
        $model = Event::model()->findByAttributes(array('event_url' => $slug));
        $going = EventParticipant::model()->countByAttributes(array('event_id' => $model->event_id, 'participant_status' => Yii::app()->params['GoingStatus']));
        $interested = EventParticipant::model()->countByAttributes(array('event_id' => $model->event_id, 'participant_status' => Yii::app()->params['InterestedStatus']));


        $isGoing = Yii::t('t', 'Going');
        $isInterested = Yii::t('t', 'Interested');
        $part = EventParticipant::model()->findByAttributes(array('event_id' => $model->event_id, 'participant_id' => Yii::app()->user->id));
        if ($part) {
            $isGoing .= $part->participant_status == Yii::app()->params['GoingStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $part->participant_status == Yii::app()->params['InterestedStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
        }
        $this->render('eventDetails', array(
            'model' => $model,
            'going' => $going,
            'interested' => $interested,
            'isGoing' => $isGoing,
            'isInterested' => $isInterested
        ));
    }

    public function actionEventParticipate() {
        if (Yii::app()->user->isGuest) {
            echo json_encode(array('status' => 2, 'msg' => Yii::t('t', 'Please Login Inorder To Participate!')));
        } else {
            $isGoing = Yii::t('t', 'Going');
            $isInterested = Yii::t('t', 'Interested');
            $isGoing .= $_POST['status'] == 'Going' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $_POST['status'] == 'Interested' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $continue = 1;
            $event = Event::model()->findByAttributes(array('event_url' => $_POST['event']));
            if ($event) {
                $part = EventParticipant::model()->findByAttributes(array('event_id' => $event->event_id, 'participant_id' => Yii::app()->user->id));
                if ($part) {
                    if ($part->participant_status == Yii::app()->params[$_POST['status'] . 'Status']) {
                        $part->delete();
                        $continue = 0;
                        $isGoing = Yii::t('t', 'Going');
                        $isInterested = Yii::t('t', 'Interested');
                    }
                } else {
                    $part = new EventParticipant();
                }
                if ($continue) {
                    $part->participant_id = Yii::app()->user->id;
                    $part->event_id = $event->event_id;
                    $part->participant_status = Yii::app()->params[$_POST['status'] . 'Status'];
                    $part->save();
                }
                $going = EventParticipant::model()->countByAttributes(array('event_id' => $event->event_id, 'participant_status' => Yii::app()->params['GoingStatus']));
                $interested = EventParticipant::model()->countByAttributes(array('event_id' => $event->event_id, 'participant_status' => Yii::app()->params['InterestedStatus']));
                echo json_encode(array(
                    'status' => 1,
                    'going' => $going,
                    'interested' => $interested,
                    'isGoing' => $isGoing,
                    'isInterested' => $isInterested
                ));
            }
        }
    }

    public function actionWork() {
        $works = VolunteerWork::model()->findAll(array('condition' => 'active=1', 'limit' => 50, 'order' => 'volunteer_work_id desc'));
        $this->render('work', array('works' => $works));
    }

    public function actionWorkDetails($slug) {
        $model = VolunteerWork::model()->findByAttributes(array('volunteer_work_url' => $slug));
        $going = VolunteerWorkParticipant::model()->countByAttributes(array('volunteer_work_id' => $model->volunteer_work_id, 'participant_status' => Yii::app()->params['GoingStatus']));
        $interested = VolunteerWorkParticipant::model()->countByAttributes(array('volunteer_work_id' => $model->volunteer_work_id, 'participant_status' => Yii::app()->params['InterestedStatus']));


        $isGoing = Yii::t('t', 'Going');
        $isInterested = Yii::t('t', 'Interested');
        $part = VolunteerWorkParticipant::model()->findByAttributes(array('volunteer_work_id' => $model->volunteer_work_id, 'participant_id' => Yii::app()->user->id));
        if ($part) {
            $isGoing .= $part->participant_status == Yii::app()->params['GoingStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $part->participant_status == Yii::app()->params['InterestedStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
        }
        $this->render('workDetails', array(
            'model' => $model,
            'going' => $going,
            'interested' => $interested,
            'isGoing' => $isGoing,
            'isInterested' => $isInterested
        ));
    }

    public function actionWorkParticipate() {
        if (Yii::app()->user->isGuest) {
            echo json_encode(array('status' => 2, 'msg' => Yii::t('t', 'Please Login Inorder To Participate!')));
        } else {
            $isGoing = Yii::t('t', 'Going');
            $isInterested = Yii::t('t', 'Interested');
            $isGoing .= $_POST['status'] == 'Going' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $_POST['status'] == 'Interested' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $continue = 1;
            $work = VolunteerWork::model()->findByAttributes(array('volunteer_work_url' => $_POST['work']));
            if ($work) {
                $part = VolunteerWorkParticipant::model()->findByAttributes(array('volunteer_work_id' => $work->volunteer_work_id, 'participant_id' => Yii::app()->user->id));
                if ($part) {
                    if ($part->participant_status == Yii::app()->params[$_POST['status'] . 'Status']) {
                        $part->delete();
                        $continue = 0;
                        $isGoing = Yii::t('t', 'Going');
                        $isInterested = Yii::t('t', 'Interested');
                    }
                } else {
                    $part = new VolunteerWorkParticipant();
                }
                if ($continue) {
                    $part->participant_id = Yii::app()->user->id;
                    $part->volunteer_work_id = $work->volunteer_work_id;
                    $part->participant_status = Yii::app()->params[$_POST['status'] . 'Status'];
                    $part->save();
                }
                $going = VolunteerWorkParticipant::model()->countByAttributes(array('volunteer_work_id' => $work->volunteer_work_id, 'participant_status' => Yii::app()->params['GoingStatus']));
                $interested = VolunteerWorkParticipant::model()->countByAttributes(array('volunteer_work_id' => $work->volunteer_work_id, 'participant_status' => Yii::app()->params['InterestedStatus']));
                echo json_encode(array(
                    'status' => 1,
                    'going' => $going,
                    'interested' => $interested,
                    'isGoing' => $isGoing,
                    'isInterested' => $isInterested
                ));
            }
        }
    }

    public function actionCourses() {
        $courses = TrainingCourse::model()->findAll(array('condition' => 'active=1', 'limit' => 50, 'order' => 'training_course_id desc'));
        $this->render('courses', array('courses' => $courses));
    }

    public function actionCourseDetails($slug) {
        $model = TrainingCourse::model()->findByAttributes(array('training_course_url' => $slug));
        $going = TrainingCourseParticipant::model()->countByAttributes(array('training_course_id' => $model->training_course_id, 'participant_status' => Yii::app()->params['GoingStatus']));
        $interested = TrainingCourseParticipant::model()->countByAttributes(array('training_course_id' => $model->training_course_id, 'participant_status' => Yii::app()->params['InterestedStatus']));


        $isGoing = Yii::t('t', 'Going');
        $isInterested = Yii::t('t', 'Interested');
        $part = TrainingCourseParticipant::model()->findByAttributes(array('training_course_id' => $model->training_course_id, 'participant_id' => Yii::app()->user->id));
        if ($part) {
            $isGoing .= $part->participant_status == Yii::app()->params['GoingStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $part->participant_status == Yii::app()->params['InterestedStatus'] ? ' <i class="fa fa-thumbs-up"></i>' : '';
        }
        $this->render('courseDetails', array(
            'model' => $model,
            'going' => $going,
            'interested' => $interested,
            'isGoing' => $isGoing,
            'isInterested' => $isInterested
        ));
    }

    public function actionCourseParticipate() {
        if (Yii::app()->user->isGuest) {
            echo json_encode(array('status' => 2, 'msg' => Yii::t('t', 'Please Login Inorder To Participate!')));
        } else {
            $isGoing = Yii::t('t', 'Going');
            $isInterested = Yii::t('t', 'Interested');
            $isGoing .= $_POST['status'] == 'Going' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $isInterested .= $_POST['status'] == 'Interested' ? ' <i class="fa fa-thumbs-up"></i>' : '';
            $continue = 1;
            $course = TrainingCourse::model()->findByAttributes(array('training_course_url' => $_POST['course']));
            if ($course) {
                $part = TrainingCourseParticipant::model()->findByAttributes(array('training_course_id' => $course->training_course_id, 'participant_id' => Yii::app()->user->id));
                if ($part) {
                    if ($part->participant_status == Yii::app()->params[$_POST['status'] . 'Status']) {
                        $part->delete();
                        $continue = 0;
                        $isGoing = Yii::t('t', 'Going');
                        $isInterested = Yii::t('t', 'Interested');
                    }
                } else {
                    $part = new TrainingCourseParticipant();
                }
                if ($continue) {
                    $part->participant_id = Yii::app()->user->id;
                    $part->training_course_id = $course->training_course_id;
                    $part->participant_status = Yii::app()->params[$_POST['status'] . 'Status'];
                    $part->save();
                }
                $going = TrainingCourseParticipant::model()->countByAttributes(array('training_course_id' => $course->training_course_id, 'participant_status' => Yii::app()->params['GoingStatus']));
                $interested = TrainingCourseParticipant::model()->countByAttributes(array('training_course_id' => $course->training_course_id, 'participant_status' => Yii::app()->params['InterestedStatus']));
                echo json_encode(array(
                    'status' => 1,
                    'going' => $going,
                    'interested' => $interested,
                    'isGoing' => $isGoing,
                    'isInterested' => $isInterested
                ));
            }
        }
    }

    public function actionPage($slug) {
        $model = Page::model()->findByAttributes(array(
            'page_url' => $slug
        ));
        $this->render('page', array('model' => $model));
    }

    public function actionSearch() {
        $q = strtolower(htmlspecialchars(trim($_GET['q'])));
        $news = News::model()->findAll(array('condition' => 'active=1 and (lower(news_name) like "%' . $q . '%" OR news_name_ar like "%' . $q . '%")', 'limit' => 50, 'order' => 'news_id desc'));
        $events = Event::model()->findAll(array('condition' => 'active=1 and (lower(event_name) like "%' . $q . '%" OR event_name_ar like "%' . $q . '%")', 'limit' => 50, 'order' => 'event_id desc'));
        $works = VolunteerWork::model()->findAll(array('condition' => 'active=1 and (lower(volunteer_work_name) like "%' . $q . '%" OR volunteer_work_name_ar like "%' . $q . '%")', 'limit' => 50, 'order' => 'volunteer_work_id desc'));
        $courses = TrainingCourse::model()->findAll(array('condition' => 'active=1 and (lower(training_course_name) like "%' . $q . '%" OR training_course_name_ar like "%' . $q . '%")', 'limit' => 50, 'order' => 'training_course_id desc'));
        $groups = Group::model()->findAll(array('condition' => 'lower(group_name) like "%' . $q . '%"', 'limit' => 50, 'order' => 'group_id desc'));

        $users = User::model()->findAll(
                array(
                    'condition' => 'user_type_id = ' . Yii::app()->params['Normal'] . ' and (lower(user_name) like "%' . $q . '%" OR lower(graduation_year) like "%' . $q . '%" OR lower(major) like "%' . $q . '%")',
                    'limit' => 50,
                    'order' => 'user_id desc',
                )
        );
        $this->render('search', array(
            'news' => $news,
            'events' => $events,
            'works' => $works,
            'courses' => $courses,
            'groups' => $groups,
            'users' => $users
        ));
    }

    public function actionGroups() {
        $groups = Group::model()->findAll(array('limit' => 50, 'order' => 'group_id desc'));
        $this->render('groups', array('groups' => $groups));
    }

    public function actionCreateGroup() {
        $model = new Group();
        $model->attributes = $_POST['Group'];
        $model->created_by = Yii::app()->user->id;
        $rnd = rand(0, 9999);  // generate random number between 0-9999
        $uploadedFile = CUploadedFile::getInstance($model, 'image');

        if (!empty($uploadedFile)) {
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
            $uploadedFile->saveAs(Yii::app()->basePath . '/../files/uploads/groups/' . $fileName);
        }
        if ($model->save()) {
            $participant = new GroupParticipant;
            $participant->group_id = $model->group_id;
            $participant->participant_id = $model->created_by;
            $participant->save();
            Yii::app()->user->setFlash('success', Yii::t('t', 'Done! You have create a new group successfully.'));
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0, 'errors' => CHtml::errorSummary($model)));
        }
    }

    public function actionGroupRoom($id) {
        if (Yii::app()->user->isGuest) {
            Yii::app()->user->setFlash('wrong', Yii::t('t', 'Sorry! Please login to view this group.'));
            $this->redirect(array('index'));
        } else {
            $model = Group::model()->findByAttributes(array('group_id' => $id));
            $isJoined = GroupParticipant::model()->countByAttributes(array('group_id' => $model->group_id, 'participant_id' => Yii::app()->user->id));
            if ($isJoined < 1) {
                $participant = new GroupParticipant;
                $participant->group_id = $model->group_id;
                $participant->participant_id = Yii::app()->user->id;
                $participant->save();
            }
            $chats = GroupChat::model()->findAll(array('condition' => 'group_id=' . $model->group_id, 'order' => 'group_chat_id desc'));
            $this->render('groupRoom', array('model' => $model, 'chats' => $chats));
        }
    }

    public function actionLeaveGroup($id) {
        if (Yii::app()->user->isGuest) {
            throw new CHttpException(404, 'The requested page does not exist.');
        } else {
            $groupParticipant = GroupParticipant::model()->findByAttributes(
                    array('group_id' => $id, 'participant_id' => Yii::app()->user->id)
            );
            if ($groupParticipant) {
                Yii::app()->user->setFlash('success', Yii::t('t', 'Done! You have leaved the group successfully.'));
                $groupParticipant->delete();
                $this->redirect(array('index'));
            } else {
                throw new CHttpException(500, 'Bad Request.');
            }
        }
    }

    public function actionCheckChat($id) {
        if (Yii::app()->user->isGuest) {
            throw new CHttpException(404, 'The requested page does not exist.');
        } else {
            $chats = GroupChat::model()->findAll(array('condition' => 'group_id=' . $id, 'order' => 'group_chat_id desc'));
            ob_start();
            $this->renderPartial('//home/group-chat', array('chats' => $chats));
            $contents = ob_get_contents();
            ob_end_clean();
            $msg = $contents;
            echo json_encode(array('status' => 1, 'msg' => $msg));
        }
    }

    public function actionSendChat() {
        if (Yii::app()->user->isGuest) {
            throw new CHttpException(404, 'The requested page does not exist.');
        } else {
            $model = new GroupChat();
            $model->attributes = $_POST['GroupChat'];
            $model->user_id = Yii::app()->user->id;
            $model->date_created = date('Y-m-d H:i:s');
            if ($model->save()) {
                $chats = GroupChat::model()->findAll(array('condition' => 'group_id=' . $model->group_id, 'order' => 'group_chat_id desc'));
                ob_start();
                $this->renderPartial('//home/group-chat', array('chats' => $chats));
                $contents = ob_get_contents();
                ob_end_clean();
                $msg = $contents;
                echo json_encode(array('status' => 1, 'msg' => $msg));
            } else {
                echo json_encode(array('status' => 0, 'errors' => CHtml::errorSummary($model)));
            }
        }
    }

    /**
     * Change the current language
     */
    public function actionSetLanguage() {
        $lang = 'en';
        if (Yii::app()->language == 'en')
            $lang = 'ar';
        Yii::app()->user->setState('language', $lang);
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    /*
     * 
     */

    public function actionGetDescription() {
        if (isset($_POST['val'])) {
            $model = Project::model()->findByPk($_POST['val']);
            if ($model) {
                echo Yii::app()->language == 'ar' ? $model->description_ar : $model->description;
            }
        }
    }

    /**
     * Performs the AJAX validation.
     * @param Request $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'donator-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLogin() {
        $model = new LoginForm;

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (in_array(Yii::app()->user->usertype, array(Yii::app()->params['SuperAdmin'], Yii::app()->params['Admin']))) {
                    echo json_encode(array('status' => 1, 'path' => 'dashboard'));
                } else {
                    Yii::app()->user->setFlash('success', Yii::t('t', 'Welcome! You have logged in successfully.'));
                    echo json_encode(array('status' => 1, 'path' => 'home'));
                }
            } else {
                echo json_encode(array('status' => 0, 'msg' => Yii::t('t', 'Incorrect e-mail or password.')));
            }
        }
    }

    public function actionRegister() {
        $model = new User('register');
        $model->attributes = $_POST['User'];
        $model->user_type_id = Yii::app()->params['Normal'];

        $rnd = rand(0, 9999);  // generate random number between 0-9999
        $uploadedFile = CUploadedFile::getInstance($model, 'image');

        if (!empty($uploadedFile)) {
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
            $uploadedFile->saveAs(Yii::app()->basePath . '/../files/uploads/users/' . $fileName);
        }

        if ($model->save()) {
            //Yii::app()->user->setFlash('success', Yii::t('t', 'Welcome! You have registered successfully, the admin will activate your account soon.'));
            Yii::app()->user->setFlash('success', Yii::t('t', 'Welcome! You have registered successfully, please check your email to activate your account.'));
            $link = Yii::app()->request->getBaseUrl() . '/home/activate?code=' . urlencode(Helper::encryptAlgo($model->user_id));
            $message = Yii::t('t', 'To activate your account please click') .
                    ' <a href="' . $link . '">' . Yii::t('t', 'here') . '</a>, ' .
                    Yii::t('t', 'or copy and paste the following link to your browser.') . '<br>' . Yii::t('t', 'Link:') . ' ' .
                    $link;
            $sent = Helper::SendMail($model->email, Yii::t('t', 'Account activation'), $message, $model->user_name);
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0, 'errors' => CHtml::errorSummary($model)));
        }
    }

    public function actionActivate() {
        $id = Helper::decryptAlgo($_GET['code']);
        $model = User::model()->findByPk($id);
        if ($model) {
            $model->active = 1;
            $model->save();
            Yii::app()->user->setFlash('success', Yii::t('t', 'Done! Your account has been activated successfully.'));
            $this->redirect(array('index'));
        } else {
            throw new CHttpException(500, 'Bad Request.');
        }
    }

    public function actionForgotPassword() {
        $model = User::model()->findByAttributes(array('email' => $_POST['email']));
        if ($model) {
            $model->reset_password_code = $model->user_id . time();
            $link = Yii::app()->request->getBaseUrl() . '/home/resetPassword/' . $model->reset_password_code;
            $message = Yii::t('t', 'To reset your password please click') .
                    ' <a href="' . $link . '">' . Yii::t('t', 'here') . '</a>, ' .
                    Yii::t('t', 'or copy and paste the following link to your browser.') . '<br>' . Yii::t('t', 'Link:') . ' ' .
                    $link;
            $sent = Helper::SendMail($model->email, Yii::t('t', 'Password Reset'), $message, $model->user_name);
            if ($model->save() && $sent)
                Yii::app()->user->setFlash('success', Yii::t('t', 'Success! We have sent a password reset link to your email address.'));
            else
                Yii::app()->user->setFlash('wrong', Yii::t('t', 'Sorry! Our mailing server has went down, please try again later.'));
        } else {
            Yii::app()->user->setFlash('wrong', Yii::t('t', 'Sorry! The email address entered doesn\'t match any email in our database.'));
        }
        $this->redirect(array('index'));
    }

    public function actionResetPassword($id) {
        $model = User::model()->findByAttributes(array('reset_password_code' => $id));
        if (isset($_POST['User']) && $model) {
            $model->password = $_POST['User']['password'];
            $model->password_confirmation = $_POST['User']['password_confirmation'];
            $model->reset_password_code = NULL;
            if ($model->password !== $model->password_confirmation) {
                Yii::app()->user->setFlash('wrong', Yii::t('t', 'Wrong! Your password confirmation should match your password.'));
                $this->refresh();
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', Yii::t('t', 'Success! Your password has been changed successfully.'));
                $this->redirect(array('index'));
            }
        } elseif (!isset($_POST['User']) && $model) {
            $model->password = NULL;
            $this->render('reset-password', array('model' => $model));
        }
    }

    public function actionProfile($code = '') {
        if ($code)
            $id = Helper::decryptAlgo($code);
        elseif (!Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
        else
            throw new CHttpException(404, 'Request page not found.');
        $model = User::model()->findByPk($id);
        if ($model) {
            $works = VolunteerWork::model()->findAll(
                    array(
                        'condition' => 'active=1 and volunteer_work_id in(select volunteer_work_id from ' . VolunteerWorkParticipant::model()->tableName() . ' where participant_id=' . $model->user_id . ')',
                        'limit' => 50,
                        'order' => 'volunteer_work_id desc'
                    )
            );
            $courses = TrainingCourse::model()->findAll(
                    array(
                        'condition' => 'active=1 and training_course_id in(select training_course_id from ' . TrainingCourseParticipant::model()->tableName() . ' where participant_id=' . $model->user_id . ')',
                        'limit' => 50,
                        'order' => 'training_course_id desc'
                    )
            );
            $this->render('profile', array('user' => $model, 'courses' => $courses, 'works' => $works, 'isUpdate' => 0));
        } else {
            throw new CHttpException(500, 'Bad Request.');
        }
    }

    public function actionUpdateProfile() {
        if (!Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
        else
            throw new CHttpException(404, 'Request page not found.');
        $model = User::model()->findByPk($id);

        if ($model) {
            if (isset($_POST['User'])) {
                $model->attributes = $_POST['User'];
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', Yii::t('t', 'Done! Your profile has been updated successfully.'));
                    $this->redirect(array('profile'));
                }
            }
            $works = VolunteerWork::model()->findAll(
                    array(
                        'condition' => 'active=1 and volunteer_work_id in(select volunteer_work_id from ' . VolunteerWorkParticipant::model()->tableName() . ' where participant_id=' . $model->user_id . ')',
                        'limit' => 50,
                        'order' => 'volunteer_work_id desc'
                    )
            );
            $courses = TrainingCourse::model()->findAll(
                    array(
                        'condition' => 'active=1 and training_course_id in(select training_course_id from ' . TrainingCourseParticipant::model()->tableName() . ' where participant_id=' . $model->user_id . ')',
                        'limit' => 50,
                        'order' => 'training_course_id desc'
                    )
            );
            $this->render('profile', array('user' => $model, 'courses' => $courses, 'works' => $works, 'isUpdate' => 1));
        } else {
            throw new CHttpException(500, 'Bad Request.');
        }
    }

}
