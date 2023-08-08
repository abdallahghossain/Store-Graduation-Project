@extends('front.parent')
@section('title', '| Cart')
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('cms/images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Cart</span>
                    </p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @auth('web')
                                    @if ($cart)
                                        @foreach ($cart['items'] as $item)
                                            <tr class="text-center" id="item_{{ $item['object']->id }}">
                                                <td  >
                                                    <button  onclick="deleteItem({{ $item['object']->id }})"> <svg viewBox="0 0 15 17.5" height="14" width="11.5"
                                                        xmlns="http://www.w3.org/2000/svg" class="icon">
                                                        <path transform="translate(-2.5 -1.25)"
                                                            d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z"
                                                            id="Fill"></path>
                                                    </svg></button>
                                                    </form>
                                                </td>
                                                <td class="image-prod h-20px w-20px">
                                                    <img class="img-fluid" style="width: 100px ; height: 100px;"
                                                        src={{ asset('images/product/' . $item['object']->image) }}
                                                        alt="Colorlib-Template">
                                                </td>

                                                <td class="product-name">
                                                    <h3>{{ $item['object']->name }}</h3>
                                                    <p class="text-primary">{{ Str::limit($item['object']->description, 30) }}
                                                    </p>
                                                </td>
                                                <td class="price">${{ $item['object']['price'] }}</td>
                                                <td class="quantity">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-btn mr-2 ">

                                                            <a href="{{ route('decreaseQty', $item['object']->id) }}">
                                                                <i class="ion-ios-remove" style="font-size: 30px;"></i>
                                                            </a>
                                                        </span>
                                                        <input type="text" name="quantity"
                                                            class="quantity form-control input-number"
                                                            value="{{ $item['qty'] }}" min="1" max="100">

                                                        <span class="input-group-btn ml-2">

                                                            <a href="{{ route('add-to-cart', $item['object']->id) }}">
                                                                <i class="ion-ios-add" style="font-size: 30px;"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="total">
                                                    <span
                                                        class="text-success">${{ $item['object']['price'] * $item['qty'] }}</span>
                                                </td><!-- END TR-->

                                            </tr><!-- END TR-->
                                        @endforeach
                                    @else
                                        <p>Your cart is empty.</p>
                                    @endif
                                @endauth

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price ">
                            <span>Total</span>
                            <span class="text-success">${{ $cart['total_price'] }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to
                            Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')

    <script>
        function deleteItem(id) {
            // Make an Ajax request to delete the item from the cart
            axios.delete(`/cart/delete/${id}`)
                .then(response => {
                    console.log(response.data.message);
                    const itemElement = document.getElementById(`item_${id}`);
                    if (itemElement) {
                        itemElement.remove();
                    }
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'item has been deleted',
                        showConfirmButton: true,
                        timer: 1500
                    })
                })
                .catch(error => {
                    console.error(error);
                    // Handle any errors or display error messages
                });
        }
    </script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
