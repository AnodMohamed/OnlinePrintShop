

<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Add  Category</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('admin.categories') }}">Manage Categories</a></li>
                    <li class="active">Add Category</li>
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
                <form name="contact-form"   wire:submit.prevent="storeCategory" class="contact-form" id="contact-form">

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="name">Category Name</label>
                            <input type="text" wire:model="name"  wire:keyup=" generaleslug" name="name" id="name" placeholder="Category Name" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Name is required">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="slug">Category Slug</label>
                            <input type="text" wire:model="slug" name="slug" id="slug" placeholder="Category Slug" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="slug is required">
                            @error('slug')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Add Category</button>
                    </div>

                </form>

            </div>
        </section>
    </div>
</main>
