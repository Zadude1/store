<?php

///////////////////////////////////////////
//                                       //
// دالة التحويل من أرقام إلى حروف عربية  //
//                                       //
//               برمجة                   //
//    عدنــان عبـدالرحمن - ميــلاد -      //
///////////////////////////////////////////



function numtoarb($total)
{
    // Explode total into parts if it has decimal
    $total = explode(".", $total);
    $j = strlen($total[0]);
    $je = $j;
    $je--;
    $de = 1;
    for ($i = 1; $i < $j; $i++) {
        $de = $de * 10;
    }

    $t = $total[0];

    // Loop through each digit of the number
    for ($i = 0; $i < $j; $i++) {
        $te[$je] = $t / $de;
        $t = $t % $de;
        $de = $de / 10;

        // Extract the integer part
        $temp = explode(".", $te[$je]);
        $te[$je] = $temp[0];
        $je--;
    }


for($i=0;$i<$j;$i++)
{
if ($i == 0)
{
if ($j<3)
switch($te[$i])
{
case "0" : $arb[0]=" ";
break;
case "1" :  $arb[0]= " واحد"  ;
break;
case "2" : if($te[1]=="1") $arb[0]=" اثنا "; else $arb[0]=" اثنان" ;
break;
case "3" : $arb[0]=" ثلاثة";
break;
case "4" : $arb[0]=" اربعة" ;
break;
case "5" : $arb[0]=" خمسة"   ;
break;
case "6" : $arb[0]=" ستة"     ;
break;
case "7" : $arb[0]=" سبعة"     ;
break;
case "8" : $arb[0]=" ثمانية"    ;
break;
case "9" : $arb[0]=" تسعة"       ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[0]=" ";
break;
case "1" :  $arb[0]=" وواحد"  ;
break;
case "2" : if($te[1]=="1") $arb[0]=" واثنا "; else $arb[0]=" واثنان" ;
break;
case "3" : $arb[0]=" وثلاثة";
break;
case "4" : $arb[0]=" واربعة" ;
break;
case "5" : $arb[0]=" وخمسة"   ;
break;
case "6" : $arb[0]=" وستة"     ;
break;
case "7" : $arb[0]=" وسبعة"     ;
break;
case "8" : $arb[0]=" وثمانية"    ;
break;
case "9" : $arb[0]=" وتسعة"       ;
break;
}
}



if ($i == 1)
{
if ($j==2 )
{
if($te[$i]==1){if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" أحد عشر";}  elseif($te[0]=="0")$arb[1]=" عشرة"; else $arb[1]=" عشر"    ; }
if ( $te[0]=="0")
switch($te[$i])
{
case "0" : $arb[1]=" "      ;
break;
case "1" : if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" أحد عشر";} elseif($te[0]=="0")$arb[1]=" عشرة"; else $arb[1]="عشر"    ;
break;
case "2" : $arb[1]=" عشرون"    ;
break;
case "3" : $arb[1]=" ثلاثون"    ;
break;
case "4" : $arb[1]=" اربعون"     ;
break;
case "5" : $arb[1]=" خمسون"       ;
break;
case "6" : $arb[1]=" ستون"         ;
break;
case "7" : $arb[1]=" سبعون"         ;
break;
case "8" : $arb[1]=" ثمانون"         ;
break;
case "9" : $arb[1]=" تسعون"           ;
break;
}

}
else
switch($te[$i])
{
case "0" : $arb[1]=" "      ;
break;
case "1" : if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" وأحد عشر";}elseif($te[0]=="0")$arb[1]=" وعشرة"; else $arb[1]=" عشر"  ;
break;
case "2" : $arb[1]=" وعشرون"    ;
break;
case "3" : $arb[1]=" وثلاثون"    ;
break;
case "4" : $arb[1]=" واربعون"     ;
break;
case "5" : $arb[1]=" وخمسون"       ;
break;
case "6" : $arb[1]=" وستون"         ;
break;
case "7" : $arb[1]=" وسبعون"         ;
break;
case "8" : $arb[1]=" وثمانون"         ;
break;
case "9" : $arb[1]=" وتسعون"           ;
break;
}
}


