<?php
    function show_category_edit_product($categories, $parent, $shift, $selected)
    {
        foreach ($categories as $key => $category) {
            if ($category['parent'] == $parent) {
                if ($category['id'] == $selected) {
                    echo '<option selected value="'.$category['id'].'">'.$shift.$category['name'].'</option>';
                } else {
                    echo '<option value="'.$category['id'].'">'.$shift.$category['name'].'</option>';
                }
                show_category_edit_product($categories, $category['id'], $shift." - - |", $selected);
            }
        }
    }

?>