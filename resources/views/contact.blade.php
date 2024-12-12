@extends('layouts.master')

@section('content')

    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content">
                    <h3 class="breadcrumb__title">Contact us</h3>
                    <span class="breadcrumb__subtitle">Home <i class="far fa-angle-right"></i> <a href="#"> Contact us</a></span>
                    <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                        <span><a href="#">Home</a></span>
                        <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                        <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- breadcrumb area end -->


        <!-- contact area start -->
        <div class="tp-contact-area pt-130 pb-130">
        <div class="container">
            <div class="row g-0 align-items-center justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-5 col-12">
                    <div class="contact-box">
                    <div class="contact-box-circle">
                        <span>O</span>
                        <span>R</span>
                    </div>
                    <h3 class="contact-box__title">Contact <br> Directly</h3>
                    <div class="contact-box__info-list">
                        <ul>
                            <li><a href="tel:4805550103"><i class="fal fa-phone-alt"></i> (480) 555-0103</a></li>
                            <li><a href="https://www.google.com.bd/maps/@-26.7452242,128.312617,5.17z" target="_blank"><i class="fal fa-map-marker-alt"></i> Canberra, Australia</a></li>
                            <li><a href="/cdn-cgi/l/email-protection#dcb1b5bfb4b9b0b0b9f2aeb5aab9aebd9cb9a4bdb1acb0b9f2bfb3b1"><i class="fal fa-globe"></i><span class="__cf_email__" data-cfemail="dbb3beb7ab9bbea3bab6abb7bef5b8b4b6">[email&#160;protected]</span></a></li>
                        </ul>
                    </div>
                    <div class="contact-box__social">
                        <ul>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-12">
                    <div class="postbox__comment-form contact-wrapper">
                    <h3 class="postbox__comment-form-title">Send us a
                        Message</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="postbox__comment-input">
                                <input type="text" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="postbox__comment-input">
                                <input type="email" placeholder="Enter your mail">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="postbox__comment-input">
                                <textarea placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="postbox__comment-btn">
                                <button type="submit" class="tp-btn">Let,s Talk</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- contact area end -->



        <!-- tp-social-area-start -->
        <div class="tp-social-area social-space-bottom fix">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <a href="#">
                    <div class="tp-social-item">
                        <span><i class="fab fa-facebook-f"></i> Facebook</span>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <a href="#">
                    <div class="tp-social-item tp-youtube">
                        <span><i class="fab fa-youtube"></i> youtube</span>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                <a href="#">
                    <div class="tp-social-item tp-behance">
                        <span><i class="fab fa-behance"></i> behance</span>
                    </div>
                </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <a href="#">
                    <div class="tp-social-item tp-dribble">
                        <span><i class="fab fa-dribbble"></i> dribbble</span>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <a href="#">
                    <div class="tp-social-item tp-twitter">
                        <span><i class="fab fa-twitter"></i> twitter</span>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                <a href="#">
                    <div class="tp-social-item tp-linkedin">
                        <span><i class="fab fa-linkedin"></i>linkedin</span>
                    </div>
                </a>
                </div>
            </div>
        </div>
        </div>
        <!-- tp-social-area-end -->
    </main>

@endsection
