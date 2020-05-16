<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Bezhanov\Faker\Provider\Commerce;
use Faker\Factory as FakerFactory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $products = Product::query()->get();

        return view('cart.index', [
            'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new Commerce($faker));

        $product = new Product();
        $product->name = $faker->productName;
        $product->description = $faker->promotionCode;
        $product->price = $faker->randomFloat(null, 0);
        $product->save();

        return redirect()->route('cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->count = $request->count;
        $product->save();

        return redirect()->route('shipping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
