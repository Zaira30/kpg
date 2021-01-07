<?php
/**
 * Created by PhpStorm.
 * User: zaira
 * Date: 07/01/21
 * Time: 12:03
 */

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function search(Request $request, ProductRepository $repository)
    {
         $products = $repository->getByFilter(
             $request['search']
         );
        $message = "List Products Sucess";

        return response()->json([
            'products' => $products,
            'message'   =>  $message
        ]);

     }

     public function create(Request $request, ProductRepository $repository)
     {
        $register = $repository->register($request->json()->all());

         $message = $register ? 'Product Create Success' : 'Error';
         return response()->json([
             'product' => $register,
             'message'   =>  $message
         ]);

     }


    public function edit(Request $request, ProductRepository $repository, $id)
    {
        $update = $repository->update($id, $request->json()->all());

        $message = $update ? 'Product Updated Success' : 'Error';
        return response()->json([
            'product' => $update,
            'message'   =>  $message
        ]);
    }

    public function destroy($id, ProductRepository $repository)
    {
        DB::beginTransaction();
        try {

            $repository->delete($id);

            DB::commit();
            $message = 'Product Deleted Success';
            return response()->json([
                'message'   =>  $message
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            $message = 'Error';
            return response()->json([
                'message'   =>  $message
            ]);

        }

    }
}