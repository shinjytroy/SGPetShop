@if ($prods->count() >= 1)
    <div class="row">
        <ul class="product-list grid-products equal-container">
        @foreach($prods as $item)
            <div id="updateDiv">
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ Route('product.details', $item->slug, $item->categorie_id) }}" title="{{ $item->name }}">
                                <figure><img src="{{ asset('/images/'. $item->image) }}" alt="{{ $item->name }}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{ $item->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">{{ $item->sale_price }} $</span></div>
                            <a href="{{ Route('product.details', $item->slug, $item->categorie_id) }}" class="btn add-to-cart">Add To Cart</a>
                        </div>
                    </div>
                </li>
            </div>
        @endforeach	
        </ul>
    </div>  
@else
    <div class="col-md-12 my-5 text-center">
    <h2>NOTHING FOUND</h2>
    </div>
@endif
