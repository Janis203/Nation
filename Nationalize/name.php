<?php
while (true) {
    echo "[1] agify
[2] genderize
[3] nationalize
[any key] exit
-----------------" . PHP_EOL;
    $choice = (int)readline("Enter choice: ");
    switch ($choice) {
        case 1:
            $name = readline("Type your name: ");
            $agify = "https://api.agify.io?name=$name";
            $ageData = file_get_contents($agify);
            if ($ageData === false) {
                die("Failed to fetch data from the API.");
            }
            $age = json_decode($ageData);
            echo $age->name . " is " . $age->age . " years old" . PHP_EOL;
            break;
        case 2:
            $name = readline("Type your name: ");
            $genderize = "https://api.genderize.io?name=$name";
            $genderData = file_get_contents($genderize);
            if ($genderData === false) {
                die("Failed to fetch data from the API.");
            }
            $gender = json_decode($genderData);
            echo $gender->name . " is " . (($gender->probability) * 100) . "% " . $gender->gender . PHP_EOL;
            break;
        case 3:
            $name = readline("Type your last name: ");
            $nationalize = "https://api.nationalize.io/?name=$name";
            $nationData = file_get_contents($nationalize);
            if ($nationData === false) {
                die("Failed to fetch data from the API.");
            }
            $nationality = json_decode($nationData);
            echo $nationality->name . " is from " . $nationality->country[0]->country_id . " with " .
                number_format(($nationality->country[0]->probability) * 100, 2) . "% certainty" . PHP_EOL;
            break;
        default:
            exit("Goodbye ");
    }
}