<?php
   function GetCategory($mang, $parent, $shift)
   {
       foreach ($mang as $key => $category) {
           if ($category['parent'] == $parent) {
               echo '<option value="'.$category['id'].'">'.$shift.$category['name'].'</option>';
               GetCategory($mang, $category['id'], $shift." - - | ");
           }
       }
   }									
?>