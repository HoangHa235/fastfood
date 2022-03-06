<div class="col-12">
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row" id="listProduct">
                @foreach($products as $key => $product)
                <div class="col-lg-4 col-md-6 special-grid drinks">
                    <div class="gallery-single fix">
                        <img src="{{url('public/uploads')}}/{{$product->thumb}}" class="img-fluid" alt="Image" style="width: 350px;height: 219px;">
                        <div class="why-text">
                            <h4>{{$product->name}}</h4>
                            <p>{{$product->description}}</p>
                            <h5>{!! \App\Helpers\Helper::price($product->price,$product->price_sale) !!}</h5>
                                <div style="display: flex;">
                                    <!-- <button type="submit" class="btn btn-dark">
                                        <a href="#" style="color: white;">Mua ngay</a>
                                    </button> -->
                                    <button type="button" class="btn btn-warning" style="margin-left: 10px;">
                                        <a href="/projectlaravel/san-pham/{{$product->id}}-{{ Str::slug($product->name,'-')}}.html" style="color: black;">Xem ngay</a>
                                    </button>
                                    @csrf 
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

