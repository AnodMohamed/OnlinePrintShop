<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Manage Products</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Manage Products</li>
                </ul>
            </div>
        </section>
        
        <section class="page-section ">
            @if (!$products->isEmpty())

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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Stock status</th>
                            <th scope="col">Regular price</th>
                            <th scope="col">Sale price</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td >{{$product->id}}</td>
                                <td ><img src="{{asset('storage/products')}}/{{$product->image}}" width="60" /> </td>
                                <td >{{$product->name}}</td>
                                <td >{{$product->stock_status}}</td>
                                <td >{{$product->regular_price}}</td>
                                <td >{{$product->sale_price}}</td>
                                <td >{{$product->created_at}}</td>
                                <td >
                                    <a herf="" onclick="confirm('Are you sure, You want to delete {{$product->name}} product') || event.stopImmediatePropagation()"  wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left:10px "  class="btn btn-danger "> 
                                        Delete
                                    </a>
                                    <a href="{{route('admin.viewProduct',['product_slug'=>$product->slug ])}}" class="btn btn-info " style="margin-left:10px ">
                                        View
                                     </a>
                                </td>
                            </tr>
                        @endforeach    
                       
                        
                        </tbody>
                    </table>
                
            @else
                <div class="col-md-12">
                    <p class="text-center">There is no product to display</p>
                </div>
            @endif
                <div class="required" style="text-align: center;">
                    <a href="{{ route('admin.addProduct')}}"   class="btn  btn-theme btn-theme-dark " > Add Product</a>
                </div>
            

        </section>
    </div>
</main>
