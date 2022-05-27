<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>My orders</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">My orders</li>
                </ul>
            </div>
        </section>
        <section class="page-section">
            <div class="container" style="width: 100%">
                @if (!$Orders->isEmpty())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name </th>
                            <th scope="col">subtotal</th>
                            <th scope="col">discount</th>
                            <th scope="col">tax </th>
                            <th scope="col">total  </th>
                            <th scope="col">firstname</th>

                            <th scope="col">lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">mobile</th>
                            <th scope="col">line1  </th>
                            <th scope="col">line2</th>

                            <th scope="col">province</th>
                            <th scope="col">zipcode</th>
                            <th scope="col">shippmode</th>
                            <th scope="col">paymentmode </th>
                            <th scope="col">status </th>
                            <th scope="col">Control </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($Orders as $Order )
                        <tr>
                            <th scope="row">{{$Order->id}}</th>
                            <td>{{$Order->subtotal}}</td>

                            <td>{{$Order->subtotal}}</td>
                            <td>{{$Order->discount}}</td>
                            <td>{{$Order->tax}}</td>
                            <td>{{$Order->total}}</td>

                            <th>{{$Order->firstname}}</th>
                            <td>{{$Order->lastname}}</td>
                            <td>{{$Order->email}}</td>
                            <td>{{$Order->mobile}}</td>
                            <td>{{$Order->line1}}</td>
                            <th>{{$Order->line2}}</th>
                            <th>{{$Order->zipcode}}</th>

                            <td>{{$Order->province}}</td>
                            <td>{{$Order->shippmode}}</td>
                            <td>{{$Order->paymentmode}}</td>
                            <td>{{$Order->status}}</td>

                            <td>
                                @if ($Order->shippmode == 'Delivery')
                                    @php 
                                        $orderdriver =DB::table('order_drivers')->where('order_id',$Order->id )->count();

                                    @endphp
                                    @if ($orderdriver == '0')
                                        <a href="{{route('admin.orders.selectdriver',['order_id'=>$Order->id ])}}" class="btn btn-succss " style="margin-left:10px ">
                                            Driver
                                        </a>
                                    @endif
                               
                                                                
                                @endif
                                <a href="{{route('admin.orders.changestatus',['order_id'=>$Order->id ])}}" class="btn btn-info " style="margin-left:10px ">
                                    status
                                 </a>
                            </td>


                          
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                @else
                    <p class="text-center">There is no user to display</p>
                @endif
                
            </div>
        </section>
        
    </div>
</main>
