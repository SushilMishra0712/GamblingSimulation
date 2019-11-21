<?php

$stake=100;
$bet=1;
echo "Press Enter to gamble";
fscanf(STDIN,"%s");
$random = rand(0,1);
if($random==1)
{
    $stake+=$bet;
    echo "You win bet\n";
}
else
{
    $stake-=$bet;
    echo "You loose bet\n";
}

?>