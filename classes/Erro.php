<?php

class Erro{

public static function trataErro(Exception $e){

if(DEBUG){
echo "<pre>";
print_r($e);
echo "</pre>";

}
else{

$e->getMessage();

}
exit;


}

}


  ?>
