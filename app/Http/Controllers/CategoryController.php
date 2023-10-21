<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\ApiResponse;
use App\Http\Resources\CategoryResource as CategoryCollection;

class CategoryController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return $this->success([
            'categories' => CategoryCollection::collection($categories),
        ],'categories list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required','string','min:3','max:45'],
            'description'   => ['required','string','min:3','max:45'],
        ]);

        $category = Category::create($data);

        return $this->success([
            'category'  => new CategoryCollection($category),
        ],'Registered Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return $this->success([
            'category' => new CategoryCollection($category),
        ],'category details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'          => ['nullable','string','min:3','max:45'],
            'description'   => ['nullable','string','min:3','max:45'],
        ]);

        $category = Category::findOrFail($id);
        $category->update($data);

        return $this->success([
            'category'  => new CategoryCollection($category),
        ],'Updated Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return $this->success([],'Category Deleted ');
    }
}
