<?php
/**
 * Написать функцию, заменяющую стандартную print_r()
 */


function myPrint_r($var)
{
    if (is_null($var)) {
        return 0;
    }

    if (!is_array($var)) {
        echo $var;
    }

    echo '
Array 
( ';


    foreach ($var as $key => $v) {

        if (is_array($v)) {
            echo "
    [$key] => Array
        (";

            myPrint_r1($v);

            echo "
         )
         ";
        } else {
            echo "
    [$key] => $var[$key]";
        }

    }
    echo "
)
";
}

function myPrint_r1($var1)
{


    foreach ($var1 as $key => $v) {
        static $pro = '               ';
        static $pro2 = '           ';


        if (is_array($v)) {


            echo "  
$pro2 [$key] => Array
$pro (";
            $pro = $pro . '       ';
            $pro2 = $pro2 . '        ';
            $pro3 = substr_replace($pro, ' ', -9);


            myPrint_r1($v);
            $pro2 = substr_replace($pro2, ' ', -9);


            echo
            "
 $pro3 )
 ";

        } else {

            echo "
$pro2 [$key] => $var1[$key]";
        }

    }

}


//ПРОВЕРКА
$arr = ['Green' => 'Зеленый', 'Три' => 3, 54, 345, [34, 'Число' => 32, [34, 343, ['a', 'b', 'C'], 32,], 'AtaTa'], 333232];

echo '<hr> <b>Оригинальная функция print_r в строчку:</b> <br>';
print_r($arr);
echo '<br><br>';

echo '<b>Моя функция myPrint_r в строчку:</b> <br>';
myPrint_r($arr);
echo '<br><hr>';

echo '<b>Оригинальная функция print_r построчно:</b> <br>';
echo "<pre>";
print_r($arr);
echo "</pre>";
echo '<br>';

echo '<b>Моя функция myPrint_r построчно:</b> <br>';
echo "<pre>";
myPrint_r($arr);
echo "</pre>";