

<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Add Product</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('admin.products') }}">Manage Products </a></li>  
                    <li class="active">Add Product</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class="container"  style="width:1000px">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                 @endif
                <form name="contact-form"   wire:submit.prevent="storeProduct" class="contact-form" id="contact-form">

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label for="name">Product Name</label>
                            <input type="text" wire:model="name" wire:keyup=" generateSlug" name="name" id="name" placeholder="Product Name" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Product is required">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="slug">Product Slug</label>
                            <input type="text" wire:model="slug" name="slug" id="slug" placeholder="Product Slug" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="slug is required">
                            @error('slug')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required" wire:ignore>
                        <div class="form-group af-inner">
                            <label  for="slug">Short Description</label>
                            <textarea type="text" wire:model="short_description" name="short_description" id="short_description" placeholder="Short Description" value=""  title="" class="form-control placeholder" ></textarea>
                            @error('short_description')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required" wire:ignore>
                        <div class="form-group af-inner">
                            <label  for="description"> Description</label>
                            <textarea type="text" wire:model="description" name="description" id="description" placeholder="description" value=""   title="" class="form-control placeholder" ></textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
     
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="regular_price"> Regular Price</label>
                            <input type="text" wire:model="regular_price" name="regular_price" id="regular_price" placeholder="regular Price" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="regular price is required">
                            @error('regular_price')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="sale_price"> Sale Price</label>
                            <input type="text" wire:model="sale_price" name="sale_price" id="sale_price" placeholder="Sale Price" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Sale Price is required">
                            @error('sale_price')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="SKU"> SKU</label>
                            <input type="text" wire:model="SKU" name="SKU" id="SKU" placeholder="SKU " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="SKU is required">
                            @error('SKU')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
  
                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="SKU"> Stock</label>
                            <select wire:model="stock_status" name="stock_status" id="stock_status" placeholder="Stock status " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Stock status is required">
                                <option value="instock">InStock </option>
                                <option value="outofstock">Out of Stock </option>
                            </select>
                            @error('stock_status')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>   

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="SKU"> Featured</label>
                            <select wire:model="featured" name="featured" id="featured" placeholder="Featured " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Featured is required">
                                <option value="0">No </option>
                                <option value="1">Yes </option>
                            </select>
                            @error('featured')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> 

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="quantity"> Quantity</label>
                            <input type="text" wire:model="quantity" name="quantity" id="quantity" placeholder="Quantity " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Quantity is required">

                            @error('quantity')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> 

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="image"> Product Image</label>
                            <input type="file" wire:model="image" name="image" id="image" placeholder="Product Image " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Product Image is required">

                            @error('image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            @if ($image)
                                <img src="{{$image->temporaryUrl()}}" width="120" hieght="120" />
                            @endif      
                        </div>
                    </div> 

                    
                <div class="mb-6 col-8">
                    <label class=" control-label">Product Gallery </label>
                    <p class="text-secondary">Select all images one time </p>
                    <input type="file" placeholder="Product images" class="form-control input-md input-file" wire:model="images" multiple/>
                    @error('images')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    @if ($images)
                        @foreach ($images as $img)
                            <img src="{{$img->temporaryUrl()}}" width="120" hieght="120" />
                        @endforeach
                    @endif
                </div> 
                
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="SKU"> Category</label>
                            <select wire:model="category_id" name="category_id" id="category_id"  value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="category is required">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>   
              

                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Add Product</button>
                    </div>

                </form>

            </div>
        </section>
    </div>
</main>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    })
                }
            });
            tinymce.init({
                selector: '#description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);
                    })
                }
            });
        });
    </script>
@endpush
