@extends('layouts.master')
@section('title')
Dashboard 
@endsection
@section('content')
<main>
<div class="container container-updated" style="margin-top:12%">
<section class="elementor-section elementor-top-section elementor-element elementor-element-8b8f427 elementor-section-content-middle features-section features-12 left shape--bg  shape--white-500 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8b8f427" data-element_type="section">
						<div class="elementor-container elementor-column-gap-extended">
					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c101cec wow fadeInRight" data-id="c101cec" data-element_type="column" style="visibility: visible; animation-name: fadeInRight;">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="txt-block elementor-element elementor-element-754e01b elementor-widget elementor-widget-content-text" data-id="754e01b" data-element_type="widget" data-widget_type="content-text.default">
				<div class="elementor-widget-container">
			<span class="name-element section-id">One-Stop Solution</span><h2 class="title-element s-46 w-700">Smart solutions, real-time results</h2><p class="subtitle-element default">
            PinsBuilder is the ultimate Pinterest automation tool that empowers creators, marketers, and businesses to scale their Pinterest strategy effortlessly. With PinsBuilder, you can generate up to 1,000 high-quality, dynamic pins in just seconds, saving time and boosting your reach.
<div class="cbox-1 ico-15"><div class="cbox-1-txt"><p><b>Key Features:</b></p></div>
</div>
<div class="cbox-1 ico-15">
    <div class="ico-wrap color--theme">
        <div class="cbox-1-ico">&nbsp;</div>
    </div>
        <div class="cbox-1-txt">
    <p>Create bulk pins quickly with customizable templates.
    </p></div>
</div>
<div class="cbox-1 ico-15">
    <div class="ico-wrap color--theme">
        <div class="cbox-1-ico">&nbsp;</div>
    </div>
        <div class="cbox-1-txt">
    <p>Optimize pins with SEO-friendly descriptions.
    </p></div>
</div>
<div class="cbox-1 ico-15">
    <div class="ico-wrap color--theme">
        <div class="cbox-1-ico">&nbsp;</div>
    </div>
        <div class="cbox-1-txt">
    <p>Drive traffic and engagement with stunning visuals.
    </p></div>
</div>
<div class="cbox-1 ico-15">
    <div class="ico-wrap color--theme">
        <div class="cbox-1-ico">&nbsp;</div>
    </div>
        <div class="cbox-1-txt">
    <p>Perfect for bloggers, e-commerce brands, and content creators.
    </p></div>
</div>
        <div class="d-flex btn-trait-group flex-wrap justify-content-start gap-2 mb-2"></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-566f886 wow fadeInLeft" data-id="566f886" data-element_type="column" style="visibility: visible; animation-name: fadeInLeft;">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-db74e24 elementor-widget elementor-widget-martex_features" data-id="db74e24" data-element_type="widget" data-widget_type="martex_features.default">
				<div class="elementor-widget-container">
			<!-- FEATURES-6 WRAPPER -->
<div class="fbox-wrapper">
    
<div class="row">
    
        <div class="col-md-6">
            <a href="{{url('request-pinterest-access-token')}}">
            <!-- FEATURE BOX #1 -->
            <div class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
                                    <!-- Icon -->
                    <div class="fbox-ico ico-50">
                        <div class="shape-ico color--theme">
                                                            <span class="flaticon-graphics"></span>
                                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)"></path>
                            </svg>
                        </div>
                    </div> <!-- End Icon -->
                                <!-- Text -->
                <div class="fbox-txt">
                    <h5 class="s-19 w-700">Verify Pinterest Profile 
                    @if(auth()->user()->code)    
                    <i class="fas fa-check-circle"></i>
                    @endif
                </h5>
                    <p>Authenticate your Pinterest account to connect seamlessly and start scheduling your pins effortlessly.</p>
                </div>
            </div>
                </a>
        </div>

    
        <div class="col-md-6">
            <!-- FEATURE BOX #1 -->
            <div class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
                                    <!-- Icon -->
                    <div class="fbox-ico ico-50">
                        <div class="shape-ico color--theme">
                                                            <span class="flaticon-idea"></span>
                                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)"></path>
                            </svg>
                        </div>
                    </div> <!-- End Icon -->
                                <!-- Text -->
                <div class="fbox-txt">
                    <h5 class="s-19 w-700"><a href="{{url('fetch-all-boards')}}">Import Boards</a></h5>
                    <p>Import your Pinterest boards to easily manage and schedule pins directly from your account. </p>
                </div>
            </div>
        </div>

    
        <div class="col-md-6">
            <!-- FEATURE BOX #1 -->
            <div class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
                                    <!-- Icon -->
                    <div class="fbox-ico ico-50">
                        <div class="shape-ico color--theme">
                                                            <span class="flaticon-graphic"></span>
                                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)"></path>
                            </svg>
                        </div>
                    </div> <!-- End Icon -->
                                <!-- Text -->
                <div class="fbox-txt">
                    <h5 class="s-19 w-700"><a href="{{url('generate')}}">Generate Pins</a></h5>
                    <p>"Effortlessly generate pins by fetching images directly from your website. Select the ones you want, customize them, and get them ready to publish on Pinterest in just a few clicks." </p>
                </div>
            </div>
        </div>

    
        <div class="col-md-6">
            <!-- FEATURE BOX #1 -->
            <div class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
                                    <!-- Icon -->
                    <div class="fbox-ico ico-50">
                        <div class="shape-ico color--theme">
                                                            <span class="flaticon-search-engine-1"></span>
                                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)"></path>
                            </svg>
                        </div>
                    </div> <!-- End Icon -->
                                <!-- Text -->
                <div class="fbox-txt">
                    <h5 class="s-19 w-700"><a href="{{url('scheduling')}}">Schedule Pins</a></h5>
                    <p>"Set your pins to be published automatically at your preferred times. Simply schedule once, and let the system handle the rest for consistent Pinterest activity."</p>
                </div>
            </div>
        </div>

    </div></div> <!-- END FEATURES-6 WRAPPER -->		</div>
				</div>
					</div>
		</div>
							</div>
		</section>        
     </div>
</main>
@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            toastr.success("{{ session('success') }}");
        });
    </script>
@endif

@endsection