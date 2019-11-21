<?php

define('STAKE',100);
$stake_value=STAKE;
$bet_amount=1;
$minimum_percentage=50;
$maximum_percentage=150;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");
$min_value = ($minimum_percentage*$stake_value)/100;
$max_value = ($maximum_percentage*$stake_value)/100;

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

echo "You had resigned for the day\n";
echo "Your Stake amount at the end of the day is:".$stake_value."\n";

?>
