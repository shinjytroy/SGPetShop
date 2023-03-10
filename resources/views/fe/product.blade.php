@extends('fe.layout')
@section('contents')
<div class="container">

  <div class="wrap-breadcrumb">
    <ul>
      <li class="item-link"><a href="{{ Route('home') }}" class="link">home</a></li>
      <li class="item-link"><span>Product Details</span></li>
    </ul>
  </div>
  <div class="row">

    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
      <div class="wrap-product-detail">
        <div class="detail-media">
          <div class="product-gallery">
            <ul class="slides">

              <li data-thumb="{{ asset('/images/' . $prod->image) }}">
                <img src="{{ asset('/images/' . $prod->image) }}" alt="{{ $prod->name }}" />
              </li>

            </ul>
          </div>
        </div>
        <div class="detail-info">
          <div class="product-rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <a href="#" class="count-review">(05 review)</a>
          </div>
          <h2 class="product-name">{{ $prod->name }}</h2>
          <!-- <div class="short-desc">
              <ul>
                  <li>7,9-inch LED-backlit, 130Gb</li>
                  <li>Dual-core A7 with quad-core graphics</li>
                  <li>FaceTime HD Camera 7.0 MP Photos</li>
              </ul>
          </div> -->
          @php
          $price=number_format("$prod->price");
          @endphp
          <div class="wrap-social">
            <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
          </div>
          <div class="wrap-price"><span class="product-price">{{ $price }} $</span></div>
          <br>
          <!-- <div class="wrap-stock"><span class="product-stock">SL: {{ $prod->stock }} </span></div> -->
          <div class="stock-info in-stock">
              <p class="availability">Availability: <b>In Stock</b></p>
          </div>
          <div class="quantity">
            <span>Quantity:</span>
            <div class="quantity-input">
              <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
              
              <a class="btn btn-reduce" href="#"></a>
              <a class="btn btn-increase" href="#"></a>
            </div>
          </div>
          <div class="wrap-butons">
            <a href="#" class="btn add-to-cart">Add to Cart</a>
              <div class="wrap-btn">
                  <a href="#" class="btn btn-compare">Add Compare</a>
                  <a href="#" class="btn btn-wishlist">Add Wishlist</a>
              </div>
          </div>
        </div>
        <div class="advance-info">
          <div class="tab-control normal">
            <a href="#description" class="tab-control-item active">description</a>
            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
            <a href="#review" class="tab-control-item">Reviews</a>
          </div>
          <div class="tab-contents">
            <div class="tab-content-item active" id="description">
              {{ $prod->description }}
            </div>
            <div class="tab-content-item " id="add_infomation">
              <table class="shop_attributes">
                <tbody>
                  <tr>
                    <th>Weight</th><td class="product_weight">1 kg</td>
                  </tr>
                  <tr>
                    <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                  </tr>
                  <tr>
                    <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-content-item " id="review">
              
              <div class="wrap-review-form">
                
                <div id="comments">

                  <h2 class="woocommerce-Reviews-title">01 review for <span>{{$prod->name}}</span></h2>
                  <ol class="commentlist">
                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                      <div id="comment-20" class="comment_container"> 
                        <img alt="" src="assets/images/avatar-Thao.png" height="80" width="80">

                        <div class="comment-text">
                          <div class="star-rating">
                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                          </div>
                          <p class="meta"> 
                     
                           @foreach($review as $items)
                           @if($items->product_id == $prod->id)
                           @php
                           $nameuser = DB::table('users')->where('id',"=",$items->user_id)->value('name');
                           @endphp
                            <strong class="woocommerce-review__author">{{$nameuser}}</strong> 
                           
                            <span class="woocommerce-review__dash">:</span>
                            <time class="woocommerce-review__published-date" >{{$items->created_at}}</time>
                           
                          </p>
                          <div class="description">
                            <p>{{$items->description}}</p>                                              
                          </div>
                          @endif
                         @endforeach
                          

                         
                          
                        </div>
                      </div>
                    </li>
                  </ol>
                </div><!-- #comments -->

                <div id="review_form_wrapper">
                  <div id="review_form">
                    <div id="respond" class="comment-respond"> 
                      @if(Session::get('user'))
                      <form action="{{Route('processReview')}}" method="post" id="commentform" class="comment-form" novalidate="">
                        @csrf
                        <p class="comment-notes">
                          <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                        </p>
                        <div class="comment-form-rating">
                          <span>Your rating</span>
                          <p class="stars">
                            
                            <label for="rated-1"></label>
                            <input type="radio" id="rated-1" name="rating" value="1">
                            <label for="rated-2"></label>
                            <input type="radio" id="rated-2" name="rating" value="2">
                            <label for="rated-3"></label>
                            <input type="radio" id="rated-3" name="rating" value="3">
                            <label for="rated-4"></label>
                            <input type="radio" id="rated-4" name="rating" value="4">
                            <label for="rated-5"></label>
                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                          </p>
                        </div>
                        

                        <p class="comment-form-author">
                        
                          <input type="hidden" id="product_id" type="text" name="product_id" value="{{$prod->id}}" >

                        </p>

                        <p class="comment-form-author">
                          <label for="user_id">Name <span class="required">*</span></label> 
                          <input id="user_id" type="text" name="user_id" value="{{Session::get('user')->name}}" placeholder="Your name">

                        </p>

                        <p class="comment-form-comment">
                          <label for="description">Your review <span class="required">*</span>
                          </label>
                          <textarea id="description" name="description" cols="45" rows="8"></textarea>
                        </p>
                        <p class="form-submit">
                          <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                        
                        </p>
                        @if(Session::has('thongbao'))
                        <div class="badge badge-success">
                          {{Session::get('thongbao')}}
                        </div>
                        @endif
                        
                      </form>
                      @else 
                      <div>Please Login To Review </div>
                      <a href="{{Route('login')}}">Login</a>
                      @endif
                    </div><!-- .comment-respond-->
                  </div><!-- #review_form -->
                </div><!-- #review_form_wrapper -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--end main products area-->

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
      <div class="widget widget-our-services ">
        <div class="widget-content">
          <ul class="our-services">

            <li class="service">
              <a class="link-to-service" href="#">
                <i class="fa fa-truck" aria-hidden="true"></i>
                <div class="right-content">
                  <b class="title">Free Shipping</b>
                  <span class="subtitle">On Oder Over $99</span>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                </div>
              </a>
            </li>

            <li class="service">
              <a class="link-to-service" href="#">
                <i class="fa fa-gift" aria-hidden="true"></i>
                <div class="right-content">
                  <b class="title">Special Offer</b>
                  <span class="subtitle">Get a gift!</span>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                </div>
              </a>
            </li>

            <li class="service">
              <a class="link-to-service" href="#">
                <i class="fa fa-reply" aria-hidden="true"></i>
                <div class="right-content">
                  <b class="title">Order Return</b>
                  <span class="subtitle">Return within 7 days</span>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div><!-- Categories widget-->

      <div class="widget mercado-widget widget-product">
        <h2 class="widget-title">Popular Products</h2>
        <div class="widget-content">
          <ul class="products">
            <li class="product-item">
              <div class="product product-widget-style">
                <div class="thumbnnail">
                  <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                    <figure><img src="assets/images/products/digital_01.jpg" alt=""></figure>
                  </a>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                  <div class="wrap-price"><span class="product-price">$168.00</span></div>
                </div>
              </div>
            </li>

            <li class="product-item">
              <div class="product product-widget-style">
                <div class="thumbnnail">
                  <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                    <figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
                  </a>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                  <div class="wrap-price"><span class="product-price">$168.00</span></div>
                </div>
              </div>
            </li>

            <li class="product-item">
              <div class="product product-widget-style">
                <div class="thumbnnail">
                  <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                    <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                  </a>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                  <div class="wrap-price"><span class="product-price">$168.00</span></div>
                </div>
              </div>
            </li>

            <li class="product-item">
              <div class="product product-widget-style">
                <div class="thumbnnail">
                  <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                    <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                  </a>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                  <div class="wrap-price"><span class="product-price">$168.00</span></div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div><!--end sitebar-->

    <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Related Products</h3>
        <div class="wrap-products">
          <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item new-label">new</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><span class="product-price">$250.00</span></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item sale-label">sale</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item new-label">new</span>
                  <span class="flash-item sale-label">sale</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item bestseller-label">Bestseller</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><span class="product-price">$250.00</span></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><span class="product-price">$250.00</span></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item sale-label">sale</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item new-label">new</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><span class="product-price">$250.00</span></div>
              </div>
            </div>

            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                  <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item bestseller-label">Bestseller</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                <div class="wrap-price"><span class="product-price">$250.00</span></div>
              </div>
            </div>

          </div>
        </div><!--End wrap-products-->
      </div>
    </div>

  </div><!--end row-->

</div><!--end container-->
@endsection

@section("myjs")
<script>
  const pid = "{{ $prod->id }}"
  const url = "{{ Route('addCart') }}"
  

  $(document).ready(function() {
    $('.add-to-cart').click(function(e) {
      e.preventDefault(); // b??? t??c d???ng c???a link
      //let pid = $(this).data("id"); // l???y id t??? data-id
      let quantity = $('input[name="product-quatity"]').val();
      // d??ng jquery ajax g???i request v??? server
      $.ajax({
          type: 'post',
          url: url,     // url?pid=3&quantity=1&_token=23423
          data: {
              pid: pid, 
              quantity: quantity,
              _token: '{{ csrf_token() }}',
          }, success: function(data) {
              alert('add product to cart successful.');
              location.reload();
          }
      });
    });
    });
</script>
@endsection