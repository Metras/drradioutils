<?

// this file will pull the data needed to populate the trafficgenny timeslots table
// from the rivendell grids/clocks/events data and for the tempspnsrtimeslots table

// for this to work properly, you need events in rivendell rdlogmanager called "Commercial" and "Timetemp"
// you can leave "Timetemp" out of the mix if you do not want to use that functionality

?>
<a href="index.html">Back To Start</a>
<HR>
<P>
<?


//first the timeslots table --------------------------------------------------------------------------------------------------------------------

include("dbinfo.inc.php");
include("opendb.php");

$dispcomclk = 0;			//	display commercial clock info
$disptatclk = 0;			//	display timetemp clock info

//	you can pull commercial timeslots and timespnsr timeslots from rivendell and update the trafficgenny tables with them
//	set $pullcommriv $pulltimeriv and $updatetg all to 1 to do this.
//	if you set $pullcommriv and $pulltimeriv  to 1 but set $updatetg to 0 
//	and set $showtginsert to 1 then it will show you the insert statements but not execure them.

$pullcommriv = 1;			//	pull commercial timeslots from rivendell?
$pulltimeriv = 1;			//	pull timespnsr timeslots from rivendell?
$updatetg = 0;				//	update the trafficgenny tables or just print? 1 = update
$showtginsert = 1;			//	show trafficgenny insert statements

$query="TRUNCATE timeslots";
if ($updatetg) {$result=mysql_query($query);}

include("rivdbinfo.inc.php");
include("rivopendb.php");

$offset=$_POST['offset'];
$tdate=$_POST['tdate'];

$mn=substr($tdate,5,2);
$dy=substr($tdate,8,2);
$yr=substr($tdate,0,4);

$dow = date("l", mktime(0, 0, 0, $mn, $dy, $yr));


// ok monday adjust = 0, tuesday adjust = 24, etc.


if ($dow=='Monday')
{
	$clkadj='0';
}

if ($dow=='Tuesday')
{
	$clkadj='24';
}

if ($dow=='Wednesday')
{
	$clkadj='48';
}

if ($dow=='Thursday')
{
	$clkadj='72';
}

if ($dow=='Friday')
{
	$clkadj='96';
}

if ($dow=='Saturday')
{
	$clkadj='120';
}

if ($dow=='Sunday')
{
	$clkadj='144';
}

// echo "Clock Adjust = $clkadj";

if ($pullcommriv)
{

  // let's try 00-01

  $clkabs = '0' + $clkadj;

  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 00-01 </H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'00',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }


  // let's try 01-02
  include("rivopendb.php");
  $clkabs = '1' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 01-02</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'01',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }


  // let's try 02-03
  include("rivopendb.php");
  $clkabs = '2' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 02-03</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'02',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }


  // let's try 03-04
  include("rivopendb.php");
  $clkabs = '3' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 03-04</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'03',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }


  // let's try 04-05
  include("rivopendb.php");
  $clkabs = '4' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 04-05</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'04',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 05-06
  include("rivopendb.php");
  $clkabs = '5' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 05-06</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'05',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 06-07
  include("rivopendb.php");
  $clkabs = '6' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 06-07</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'06',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 07-08
  include("rivopendb.php");
  $clkabs = '7' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 07-08</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'07',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 08-09
  include("rivopendb.php");
  $clkabs = '8' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 08-09</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'08',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 09-10
  include("rivopendb.php");
  $clkabs = '9' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 09-10</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'09',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 10-11
  include("rivopendb.php");
  $clkabs = '10' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 10-11</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'10',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 11-12
  include("rivopendb.php");
  $clkabs = '11' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 11-12</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'11',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 12-13
  include("rivopendb.php");
  $clkabs = '12' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 12-13</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'12',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 13-14
  include("rivopendb.php");
  $clkabs = '13' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 13-14</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'13',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 14-15
  include("rivopendb.php");
  $clkabs = '14' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 14-15</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'14',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 15-16
  include("rivopendb.php");
  $clkabs = '15' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 15-16</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'15',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 16-17
  include("rivopendb.php");
  $clkabs = '16' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 16-17</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'16',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 17-18
  include("rivopendb.php");
  $clkabs = '17' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 17-18</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'17',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 18-19
  include("rivopendb.php");
  $clkabs = '18' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 18-19</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'18',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 19-20
  include("rivopendb.php");
  $clkabs = '19' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 19-20</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'19',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 20-21
  include("rivopendb.php");
  $clkabs = '20' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 20-21</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'20',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 21-22
  include("rivopendb.php");
  $clkabs = '21' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 21-22</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'21',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 22-23
  include("rivopendb.php");
  $clkabs = '22' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 22-23</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'22',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }

  // let's try 23-24
  include("rivopendb.php");
  $clkabs = '23' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($dispcomclk) {echo "<H1>$dow Clock $clkabs test : 23-24</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($dispcomclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Commercial' ORDER BY START_TIME";
  if ($dispcomclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'23',0,2);
	      if ($dispcomclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO timeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($dispcomclk) {echo "<br>";}
  }


}

