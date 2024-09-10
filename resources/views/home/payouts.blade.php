 @include('home.header')
 
 <div data-elementor-type="wp-post" data-elementor-id="294" class="elementor elementor-294" data-elementor-settings="[]">
    <div class="elementor-section-wrap">
            <section class="ob-is-breaking-bad elementor-section elementor-top-section elementor-element elementor-element-f1ac91d elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="f1ac91d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;_ob_bbad_use_it&quot;:&quot;yes&quot;,&quot;_ob_bbad_sssic_use&quot;:&quot;no&quot;,&quot;_ob_glider_is_slider&quot;:&quot;no&quot;}">
        <div class="elementor-background-overlay">
        </div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b36272c elementor-invisible" data-id="b36272c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-467b2a0 ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="467b2a0" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h1 class="elementor-heading-title elementor-size-default">Our Latest Payouts
                            </h1>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-293bf1b ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="293bf1b" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h5 class="elementor-heading-title elementor-size-default">We move, create opportunities, check out our most recent payouts
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ob-is-breaking-bad elementor-section elementor-top-section elementor-element elementor-element-fc804ab elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="fc804ab" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;_ob_bbad_use_it&quot;:&quot;yes&quot;,&quot;_ob_bbad_sssic_use&quot;:&quot;no&quot;,&quot;_ob_glider_is_slider&quot;:&quot;no&quot;}">
        <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-75eb816" data-id="75eb816" data-element_type="column" data-settings="{&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                
                <div class="elementor-widget-wrap elementor-element-populated">
                    
                    <div class="elementor-element elementor-element-1823532 ob-harakiri-inherit elementor-invisible elementor-widget elementor-widget-heading" data-id="1823532" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
        
      <div class="container">

    
        <div class="row">
          <div class="col-lg-12 col-md-6"></div>
          <div class="transaction-box">
              <br />
            <p align="center"><font color="black">Take A Look At The Latest Withdrawal From Our Website</font></p>
            <div class="tab-content clearfix">
              <div id="tab1" class="tab-pane active">
                <div class="shadow table-responsive">
                    <br />
                  <table class="table table-striped">
                    <thead class="bg-light" >
                      <tr style="background-color: #5A80C4; color: #fff;">
                          
                          <th scope="col">ID</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">CRYPTO</th>
                        <th scope="col">WALLET</th>
                        <th scope="col">TIME</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                         
                    @foreach($withdrawals as $deposit)
                     <?php $i++ ?>
                      <tr >
                          <td scope="row">{{ $i}}</td>
                        <td>{{$settings->currency}}{{number_format($deposit->amount)}}</td>
                        <td>{{$deposit->payment_mode}}</td>
                        <td>{{$deposit->hash_id}}</td>
                        <td>
                        
                        {{ Carbon\Carbon::parse($deposit->created_at)->diffForHumans()}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
            </div>

            
          </div>
        </div>
      </div>
      </div>
      </div>
    </section>
    <!-- End transaction -->
    <br />
    
    <div data-elementor-type="footer" data-elementor-id="44" class="elementor elementor-44 elementor-location-footer" data-elementor-settings="[]">
    <div class="elementor-section-wrap">
        <section class="ob-is-breaking-bad elementor-section elementor-top-section elementor-element elementor-element-cacbd92 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cacbd92" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;_ob_bbad_use_it&quot;:&quot;yes&quot;,&quot;_ob_bbad_sssic_use&quot;:&quot;no&quot;,&quot;_ob_glider_is_slider&quot;:&quot;no&quot;}">
            <div class="elementor-background-overlay">
            </div>
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ee6ef09 elementor-invisible" data-id="ee6ef09" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-background-overlay">
                        </div>
                        <div class="elementor-element elementor-element-b45c6e6 ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="b45c6e6" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h1 class="elementor-heading-title elementor-size-default">Need Prove?
                                </h1>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6f47ad4 ob-harakiri-inherit elementor-widget elementor-widget-heading" data-id="6f47ad4" data-element_type="widget" data-settings="{&quot;_ob_harakiri_writing_mode&quot;:&quot;inherit&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h4 class="elementor-heading-title elementor-size-default">Check out our latest payouts.
                                </h4>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-06d3e6a elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="06d3e6a" data-element_type="widget" data-settings="{&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="divider.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-divider">
                      <span class="elementor-divider-separator">
                      </span>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-2bf00cb elementor-widget elementor-widget-button" data-id="2bf00cb" data-element_type="widget" data-settings="{&quot;_ob_butterbutton_use_it&quot;:&quot;no&quot;,&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a href="https://phoenix-trading.net/invest/payouts" class="elementor-button-link elementor-button elementor-size-md" role="button">
                        <span class="elementor-button-content-wrapper">
                          <span class="elementor-button-text">View Payouts
                          </span>
                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1ac2771" data-id="1ac2771" data-element_type="column" data-settings="{&quot;_ob_bbad_is_stalker&quot;:&quot;no&quot;,&quot;_ob_teleporter_use&quot;:false,&quot;_ob_column_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_column_has_pseudo&quot;:&quot;no&quot;}">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-737986f elementor-widget elementor-widget-elementskit-video" data-id="737986f" data-element_type="widget" data-settings="{&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="elementskit-video.default">
                            <div class="elementor-widget-container">
                                <div class="ekit-wid-con" >
                                    <div class="video-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
      @include('home.footer') 
        