if ($i == 2)
{
if ($j==3)
switch($te[$i])
{
case "0" : $arb[2]=" "      ;
break;
case "1" : $arb[2]=" مائة"    ;
break;
case "2" : $arb[2]=" مائتان"    ;
break;
case "3" : $arb[2]=" ثلاثمائة"    ;
break;
case "4" : $arb[2]=" اربعمائة"     ;
break;
case "5" : $arb[2]=" خمسمائة"       ;
break;
case "6" : $arb[2]=" ستمائة"         ;
break;
case "7" : $arb[2]=" سبعمائة"         ;
break;
case "8" : $arb[2]=" ثمانمائة"         ;
break;
case "9" : $arb[2]=" تسعمائة"           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[2]=" "      ;
break;
case "1" : $arb[2]=" ومائة"    ;
break;
case "2" : $arb[2]=" ومائتان"    ;
break;
case "3" : $arb[2]=" وثلاثمائة"    ;
break;
case "4" : $arb[2]=" واربعمائة"     ;
break;
case "5" : $arb[2]=" وخمسمائة"       ;
break;
case "6" : $arb[2]=" وستمائة"         ;
break;
case "7" : $arb[2]=" وسبعمائة"         ;
break;
case "8" : $arb[2]=" وثمانمائة"         ;
break;
case "9" : $arb[2]=" وتسعمائة"           ;
break;
}
}

if ($i == 3)
{
if($j==4)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" ألف"    ;
break;
case "2" : $arb[$i]=" ألفان"    ;
break;
case "3" : $arb[$i]=" ثلاثة آلاف"    ;
break;
case "4" : $arb[$i]=" اربعة آلاف"     ;
break;
case "5" : $arb[$i]=" خمسة آلاف"       ;
break;
case "6" : $arb[$i]=" ستة آلاف"         ;
break;
case "7" : $arb[$i]=" سبعة آلاف"         ;
break;
case "8" : $arb[$i]=" ثمانية آلاف "         ;
break;
case "9" : $arb[$i]=" تسعة آلاف "           ;
break;
}
elseif ($j==5)

switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" واحد "    ;
break;
case "2" : if($te[6]=="1") $arb[$i]=" اثنا "; else $arb[$i]=" اثنان" ;
break;
case "3" : $arb[$i]=" ثلاثة "    ;
break;
case "4" : $arb[$i]=" اربعة "     ;
break;
case "5" : $arb[$i]=" خمسة "       ;
break;
case "6" : $arb[$i]=" ستة "         ;
break;
case "7" : $arb[$i]=" سبعة "         ;
break;
case "8" : $arb[$i]=" ثمانية "         ;
break;
case "9" : $arb[$i]=" تسعة "           ;
}

