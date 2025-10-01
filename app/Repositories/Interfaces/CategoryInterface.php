<?php

namespace App\Repositories\Interfaces;

interface CategoryInterface
{
    public function getCategoryById($id) ;
    public function getAllCategoriesDataForYajraTable() ;
    public function getAllMainCategories() ;
    public function storeNewCategory($data) ;
    public function getAllCategories() ;
    public function updateCategory($category , $data) ;
    public function deleteCategory($category) ;
    public function changeCategoryStatus($category) ;
}
