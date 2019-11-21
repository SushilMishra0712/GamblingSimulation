<?php

class Gambler
{
	public $stake_value;
	public $bet_amount;
	public $win_amount;
	public $loose_amount;
	public $track_amount;
	public $track_amount_array;
	public $sort_array;
	function __construct()
	{
        	define('STAKE',100);
		define('PERCENTAGE',50);
		$this->stake_value=STAKE;
		$this->bet_amount=1;
		$this->win_amount=0;
		$this->loose_amount=0;
		$this->track_amount=0;
		$this->track_amount_array=array();
		$this->sort_array=array();
	}

	function play()
	{
		echo "Press Enter to gamble";
		fscanf(STDIN,"%s");

		for($day=1;$day<31;$day++)
		{
			$this->stake_value = STAKE;
			$percentage_value = (PERCENTAGE*$this->stake_value)/100;
			$min_value = $this->stake_value-$percentage_value;
			$max_value = $this->stake_value+$percentage_value;

			while(!($this->stake_value==$min_value || $this->stake_value==$max_value))
			{
			   $random = rand(0,1);
			   if($random==1)
			   {
			      $this->stake_value+=$this->bet_amount;
			   }
			   else
			   {
			      $this->stake_value-=$this->bet_amount;
			   }
			}

			if($this->stake_value==$min_value)
			{
			   echo "On day ".$day." You loose by ".$percentage_value."\n";
			   $this->loose_amount+=$percentage_value;
			   $this->track_amount-=$percentage_value;
			   array_push($this->track_amount_array,$this->track_amount);
			   array_push($this->sort_array,$this->track_amount);
			}
			else if($this->stake_value==$max_value)
			{
			   echo "On day ".$day." You won by ".$percentage_value."\n";
			   $this->win_amount+=$percentage_value;
			   $this->track_amount+=$percentage_value;
			   array_push($this->track_amount_array,$this->track_amount);
			   array_push($this->sort_array,$this->track_amount);
			}
		}

		echo "\nAfter a month of playing\n";
		echo "Total amount won:".$this->win_amount."\n";
		echo "Total amount loose:".$this->loose_amount."\n";
		if($this->win_amount>$this->loose_amount)
		{
		    $difference = $this->win_amount-$this->loose_amount;
		    echo "Congrats You won by ".$difference." at the end of month\n\n";
		}
		else if($this->win_amount<$this->loose_amount)
		{
		    $difference = $this->loose_amount-$this->win_amount;
		    echo "Sorry You loose by ".$difference." at the end of month\n\n";
		}
		else
		{
		    echo "You neither won or loose at the end of month\n";
		}


		for($row=0;$row<count($this->sort_array);$row++)
		{
		    for($column=0;$column<count($this->sort_array)-1;$column++)
		      {
			if($this->sort_array[$column]>$this->sort_array[$column+1])
			{
			  //swap numbers
			  $temp=$this->sort_array[$column];
			  $this->sort_array[$column]=$this->sort_array[$column+1];
			  $this->sort_array[$column+1]=$temp;
			}
		      }
		}

		$maximum_won = $this->sort_array[count($this->sort_array)-1];
		$maximum_loose = $this->sort_array[0];
		echo "Luckiest Day amount:".$maximum_won."\n";
		echo "UnLuckiest Day amount:".$maximum_loose."\n";
		echo "\n";
		for($row=0;$row<count($this->track_amount_array);$row++)
		{
		   if($this->track_amount_array[$row] == $maximum_won)
		      {
		        echo "Luckiest day where you won maximum was Day ".$row."\n";
		      }
		   else if($this->track_amount_array[$row] == $maximum_loose)
		      {
		        echo "UnLuckiest day where you loose maximum was Day ".$row."\n";
		      }
		}
		if($this->win_amount>$this->loose_amount)
		{
		    echo "You won last month,So press yes if you like to continue playing next month\n";
		    fscanf(STDIN,"%s",$response);
		    if($response=="yes")
		    {
		    self::play();
		    }
		    else
		    {
		    echo "Thank you for playing\n";
		    exit(0);
		    }
		}
		else
		{
		    echo "You loose Thank you for playing\n";
		    exit(0);
		}
	}
}
$object_gambler = new Gambler;
$object_gambler->play();

?>
