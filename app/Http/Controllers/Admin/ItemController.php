<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:items',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('category/items'))
            {
                Storage::disk('public')->makeDirectory('category//items');
            }
            $item = Image::make($image)->resize(369,300)->save();
            Storage::disk('public')->put('category/items/'.$imageName,$item);
        }
        else{
            $imageName = 'default.png';
        }

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->price = $request->price;
        $item->image = $imageName;
        $item->save();
        Toastr::success('Item Create','ItemC');
        return redirect()->route('admin.item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        return view('admin.item.edit',compact('item','categories'));
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $item = Item::find($id);

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('category/items'))
            {
                Storage::disk('public')->makeDirectory('category//items');
            }
            if(Storage::disk('public')->exists('category/items/'.$item->image))
            {
                Storage::disk('public')->delete('category//items/'.$item->image);
            }
            $itemS = Image::make($image)->resize(369,300)->save();
            Storage::disk('public')->put('category/items/'.$imageName,$itemS);
        }
        else{
            $imageName = $item->image;
        }

        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imageName;
        $item->save();
        Toastr::success('Item Updated','ItemU');
        return redirect()->route('admin.item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(Storage::disk('public')->exists('category/items/'.$item->image))
        {
            Storage::disk('public')->delete('category//items/'.$item->image);
        }
        $item->delete();
        
        Toastr::success('Remove Item','ItemD');
        return redirect()->back();
    }
}
