<x-base>

    <section class="section-conten padding-y" style="min-height:84vh">
        <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Create Product</h4>
                <form action="/add_product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label for="slug" class="form-label">Product Slug</label>
                        <input type="text" class="form-control" placeholder="Product Slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea name="description" class="form-control" placeholder="Product Description" id="floatingTextarea">
                        {{ old('description') }}
                        </textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label for="category" class="form-label">Product Category</label>
                        <select name="category_id" id="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" placeholder="Product Price" name="price" value="{{ old('price') }}">
                        @error('price')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label for="stock" class="form-label">Product Stock</label>
                        <input type="number" class="form-control" placeholder="Product Stock" name="stock" value="{{ old('stock') }}">
                        @error('stock')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <p class=" text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Create </button>
                    </div> <!-- form-group// -->
                </form>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->
        <!-- ============================ COMPONENT LOGIN  END.// ================================= -->

    </section>

</x-base>

