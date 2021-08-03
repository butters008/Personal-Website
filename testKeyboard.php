<?php
//Trying out the keyboard that is wireless and seeing how this is
$keboard = "good";
$baby = 10;


if($keboard == "good"){
    echo "We keep the keyboard";
}
else{
    echo "We return the keyboard";
}

while($baby > 5){
    babyAwkake();
    $baby--;
}


function babyAwkake(){
    echo "This is going to be weird";
}