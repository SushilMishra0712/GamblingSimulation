<?php

define('STAKE',100);
define('PERCENTAGE',50);
$stake_value=STAKE;
$bet_amount=1;
$win_amount=0;
$loose_amount=0;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");

for($day=1;$day<21;$day++)
{
	$stake_value = STAKE;
	$percentage_value = (PERCENTAGE*$stake_value)/100;
	$min_value = $stake_value-$percentage_value;
	$max_value = $stake_value+$percentage_value;

	while(!($stake_value==$min_value || $stake_value==$max_value))
	{
	   $random = rand(0,1);
	   if($random==1)
	   {
	      $stake_value+=$bet_amount;
	   }
	   else
	   {
	      $stake_value-=$bet_amount;
	   }
	}

	echo "Your stake at the end of day ".$day." is:".$stake_value."\n";
	if($stake_value==$min_value)
	{
	   $loose_amount+=$percentage_value;
	}
	else if($stake_value==$max_value)
	{
	   $win_amount+=$percentage_value;
	}
}

echo "After 20 days of playing\n";
echo "Total amount won:".$win_amount."\n";
echo "Total amount loose:".$loose_amount."\n";
if($win_amount>$loose_amount)
{
    $difference = $win_amount-$loose_amount;
    echo "Congrats You won by ".$difference." at the end of 20th day\n";
}
else if($win_amount<$loose_amount)
{
    $difference = $loose_amount-$win_amount;
    echo "Sorry You loose by ".$difference." at the end of 20th day\n";
}
else
{
    echo "You neither won or loose at the end of 20th day\n";
}

?>
