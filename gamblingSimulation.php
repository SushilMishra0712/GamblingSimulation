<?php

define('STAKE',100);
$stake_value=STAKE;
$bet_amount=1;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");
$min_stake_percentage = $stake_value/2;
$max_stake_percentage = $stake_value+($stake_value/2);

while(!($stake_value==$min_stake_percentage || $stake_value==$max_stake_percentage))
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
