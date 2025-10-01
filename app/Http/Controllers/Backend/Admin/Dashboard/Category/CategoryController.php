<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements HasMiddleware
{
    protected $categoryService ;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService ;
    }

    public static function middleware(): array
     {
        return [
            new Middleware('able:category_show'                  , only: ['index']),
            new Middleware('able:category_update'                , only: ['update']),
            new Middleware('able:category_delete'                , only: ['destroy']),
            new Middleware('able:category_change_status'         , only: ['changeStatus']),
        ];
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainCategories = $this->categoryService->getAllMainCategories() ;
        $allCategories = $this->categoryService->getAllCategories() ;
        if(!$mainCategories){
            return redirectBack(__('dashboard.error_operation') , 'error');
        }

        if(!$allCategories){
            return redirectBack(__('dashboard.error_operation') , 'error');
        }

        return view('backend.admin.categories.index' , compact(['mainCategories' , 'allCategories'])) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['category_name', 'parent_id' , 'status']) ;
        $isCreated = $this->categoryService->storeNewCategory($data) ;
        if(!$isCreated){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }else{
            return redirectBack(__('dashboard.success_operation') , 'success') ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only(['category_name','parent_id' ,'status']) ;
        $updatedCategory = $this->categoryService->updateCategory($data , $id) ;

        if(!$updatedCategory){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isCategoryDeleted = $this->categoryService->deleteCategory($id) ;
        if(!$isCategoryDeleted){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }


    public function getAllCategoriesDataForYajraTable()
    {
        return $this->categoryService->getAllCategoriesDataForYajraTable() ;
    }

    public function changeStatus(Request $request)
    {
        $data = $request->only(['category_id']) ;
        $categoryStatus = $this->categoryService->changeCategoryStatus($data) ;
        if(!$categoryStatus){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }
}
