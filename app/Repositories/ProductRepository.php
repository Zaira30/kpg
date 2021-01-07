<?php
/**
 * Created by PhpStorm.
 * User: zaira
 * Date: 07/01/21
 * Time: 12:09
 */

namespace App\Repositories;


use App\Base\BaseRepository;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    public function getModel()
    {
        $this->model = new Product();
    }

    public function getByFilter(string $search = null, string $status = null)
    {

        $query = $this->model;

        if($search != null) {
            $query = $query->whereRaw("name like  '%$search%'");

        }



        return ProductResource::collection($query
            ->take(9)
            ->get()
        );
    }

    public function register(array $data)
    {
        if (!isset($data['name'])) {
                $mensageName ='The name field is required';
                return $mensageName;
        }

        if (!isset($data['user_id'])) {
            $mensageUser ='The user field is required';
            return $mensageUser;
        }

        if (!isset($data['price'])) {
            $mensagePrice ='The price is required';
            return $mensagePrice;
        }

        if (!isset($data['description'])) {
            $mensageDescription ='The description is required';
            return $mensageDescription;
        }

        DB::beginTransaction();
        try {

            DB::commit();

            $procuct = Product::create([
             'name' => $data['name'],
             'user_id' => $data['user_id'],
             'price' => $data['price'],
             'description' => $data['description']

            ]);

            return [
                new ProductResource($procuct),
            ];
        }
        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
            return false;
        }

    }

    public function update($id, $data)
    {
        if (!isset($data['name'])) {
            $mensageName ='The name field is required';
            return $mensageName;
        }

        if (!isset($data['user_id'])) {
            $mensageUser ='The user field is required';
            return $mensageUser;
        }

        if (!isset($data['price'])) {
            $mensagePrice ='The price is required';
            return $mensagePrice;
        }

        if (!isset($data['description'])) {
            $mensageDescription ='The description is required';
            return $mensageDescription;
        }

        DB::beginTransaction();
        try {

            DB::commit();
            $product = Product::where('id', $id)->first();

            $product->update([
                'name' => $data['name'],
                'user_id' => $data['user_id'],
                'price' => $data['price'],
                'description' => $data['description']

            ]);

            return [
                new ProductResource($product),
            ];
        }
        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
            return false;
        }

    }




}