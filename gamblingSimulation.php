<?php

$stake=100;
$bet=1;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");
while($stake>0)
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
   if($stake==50 || $stake==150)
   {
      echo "You had resigned for the day\n";
      echo "Your stake amount at end of the day is:".$stake."\n";
      exit(0);
   }
}

?>
