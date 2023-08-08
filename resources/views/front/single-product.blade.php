@extends('front.parent')
@push('css')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>
@endpush
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('cms/images/bg_6.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                    <h1 class="mb-0 bread">Shop</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        {{-- <form action="{{ route('carts.store') }}" method="post">
            @csrf --}}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="container">
            @if (session('success'))
                <div id="success-message" class="alert alert-success" style="display: none;">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div id="error-message" class="alert alert-danger" style="display: none;">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('images/product/' . $product->image) }}" class="image-popup prod-img-bg img-fluid"><img
                            src="{{ asset('images/product/' . $product->image) }}"
                            style="width: 540px; height: 559;" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <div class="rating d-flex">
                        <!-- Rating Form -->
                        <form action="{{ route('products.rate', $product) }}" method="POST">
                            @csrf
                            <label for="rate">Rating:</label>
                            <div class="rate">
                                {{-- @for ($i = 1; $i <= 5; $i++)
                                  <input type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" />
                                  <label for="rating{{ $i }}"><i class="fa fa-star"></i></label>
                                @endfor --}}
                                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                <label for="star1" title="text">1 star</label>
                              </div>
                              <br>
                            <label for="comment">Review:</label>
                            <input name="comment" id="comment" rows="4" cols="50" />
                            <br>
                            <button type="submit">Submit Rating & Review</button>
                        </form>
                    </div>

                    <p class="price"><span>${{ $product->price }}</span></p>
                    <p>
                        {{ $product->description }}
                    </p>
                    <div class="row mt-4">

                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="quantity form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">80 piece available</p>
                        </div>
                    </div>
                    <p><a href="{{route('add-to-cart', $product->id)}}" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
                        <a href="cart.html" class="btn btn-primary py-3 px-5">Buy now</a>
                    </p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
                            href="#v-pills-1" role="tab" aria-controls="v-pills-1"
                            aria-selected="true">Description</a>

                        <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                            role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

                        <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"
                            role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content bg-light" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                            aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <h3 class="mb-4">{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4">Manufactured By Nike</h3>
                                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came
                                    from
                                    it would have been rewritten a thousand times and everything that was left from its
                                    origin would be the word "and" and the Little Blind Text should turn around and
                                    return
                                    to its own, safe country. But nothing the copy said could convince her and so it
                                    didn’t
                                    take long until a few insidious Copy Writers ambushed her, made her drunk with Longe
                                    and
                                    Parole and dragged her into their agency, where they abused her for their.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    <h3 class="mb-4">{{ $product->ratingCount() }} Reviews</h3>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                        </div>

                                        @if ($product->averageRating())
                                            <p>Average Rating: {{ $product->averageRating() }}</p>
                                        @else
                                            <p>No ratings yet.</p>
                                        @endif

                                        <!-- Individual Reviews -->
                                        @if ($reviews->count() > 0)
                                            <h3>Reviews</h3>
                                            <ul>
                                                @foreach ($reviews as $review)
                                                    <li>
                                                        <p>Rating: {{ $review->rating }}</p>
                                                        <p>Comment: {{ $review->comment }}</p>
                                                        <p>By: {{ $review->user->name }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No reviews yet.</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="rating-wrap">
                                        <h3 class="mb-4">Give a Review</h3>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                @if ($product->averageRating())
                                                    <span> {{ $product->averageRating() }}</span>
                                                @else
                                            </span>
                                            <span>{{ $product->ratingCount() }} Reviews</span>
                                            @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.display = 'block';

            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000); // Change the duration (in milliseconds) as per your requirement
        });
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'block';

            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 3000);
        });
    </script>
    <script>
        const ratingContainer = document.getElementById('rating');
        const ratingInputs = ratingContainer.querySelectorAll('input[name="rate"]');

        ratingInputs.forEach((input) => {
            input.addEventListener('change', () => {
                const selectedValue = input.value;
                console.log(`Selected rating: ${selectedValue}`);
            });
        });
    </script>
@endpush
