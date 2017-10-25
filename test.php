<?php

echo "Hi\n";

$name = "Rachel";

echo "Hello, " .$name. "\n";

echo "\n";

for ($i = 0; $i < 10; $i++) {
	echo "\tHello! This is #" .$i ."\n";
}

$colors = ['red', 'blue', 'orange', 'yellow', 'purple', 'black'];
foreach($colors as $color) {
	echo "\t" .$color  ." is a nice color! \n";
}

echo "\n";

$counter = 25;
while($counter >= 0 ) {
	echo "\t", $counter, "is the best number!\n";
	$counter -= 5;
}

echo "\n";

$ideas = [];

if($ideas) {
	echo "\t\$ideas evaluates to true!\n";
}
else {
	echo "\t\$ideas evaluates to false\n";
}

$ideas [] = 'eat more candy';

if($ideas) {
	echo "\tNow \$ideas evaluates to true \n";
}
else {
	echo "\tNow \$ideas evaluates to false \n";
}

echo "\n";

$value1 = 5;
$value2 = 3;

echo "\t" .$value1. "\n";
echo "\t" .$value2. "\n";

echo "\t" .($value1 + $value2). "\n";
echo "\t" .($value1 - $value2). "\n";
echo "\t" .($value1 * $value2). "\n";
echo "\t" .($value1 / $value2). "\n";
echo "\t" .($value1 % $value2). "\n";
echo "\t" . ($value1 ** $value2) . "\n";
























?>