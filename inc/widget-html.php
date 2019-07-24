<?php 
// Rearrange country indexes to 0, 1, 2 etc. 
$supplier_indexed = array_slice($supplier_shipping, 0);
?>

<div class="supplier-wrapper pt-5">
<?php print_r(get_option('my_option')); ?>
  <!-- Supplier Header -->
  <div class="supplier-header row no-gutters">
    
		<div class="col-12 col-sm-10 col-md-7">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<a href="<?php echo $supplier_url; ?>">
						<img src="<?php echo $supplier_img; ?>" class="supplier-logo">
					</a>
				</div>
				<div class="col-lg-7">
					<div class="row mb-3 mt-3 mt-md-0">
						<div class="col-md-12">	
							<h5 class="supplier-name mb-0">
								<span class="supplier-title"><mark><?php echo $supplier_name; ?></mark></span>
								<span><?php echo $supplier_type; ?></span>
							</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h5 class="supplier-name mb-3 mb-md-0">
								<?php if ( $supplier_cat ) {
									foreach ( $supplier_cat as $category ) { ?>
									<span><?php echo $category; ?></span> 
								<?php } } ?>
							</h5>
						</div>
					</div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="supplier-name mb-3 mb-md-0">
                <span>Ships to: </span>
                <span class="ship-flags">
                <?php if ( $supplier_indexed ) {
                  foreach ( $supplier_indexed as $shipping ) { ?>
                    <?php 
                    if ($shipping == 'worldwide') { ?>

                    <i class="fas fa-globe-americas"></i>

                    <?php } else { ?>

                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $shipping;?>.png" alt="Icon">
                    
                <?php } 
                  } 
                } ?>
                </span> 
              </h5>
            </div>
          </div>
				</div>
			</div>
		</div>

		<div class="col-8 col-md-3 ml-lg-3 warehouse-location">
			
		<?php
		if ( $supplier_location ) { ?>
      <span>Warehouse location</span>
      <div class="supplier-map">
			  <?php echo $supplier_location; ?>
      </div>
      <?php if ( $supplier_address ) { ?>
      <span><?php echo $supplier_address; ?></span>
      <?php } ?>

      <?php 
      if ( $settings['list_warehouses'] ) { ?>
      <a role="button" data-toggle="collapse" href="#warehouses_collapse" aria-expanded="false" aria-controls="warehouses_collapse">Show <?php echo count($settings['list_warehouses']);?> more warehouse(s)</a>
      <ul class="collapse" id="warehouses_collapse">
        <?php 
        foreach (  $settings['list_warehouses'] as $item ) { 
          if ($item['supplier_warehouse']) { ?>
        <li><?php echo $item['supplier_warehouse']; ?></li>
        <?php } } ?>
      </ul>
    <?php } }?>

		</div>

		<div class="partner-badge">
      <?php	
      if ( $supplier_program === 'yes' ) { ?>
      <img src="<?php echo plugin_dir_url( __DIR__ );?>img/partner-badge.png" alt="Icon" title="Partnership with DSM Tool">
      <?php } ?>
    </div>     
    
  </div>

  <!-- About Supplier -->
  <div class="supplier-about row mt-4">

    <div class="col-12">
      <h3>Drop Shipping from <?php echo $supplier_name; ?></h3>
    </div>

    <div class="col-12 supplier-features">
      <div class="card-deck align-items-md-start">
        <div class="card bg-light">
          <div class="card-body text-center <?php echo $supplier_program ? 'card-bkgr' : ''; ?>">
            <h5 class="card-title">
              <?php echo $supplier_program ? 'Dropshipping Program' : "$supplier_name does not offer a Dropshipping Program"; ?>
            </h5>
            <p class="card-text">
              <?php
              if ( $supplier_program === 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                <i class="fas fa-times"></i>
              <?php } ?>
            </p>
          </div>
          <?php
          if ( $supplier_program === 'yes') { ?>
          <div class="card-footer">
            <p class="card-text"><?php echo $supplier_programTextarea; ?></p>
          </div>
          <?php } ?>
          <?php
          if ( $supplier_programButton === 'yes') { ?>
          <div class="card-button">
            <a href="<?php echo $supplier_programButtonLink; ?>" class="btn btn-primary btn-sm" target="_blank"><?php echo $supplier_programButtonText; ?></a>
          </div>
          <?php } ?>
        </div>
        <div class="card bg-light">
          <div class="card-body text-center <?php echo $supplier_reseller ? 'card-bkgr' : ''; ?>">
            <h5 class="card-title">
              <?php echo $supplier_reseller ? 'Reseller Agreement' : "No information available about re-sell agreement from $supplier_name"; ?>
            </h5>
            <p class="card-text">
              <?php
              if ( $supplier_reseller === 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                <i class="fas fa-times"></i>
              <?php } ?>
            </p>
          </div>
          <?php
          if ( $supplier_reseller === 'yes') { ?>
          <div class="card-footer">
            <p class="card-text"><?php echo $supplier_resellerTextarea; ?></p>
          </div>
          <?php } ?>
          <?php
          if ( $supplier_resellerButton === 'yes') { ?>
          <div class="card-button">
            <a href="<?php echo $supplier_resellerButtonLink; ?>" class="btn btn-primary btn-sm" target="_blank"><?php echo $supplier_resellerButtonText; ?></a>
          </div>
          <?php } ?>
        </div>
        <div class="card bg-light">
          <div class="card-body text-center <?php echo $supplier_packaging ? 'card-bkgr' : ''; ?>">
            <h5 class="card-title">
              <?php echo $supplier_packaging ? 'Dropship Packaging' : "No information available about packages from $supplier_name"; ?>
            </h5>
            <p class="card-text">
              <?php
              if ( $supplier_packaging === 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                <i class="fas fa-times"></i>
              <?php } ?>
            </p>
          </div>
          <?php
          if ( $supplier_packaging === 'yes') { ?>
          <div class="card-footer">
            <p class="card-text"><?php echo $supplier_packagingTextarea; ?></p>
          </div>
          <?php } ?>
          <?php
          if ( $supplier_packagingButton === 'yes') { ?>
          <div class="card-button">
            <a href="<?php echo $supplier_packagingButtonLink; ?>" class="btn btn-primary btn-sm" target="_blank"><?php echo $supplier_packagingButtonText; ?></a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="col-12 mt-2 supplier-policies">
      <div class="card-deck">
        <?php 
        if ( $supplier_shipButton === 'yes' ) { ?>
        <div class="card">
          <div class="card-body text-center">
            <a href="<?php echo $supplier_ship['url']; ?>" class="card-link" <?php echo $supplier_targetShipping; ?> <?php echo $supplier_nofollowShipping; ?>>Shipping Policy</a>
          </div>
        </div>
        <?php } ?>	
        <?php
        if ( $supplier_returnButton === 'yes' ) { ?>		
        <div class="card">
          <div class="card-body text-center">
          <a href="<?php echo $supplier_return['url']; ?>" class="card-link" <?php echo $supplier_targetReturn; ?> <?php echo $supplier_nofollowReturn; ?>>Return Policy</a>
          </div>
        </div>
        <?php } ?>		
        <?php
        if ( $supplier_paymentButton === 'yes' ) { ?>		
        <div class="card">
          <div class="card-body text-center">
          <a href="<?php echo $supplier_payment['url']; ?>" class="card-link" <?php echo $supplier_targetPayment; ?> <?php echo $supplier_nofollowPayment; ?>>Payment Methods</a>
          </div>
        </div>
        <?php } ?>				
      </div>
    </div>

  </div>

  <!-- DSM Tool Integration Section -->
  <div class="supplier-integration row mt-3 mt-sm-5">

    <div class="col-12">
      <h3>DSM Tool Integration with <?php echo $supplier_name; ?></h3>
    </div>

    <div class="col-12">
      <div class="table-responsive integrations_table">
        <table class="table">
          <thead>
            <tr>
              <th>
                <a href="https://chrome.google.com/webstore/detail/dsm-auto-paste-chrome-ext/ecdbmkcphlholpojdglodopmlaficcji" target="_blank">Items Collector (FREE!)<img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/chrome_icon.png" class="chrome_table">
                </a>
              </th>
              <th>
                <a href="http://support.dsmtool.com/rapid-lister-bulk-lister-and-ebay-templates" target="_blank">Lister</a>
              </th>
              <th>
                <a href="http://support.dsmtool.com/rapid-lister-bulk-lister-and-ebay-templates" target="_blank">Repricer</a>
              </th>
              <th>
                <a href="https://chrome.google.com/webstore/detail/dsm-auto-paste-chrome-ext/ecdbmkcphlholpojdglodopmlaficcji" target="_blank">DSM Auto Paste (FREE!)<img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/chrome_icon.png" class="chrome_table"></a>
              </th>
              <th>
                <a href="http://support.dsmtool.com/sales-and-auto-orders/auto-order-and-tracking-numbers/dsm-auto-ordering-system-guide" target="_blank">Auto Order & Tracking Update</a>
              </th>
              <th>Ships to</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?php if ( $supplier_itemsCollector == 1 ) { ?>
                  <i class="fas fa-check"></i>
                <?php } else { ?>
                  <i class="fas fa-times"></i>
                <?php } ?>
              </td>
              <td>
                <?php if ( $supplier_lister == 1 ) { ?>
                  <i class="fas fa-check"></i>
                <?php } else { ?>
                  <i class="fas fa-times"></i>
                <?php } ?>
              </td>
              <td class="repricer_table">
                <?php echo 'Up to ' .$supplier_repriceInterval. ' min';?>
              </td>
              <td>
                <?php if ( $supplier_autoPaste == 1 ) { ?>
                  <i class="fas fa-check"></i>
                <?php } else { ?>
                  <i class="fas fa-times"></i>
                <?php } ?>
              </td>
              <td>
                <?php if ( $supplier_autoOrder == 1 ) { ?>
                  <i class="fas fa-check"></i>
                <?php } else { ?>
                  <i class="fas fa-times"></i>
                <?php } ?>
              </td>
              <td>
                <?php if ( count($supplier_shipping) > 2 ) { ?>
                  <span class="notooltip_table">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[0];?>.png" alt="Icon">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[1];?>.png" alt="Icon">
                  </span>
                  <span class="tooltip_table">...view more</span>
                  <span>
                  <?php
                  $supplier_length = count($supplier_shipping);
                  for( $i=2; $i < $supplier_length; $i++ ) { ?>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[$i];?>.png" alt="Icon">
                  <?php
                  } ?>
                  </span>
                <?php
                } else if ( count($supplier_shipping) == 2 ) { ?>
                  <span class="notooltip_table">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[0];?>.png" alt="Icon">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[1];?>.png" alt="Icon">
                  </span>
                <?php
                } else if ( count($supplier_shipping) == 1 ) {
                  if ( $supplier_indexed[0] == 'worldwide' ) { ?>
                    <span class="worldwide_table">
                      <i class="fas fa-globe-americas"></i>
                    </span>
                    <span>Worldwide</span>
                  <?php
                  } else { ?>
                    <span class="notooltip_table">
                      <img src="<?php echo get_stylesheet_directory_uri();?>/inc/landingPage/imgs/flag_<?php echo $supplier_indexed[0];?>.png" alt="Icon">
                    </span>
                  <?php 
                  }
                }
                ?>
              </td>
            </tr>					
          </tbody>
        </table>
      </div>
      <div class="card-deck supplier-banners">
        <?php
        if ( $supplier_articleButton === 'yes' ) { ?>	
        <div class="card bg-light font-weight-bolder">
          <div class="card-body text-center">
            <a href="<?php echo $supplier_article['url']; ?>" class="card-link" <?php echo $supplier_targetArticle; ?> <?php echo $supplier_nofollowArticle; ?>>
              <img src="<?php echo plugins_url( 'dsm-suppliers/img/icon-knowledgebase.png'); ?>" class="card-img-top">
              <span class="clearfix"></span>
              Dropship Academy Article
            </a>
          </div>
        </div>
        <?php } ?>
        <?php
        if ( $supplier_youtubeButton === 'yes' ) { ?>				
        <div class="card bg-light font-weight-bolder">
          <div class="card-body text-center">
            <a href="<?php echo $supplier_youtube['url']; ?>" class="card-link" <?php echo $supplier_targetYoutube; ?> <?php echo $supplier_nofollowYoutube; ?>>
              <img src="<?php echo plugins_url( 'dsm-suppliers/img/icon-youtube-channel.png'); ?>" class="card-img-top">
              <span class="clearfix"></span>
              Youtube Video
            </a>
          </div>
        </div>
        <?php } ?>
        <?php
        if ( $supplier_helpButton === 'yes' ) { ?>				
        <div class="card bg-light font-weight-bolder">
          <div class="card-body text-center">
            <a href="<?php echo $supplier_help['url']; ?>" class="card-link" <?php echo $supplier_targetHelp; ?> <?php echo $supplier_nofollowHelp; ?>>
              <img src="<?php echo plugins_url( 'dsm-suppliers/img/icon-dsm-magazine.png'); ?>" class="card-img-top">
              <span class="clearfix"></span>
              Help Center
            </a>
          </div>
        </div>
        <?php } ?>			
      </div>
    </div>

  </div>

  <!-- Community Section -->
  <div class="supplier-banner row mt-2 mt-sm-5">
    <div class="col-12">
      <a href="http://www.dsmtool.com?utm_campaign=suppliers_directory" target="_blank">
        <img src="<?php echo plugin_dir_url( __DIR__ );?>img/partner-banner.jpg" alt="Banner" title="Go to DSM Tool">
      </a>
    </div>
  </div>

  <!-- Community Section -->
  <div class="supplier-community row mt-2 mt-sm-5">

    <div class="col-12">
      <h3>Community</h3>
    </div>

    <div class="col-12">

      <?php
      if ($settings['list_social']) { ?>

      <div class="card mt-1">
        <ul class="navbar justify-content-center align-items-start mb-0">
          <?php 
          foreach (  $settings['list_social'] as $item ) {

            if ( $item['supplier_socialSelect'] === 'facebook' ) { ?>
              <li class="nav-item supplier-social-item text-center">
                <a href="<?php echo $item['supplier_socialLink']; ?>" class="nav-link icon-facebook">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                  <h6><?php echo $item['supplier_socialTitle']; ?></h6>
                </a>
              </li>    
            <?php }

            if ( $item['supplier_socialSelect'] === 'youtube' ) { ?>
              <li class="nav-item supplier-social-item text-center">
                <a href="<?php echo $item['supplier_socialLink']; ?>" class="nav-link icon-youtube">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                  <h6><?php echo $item['supplier_socialTitle']; ?></h6>
                </a>
              </li>    
            <?php }

            if ( $item['supplier_socialSelect'] === 'twitter' ) { ?>
              <li class="nav-item supplier-social-item text-center">
                <a href="<?php echo $item['supplier_socialLink']; ?>" class="nav-link icon-twitter">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                  <h6><?php echo $item['supplier_socialTitle']; ?></h6>
                </a>
              </li>    
            <?php }

            if ( $item['supplier_socialSelect'] === 'instagram' ) { ?>
              <li class="nav-item supplier-social-item text-center">
                <a href="<?php echo $item['supplier_socialLink']; ?>" class="nav-link icon-instagram">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                  <h6><?php echo $item['supplier_socialTitle']; ?></h6>
                </a>
              </li>    
            <?php }

          } ?>
        </ul>
      </div>
      <?php } ?>

      <?php 
      if ( $settings['list_reviews'] ) { ?>
        
      <div class="card mt-1">
        <ul class="navbar justify-content-center mb-0">
          <?php 
          foreach (  $settings['list_reviews'] as $item ) { 
            if ($item['supplier_reviewsTitle'] && $item['supplier_reviewsLink']) { ?>
          <li class="nav-item supplier-reviews-item">
            <a href="<?php echo $item['supplier_reviewsLink']; ?>" class="nav-link"><?php echo $item['supplier_reviewsTitle']; ?></a>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <?php } ?>
    </div>

  </div>

  <!-- Dropshippers Reviews -->
  <div class="supplier-reviews row mt-4 mt-sm-5">

    <div class="col-12">
      <h3>Dropshippers Reviews</h3>
      <p>Have you been using this supplier? Tell the drop shipping community about your experience!</p>
    </div>

    <div class="col-12">
      <!-- <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
      <div class="fb-comments" data-href="http://dsm.newsroom.local/" data-width="100%" data-numposts="5"></div> -->
      <?php echo do_shortcode('[gs-fb-comments]'); ?>
    </div>

  </div>

</div>