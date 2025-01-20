@extends('layouts.master')
@section('content')
<div id="page" class="page"><main id="content" class="main container-full pt-100 pb-0">
     
     <div class="overflow-hidden post-645 page type-page status-publish hentry entry">
         <div data-elementor-type="wp-page" data-elementor-id="645" class="elementor elementor-645">
                                 <section class="elementor-section elementor-top-section elementor-element elementor-element-c5c930d elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c5c930d" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-no">
                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-af33213" data-id="af33213" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <section class="elementor-section elementor-inner-section elementor-element elementor-element-09be7e2 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="09be7e2" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-extended">
             <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-cf70a16" data-id="cf70a16" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="section-title mb-70 elementor-element elementor-element-c635457 elementor-widget elementor-widget-section_title" data-id="c635457" data-element_type="widget" data-widget_type="section_title.default">
             <div class="elementor-widget-container">
         <h2 class="title-element s-46">Questions? Let's Talk</h2><p class="description-element s-21">Want to learn more about Martex, get a quote, or speak with an expert? Let us know what you are looking for and we’ll get back to you right away </p>		</div>
             </div>
                 </div>
     </div>
     </div>
                         </div>
     </section>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-c8dcc9b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c8dcc9b" data-element_type="section" id="contacts-1">
                     <div class="elementor-container elementor-column-gap-default">
             <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e078eb8" data-id="e078eb8" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-9162e20 elementor-widget elementor-widget-shortcode" data-id="9162e20" data-element_type="widget" data-widget_type="shortcode.default">
             <div class="elementor-widget-container">
                 <div class="elementor-shortcode">
<div class="wpcf7 no-js" id="wpcf7-f7-p645-o1" lang="en-US" dir="ltr" data-wpcf7-id="7">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form action="{{url('/contactUs')}}" method="post" id="contactForm" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
@csrf()
<div class="form-holder">
                             <div class="row contact-form">

                                 <!-- Form Select -->
                                 <div class="col-md-12 input-subject"> 
                                                                             <p class="p-lg"> This question is about: </p> 
                                     <span>Choose a topic, so we know who to send your request to: </span>

                                                                              
                                                                             <span class="wpcf7-form-control-wrap" data-name="question"><select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form-select subject" aria-required="true" aria-invalid="false" name="question"><option value="">&#8212;Please choose an option&#8212;</option><option value="This question is about...">This question is about...</option><option value="Registering/Authorising">Registering/Authorising</option><option value="Using Application">Using Application</option><option value="Troubleshooting">Troubleshooting</option><option value="Backup/Restore">Backup/Restore</option><option value="Other">Other</option></select></span>  
                                      
                                 </div>
                                                                                     
                                 <!-- Contact Form Input -->
                                 <div class="col-md-12">
                                     <p class="p-lg">Your Name: </p>
                                     <span>Please enter your real name: </span>
                                                                             <span class="wpcf7-form-control-wrap" data-name="name"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control name" aria-required="true" aria-invalid="false" placeholder="Your Name*" value="" type="text" name="name" /></span> 
                                 </div>
                                             
                                 <div  class="col-md-12">
                                     <p class="p-lg">Your Email Address: </p>
                                     <span>Please carefully check your email address for accuracy</span>
                                                                             <span class="wpcf7-form-control-wrap" data-name="email"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email form-control email" aria-required="true" aria-invalid="false" placeholder="Email Address*" value="" type="email" name="email" /></span>  
                                 </div>
     
                                 <div class="col-md-12">
                                     <p class="p-lg">Explain your question in details: </p>
                                     <span>Your OS version, Martex version & build, steps you did. Be VERY precise!</span>
                                                                             <span class="wpcf7-form-control-wrap" data-name="textarea"><textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea form-control message" aria-invalid="false" placeholder="I have a problem with..." name="textarea"></textarea></span> 
                                 </div> 
                                                                                     
                                 <!-- Contact Form Button -->
                                 <div class="col-md-12 mt-15 form-btn text-right">	
                                                                             <input class="wpcf7-form-control wpcf7-submit has-spinner btn btn--theme hover--theme submit" type="submit" value="Submit Request" />
                                      
                                 </div>

                                 <div class="contact-form-notice">
                                     <p class="p-sm">We are committed to your privacy. Martex uses the information you 
                                        provide us to contact you about our relevant content, products, and services. 
                                        You may unsubscribe from these communications at any time. For more information, 
                                        check out our <a href="privacy.html">Privacy Policy</a>.
                                     </p>
                                 </div>
                                                                                                                         
                                 <!-- Contact Form Message -->
                                 <div class="col-lg-12 contact-form-msg">
                                     <span class="loading"></span>
                                 </div>	
                                                                                         
                             </div>	
                          </div><div class="wpcf7-response-output" aria-hidden="true"></div>
</form>
</div>
</div>
             </div>
             </div>
                 </div>
     </div>
                         </div>
     </section>
                 </div>
     </div>
                         </div>
     </section>
             <section class="elementor-section elementor-top-section elementor-element elementor-element-64a151b6 elementor-section-full_width elementor-section-content-middle mc-response-form elementor-section-height-default elementor-section-height-default" data-id="64a151b6" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-no">
                 <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6216016c" data-id="6216016c" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-4d91dc1a elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="4d91dc1a" data-element_type="widget" data-widget_type="divider.default">
             <div class="elementor-widget-container">
         <style>/*! elementor - v3.18.0 - 04-12-2023 */
