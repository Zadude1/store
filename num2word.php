<?php

function convert_number($number, $sex) {
    if ($number < 0 || $number > 999999999999) {
        throw new Exception("العدد خارج النطاق");
    }
    
    $returner = "";
    $english_format_number = number_format($number);
    $array_number = explode(',', $english_format_number);

    for ($i = 0; $i < count($array_number); $i++) {
        $place = count($array_number) - $i;
        $returner .= convert($array_number[$i], $place, $sex);

        if (isset($array_number[$i + 1]) && $array_number[$i + 1] > 0) {
            $returner .= ' و';
        }
    }

    return $returner;
}

function convert($number, $place, $sex) {
    $words = [
        'male' => [
            '0' => '', '1' => 'واحد', '2' => 'اثنان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
            '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
            '11' => 'أحد عشر', '12' => 'اثنا عشر', '13' => 'ثلاثة عشر', '14' => 'أربعة عشر', '15' => 'خمسة عشر',
            '16' => 'ستة عشر', '17' => 'سبعة عشر', '18' => 'ثمانية عشر', '19' => 'تسعة عشر', '20' => 'عشرون',
            '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
            '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مئة', '200' => 'مئتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة', '500' => 'خمسمائة',
            '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
        ],
        'female' => [
            '0' => '', '1' => 'واحدة', '2' => 'اثنتان', '3' => 'ثلاث', '4' => 'أربع', '5' => 'خمس',
            '6' => 'ست', '7' => 'سبع', '8' => 'ثمان', '9' => 'تسع', '10' => 'عشر',
            '11' => 'إحدى عشرة', '12' => 'ثنتا عشرة', '13' => 'ثلاث عشرة', '14' => 'أربع عشرة', '15' => 'خمس عشرة',
            '16' => 'ست عشرة', '17' => 'سبع عشرة', '18' => 'ثمان عشرة', '19' => 'تسع عشرة', '20' => 'عشرون',
            '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
            '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مئة', '200' => 'مئتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة', '500' => 'خمسمائة',
            '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
        ]
    ];

    $mf = ['1' => $sex, '2' => 'male', '3' => 'male', '4' => 'male'];
    $number_length = strlen($number);

    if ($number == 0) {
        return '';
    } else if ($number[0] == 0) {
        if ($number[1] == 0) {
            $number = substr($number, -1);
        } else {
            $number = substr($number, -2);
        }
    }

    switch ($number_length) {
        case 1:
            switch ($place) {
                case 1:
                    $returner = $words[$mf[$place]][$number];
                    break;
                case 2:
                    if ($number == 1) {
                        $returner = 'ألف';
                    } else if ($number == 2) {
                        $returner = 'ألفان';
                    } else {
                        $returner = $words[$mf[$place]][$number] . ' آلاف';
                    }
                    break;
                case 3:
                    if ($number == 1) {
                        $returner = 'مليون';
                    } else if ($number == 2) {
                        $returner = 'مليونان';
                    } else {
                        $returner = $words[$mf[$place]][$number] . ' ملايين';
                    }
                    break;
                case 4:
                    if ($number == 1) {
                        $returner = 'مليار';
                    } else if ($number == 2) {
                        $returner = 'ملياران';
                    } else {
                        $returner = $words[$mf[$place]][$number] . ' مليارات';
                    }
                    break;
            }
            break;
        case 2:
            if (isset($words[$mf[$place]][$number])) {
                $returner = $words[$mf[$place]][$number];
            } else {
                $twoy = $number[0] * 10;
                $ony = $number[1];
                $returner = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
            }
            switch ($place) {
                case 2:
                    $returner .= ' ألف';
                    break;
                case 3:
                    $returner .= ' مليون';
                    break;
                case 4:
                    $returner .= ' مليار';
                    break;
            }
            break;
        case 3:
            if (isset($words[$mf[$place]][$number])) {
                $returner = $words[$mf[$place]][$number];
                if ($number == 200) {
                    $returner = 'مئتا';
                }
                switch ($place) {
                    case 2:
                        $returner .= ' ألف';
                        break;
                    case 3:
                        $returner .= ' مليون';
                        break;
                    case 4:
                        $returner .= ' مليار';
                        break;
                }
                return $returner;
            } else {
                $threey = (int)$number[0] * 100;
                if (isset($words[$mf[$place]][$threey])) {
                    $returner = $words[$mf[$place]][$threey];
                }
                $twoyony = (int)$number[1] * 10 + (int)$number[2];
                if ($twoyony == 2) {
                    switch ($place) {
                        case 1:
                            $twoyony = $words[$mf[$place]][2];
                            break;
                        case 2:
                            $twoyony = 'ألفان';
                            break;
                        case 3:
                            $twoyony = 'مليونان';
                            break;
                        case 4:
                            $twoyony = 'ملياران';
                            break;
                    }
                    if ($threey != 0) {
                        $twoyony = 'و' . $twoyony;
                    }
                    $returner = $returner . ' ' . $twoyony;
                } else if ($twoyony == 1) {
                    switch ($place) {
                        case 1:
                            $twoyony = $words[$mf[$place]][1];
                            break;
                        case 2:
                            $twoyony = 'ألف و';
                            break;
                        case 3:
                            $twoyony = 'مليون و';
                            break;
                        case 4:
                            $twoyony = 'مليار و';
                            break;
                    }
                    if ($threey != 0) {
                        $twoyony = 'و' . $twoyony;
                    }
                    $returner = $returner . ' ' . $twoyony;
                } else {
                    switch ($place) {
                        case 1:
                            $twoyony = $words[$mf[$place]][$twoyony];
                            break;
                        case 2:
                            $twoyony = $words[$mf[$place]][$twoyony];
                            break;
                        case 3:
                            $twoyony = $words[$mf[$place]][$twoyony];
                            break;
                        case 4:
                            $twoyony = $words[$mf[$place]][$twoyony];
                            break;
                    }
                    if ($threey != 0) {
                        $twoyony = 'و' . $twoyony;
                    }
                    $returner = $returner . ' ' . $twoyony;
                }
                switch ($place) {
                    case 2:
                        $returner = 'ألف' . $returner;
                        break;
                    case 3:
                        $returner = 'مليون' . $returner;
                        break;
                    case 4:
                        $returner = 'مليار' . $returner;
                        break;
                }
            }
            break;
    }
    return $returner;
}

// Example usage:\

?>
