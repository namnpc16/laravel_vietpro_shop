<?php
    function showError($errors, $name)
    {
        if ($errors->has($name)) {
            return '<small style="color: red; margin-left: 5px">'.$errors->first($name).'</small>';
        }
    }
?>