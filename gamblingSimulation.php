<?php

define('STAKE',100);
define('PERCENTAGE',50);
$stake_value=STAKE;
$bet_amount=1;
$win_amount=0;
$loose_amount=0;
$track_amount=0;
$track_amount_array=array();
$sort_array=array();
echo "Press Enter to gamble";
fscanf(STDIN,"%s");

for($day=1;$day<31;$day++)
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

	if($stake_value==$min_value)
	{
	   echo "On day ".$day." You loose by ".$percentage_value."\n";
	   $loose_amount+=$percentage_value;
	   $track_amount-=$percentage_value;
	   array_push($track_amount_array,$track_amount);
	   array_push($sort_array,$track_amount);
	}
	else if($stake_value==$max_value)
	{
	   echo "On day ".$day." You won by ".$percentage_value."\n";
	   $win_amount+=$percentage_value;
	   $track_amount+=$percentage_value;
	   array_push($track_amount_array,$track_amount);
	   array_push($sort_array,$track_amount);
	}
}

echo "\nAfter a month of playing\n";
echo "Total amount won:".$win_amount."\n";
echo "Total amount loose:".$loose_amount."\n";
if($win_amount>$loose_amount)
{
    $difference = $win_amount-$loose_amount;
    echo "Congrats You won by ".$difference." at the end of month\n\n";
}
else if($win_amount<$loose_amount)
{
    $difference = $loose_amount-$win_amount;
    echo "Sorry You loose by ".$difference." at the end of month\n\n";
}
else
{
    echo "You neither won or loose at the end of month\n";
}


for($row=0;$row<count($sort_array);$row++)
{
    for($column=0;$column<count($sort_array)-1;$column++)
      {
	if($sort_array[$column]>$sort_array[$column+1])
	{
	  //swap numbers
	  $temp=$sort_array[$column];
	  $sort_array[$column]=$sort_array[$column+1];
	  $sort_array[$column+1]=$temp;
	}
      }
}

$maximum_won = $sort_array[count($sort_array)-1];
$maximum_loose = $sort_array[0];
echo "Luckiest Day amount:".$maximum_won."\n";
echo "UnLuckiest Day amount:".$maximum_loose."\n";
echo "\n";
for($row=0;$row<count($track_amount_array);$row++)
{
   if($track_amount_array[$row] == $maximum_won)
      {
        echo "Luckiest day where you won maximum was Day ".$row."\n";
      }
   else if($track_amount_array[$row] == $maximum_loose)
      {
        echo "UnLuckiest day where you loose maximum was Day ".$row."\n";
      }
}

?>
