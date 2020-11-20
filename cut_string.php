<?php
/* Функция применяется на страницу контактов*/
function cut_string($current_string, $link){

    $current_string = trim($current_string); // удаляем лишние проблеы
    $current_string = mb_strimwidth($current_string, 0, 181, ""); // сокращаю по симпольно


    $array_word = explode(" ", $current_string); // разделяю на массив по пробелам

    $index_prelast = count($array_word) - 3; // индексы слов для ссылки
    $index_last = count($array_word) - 2;

    $current_string = mb_strimwidth($current_string, 0, 180, "..."); // Добавляем многоточие


    $result_string = explode(" ", $current_string); // Разделение входной строки
    $link_word = " <a href = ' ".$link." '> ".$result_string[$index_prelast]." ".$result_string[$index_last]." </a> "; // Ссылка

    $result_string[$index_prelast] = $link_word; // Замена слов на ссылку
    unset($result_string[count($result_string) - 1]);  // Удаление лишнего
    
    $result_string = implode(" ", $result_string); // Соединение массива обратно в строку
    return $result_string; 

}
?>
