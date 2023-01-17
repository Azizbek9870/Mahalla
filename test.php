<?php
$matrix = [
    [5,2,3,7],
    [4,1,6,4],
    [7,8,9,11],
    [1,-1, 0, 7]
];
$vector = [];
for ($i=0; $i<count($matrix); $i++)
{
    $vector[] = array_sum($matrix[$i]);
}
$max = $matrix[0][0];
$min = $matrix[0][0];
for ($i=0; $i<count($matrix); $i++)
{
    for ($j=0; $j<count($matrix[$i]); $j++)
    {
        if ($max < $matrix[$i][$j])
            $max = $matrix[$i][$j];
        if ($min > $matrix[$i][$j])
            $min = $matrix[$i][$j];
    }
}
foreach ($vector as $item){
    echo $item." ";
}
echo "<br>".$max." ".$min."<br>";
//var_dump($vector);
