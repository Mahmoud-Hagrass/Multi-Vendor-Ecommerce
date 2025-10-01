<?php

namespace App\Services\Category;

use App\Repositories\Interfaces\CategoryInterface;

class CategoryService
{
    protected $categoryRepository ;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id) ;
    }
    public function getAllCategoriesDataForYajraTable()
    {
        return $this->categoryRepository->getAllCategoriesDataForYajraTable() ;
    }

    public function getAllMainCategories()
    {
        return $this->categoryRepository->getAllMainCategories();
    }

    public function mergeStatusInCategoryRequest($data)
    {
        if(isset($data['status']) && $data['status'] == __('dashboard.active')){
            $data['status'] = 1 ;
        }else{
            $data['status'] = 0 ;
        }
        return $data ;
    }
    public function storeNewCategory($data)
    {
        $data = Self::mergeStatusInCategoryRequest($data);
        return $this->categoryRepository->storeNewCategory($data);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function updateCategory($data , $id)
    {
        $category = Self::getCategoryById($id) ;
        if(!$category){
            return false ;
        }

        $data = Self::mergeStatusInCategoryRequest($data);
        return $this->categoryRepository->updateCategory($category , $data);
    }

    public function deleteCategory($id)
    {
        $category = Self::getCategoryById($id);
        if(!$category){
            return false ;
        }
        return $this->categoryRepository->deleteCategory($category);
    }

    public function changeCategoryStatus($data)
    {
        $category = Self::getCategoryById($data['category_id']);
        if(!$category){
            return false ;
        }
        
        return $this->categoryRepository->changeCategoryStatus($category);
    }
}
