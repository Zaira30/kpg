<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class ListProducts extends Component
{
    use withPagination;

    public $name, $price, $description, $product_id;
    public $isOpen = 0;

    public function render()
    {
        $products = Product::with('user')->orderBy('name', 'asc')->paginate(20);
        return view('livewire.list-products', compact('products'));
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Product::updateOrCreate(['id' => $this->product_id], [
            'user_id' => Auth::User()->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description
        ]);

        session()->flash('message',
            $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $post->name;
        $this->price = $post->price;
        $this->description = $post->description;

        $this->openModal();
    }


    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }

}
