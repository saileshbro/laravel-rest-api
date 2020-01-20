<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Product;
use App\Seller;
use App\User;
use HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Seller $seller)
    {
        return $this->showAll($seller->products);
    }


    /**
     * @param Request $request
     * @param User $seller
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, User $seller)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image'
        ];
        $request->validate($rules);
        $data = $request->all();
        $data['status'] = Product::UNAVAILABLE_PRODUCT;
        $data['image'] = $request->image->store('products');
        $data['seller_id'] = $seller->id;
        $product = Product::create($data);
        return $this->showOne($product);
    }

    /**
     * @param Request $request
     * @param User $seller
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpException
     */
    public function update(Request $request, User $seller, Product $product)
    {
        $rules = [
            'quantity' => 'integer|min:1',
            'status' => "in:" . Product::UNAVAILABLE_PRODUCT . "," . Product::AVAILABLE_PRODUCT,
            'image' => 'image'
        ];
        $request->validate($rules);
        $this->checkSeller($seller, $product);
        $product->fill($request->only('name', 'description', 'quantity'));
        if ($request->has('status')) {
            $product->status = $request->status;
            if ($product->isAvailable() && $product->categories()->count() === 0) {
                return $this->errorResponse("An active product must have at least one category", 409);
            }
        }
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $product->image = $request->image->store("products");
        }
        if ($product->isClean()) {
            return $this->errorResponse("You need to specify a different value to update.", 409);
        }
        $product->save();
        return $this->showOne($product);
    }


    /**
     * @param Seller $seller
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpException
     */
    public function destroy(Seller $seller, Product $product)
    {
        $this->checkSeller($seller, $product);
        Storage::delete($product->image);
        $product->delete();
        return $this->showOne($product);
    }

    /**
     * @param Seller $seller
     * @param Product $product
     * @throws HttpException
     */
    protected function checkSeller(User $seller, Product $product)
    {
        if ($seller->id != $product->seller_id) {
            throw new HttpException("Error Processing Request", 422);
        }
    }
}
