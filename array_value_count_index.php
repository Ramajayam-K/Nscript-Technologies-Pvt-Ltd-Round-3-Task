<?php
$input=[1,3,1,2,3,6,4,2,5,6,3,5,4]; 

// 3, 8, 9

$ObjectArr=[];
for($i=0;$i<count($input);$i++){
    if(isset($ObjectArr[$input[$i]])){
        $ObjectArr[$input[$i]]['count']+=1;
        $ObjectArr[$input[$i]]['index'][]=$i;
    }else{
        $ObjectArr[$input[$i]]['count']=1;
        $ObjectArr[$input[$i]]['index'][]=$i;
    }
}

echo  json_encode($ObjectArr);

?>