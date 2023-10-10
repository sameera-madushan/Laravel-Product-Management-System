<?php

namespace App\Observers;
use App\Models\Category;

class CategoryObserver
{
    public function deleting(Category $category)
    {
        // Check if the category has associated products
        if ($category->products->count() > 0) {
            // Set the status to "inactive" instead of throwing an exception
            $category->update(['status' => 'inactive']);

            // You can also add a message to let the user know why it was not deleted
            session()->flash('message', 'Category cannot be deleted because it has associated products.');

            // Return false to indicate that the deletion was not successful
            return false;
        }
    }
}
