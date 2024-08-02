<?php 
defined('ABSPATH') or die("Not Allowed");
add_filter( 'wp_mail', 'disable_wp_mail' );
function disable_wp_mail( $args ) {
    return null;
}
add_action('admin_init', 'disable_admin_notifications');
function disable_admin_notifications() {
    remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_init', 'disable_all_admin_notices');
function disable_all_admin_notices() {
    remove_all_actions('admin_notices');
    remove_all_actions('all_admin_notices');
}
$totalcounts = 0;
$getparentcategory = apies_function(apibaseurl."getallParentCategory.php");
foreach($getparentcategory->categories as $parentcategory){ $totalcounts += $parentcategory->productcount; }

?>
<div class="dashboard">
    <link rel="stylesheet" href="<?php echo File_URI2; ?>/css/global.css" />
    <link rel="stylesheet" href="<?php echo File_URI2; ?>/css/new.css" >
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Bricolage Grotesque:wght@500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;500;700&display=swap"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
      <form class="container">
        <div class="sidebar">
          <nav class="content-wrap">
            <div class="item-box interactive activelist" id="itemBoxContainer">
              <div class="sidebar-icons-parent">
                <img
                  class="sidebar-icons"
                  alt=""
                  src="<?php echo File_URI2;?>/css/sidebar-icons.svg"
                />

                <span class="sections">Dashboard</span>
              </div>
              <div class="btn2">
                <b class="btn-text"><?php echo $totalcounts; ?></b>
              </div>
            </div>
            <div class="pages">
              <div class="template-library">DiviTemp Library</div>
              <?php $getparentcategory = apies_function(apibaseurl."getallParentCategory.php"); ?>
              <?php $num=1; foreach(array_reverse($getparentcategory->categories) as $parentcategory){ $totalcounts += $parentcategory->productcount; ?>
              <div class="item-wrap"  onClick="getsectionsFunction(<?php echo $parentcategory->term_id;?>,'<?php echo $parentcategory->slug;?>','<?php echo $parentcategory->categoryname;?>','<?php echo $parentcategory->productcount;?>')">
                <div class="item-box1 interactive" id="div<?php echo $parentcategory->term_id;?>">
                  <div class="sidebar-icons-group">
                      <?php if($parentcategory->iconurl=="none"){ ?>
         <img class="sidebar-icons1" loading="lazy" alt="" src="<?php echo File_URI2;?>/css/sidebar-icons-1.svg"  />
                <?php }else{ ?>
         <img class="sidebar-icons1" loading="lazy" alt="" src="<?php echo $parentcategory->iconurl;?>"  />
                    <?php } ?>
                    <span class="sections1"><?php echo $parentcategory->categoryname;?></span>
                  </div>
                  <div class="btn1">
                    <b class="btn-text1"><?php echo $parentcategory->productcount;?></b>
                  </div>
                </div>
              </div>
              <?php $num++; }?>
            </div>
            <div class="pages1">
              <span class="other">Other</span>
              <div class="item-wrap1">
                <div class="item-box4 interactive externallink" data-id='https://divitemp.com/doc'>
                  <div class="sidebar-icons-parent1">
                    
					<img
                      class="sidebar-icons5"
                      loading="lazy"
                      alt=""
                      src="<?php echo File_URI2;?>/css/sidebar-doc.svg"
                    />
                    <span class="sections4">Documentation</span>
                  </div>
                </div>
                <div class="item-box5 interactive externallink" data-id='https://www.elegantthemes.com/marketplace/divitemp/support/tickets/1'>
            <div class="sidebar-icons-parent2">
                    <img
                      class="sidebar-icons5"
                      loading="lazy"
                      alt=""
                      src="<?php echo File_URI2;?>/css/sidebar-icons-5.svg"
                    />

                    <span class="sections5">Customer Support</span>
                  </div>
                </div>
                <div class="item-box6 interactive externallink" data-id="https://divitemp.com/faq">
                  <div class="sidebar-icons-parent3">
                    <img
                      class="sidebar-icons6"
                      alt=""
                      src="<?php echo File_URI2;?>/css/sidebar-icons-6.svg"
                    />
                    <span class="sections6">General Questions</span>
                  </div>
                </div>
              </div>
          </nav>
          <button class="primary-btn externallink" data-id="https://divitemp.com">
            <div class="btn-text4">Visit Website</div>
            <img class="icon" alt="" src="<?php echo File_URI2;?>/css/icon.svg" />
          </button>
        </div>
        <div class="product-showcase" id="loaddata">
          <div class="banner">
            <img
              class="section-images-1-1"
              alt=""
              src="<?php echo File_URI2;?>/css/section-images-1-1@2x.png"
            />

            <div class="frame-parent">
              <div class="the-ultimate-divi-template-lib-parent">
                <h1 class="the-ultimate-divi">
                  A Growing Divi Template Library
                </h1>
                <p class="our-premium-website">
                  Our premium website template is the key to creating a stunning
                  and functional website that will captivate your audience.
                </p>
                <div class="explore-templates-parent btnhovers" id="scrollButton">
                  <div class="explore-templates" >Explore Templates</div>
                  <img class="vector-icon" alt="" src="<?php echo File_URI2;?>/css/vector.svg" />
                </div>
              </div>
              <div class="frame-group">
                <div class="star-parent">
                  <img
                    class="frame-child"
                    loading="lazy"
                    alt=""
                    src="<?php echo File_URI2;?>/css/star-1.svg"
                  />

                  <div class="save-templates-to">Save Templates to Library</div>
                </div>
                <div class="star-group">
                  <img
                    class="frame-item"
                    loading="lazy"
                    alt=""
                    src="<?php echo File_URI2;?>/css/star-1.svg"
                  />

                  <div class="easy-to-customize">Easy to Customize</div>
                </div>
                <div class="star-container">
                  <img
                    class="frame-inner"
                    loading="lazy"
                    alt=""
                    src="<?php echo File_URI2;?>/css/star-1.svg"
                  />

                  <div class="preview-in-real">Preview in Real Time</div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-wrap-parent" id="targetDiv">
              <?php foreach($getparentcategory->categories as $parentcategory){ ?>
            <div class="content-wrap1">
              <div class="component-2">
                  <?php if($parentcategory->iconurl=="none"){ ?>
         <img class="arrow-right-icon" loading="lazy" alt="" src="<?php echo File_URI2;?>/css/sidebar-icons-7.svg"  />
                <?php }else{ ?>
         <img class="arrow-right-icon" loading="lazy" alt="" src="<?php echo $parentcategory->iconurl;?>"  />
                    <?php } ?>
               
              </div>
              <div class="premade-layouts-parent">
                <div class="premade-layouts"><?php echo $parentcategory->categoryname;?></div>
                <p class="lorem-ipsum-is">
                  <?php echo $parentcategory->description;?>
                </p>
                <div class="explore-layouts-parent" onClick="getsectionsFunction(<?php echo $parentcategory->term_id;?>,'<?php echo $parentcategory->slug;?>','<?php echo $parentcategory->categoryname;?>','<?php echo $parentcategory->productcount;?>')">
                  <div class="explore-layouts">Explore Pages</div>
        <img class="arrow-right-icon" loading="lazy" alt="" src="<?php echo File_URI2;?>/css/arrow.png"  />
                </div>
              </div>
              <div class="btn4">
                <b class="btn-text5"><?php echo $parentcategory->productcount;?></b>
              </div>
            </div>
              <?php } ?>
          </div>
        </div>
      </form>
      <section class="divitemp-logo-1-parent">
        <img class="divitemp-logo-1" loading="lazy" alt="" src="<?php echo File_URI2;?>/css/divitemp-logo-1@2x.png" />
        <div class="this-is-the">
          This is the Official DiviTemp Plugin. Made with Love & Care for Divi Designers.
        </div>
        <div class="copyright-2021-24">
          Copyright 2024 | All Right Reserved
        </div>
      </section>
    </div>
<style>
	.btnhovers:hover{
		cursor: pointer;
	}	
</style>
	<script>
        jQuery(document).ready(function() {
            jQuery('#scrollButton').on('click', function() {
                jQuery('html, body').animate({
                    scrollTop: jQuery('#targetDiv').offset().top
                }, 1000); // 1000 milliseconds for the scrolling animation
            });
        });
    </script>
    <script>
        jQuery(document).ready(function(){
            // Attach click event listener to elements with class 'my-class'
            jQuery('.externallink').on('click', function(event){
                event.preventDefault();
                var dataId = jQuery(this).attr('data-id');
                window.open(dataId, '_blank');
            });
        });
    </script>
    <script>
      var itemBoxContainer = document.getElementById("itemBoxContainer");
      if (itemBoxContainer) {
        itemBoxContainer.addEventListener("click", function (e) {
          window.location.href = "admin.php?page=MyPlugin";
          jQuery('.item-box1').removeClass('activelist');    
          jQuery('.item-box').addClass('activelist');  
        });
      }
      
function getsectionsFunction(parentcategoryid,parentslug,categoryname,catcount){
    jQuery('.item-box1').removeClass('activelist');
    jQuery('.item-box').removeClass('activelist');
    jQuery('#div'+parentcategoryid).addClass('activelist');
    jQuery("#loaddata").html("<h3>Please wait loading data</h3>");    
    jQuery('#loaddata').load('<?php echo File_URI2;?>/pages/loadsections.php?parentid='+parentcategoryid+'');
}
      </script>