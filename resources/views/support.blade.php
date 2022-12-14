@extends('layout.default')
@section('content')
    <style>
        body{margin-top:20px;}
        .section_padding_130 {
            padding-top: 24px;
            padding-bottom: 130px;
        }
        .faq_area {
            position: relative;
            z-index: 1;
            background-color: #f5f5ff;
        }

        .faq-accordian {
            position: relative;
            z-index: 1;
        }
        .faq-accordian .card {
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
        }
        .faq-accordian .card:last-child {
            margin-bottom: 0;
        }
        .faq-accordian .card .card-header {
            background-color: #ffffff;
            padding: 0;
            border-bottom-color: #ebebeb;
        }
        .faq-accordian .card .card-header h6 {
            cursor: pointer;
            padding: 1.75rem 2rem;
            color: #3f43fd;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -ms-grid-row-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        .faq-accordian .card .card-header h6 span {
            font-size: 1.5rem;
        }
        .faq-accordian .card .card-header h6.collapsed {
            color: #070a57;
        }
        .faq-accordian .card .card-header h6.collapsed span {
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }
        .faq-accordian .card .card-body {
            padding: 1.75rem 2rem;
        }
        .faq-accordian .card .card-body p:last-child {
            margin-bottom: 0;
        }

        @media only screen and (max-width: 575px) {
            .support-button p {
                font-size: 14px;
            }
        }

        .support-button i {
            color: #3f43fd;
            font-size: 1.25rem;
        }
        @media only screen and (max-width: 575px) {
            .support-button i {
                font-size: 1rem;
            }
        }

        .support-button a {
            text-transform: capitalize;
            color: #2ecc71;
        }
        @media only screen and (max-width: 575px) {
            .support-button a {
                font-size: 13px;
            }
        }
    </style>
    <div class="col-lg-12 col-md-12 product-section pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-12">
                <div class="faq_area section_padding_130" id="faq">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-lg-12">
                                <!-- Section Heading-->
                                <div class="section_heading text-left wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <h3><span>How Can </span> We Help you?</h3>
                                    <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- FAQ Area-->
                            <div class="col-12 col-sm-10 col-lg-12">
                                <div class="accordion faq-accordian" id="faqAccordion">
                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can I install this app?<span class="lni-chevron-up"></span></h6>
                                        </div>
                                        <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem facere deserunt sint animi sapiente vitae suscipit.</p>
                                                <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">The apps isn't installing?<span class="lni-chevron-up"></span></h6>
                                        </div>
                                        <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem facere deserunt sint animi sapiente vitae suscipit.</p>
                                                <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="card-header" id="headingThree">
                                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Contact form isn't working?<span class="lni-chevron-up"></span></h6>
                                        </div>
                                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem facere deserunt sint animi sapiente vitae suscipit.</p>
                                                <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Support Button-->
                                <div class="support-button text-center d-flex align-items-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                    <i class="lni-emoji-sad"></i>
                                    <p class="mb-0 px-2">Can't find your answers?</p>
                                    <a href="#"> Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




