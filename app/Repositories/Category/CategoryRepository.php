<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;
use Yajra\DataTables\Facades\DataTables;

class CategoryRepository implements CategoryInterface
{
   public function getAllCategoriesDataForYajraTable()
   {
      $categories = Category::select(['id', 'name', 'status', 'created_at']);

      return DataTables::of($categories)
        ->addIndexColumn()
        ->editColumn('name', function($category) {
            return $category->getTranslation('name', app()->getLocale());
        })
        ->editColumn('status', function($category) {
            return $category->getCategoryStatus() ;
        })
        ->editColumn('created_at', function($category) {
            return $category->getDate() ;
        })
        ->addColumn('action' , function($category){
            return view('backend.admin.categories.actions.index' , compact('category')) ;
        })
        ->make(true);
   }

   public function getAllMainCategories()
   {
       $mainCategories = Category::whereNull('parent_id')->get() ;
       if (!$mainCategories){
           return false ;
       }
       return $mainCategories ;
   }

   public function storeNewCategory($data)
   {
       $category = Category::create([
             'name'         => $data['category_name'],
             'parent_id'    => $data['parent_id'] ?? null ,
             'status'       => $data['status'],
        ]) ;

        if(!$category){
            return false ;
        }
        return $category ;
   }

   public function getAllCategories()
   {
      $allCategories = Category::select(['id' , 'name' , 'parent_id' , 'status'])->get() ;
      if (!$allCategories){
          return false ;
      }
      return $allCategories ;
   }

   public function getCategoryById($id)
   {
      $category = Category::find($id) ;
      if(!$category){
        return false ;
      }
      return $category ;
   }

   public function updateCategory($category , $data)
   {
      $category = $category->update([
              'name'         => $data['category_name'],
              'parent_id'    => $data['parent_id'] ?? null ,
              'status'       => $data['status'],
      ]) ;

      if(!$category){
          return false ;
      }

      return $category  ;
   }

   public function deleteCategory($category)
   {
     $delete = $category->delete() ;
     if(!$delete){
         return false ;
     }
     return true ;
   }

   public function changeCategoryStatus($category)
   {
       $status = $category->status == 1 ? 0 : 1 ;
       $category->update(['status' => $status]) ;
       if(!$category){
           return false ;
       }
       return $category ;
   }
}
