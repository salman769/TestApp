@extends('layout.default')
@section('content')
    <style>
    .description-card{
        display: flex;
        justify-content: space-between;
    }
    .bootstrap-tagsinput .tag {
        background: #606EC5;
        padding: 4px;
        font-size: 14px;
        border-radius: 30px;
    }
    .characters-couter{
        margin-left: 6px;
    }
    .description-product{
        border: 1px solid #DFDFDF;
        padding: 8px;
        margin-left: 2%;
        max-width: 96%;
    }
    .cross-button{
        color: black;
        padding-left: 0 !important;
    }
    .badge-success {
        background-color: #5cb85c !important;
    }
    .badge-danger {
        background-color: blue  !important;
    }
    .badge-rejected {
        background-color: #fd006b  !important;
    }

    .loader {
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        display: none;
    }

    .loader1 {
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .insert-original{
     width: 100%;
    }
    .alignment{
        vertical-align: middle !important;
    }
    .product-title{
        font-weight: 500;
    }

    .custom-text1 {
        padding: 5px;
        width: 100%;
        height: 180px;
        float: left;
        margin: 5px;
    }
    .custom-text1#visible {
        overflow: visible;
    }
    .custom-text1#auto {
        overflow: auto;
    }
    .custom-text1#scroll {
        overflow: scroll;
    }
    .custom-text1#hidden {
        overflow: hidden;
    }
    </style>

    </style>
    <div class="col-lg-12 col-md-12 product-section pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6 page-name">
                <h3>Products</h3>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <div class="form-group">
                    <form action="{{route('products.filter')}}" method="GET">
                        <div class="input-group">
                            <input placeholder="Enter Product title" type="text" @if (isset($product_title)) value="{{$product_title}}" @endif  name="product_title" id="question_email" class="form-control">
                            @if(isset($product_title))
                                <a href="{{route('home')}}" type="button" class="btn btn-secondary clear_filter_data mr-1 pl-4 pr-4">Clear</a>
                            @endif
                            <button type="submit" class="btn btn-primary mr-1 pl-4 pr-4">Filter</button>
                            <a href="{{route('pay.stripe')}}" type="button" class="btn btn-primary">Pay Now</a>
                            <a href="{{route('sync.products')}}" type="button" class="btn btn-primary ml-1">Sync Products</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card product-table">
                    @if (count($products) > 0)
                        <table class="table">
                            <thead class="border-0 first-table">
                            <tr>
                                <th></th>
                                <th style="width: 25%;font-weight: bold;">Title</th>
                                <th style="width:25%;font-weight: bold;">Tags</th>
                                <th style="text-align: center;font-weight: bold;">Type</th>
                                <th style="text-align: center;font-weight: bold;">Remarks</th>
                                <th style="text-align: center;font-weight: bold;">Action</thead>
                            <tbody>
                            @foreach($products as $index1 => $product)
                                <tr class="single-product">
                                    <td class="" style="vertical-align: middle;"><a href="#">@if(isset($product->featured_image))<img src="{{$product->featured_image}}" width="40px" height="40px">@else <img src="{{asset('public/R.png')}}" width="50px" height="auto"> @endif</a></td>
                                    <td class="alignment product-title">{{$product->title}}</td>
                                    <td class="alignment">{{$product->tags}}</td>
                                    <td class="alignment text-center">{{$product->type}}</td>
                                    <td class="alignment text-center">
                                        <div class="badge badge-pill
                                                    @switch($product->status)
                                        @case('generated')
                                            badge-success
@break
                                        @case('not_generated')
                                            badge-danger
@break
                                        @endswitch
                                            ">@if($product->status == 'generated')  Generated @else Not Generated Yet @endif</div>
                                    </td>
                                    <td class="alignment" style="text-align: -webkit-center;">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary modal-description" type="button" href="{{route('product.view',$product->id)}}">View</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <b class="text-center  text-danger">No Products Available !</b>
                    @endif
                    <div class="pagination">
                        {{ $products->appends(\Illuminate\Support\Facades\Request::except('page'))->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection



