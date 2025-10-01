<?php

namespace App\Rules;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCategoryParent implements ValidationRule
{
    protected $categoryId;

    public function __construct($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // لو مفيش parent_id، اعتبرها صالحة (nullable)
        if (!$value) return;

        $category = Category::find($this->categoryId);
        $newParent = Category::find($value);

        // لو ملقيناش واحد منهم، يبقى التحقق فشل
        if (!$category || !$newParent) {
            $fail(__('validation.custom.parent_id.invalid_parent'));
            return;
        }

        //  لا يمكن يكون التصنيف أب لنفسه
        if ((int)$value === (int)$this->categoryId) {
            $fail(__('validation.custom.parent_id.self_parent'));
            return;
        }

        //  لا يمكن يكون أحد أبنائه أو أحفاده
        $current = $newParent;
        while ($current) {
            if ((int)$current->id === (int)$category->id) {
                $fail(__('validation.custom.parent_id.child_as_parent'));
                return;
            }
            $current = $current->parent;
        }

        //  لازم الأب الجديد يكون تصنيف رئيسي (ملهوش parent_id)
        if ($newParent->parent_id !== null) {
            $fail(__('validation.custom.parent_id.not_main_category'));
            return;
        }
    }
}