else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" وواحد "    ;
break;
case "2" : if($te[4]=="1") $arb[$i]=" واثنا "; else $arb[$i]=" واثنان" ;
break;
case "3" : $arb[$i]=" وثلاثة "    ;
break;
case "4" : $arb[$i]=" واربعة "      ;
break;
case "5" : $arb[$i]=" وخمسة "       ;
break;
case "6" : $arb[$i]=" وستة "         ;
break;
case "7" : $arb[$i]=" وسبعة "         ;
break;
case "8" : $arb[$i]=" وثمانية "         ;
break;
case "9" : $arb[$i]=" وتسعة "           ;
}
}
if ($i == 4)
{
if($j==5 )
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : if($te[3]=="1") {$arb[3]=" " ;$arb[4]=" أحد عشر الفا";} elseif($te[3]=="0")$arb[4]=" عشرة آلاف";else$arb[$i]=" عشر الفا"    ;
break;
case "2" : $arb[$i]=" عشرون "    ;
break;
case "3" : $arb[$i]=" ثلاثون "    ;
break;
case "4" : $arb[$i]=" اربعون "     ;
break;
case "5" : $arb[$i]=" خمسون "       ;
break;
case "6" : $arb[$i]=" ستون "         ;
break;
case "7" : $arb[$i]=" سبعون "         ;
break;
case "8" : $arb[$i]=" ثمانون "         ;
break;
case "9" : $arb[$i]=" تسعون "           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : if($te[3]=="1") {$arb[3]=" " ;$arb[4]=" وأحد عشر الفا";} elseif($te[3]=="0")$arb[4]=" وعشرة آلاف";else$arb[$i]=" عشر الفا"    ;
break;
case "2" : $arb[$i]=" وعشرون "     ;
break;
case "3" : $arb[$i]=" وثلاثون "    ;
break;
case "4" : $arb[$i]=" واربعون "     ;
break;
case "5" : $arb[$i]=" وخمسون "       ;
break;
case "6" : $arb[$i]=" وستون "         ;
break;
case "7" : $arb[$i]=" وسبعون "         ;
break;
case "8" : $arb[$i]=" وثمانون "         ;
break;
case "9" : $arb[$i]=" وتسعون "           ;
break;
}
}
if ($i == 5)
{
if ($j==6)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" مائة "    ;
break;
case "2" : $arb[$i]=" مائتان "    ;
break;
case "3" : $arb[$i]=" ثلاثمائة "    ;
break;
case "4" : $arb[$i]=" اربعمائة "     ;
break;
case "5" : $arb[$i]=" خمسمائة "       ;
break;
case "6" : $arb[$i]=" ستمائة "         ;
break;
case "7" : $arb[$i]=" سبعمائة "           ;
break;
case "8" : $arb[$i]=" ثمانمائة "         ;
break;
case "9" : $arb[$i]=" تسعمائة "           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" ومائة "    ;
break;
case "2" : $arb[$i]=" ومائتان "    ;
break;
case "3" : $arb[$i]=" وثلاثمائة "    ;
break;
case "4" : $arb[$i]=" واربعمائة "     ;
break;
case "5" : $arb[$i]=" وخمسمائة "       ;
break;
case "6" : $arb[$i]=" وستمائة "         ;
break;
case "7" : $arb[$i]=" وسبعمائة "           ;
break;
case "8" : $arb[$i]=" وثمانمائة "         ;
break;
case "9" : $arb[$i]=" وتسعمائة "           ;
break;
}
}

if ($i == 6)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" مليون "    ;
break;
case "2" : $arb[$i]=" مليونان "    ;
break;
case "3" : $arb[$i]=" ثلاثة ملايين "    ;
break;
case "4" : $arb[$i]=" اربعة ملايين "     ;
break;
case "5" : $arb[$i]=" خمسة ملايين "       ;
break;
case "6" : $arb[$i]=" تة ملايين "         ;
break;
case "7" : $arb[$i]=" سبعة ملايين "           ;
break;
case "8" : $arb[$i]=" ثمانية ملايين "         ;
break;
case "9" : $arb[$i]=" تسعة ملايين "           ;
break;
}
}
if ($i == 7) {
    switch ($te[$i]) {
        case "0":
            $arb[$i] = " ";
            break;
        case "1":
            $arb[$i] = " عشرة ملايين ";
            break;
        case "2":
            $arb[$i] = " عشرون مليون ";
            break;
        case "3":
            $arb[$i] = " ثلاثون مليون ";
            break;
        case "4":
            $arb[$i] = " اربعون مليون ";
            break;
        case "5":
            $arb[$i] = " خمسون مليون ";
            break;
        case "6":
            $arb[$i] = " ستون مليون ";
            break;
        case "7":
            $arb[$i] = " سبعون مليون ";
            break;
        case "8":
            $arb[$i] = " ثمانون مليون ";
            break;
        case "9":
            $arb[$i] = " تسعون مليون ";
            break;
    }
}

