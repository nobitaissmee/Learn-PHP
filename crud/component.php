<?php

function inputElement($icon, $placeholder, $name, $value)
{
    $ele = "
        <div class=\"input-group mb-2\">
                        <div class=\"input-group-prepend\">
                            <div class=\"input-group-text bg-warning\">$icon</div>
                        </div>
                        <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
        </div>
        ";

    echo $ele;
}

function hiddenElement($type,$name,$value){
    $ele="<input type='$type' name='$name' value='$value' autocomplete=\"off\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">";

    echo $ele;
}

function buttonElement($btnId, $styleClass, $text, $name, $attr){
    $btn = "
        <button name='$name' '$attr' class='$styleClass' id='$btnId'>$text</button>
    ";

    echo $btn;
}