//second the tempspnsrtimeslots table --------------------------------------------------------------------------------------------------------------------


include("dbinfo.inc.php");
include("opendb.php");

$query="TRUNCATE tempspnsrtimeslots";
if ($updatetg) {$result=mysql_query($query);}

include("rivdbinfo.inc.php");
include("rivopendb.php");

if ($pulltimeriv)
{

  // let's try 00-01

  $clkabs = '0' + $clkadj;

  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 00-01 </H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'00',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }


  // let's try 01-02
  include("rivopendb.php");
  $clkabs = '1' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 01-02</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'01',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }


  // let's try 02-03
  include("rivopendb.php");
  $clkabs = '2' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 02-03</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'02',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }


  // let's try 03-04
  include("rivopendb.php");
  $clkabs = '3' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 03-04</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'03',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }


  // let's try 04-05
  include("rivopendb.php");
  $clkabs = '4' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 04-05</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'04',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 05-06
  include("rivopendb.php");
  $clkabs = '5' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 05-06</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'05',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 06-07
  include("rivopendb.php");
  $clkabs = '6' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 06-07</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'06',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 07-08
  include("rivopendb.php");
  $clkabs = '7' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 07-08</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'07',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 08-09
  include("rivopendb.php");
  $clkabs = '8' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 08-09</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'08',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 09-10
  include("rivopendb.php");
  $clkabs = '9' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 09-10</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'09',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 10-11
  include("rivopendb.php");
  $clkabs = '10' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 10-11</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'10',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 11-12
  include("rivopendb.php");
  $clkabs = '11' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 11-12</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'11',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 12-13
  include("rivopendb.php");
  $clkabs = '12' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 12-13</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'12',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 13-14
  include("rivopendb.php");
  $clkabs = '13' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 13-14</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'13',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 14-15
  include("rivopendb.php");
  $clkabs = '14' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 14-15</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'14',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 15-16
  include("rivopendb.php");
  $clkabs = '15' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 15-16</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'15',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 16-17
  include("rivopendb.php");
  $clkabs = '16' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 16-17</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'16',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 17-18
  include("rivopendb.php");
  $clkabs = '17' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 17-18</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'17',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 18-19
  include("rivopendb.php");
  $clkabs = '18' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 18-19</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'18',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 19-20
  include("rivopendb.php");
  $clkabs = '19' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 19-20</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'19',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 20-21
  include("rivopendb.php");
  $clkabs = '20' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 20-21</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'20',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 21-22
  include("rivopendb.php");
  $clkabs = '21' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 21-22</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'21',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 22-23
  include("rivopendb.php");
  $clkabs = '22' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 22-23</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'22',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }

  // let's try 23-24
  include("rivopendb.php");
  $clkabs = '23' + $clkadj;


  $nowclk = 'CLOCK'. $clkabs;


  $query="SELECT $nowclk FROM SERVICES WHERE NAME='Production'";
  $result=mysql_query($query);
  if ($disptatclk) {echo "<H1>$dow Clock $clkabs test : 23-24</H1>";}

  $clockn=mysql_result($result,0,"$nowclk");

  if ($disptatclk) {echo $clockn;}


  $mytable = $clockn . "_CLK";
  $query="SELECT * FROM $mytable WHERE EVENT_NAME='Timetemp' ORDER BY START_TIME";
  if ($disptatclk) {echo "<BR>Query = $query<BR>";}
  $result=mysql_query($query);


  while($r=mysql_fetch_array($result))
  {
	      $START_TIME=substr_replace($r["START_TIME"],'23',0,2);
	      if ($disptatclk) {echo "Start Time: - $START_TIME";}
	      include("opendb.php");
	      $query = "INSERT INTO tempspnsrtimeslots VALUES (NULL,'0','0','$START_TIME')";
	      if ($showtginsert) {echo "<BR> $query <BR>";}
	      if ($updatetg) {mysql_query($query);}
	      if ($disptatclk) {echo "<br>";}
  }


}



include("rivclosedb.php");

//-------------------- below is from select1.php -----------------------------

echo "<BR><HR><BR>";

include("select2.php");

include("closedb.php");
?>
