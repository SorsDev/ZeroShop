<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryAll(){
        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }

    public function CategoryStore(Request  $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_es' => 'required',
            'category_icon' => 'required',
        ],
        [
            'category_name_en.required' => 'Input Category English Name',
            'category_name_es-required' => 'Input Category Spanish Name',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_es' => $request->category_name_es,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_es' => strtolower(str_replace(' ','-',$request->category_name_es)),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);

        $notificaction = array(
            'message' => 'Categoria insertado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaction);
    }

    public function CategoryEdit($id){
        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('categories'));
    }

    public function CategoryUpdate(Request $request, $id){
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_es' => $request->category_name_es,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_es' => strtolower(str_replace(' ','-',$request->category_name_es)),
            'category_icon' => $request->category_icon,
        ]);

        $notificaction = array(
            'message' => 'Categoria Actualizado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notificaction);

    }


    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categoría Eliminado correctamente!',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }

}
