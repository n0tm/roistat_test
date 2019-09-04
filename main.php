<?php

$result = "Hi. How are you? I'm fine thanks!";
print_r(revertPunctuationMarks($result));

function revertPunctuationMarks($string) {
    $string = str_split($string);
    $revert_data = [];

    for ($i = 0; $i < count($string); $i++) {
        if (!isValidCharacter($string[$i])) {
            $revert_data[] = ["char" => $string[$i], "index" => $i];
        }
    }

    for ($i = 0; $i < count($revert_data); $i++) {
        $string[$revert_data[$i]['index']] = $revert_data[count($revert_data) - $i - 1]['char'];
    }

    return implode($string, "");
}

function isValidCharacter($char) {
    return !preg_match("/[^A-Za-z0-9_ ]/", $char);
}