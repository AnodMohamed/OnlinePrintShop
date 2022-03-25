<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Manage Categories</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Manage Categories</li>
                </ul>
            </div>
        </section>
        
        <section class="page-section ">
            @if (!$categories->isEmpty())

                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm">
                </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at </th>
                            <th scope="col">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>

                            <td> 
                                <a herf="" onclick="confirm('Are you sure, You want to delete {{$category->name}} category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px "  class="btn btn-danger "> 
                                Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                
            @else
                <div class="col-md-12">
                    <p class="text-center">There is no category to display</p>
                </div>
            @endif
                <div class="required" style="text-align: center;">
                    <a href="{{ route('admin.AddCategory')}}"   class="btn  btn-theme btn-theme-dark " > Add Category</a>
                </div>
            

        </section>
    </div>
</main>
