<?php
   function GetCategory($mang, $parent, $shift)
   {
       foreach ($mang as $key => $category) {
           if ($category["parent_id"] == $parent) {
               echo '<option value="'.$category['id'].'">'.$shift.$category['name'].'</option>';
               GetCategory($mang, $category['id'], $shift." - - | ");
           }
       }
   }									


   function showCategory($mang, $parent, $shift){
    // echo 'số lần lặp '. count($mang)."<br>";
        foreach ($mang as $key => $category) {
            if ($category['parent_id'] == $parent) {
                echo '<div class="item-menu"><span>'.$shift.$category['name'].'</span>
                        <div class="category-fix">
                            <a class="btn-category btn-primary" href="'.route('category.edit', ["id" => $category["id"]]).'"><i class="fa fa-edit"></i></a>
                            <a class="btn-category btn-danger" onclick="return confirm("Bạn có muốn xóa danh mục ?")" href="'.route('category.del', ["id" => $category["id"]]).'"><i class="fas fa-times"></i></i></a>
                        </div>
                    </div>';
                unset($mang[$key]);
                showCategory($mang, $category['id'], $shift." - - | ");	
            }
        }
    }
    
?>
