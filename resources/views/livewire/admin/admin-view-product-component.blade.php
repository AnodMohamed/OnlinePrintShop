<div >
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <section class="page-section breadcrumbs ">
                <div class="container">
                    <div class="page-header">
                        <h2 class="section-title"><span>View Ad</span></h2>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home')}}">Home</a></li>
                            <li class="active"><a href="{{ route('admin.products')}}">Mang My Ads</a> </li>
                            <li class="active">View Ad</li>
                        </ul>
                    </div>
                </div>
            </section>
            <div class="row product-single">
                {{---
                <div class="col-md-6">
                    <h4 class="text-danger text-center" style="">Please Upload Car's Images to make the Ad active  !</h4>
                </div>
                --}}
                              

              
            <div class="col-md-6">

                <div class="owl-carousel img-carousel">

                    @foreach ($imagex as $img )
                        @if(!empty($img))
                            <div class="item">
                                <a class="btn btn-theme btn-theme-transparent btn-zoom" href="{{ asset('storage/gallery') }}/{{ $img }}" data-gal="prettyPhoto" ><i class="fa fa-plus"></i></a>
                                <a href="{{ asset('storage/gallery') }}/{{ $img }}" data-gal="prettyPhoto"><img class="img-responsive" src="{{ asset('storage/gallery') }}/{{ $img }}" alt="" /></a>
                            </div>
                        @endif

                    @endforeach
                    
                    
                </div>
                <div class="row product-thumbnails">
                    @foreach ($imagex as $img )
                        @if(!empty($img))
                            <div class="col-xs-2 col-sm-2 col-md-3"><a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [0,300]);"><img src="{{ asset('storage/gallery') }}/{{ $img }}" alt=""/></a></div>
                         @endif
                     @endforeach

                </div>
            </div>
                        <div class="col-md-6">
                            <h2 class="product-title">Name :{{ $name }}</h2>
                            <div class="product-rating clearfix">
                            
                                <span class="reviews">Short description:</span> |<span class="add-review" >{{ $short_description }}</span>
                            </div>
                            <hr class="page-divider small"/>

                            <div class="product-price">Price: {{ $regular_price }}</div>
                            <div class="product-price">Sale: {{ $sale_price }}</div>

                            <hr class="page-divider"/>

                            <div class="product-text">
                                <p> Description :</p>
                                <p> {{ $description }}</p>
                                
                            </div>
                            <hr class="page-divider"/>
                            <hr class="page-divider small"/>

                            <hr class="page-divider small"/>

                            <table>
                                <tr>
                                    <td class="title">Featured:</td>
                                    <td>
                                        @if ($featured == "1")
                                            Yes 
                                        @else
                                            No   
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title">Quantity :</td>
                                    <td>{{ $quantity }}</td>
                                </tr>
                                <tr>
                                    <td class="title">Category :</td>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                            
                            </table>
                            
                            <hr class="page-divider small"/>
                            
                        

                        </div>
            </div>

        </div>
    </section>
    <!-- /PAGE -->



    <!-- PAGE -->
    {{----
    <section class="page-section">
        <div class="container">
            <div class="tabs-wrapper content-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#item-description" data-toggle="tab">Item Description</a></li>
                    <li><a href="#reviews" data-toggle="tab">Reviews (2)</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="item-description">
                        <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>
                        <p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis ipsum ornare. Integer a orci enim.</p>
                    </div>
                    <div class="tab-pane fade" id="reviews">

                        <div class="comments">
                            <div class="media comment">
                                <a href="#" class="pull-left comment-avatar">
                                    <img alt="" src="assets/img/preview/avatars/avatar-1.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <p class="comment-meta"><span class="comment-author"><a href="#">User Name Here</a> <span class="comment-date"> 26 days ago <i class="fa fa-flag"></i></span></span></p>
                                    <p class="comment-text">Donec ullamcorper nulla non metus auctor fringilla. Etiam porta sem malesuada magna mollis euismd. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere.</p>
                                </div>
                            </div>
                            <div class="media comment">
                                <a href="#" class="pull-left comment-avatar">
                                    <img alt="" src="assets/img/preview/avatars/avatar-3.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <p class="comment-meta"><span class="comment-author"><a href="#">User Name Here</a> <span class="comment-date"> 26 days ago <i class="fa fa-flag"></i></span></span></p>
                                    <p class="comment-text">Donec ullamcorper nulla non metus auctor fringilla. Etiam porta sem malesuada magna mollis euismd. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere.</p>
                                </div>
                            </div>
                        </div>
                        <div class="comments-form">
                            <h4 class="block-title">Add a Review</h4>
                            <form method="post" action="#" name="comments-form" id="comments-form">
                                <div class="form-group"><input type="text" placeholder="Your name and surname" class="form-control" title="comments-form-name" name="comments-form-name"></div>
                                <div class="form-group"><input type="text" placeholder="Your email adress" class="form-control" title="comments-form-email" name="comments-formemail"></div>
                                <div class="form-group"><textarea placeholder="Your message" class="form-control" title="comments-form-comments" name="comments-form-comments" rows="6"></textarea></div>
                                <div class="form-group"><button type="submit" class="btn btn-theme btn-theme-transparent btn-icon-left" id="submit"><i class="fa fa-comment"></i> Review</button></div>
                            </form>
                        </div>
                        <!-- // -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE -->

    ----}}
   
    </div>
    </div>
  </div>
</div>
<!-- /CONTENT AREA -->