<?php
function findDuplicates($array) {
    $counts = array_count_values($array);
    $duplicates = [];

    foreach ($counts as $value => $count) {
        if ($count > 1) {
            $duplicates[] = $value;
        }
    }

    return $duplicates;
}

$numbers = [1, 2, 3, 2, 4, 5, 1, 6];
$result = findDuplicates($numbers);

echo "[" . implode(", ", $result) . "]";
?>