if ($i == 8) {
    switch ($te[$i]) {
        case "0":
            $arb[$i] = " ";
            break;
        case "1":
            $arb[$i] = " مائة مليون ";
            break;
        case "2":
            $arb[$i] = " مائتان مليون ";
            break;
        case "3":
            $arb[$i] = " ثلاثمائة مليون ";
            break;
        case "4":
            $arb[$i] = " اربعمائة مليون ";
            break;
        case "5":
            $arb[$i] = " خمسمائة مليون ";
            break;
        case "6":
            $arb[$i] = " ستمائة مليون ";
            break;
        case "7":
            $arb[$i] = " سبعمائة مليون ";
            break;
        case "8":
            $arb[$i] = " ثمانمائة مليون ";
            break;
        case "9":
            $arb[$i] = " تسعمائة مليون ";
            break;
    }
}

if ($i == 9) {
    switch ($te[$i]) {
        case "0":
            $arb[$i] = " ";
            break;
        case "1":
            $arb[$i] = " مليار ";
            break;
        case "2":
            $arb[$i] = " ملياران ";
            break;
        case "3":
            $arb[$i] = " ثلاثة مليارات ";
            break;
        case "4":
            $arb[$i] = " اربعة مليارات ";
            break;
        case "5":
            $arb[$i] = " خمسة مليارات ";
            break;
        case "6":
            $arb[$i] = " ستة مليارات ";
            break;
        case "7":
            $arb[$i] = " سبعة مليارات ";
            break;
        case "8":
            $arb[$i] = " ثمانية مليارات ";
            break;
        case "9":
            $arb[$i] = " تسعة مليارات ";
            break;
    }
}

if ($i == 10) {
    switch ($te[$i]) {
        case "0":
            $arb[$i] = " ";
            break;
        case "1":
            $arb[$i] = " عشرة مليارات ";
            break;
        case "2":
            $arb[$i] = " عشرون مليار ";
            break;
        case "3":
            $arb[$i] = " ثلاثون مليار ";
            break;
        case "4":
            $arb[$i] = " اربعون مليار ";
            break;
        case "5":
            $arb[$i] = " خمسون مليار ";
            break;
        case "6":
            $arb[$i] = " ستون مليار ";
            break;
        case "7":
            $arb[$i] = " سبعون مليار ";
            break;
        case "8":
            $arb[$i] = " ثمانون مليار ";
            break;
        case "9":
            $arb[$i] = " تسعون مليار ";
            break;
    }
}

if ($i == 11) {
    switch ($te[$i]) {
        case "0":
            $arb[$i] = " ";
            break;
        case "1":
            $arb[$i] = " مائة مليار ";
            break;
        case "2":
            $arb[$i] = " مائتان مليار ";
            break;
        case "3":
            $arb[$i] = " ثلاثمائة مليار ";
            break;
        case "4":
            $arb[$i] = " اربعمائة مليار ";
            break;
        case "5":
            $arb[$i] = " خمسمائة مليار ";
            break;
        case "6":
            $arb[$i] = " ستمائة مليار ";
            break;
        case "7":
            $arb[$i] = " سبعمائة مليار ";
            break;
        case "8":
            $arb[$i] = " ثمانمائة مليار ";
            break;
        case "9":
            $arb[$i] = " تسعمائة مليار ";
            break;
    }
}

if ($j > 4 && $te[4] != "1") {
    $arb[4] = $arb[4] . " الف ";
}

$strarb = $arb[10] . $arb[9] . $arb[8] . $arb[7] . $arb[6] . $arb[5] . $arb[4] . $arb[3] . $arb[2] . $arb[1] . $arb[0];
return $strarb;
}
?>
</body>

</html>





