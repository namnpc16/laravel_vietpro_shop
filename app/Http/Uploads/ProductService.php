<?php
namespace App\Http\Uploads;

use App\Repositories\ProductRepository;

class ProductService
{
    /**
     * Handle upload image
     * 
     * @param object $request
     * @return string
     */
    public static function upLoadImage($request)
    {
        if (!is_null($request)) {
            $result = md5(time()).'.'.$request->getClientOriginalExtension();
            $request->move(public_path('img/'), $result);

            return $result;
        }
    }

    /**
     * Handle upload image
     * 
     * @param object $request
     * @return string
     */
    public static function upLoadEditImage($request, $id)
    {
        $product = new ProductRepository();

        if (!is_null($request)) {
            unlink(public_path('img/') . $product->find($id)->img);
            $result = md5(time()).'.'.$request->getClientOriginalExtension();
            $request->move(public_path('img/'), $result);

            return $result;
        }

        return $product->find($id)->img;
        
    }

    /**
     * Delete image
     * 
     * @param $request
     */
    public static function destroyImage($request)
    {
        if (!is_null($request)) {
            unlink(public_path('img/') . $request->img);
        }
    }
}
