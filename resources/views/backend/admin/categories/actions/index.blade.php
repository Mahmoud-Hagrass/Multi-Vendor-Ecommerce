<div class="action-buttons" style="display: flex; align-items: center;">
    @can('category_update' , App\Models\Admin::class)
        <!-- Edit Button -->
        <div style="margin-left: 5px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_category_modal_{{ $category->id }}"
            class="btn btn-sm btn-warning" title="Edit">
                <i class="fas fa-edit"></i> {{ __('dashboard.edit') }}
            </a>
        </div>
    @endcan


     @can('category_delete' , App\Models\Admin::class)
        <!-- Delete Button -->
        <div style="margin-left: 5px;">
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="margin: 0; padding: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteCategoryForm" class="btn btn-sm btn-danger" title="Delete" onclick="confirmDelete()">
                    <i class="fas fa-trash-alt"></i> {{ __('dashboard.delete') }}
                </button>
            </form>
        </div>
    @endcan

    @can('category_change_status' , App\Models\Admin::class)
        <!-- Change Status Button -->
        <div>
            <form action="{{ route('admin.categories.change-status') }}" method="POST">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <button type="submit" class="btn btn-sm btn-secondary" title="Change Status" onclick="toggleStatus()">
                    <i class="fas fa-sync-alt"></i> {{ __('dashboard.change_status') }}
                </button>
            </form>
        </div>
    @endcan
</div>
