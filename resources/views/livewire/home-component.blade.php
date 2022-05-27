
    <!-- CONTENT AREA -->
    <div class="content-area">


        


        <!-- PAGE -->
        <section class="page-section">
            <div class="container">
                <div class="message-box">
                    <div class="message-box-inner">
                        <h2>Print File </h2>
                        <a  class="btn btn-theme btn-theme-transparent btn-icon-left" href=" {{ route('user.uploadfileToPrint') }} "><i class="fa fa-shopping-cart"></i>Upload File</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE -->


        <!-- Accessories PAGE -->
        @if (!$products->isEmpty())
        <section class="page-section">
            <div class="container">
                <h2 class="section-title"><span>Summaries</span></h2>
                <div class="row">
                    @foreach ($products as $product)

                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto" href="{{asset('storage/products')}}/{{$product->image}}">
                                        <img src="{{asset('storage/products')}}/{{$product->image}}" alt=""/>
                                        <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="{{ route('productDetiles',['product_slug'=>$product->slug ]) }}" >{{ $product->name}}</a></h4>
                                   
                                    <div class="price"><ins>>{{ $product->regular_price }}</ins></div>
                                    <div class="buttons">
                                           <a  wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </section>
        @endif 

        <!-- Accessories PAGE -->
        @if (!$accessories->isEmpty())
        <section class="page-section">
            <div class="container">
                <h2 class="section-title"><span>Accessories</span></h2>
                <div class="row">
                    @foreach ($accessories as $accessory)

                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto" href="{{asset('storage/products')}}/{{$accessory->image}}">
                                        <img src="{{asset('storage/products')}}/{{$accessory->image}}" alt=""/>
                                        <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="{{ route('productDetiles',['product_slug'=>$accessory->slug ]) }}" >{{ $product->name}}</a></h4>
                                    <div class="price"><ins>{{ $accessory->regular_price }}</ins></div>
                                    <div class="buttons">
                                           <a href="{{route('user.uploadFileForAccessory',['product_slug'=>$accessory->slug ])}}" class="btn btn-theme btn-theme-transparent btn-icon-left" ><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </section>
        @endif 
        <!-- /PAGE -->



    </div>
    <!-- /CONTENT AREA -->