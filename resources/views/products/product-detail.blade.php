@extends('layout.default')
@section('content')
    <div class="col-lg-12 col-md-12 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Product Detail</h3>
            </div>
        </div>
        <div class="row pt-2 pl-3">
            <div class="col-sm-8 mb-2">
                <div class="card bg-white border-0 shadow-sm">
                    <div class="card-header text-white bg-primary border-light">
                     {{$product->title}}
                    </div>
                    <div class="card-body">
                        {!! $product->description !!}}
                    </div>
                </div>

                @if(count($product->varients) > 0)
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Media</p>
                            <div class="row">
                                @foreach($product->varients as $varient)
                                    @if(isset($varient->image))
                                        <div class="col-md-3">
                                            <img src="{{$varient->image}}" width="80px" height="auto">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card ">
                    <div class="card-body">
                        <div>
                            <p class="card-title">Pricing</p>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-md-6">
                                <p class="" style="font-size: 14px;font-weight: 500;">Price:</p>
                                <p class="card-description" style="margin-top: -10px">{{number_format($product->varients[0]->price,2)}}</p>
                            </div>
                            <div class="col-md-6" style="padding-left: 10px">
                                <p class="" style="font-size: 14px;font-weight: 500;">Compare at price:</p>
                                <p class="card-description" style="margin-top: -10px">@if($product->varients[0]->compare_at_price){{$product->varients[0]->compare_at_price}}@else{{number_format(00,2)}}@endif</p>
                            </div>
                        </div>

                        <div>
                            <p class="card-title">Inventory</p>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-md-6">
                                <p>Inventory managed by:</p>
                                <p class="card-description" style="margin-top: -10px">{{$product->varients[0]->inventory_management}}</p>
                            </div>
                            <div class="col-md-6" style="padding-left: 10px">
                                <p class="" style="font-size: 14px;font-weight: 500;">SKU (Stock Keeping Unit):</p>
                                <p class="card-description" style="margin-top: -10px">{{$product->varients[0]->sku}}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <p class="card-title">QUANTITY</p>
                            </div>
                            <div style="padding: 10px">
                                <p class="" style="font-size: 14px;font-weight: 500;">Available:</p>
                                <p class="card-description" style="margin-top: -10px">{{$product->varients[0]->inventory_quantity}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card bg-white mb-4">
                        <div class="card-header bg-primary text-white">
                            <p class="card-title">Product Status</p>
                        </div>
                        <div class="card-body" style="padding: 10px">
                            <p class="card-description">{{$product->status}}</p>
                        </div>
                </div>
                <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <p class="card-title">Organization</p>
                        </div>
                    <div class="card-body">
                        <div style="padding: 10px">
                            <p>Product Type:</p>
                            <p class="card-description" style="margin-top: -10px">{{$product->type}}</p>
                        </div>
                        <div style="padding-left: 10px">
                            <p>Vendor:</p>
                            <p class="card-description" style="margin-top: -10px">{{$product->vendor}}</p>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <p class="card-title">Tags</p>
                        </div>
                    <div class="card-body">
                        <div style="padding: 10px">
                            @if($product->tags)
                                <p class="card-description">{{$product->tags}}</p>
                            @else
                                <p >No Tags</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

