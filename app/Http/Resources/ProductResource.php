<?php
/**
 * Created by PhpStorm.
 * User: zaira
 * Date: 07/01/21
 * Time: 12:13
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'user' =>$this->user->name
        ];
    }
}