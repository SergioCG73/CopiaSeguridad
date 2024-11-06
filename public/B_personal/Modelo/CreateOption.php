<?php
        function CreateOption($name,$value,$text=null){
            $text = $text == null ? $value : $text;
            if($_POST[$name] == $value){  //El valor del POST es el mismo del option??? si así este option estará seleccionado
                echo "<option value='{$value}' selected>{$text}</option>";
            }
            else{
                echo "<option value='{$value}'>{$text}</option>";
            }
        }
    ?>