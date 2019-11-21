<?php

$stake=100;
$bet=1;
$counter=1;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");
$min_stake_percentage = $stake/2;
$max_stake_percentage = $stake+($stake/2);

while($counter>0)
{
   $random = rand(0,1);
   if($random==1)
   {
      $stake+=$bet;
   }
   else
   {
      $stake-=$bet;
   }
   if($stake==$min_stake_percentage || $stake==$max_stake_percentage)
   {
      echo "You had resigned for the day\n";
      echo "Your stake amount at end of the day is:".$stake."\n";
      $counter--;
   }
}

?>
