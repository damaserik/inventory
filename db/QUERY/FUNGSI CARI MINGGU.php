<?PHP 
$a_date='2019-07-01';
$tahun='2019';
$bulan='07';

$max_date=date("t", strtotime($a_date));
$a_date=$tahun."-".$bulan."-01";
$b_date=$tahun."-".$bulan."-".$max_date;
$c_date=($tahun-1)."-".$bulan."-01";

//echo $max_date;
//echo $a_date;
//echo $b_date;

$awalminggu=array();
$akhirminggu=array();
$awalminggu[]=$a_date;
for($y=01;$y<=$max_date;$y++) {
if($y < 10){
   $x='0'.$y;
  
} else {

$x=$y;
}
  //echo "<br>".$x;
$date=$tahun."-".$bulan."-".$x;
  //echo "<br>".$date;
$weekday=date('w', strtotime($date));
  //echo "<br>".$weekday;
if($weekday=="6" and $date != $a_date){
$awalminggu[]=$date;
} else if($weekday=="5"){
$akhirminggu[]=$date;
}

  //echo "<br>".$akhirminggu[1];

}
$akhirminggu[]=$b_date;
//echo "<br>".$akhirminggu[0];
$ab=array_unique($awalminggu);
$bb=array_unique($akhirminggu);
$x=count($ab);
echo "<br>".$ab[4];
echo "<br>".$bb[4];
echo "<br>".$x;
?>