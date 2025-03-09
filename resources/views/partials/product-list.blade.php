<!-- Partial View - resources/views/partials/product-list.blade.php -->
@foreach ($products as $product)
    <div class="col item">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('product.view', $product->id) }}"><img class="img-fluid" src="{{ asset($product->image) }}"></a>
                <h4 class="card-title" style="font-size: 16px; margin-top: 12px;">{{ $product->name }}</h4>
                <p class="card-text" style="font-size: 16px;">Price:&nbsp;<span>₱{{ $product->price }}</span></p>
                <div class="row text-center d-flex justify-content-between buy-add-button">
                    <div class="col" style="padding: 0px 0px;">
                        <button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;width: 90%;height: 30px;background: #d7ac4b;border-style: none;">
                            <a class="text-decoration-none" href="#" style="color: var(--bs-light);">Buy Now</a>
                        </button>
                    </div>
                    <div class="col" style="padding: 0px 0px;">
                        <button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;background: #d7ac4b;border-style: none;width: 90%;height: 30px;">
                            <a class="text-decoration-none" href="#" style="color: var(--bs-light);font-size: 12px;">Add to Cart</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
