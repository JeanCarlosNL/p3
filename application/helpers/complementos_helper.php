<?php

function asgInputNum($label, $nombre){
    return 
    "<div class = 'form-group'>
       <label>{$label} </label>
       <input class = 'form-control' type='text' required name = '{$nombre}' pattern ='[0-9]{1,13}'/>
       <div class = 'valid-feedback'>Luce bien!</div>
       <div class = 'invalid-feedback'>No es valido!</div>
   </div>";
}

function asgInput($label, $nombre){
    return 
    "<div class = 'form-group'>
       <label>{$label} </label>
       <input class = 'form-control' type='text' required name = '{$nombre}' pattern ='[A-Za-z\s]{1,15}'/>
   </div>";
}

function asgTextArea($label, $nombre){
    return 
    "<div class = 'form-group'>
       <label>{$label} </label>
       <textarea class = 'form-control' name = '{$nombre}' required></textarea>
       <div class = 'valid-feedback'>Luce bien!</div>
       <div class = 'invalid-feedback'>No es valido!</div>
    </div>";

}

function asgInputR($label, $nombre){

    return 
    "<div class = 'form-check form-check-inline'>
    <label class = 'form-check-label'>{$label} </label>
    <input class = 'form-check-input' type = \"radio\" name = \"{$nombre}\" value =\"{$label}\" required/><br>
    <div class = 'valid-feedback'>Luce bien!</div>
    <div class = 'invalid-feedback'>No es valido!</div>
    </div>";

}

function asgSelect($label, $nombre, $array){

 
    echo "<div class = 'form-group'>
       <label>{$label}</label>
       <select class = 'form-control' name='{$nombre}'>";
       foreach ($array as $k=>$val){
       echo "<option value='{$array[$k]}'>{$array[$k]}</option>";
        }
    echo "</select>
     </div>";

}

?>