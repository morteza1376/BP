<?php


function calculateBMI($height, $weight, $precision = 1) {
    $h_meter = $height/100;
    
    return round(($weight)/(pow($h_meter, 2)), $precision);
}

function explainBMI($BMI) {
    if($BMI < 18.5):
        $msg = "شما دچار کمبود وزن هستید!";
        $color_code = "#93B4D7";
    elseif(18.5 <= $BMI && $BMI <= 24.9):
        $msg = "شما نرمال هستید!";
        $color_code = "#8FC69F";
    elseif(25 <= $BMI && $BMI <= 29.9):
        $msg = "شما دچار اضافه وزن هستید!";
        $color_code = "#F9D648";
    elseif(30 <= $BMI && $BMI <= 34.9):
        $msg = "شما دچار چاقی هستید!";
        $color_code = "#E4985E";
    elseif(35 <= $BMI):
        $msg = "شما دچار چاقی شدید هستید!";
        $color_code = "#D65C5B";
    else:
        $msg = "خطا در ورودی!";
        $color_code = "#EEEEEE";
    endif;

    return [
        'message' => $msg,
        'color' => $color_code
    ];
}

function explainGender($gender, $lang = 'en') {
    if(!($lang == 'en' || $lang == 'fa')) {
        return 'خطا در ورودی';
    }

    if(!($gender == '0' || $gender == '1')) {
        return 'خطا در ورودی';
    }

    $genderInfo = [
        'fa' => [
            'مرد','زن'
        ],
        'en' => [
            'male','female'
        ]
    ];
    return $genderInfo[$lang][$gender];
}

function calculateHealthStatus() {
    return 0;
}

function explainBP($bp, $systolicOrDiastolic) {
    $messages = [
        'خطا',
        'فشارخون بیش از حد پایین است',
        'فشارخون نرمال است',
        'مرز فشار خون بالا',
        'ابتلا به فشارخون بالا (متوسط)',
        'فشارخون بسیار بالاست',
        'فشارخون بحرانی'
    ];

    $colors = [
        'grey',
        'lightblue',
        'lightgreen',
        'yellow',
        'orange',
        'red',
        'purple'
    ];

    if($systolicOrDiastolic === 's') { //systolic
        if ($bp <= 90) {
            $index = 1;
        } elseif($bp > 90 && $bp <= 120) {
            $index = 2;
        } elseif($bp > 120 && $bp < 140) {
            $index = 3;
        } elseif($bp >= 140 && $bp < 160) {
            $index = 4;
        } elseif($bp >= 160 && $bp < 180) {
            $index = 5;
        } elseif($bp >= 180) {
            $index = 6;
        } else {
            $index = 0;
        }
    } elseif($systolicOrDiastolic === 'd') { //diastolic
        if ($bp <= 60) {
            $index = 1;
        } elseif($bp > 60 && $bp <= 80) {
            $index = 2;
        } elseif($bp > 80 && $bp < 90) {
            $index = 3;
        } elseif($bp >= 90 && $bp < 100) {
            $index = 4;
        } elseif($bp >= 100 && $bp < 120) {
            $index = 5;
        } elseif($bp >= 120) {
            $index = 6;
        } else {
            $index = 0;
        }
    } else {

    }

    $returnArray = [
        'index' => $index,
        'color' => $colors[$index],
        'message' => $messages[$index]
    ];

    return $returnArray;
}

function getBloodPressureReport($bp,$mode) {
    if($mode == 'd' || $mode == 's') {
        $index = explainBP($bp,$mode)['index'];
        switch ($index) {
            case 0:
                $report = 'خطا در گزارشدهی';
                break;
            case 1:
                $report = 'بیمار فشارخون %val% پایینی دارد و ممکن است دچار سرگیجه و در موارد شدید تشنج شود';
                break;
            case 2:
                $report = 'فشارخون %val% بیمار در محدوده نرمال قرار دارد';
                break;
            case 3:
                $report = 'بیمار در مرز فشارخون (%val%) بالا قرار دارد، به بیمار ورزش و مصرف کم نمک در رژیم غذایی توصیه می شود و فشار بیمار همچنان چک شود';
                break;
            case 4:
                $report = 'فشار خون %val% بیمار بالاست، به بیمار مصرف دارو به طور منظم و ورزش و رعایت مصرف نمک توصیه می شود';
                break;
            case 5:
                $report = 'فشارخون %val% بیمار بسیار بالاست، حتما اقدامات لازم برای کاهش فشارخون انجام گیرد';
                break;
            case 6:
                $report = 'فشارخون %val% بیمار در محدوده بحرانی قرار دارد، حتما فشار بیمار باید کنترل شود و در صورت نیاز بستری گردد، خطر سکته وجود دارد';
                break;
        }

        if($mode == 's') {
            $report = str_replace('%val%','سیستولیک',$report);
        } elseif($mode == 'd') {
            $report = str_replace('%val%','دیاستولیک',$report);
        }

        return $report;
    }
}