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