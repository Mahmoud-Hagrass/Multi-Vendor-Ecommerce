<div class="modal fade" id="create_category_modal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="modal-content">

                {{-- Modal Header --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">{{ __('dashboard.category_create') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="name_ar">{{ __('dashboard.category_name_ar') }}</label>
                        <input type="text" name="category_name[ar]" id="name_ar" class="form-control" placeholder="{{ __('dashboard.enter_category_name_ar') }}" value="{{ old('category_name.ar') }}">
                        @error('category_name.ar')
                              <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="name_en">{{ __('dashboard.category_name_en') }}</label>
                        <input type="text" name="category_name[en]" id="name_en" class="form-control" placeholder="{{ __('dashboard.enter_category_name_en') }}" value="{{ old('category_name.en') }}">
                         @error('category_name.en')
                              <strong class="text-danger">{{ $message }}</strong>
                         @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="parent_id">{{ __('dashboard.category_parent') }}</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option selected="" disabled>{{ __('dashboard.category_select') }}</option>
                            @foreach ($mainCategories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == old('parent_id'))>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                              <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">{{ __('dashboard.category_status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option selected="" disabled>{{ __('dashboard.category_select') }}</option>
                            <option value="{{ __('dashboard.active') }}"   @selected(old('status') === __('dashboard.active'))>{{ __('dashboard.active') }}</option>
                            <option value="{{ __('dashboard.in_active') }}" @selected(old('status') === __('dashboard.in_active'))>{{ __('dashboard.in_active') }}</option>
                        </select>
                        @error('status')
                               <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('dashboard.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('dashboard.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