.elementor-widget-divider{--divider-border-style:none;--divider-border-width:1px;--divider-color:#0c0d0e;--divider-icon-size:20px;--divider-element-spacing:10px;--divider-pattern-height:24px;--divider-pattern-size:20px;--divider-pattern-url:none;--divider-pattern-repeat:repeat-x}.elementor-widget-divider .elementor-divider{display:flex}.elementor-widget-divider .elementor-divider__text{font-size:15px;line-height:1;max-width:95%}.elementor-widget-divider .elementor-divider__element{margin:0 var(--divider-element-spacing);flex-shrink:0}.elementor-widget-divider .elementor-icon{font-size:var(--divider-icon-size)}.elementor-widget-divider .elementor-divider-separator{display:flex;margin:0;direction:ltr}.elementor-widget-divider--view-line_icon .elementor-divider-separator,.elementor-widget-divider--view-line_text .elementor-divider-separator{align-items:center}.elementor-widget-divider--view-line_icon .elementor-divider-separator:after,.elementor-widget-divider--view-line_icon .elementor-divider-separator:before,.elementor-widget-divider--view-line_text .elementor-divider-separator:after,.elementor-widget-divider--view-line_text .elementor-divider-separator:before{display:block;content:"";border-bottom:0;flex-grow:1;border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--element-align-left .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-left .elementor-divider-separator:before{content:none}.elementor-widget-divider--element-align-left .elementor-divider__element{margin-left:0}.elementor-widget-divider--element-align-right .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-right .elementor-divider-separator:after{content:none}.elementor-widget-divider--element-align-right .elementor-divider__element{margin-right:0}.elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator{border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--separator-type-pattern{--divider-border-style:none}.elementor-widget-divider--separator-type-pattern.elementor-widget-divider--view-line .elementor-divider-separator,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:after,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:before,.elementor-widget-divider--separator-type-pattern:not([class*=elementor-widget-divider--view]) .elementor-divider-separator{width:100%;min-height:var(--divider-pattern-height);-webkit-mask-size:var(--divider-pattern-size) 100%;mask-size:var(--divider-pattern-size) 100%;-webkit-mask-repeat:var(--divider-pattern-repeat);mask-repeat:var(--divider-pattern-repeat);background-color:var(--divider-color);-webkit-mask-image:var(--divider-pattern-url);mask-image:var(--divider-pattern-url)}.elementor-widget-divider--no-spacing{--divider-pattern-size:auto}.elementor-widget-divider--bg-round{--divider-pattern-repeat:round}.rtl .elementor-widget-divider .elementor-divider__text{direction:rtl}.e-con-inner>.elementor-widget-divider,.e-con>.elementor-widget-divider{width:var(--container-widget-width,100%);--flex-grow:var(--container-widget-flex-grow)}</style>		<div class="elementor-divider">
         <span class="elementor-divider-separator">
                     </span>
     </div>
             </div>
             </div>
             <section class="elementor-section elementor-inner-section elementor-element elementor-element-2e242d33 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2e242d33" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-extended">
                 <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-cd9f2da" data-id="cd9f2da" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="txt-block elementor-element elementor-element-58781b48 elementor-widget elementor-widget-content-text" data-id="58781b48" data-element_type="widget" data-widget_type="content-text.default">
             <div class="elementor-widget-container">
         <h2 class="title-element s-36">
Stay up to date with our news, ideas and updates
</h2>		</div>
             </div>
                 </div>
     </div>
             <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1772971f" data-id="1772971f" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-401bf968 elementor-widget elementor-widget-shortcode" data-id="401bf968" data-element_type="widget" data-widget_type="shortcode.default">
             <div class="elementor-widget-container">
                 <div class="elementor-shortcode">		<div id="newsletter-1" class="form-newsletters newsletter-section">
         <form id="mc-form" class="newsletter-form" novalidate="true">
             <div class="form-group input-group">
                 <input id="mc-email" name="EMAIL" class="input-email form-control" autocomplete="off" type="email" placeholder="Enter your email here" required="required">
                 <span class="input-group-btn">
                     <button type="submit" class="btn btn--theme hover--theme">Subscribe</button>
                 </span>
             </div>
         </form>

         <div id="mc-response" class="mc-response mt-15"></div>
     </div>
 </div>
             </div>
             </div>
                 </div>
     </div>
                         </div>
     </section>
             <div class="elementor-element elementor-element-26a8b5ee elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="26a8b5ee" data-element_type="widget" data-widget_type="divider.default">
             <div class="elementor-widget-container">
                 <div class="elementor-divider">
         <span class="elementor-divider-separator">
                     </span>
     </div>
             </div>
             </div>
                 </div>
     </div>
                         </div>
     </section>
                         </div>
     </div>		

             </main><!-- .container -->
</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        let form = $(this);
        let formData = form.serialize(); // Serialize form data
        let actionUrl = '/contactUs'; // Get the form action URL

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                // Optional: Add a loading spinner or disable the submit button
                $('.submit').val('Submitting...').prop('disabled', true);
            },
            success: function (response) {
                // Handle success response
                alert('Your request has been submitted successfully!');
                form[0].reset(); // Reset the form fields
            },
            error: function (xhr) {
                // Handle error response
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';
                $.each(errors, function (key, value) {
                    errorMessages += value + '\n';
                });
                alert('Error: \n' + errorMessages);
            },
            complete: function () {
                // Optional: Remove the loading spinner or enable the submit button
                $('.submit').val('Submit Request').prop('disabled', false);
            },
        });
    });
});

</script>
@endsection