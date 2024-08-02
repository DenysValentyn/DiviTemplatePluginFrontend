<?php
include ("../../../../wp-load.php");

$parentid = $_GET['parentid'];
$getChildcategory = apies_function(apibaseurl . "getallChildCategory.php?termid=$parentid");
$getAllSections = apies_function(apibaseurl . "getallSectionsbytermId.php?termid=$parentid");
$termDetail = apies_function(apibaseurl . "getDetailbyTermid.php?termid=$parentid");
$parentslug = $termDetail->term_slug;
$countrecords = $termDetail->term_count;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="<?php echo File_URI2; ?>/css/global-new.css" />
  <link rel="stylesheet" href="<?php echo File_URI2; ?>/css/layouts.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <section class="" style="width : 100%;">

    <div class="heading-wrap">
      <h2 class="heading">
        <span class="span"><?php echo $termDetail->term_count; ?></span>
        <span><?php echo $termDetail->term_name; ?></span>
      </h2>
      <img class="line-icon" alt="" src="<?php echo File_URI2; ?>/css/line.svg" />

      <div class="search-bar">
        <img class="icon1" alt="" src="<?php echo File_URI2; ?>/css/icon-1.svg" />

        <input class="placeholder" style="border: none;" placeholder="Search for Templates..." type="text" />
      </div>
    </div>
    <div class="filter-btn-parent">
      <?php if ($getChildcategory->status != 404) { ?>
                      <div class="filter-btn1 interactive hero1 activebtn" id="<?php echo $parentid; ?>">
                        All
                      </div>
                      <?php foreach ($getChildcategory->categories as $parentcategory) { ?>
                                      <div class="filter-btn1 interactive hero1" id="<?php echo $parentcategory->term_id; ?>">
                                        <?php echo $parentcategory->categoryname; ?>
                                      </div>
                      <?php } ?>
      <?php } ?>
    </div>
    <?php if ($getAllSections->status != "sections not found") { ?>
                    <div class="product-card-parent <?php echo $termDetail->term_id == 7 ? "grid_three_column" : "grid_two_column"; ?>" id="three">
                      <?php
                      $reversed_data = $getAllSections->categories;
                      foreach ($reversed_data as $getsectionsdata) {
                        $postid = $getsectionsdata->post_id;
                        $postid22 = $getsectionsdata->post_id;
                        $post_title = $getsectionsdata->post_title;
                        $featured_image_url = $getsectionsdata->featured_image_url;
                        $demo_url = $getsectionsdata->demo_url;
                        $download_link = $getsectionsdata->download_link;
                        $termsss = wp_get_post_terms($postid, 'layoutscategories');
                        // print_r($termsss);
                        $tarmstags = '';
                        foreach ($termsss as $keyterm) {
                          if ($keyterm->slug != $parentslug) {
                            $tarmstags .= $keyterm->slug . " ";
                          }
                        }
                        ?>
                                      <div class="product-card3 <?php echo $termDetail->term_id == 7 ? "grid_three_card" : "grid_two_card"; ?> <?php echo $tarmstags; ?>">
                                        <?php if (!empty($featured_image_url)) { ?>
                                                        <img class="bg-icon3" loading="lazy" alt="" src="<?php echo $featured_image_url; ?>"
                                                          style="display: block;width: 100%;
    height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />
                                        <?php } else { ?>
                                                        <img class="bg-icon3" loading="lazy" alt="" src="<?php echo File_URI2; ?>/css/bg-2@2x.png"
                                                          style="display: block;width: 100%;
    height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />
                                        <?php } ?>
                                        <div class="content-wrap4">
                                          <div class="hero-v13"><?php echo $post_title; ?></div>
                                          <div class="product-card-icons-parent1" style="box-shadow:none;">
                                            <div class="product-card-icons6">
                                              <!--<a href="#popup<?php //echo $postid22; ?>" > -->
                                              <a href="<?php echo $demo_url; ?>" target="_blank" class="preview_icon interactive">
                                                <img class="eye-icon3" alt="" src="<?php echo File_URI2; ?>/css/eye.svg" />
                                              </a>
                                            </div>
                                            <div class="product-card-icons7">
                                              <a href="#" class="preview_icon interactive" onclick="getdownloadsection('<?php echo $postid22; ?>')">
                                                <img class="download-icon3" alt="" src="<?php echo File_URI2; ?>/css/download.svg" />
                                              </a>
                                            </div>
                                          </div>
                                        </div>
                                        <div id="messagediv<?php echo $postid; ?>"></div>
                                      </div>
                                      <!-- model popup-->
                                      <!-- <div id="popup<?php echo $postid22; ?>" class="overlay">
                            <div class="popup">
                              <div class="closedivrow"><a class="close" href="#"><img src="<?php echo File_URI2; ?>/css/cross-bar.png"
                                    alt="" /></a> </div>
                              <div class="divrow">
                                <div class="collumn1">
                                  <h2><?php echo $post_title; ?></h2>
                                </div>
                                <div class="collumn2">
                                  <a href="<?php echo $demo_url; ?>"><span class="btnstyle">View Live Demo <img class="iconimg"
                                        src="<?php echo File_URI2; ?>/css/arrowbtn.png"></span> </a>
                                </div>
                              </div>
                              <div class="content">
                                <div class="cdivcoll1">
                                  <?php if (!empty($featured_image_url)) { ?>
                                            <img class="img-thumbnail imagesfit" src="<?php echo $featured_image_url; ?>" />
                                  <?php } else { ?>
                                            <img class="img-thumbnail" src="<?php echo File_URI2; ?>/css/bg.jpg" />
                                  <?php } ?>
                                </div>
                                <div class="cdivcoll2">
                                  <div>
                                    <h2>5000+ Projects Completed Take your business to the next level with our innovative content solutions
                                    </h2>
                                  </div>
                                  <div class="graph">
                                    <div class="bar">
                                      <div class="bar1"><img class="image" src="<?php echo File_URI2; ?>/css/bar.png"></div>
                                      <div class="innerdiv">
                                        <h5 class="headingstyle">Weekly Analytics Reports</h5>
                                        <p class="para">From sleek product pages to seamless checkout experiences, our collection is
                                          meticulously curated to enhance every aspect.</p>
                                      </div>
                                    </div>
                                    <div class="bar">
                                      <div class="bar1"><img class="image" src="<?php echo File_URI2; ?>/css/pie.png"></div>
                                      <div class="innerdiv">
                                        <h5 class="headingstyle">Customer Optimization</h5>
                                        <p class="para">From sleek product pages to seamless checkout experiences, our collection is
                                          meticulously curated to enhance every aspect.</p>
                                      </div>
                                    </div>
                                    <div class="visdiv1">
                                      <a href="<?php echo $demo_url; ?>" style="text-decoration: none">
                                        <div class="visit" style="color: black">More About DiviTemp <img class="iconimg"
                                            src="<?php echo File_URI2; ?>/css/arrow.png"></div>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                                      <!--model popup -->
                      <?php } ?>

                    </div>
                    <?php if ($countrecords > 12) { ?>
                                    <div class="pagination-v2"></div>
                    <?php } ?>

    <?php } else {
      echo "<center>not found</center>";
    } ?>
    <div id="toast-container"></div>
    <div id="alert" class="alert">
      <span class="closebtn">&times;</span>
      <span class="alert-text">Saving...</span>
    </div>

  </section>

  <style>

    .boxborder {
      background: linear-gradient(#ffffff, #ffffff) 50% 50%/calc(100% - 24px) calc(100% - 24px) no-repeat,
        linear-gradient(0deg, #ffffff 6%, #bbdefb 9%, #bbdefb 40%, #1726f2 47%);
      border-radius: 10px;
      padding: 16px;
      box-sizing: border-box;
    }

    .filter-btn1:hover {
      cursor: pointer;
    }

    .heading-wrap {
      margin-bottom: 3%;
      align-self: stretch;
      flex-wrap: wrap;
      gap: var(--gap-xl);
      max-width: 100%;
    }

    .filter-btn-parent {
      align-self: stretch;
      height: auto;
      flex-wrap: wrap;
      align-items: flex-start;
      justify-content: flex-start;
      padding: 0 38px 0 0;
      gap: var(--gap-3xs);
      font-size: var(--subheading-subheading-14-size);
      color: var(--text-btn-dark);
      margin: 20px 0px;
    }

    .product-card3 {
      min-width: 31%;
      height: 250px;
      flex: 0;
      ;
    }

    .btn-default {
      text-decoration: none;
    }

    .btn {
      height: auto;
      border-radius: var(--br-31xl);
      background-color: white;
      display: block;
      padding: var(--padding-10xs) var(--padding-6xs);
      box-sizing: border-box;
      font-size: 13px;
      color: var(--background-base);
      font-family: var(--btn-text-btn-14);
      color: black;
      font-weight: 500;
    }

    .btn2 {
      height: auto;
      border-radius: var(--br-31xl);
      background-color: #8017e6;
      display: block;
      padding: var(--padding-10xs) var(--padding-6xs);
      box-sizing: border-box;
      font-size: 13px;
      color: var(--background-base);
      font-family: var(--btn-text-btn-14);
      color: black;
      font-weight: 500;
    }

    .activep {
      background-color: #8017e6;
      color: white;
      text-decoration: none;
    }

    .activebtn {
      background: var(--gradient-btn-color);
      color: white;
    }


    .imagesfit {
      background-size: cover;
      /* Cover the entire background */
      background-position: center;
      /* Center the background image */
      width: 400px;
      height: 400px
    }

    .iconimg {
      border: none;
      width: 19px;
      padding: 0 5px;
    }

    .headingstyle {
      padding: 0px;
      margin: 0px;
      font-size: 19px;
    }

    .closedivrow {
      width: 100%;
      height: 37px
    }

    .divrow {
      display: flex;
    }

    .collumn1 {
      width: 70%
    }

    .collumn2 {
      width: 30%
    }

    .cdivcoll1 {
      width: 50%
    }

    .cdivcoll2 {
      width: 50%
    }

    .graph {
      display: flex;
      flex-direction: column;
      /* align-items: center; */
      /* justify-content: space-between; */
    }

    .bar {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      margin: 15px 0px;
      background-color: white;
    }

    .bar1 {
      background-color: rgb(247, 239, 239);
      border-radius: 4px;
      padding: 5px;
      border: 1px solid rgb(233, 225, 225);
    }

    .innerdiv {
      display: flex;
      flex-direction: column;
      margin: 0px 0px 0px 20px;
    }

    .btnstyle {
      display: flex;
      flex-direction: row;
      align-items: center;
      /* text-align: center; */
      justify-content: center;
      border-radius: 30px;
      color: white;
      background: #900ac5;
      padding: 10px 30px;
      font-family: "Open Sans", sans-serif;
      font-size: 0.9rem;
    }

    .visdiv1 {
      margin-top: 10px;
      display: flex;
      flex-direction: row;
      align-items: center;
      /* text-align: center; */
      justify-content: center;
      border: 1px solid black;
      border-radius: 25px;
      color: rgb(39, 38, 38);
      width: 40%;
      background: #ffffff;
      padding: 15px;
      font-family: "Open Sans", sans-serif;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .overlay {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.7);
      transition: opacity 500ms;
      visibility: hidden;
      opacity: 0;
      z-index: 99;
    }

    .overlay:target {
      visibility: visible;
      opacity: 1;
    }

    .popup {
      margin: 70px auto;
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      width: 70%;
      position: relative;
      transition: all 5s ease-in-out;
    }

    .popup h2 {
      margin-top: 0;
      color: #333;
      font-family: Tahoma, Arial, sans-serif;
    }

    .popup .close {
      position: absolute;
      top: 9px;
      right: 14px;
      transition: all 200ms;
      font-size: 30px;
      font-weight: bold;
      text-decoration: none;
      color: #333;
    }

    .popup .close:hover {
      color: #06D85F;
    }

    .popup .content {
      max-height: 30%;
      overflow: auto;
      display: flex;
      border: solid 1px #d8d8d8;
      padding: 30px;
      border-radius: 5px;
    }

  /* Added by Denys*/
  .alert {
    display: none; /* Hidden by default */
    position: fixed;
    top: 70px;      /* Distance from the top of the viewport */
    right: 10px;    /* Distance from the right edge of the viewport */
    width: auto;    /* Allow width to adjust based on content */
    max-width: 600px; /* Ensure it doesn’t exceed the viewport width */
    font-size: 16px;
    background-color: black;
    color: white;
    padding: 15px;
    border-radius: 10px;
    opacity: 0; /* Start invisible */
    box-sizing: border-box; /* Include padding and border in width calculation */
    overflow: hidden; /* Prevent content from spilling out */
    transition: opacity 0.5s ease-in-out; /* Smooth transition for visibility */
}

.alert.show {
    display: block;
    animation: fadeInRight 0.5s forwards;
}

.alert.hide {
    display: block;
    animation: fadeOutRight 0.5s forwards;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}

/* Keyframes for fadeInRight and fadeOutRight */
@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(50px); /* Adjust to start from slightly off-screen */
    }
    to {
        opacity: 1;
        transform: translateX(0); /* Move to its final position */
    }
}

@keyframes fadeOutRight {
    from {
        opacity: 1;
        transform: translateX(0); /* Start from its final position */
    }
    to {
        opacity: 0;
        transform: translateX(100%); /* Move to completely off-screen */
    }
}

.load-more {
  cursor :pointer;
  display : flex;
  align-items :center;
  justify-content :center;
  width : 100px;
  background-color : rgb(68, 68, 68);
  border-radius : 10px;
  opacity: 1;
}

.load-more:hover {
  cursor : pointer;
}

.load-more p {
  font-family : "Inter", "Inter Placeholder", sans-serif;
  color :white;
  font-weight : 600;
}
    /* Added by Denys for alert style*/

    @media screen and (max-width: 700px) {
      .box {
        width: 70%;
      }

      .popup {
        width: 70%;
      }
    }

    /*image scroll*/
    .product-card3 {
      img {
        width: 100%;
        object-fit: cover;
        object-position: top;
        height: auto;

        &:hover {
          object-position: bottom;
          transition: 2s all ease;
        }
      }
    }

    .cdivcoll1 {
      img {
        width: 100%;
        object-fit: cover;
        object-position: top;
        height: auto;

        &:hover {
          object-position: bottom;
          transition: 2s all ease;
        }
      }
    }
  </style>
  <script>
    jQuery(document).ready(function () {
      var itemsPerPage = 12;
      var currentPage = 1;
      var $boxes = jQuery('#three .product-card3');
      var totalItems = $boxes.length;
      var totalPages = "<?php echo $getAllSections->totalpages; ?>";
      var pageIndex = 1;
      var parentId = <?php echo $parentid ?>;
      var termId = <?php echo $parentid ?>;
      function showItems() {
        var startIndex = (currentPage - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        $boxes.hide().slice(startIndex, endIndex).fadeIn(450);
      }


      function generatePagination() {
        var paginationHTML = '<div class="load-more"><p>Load More</p></div>';
        jQuery('.pagination-v2').html(paginationHTML);
      }

      generatePagination();

      jQuery('.load-more').click(function () { 
        // var ajaxUrl = '<?php echo apibaseurl . "getallSectionsbytermId.php?termid=$parentid" . "&paged="; ?>' + ++pageIndex;
        var ajaxUrl = '<?php echo apibaseurl . "getallSectionsbytermId.php?termid="; ?>' + termId + "&paged=" + ++pageIndex;
        jQuery.ajax({
        url: ajaxUrl,
        type: "GET",
        contentType: false,
        processData: false,
        beforeSend: function () {

        },
        success: function (response22) {
          var appendHtml = '';
          var res = JSON.parse(response22);
          if(res.status == 'success') {
            for(let i = 0 ; i < res.categories.length ; i++) {
              var category = res.categories[i];
                  appendHtml += '<div class="product-card3';
                  if(parentId == 7) {
                    appendHtml += ' grid_three_card">';
                  } else  {
                    appendHtml += ' grid_two_card">';
                  }
                  appendHtml += '<img class="bg-icon3" loading="lazy" alt="" src="'+ category.featured_image_url+'" style="display: block;width: 100%; height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />';
                  appendHtml += '<div class="content-wrap4">';
                  appendHtml += '<div class="hero-v13">'+ category.post_title+'</div>';
                  appendHtml += '<div class="product-card-icons-parent1" style="box-shadow:none;">';
                  appendHtml += '<div class="product-card-icons6">';
                  appendHtml += '<a href="'+category.demo_url+'" target="_blank" class="preview_icon interactive">';
                  appendHtml += '<img class="eye-icon3" alt="" src="<?php echo File_URI2; ?>/css/eye.svg" />'
                  appendHtml += '</a></div>';
                  appendHtml += '<div class="product-card-icons7">';
                  appendHtml += '<a href="#" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  //appendHtml += '<a href="#" target="_blank" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  appendHtml += '<img class="download-icon3" alt="" src="<?php echo File_URI2; ?>/css/download.svg" />'
                  appendHtml += '</a></div></div></div></div>';
              }
            }
          jQuery('.product-card-parent').append(appendHtml);
          if(pageIndex == totalPages) {
            jQuery('.load-more').hide();
          }
        },
        error: function (response22) {
          console.log(response22)
        }
      });
      });

      function handleHeroClick(termId) {
          var ajaxUrl = '<?php echo apibaseurl . "getallSectionsbytermId.php?termid="; ?>' + termId;
          jQuery.ajax({
              url: ajaxUrl,
              type: "GET",
              contentType: false,
              processData: false,
              beforeSend: function () {
                  // Optional: Add logic before sending the request
              },
              success: function (response) {
                  var appendHtml = '';
                  var res = JSON.parse(response);
                  totalPages = res.totalpages;
                  pageIndex = res.currentpage; 
                  if(res.status == 'success') {
                      jQuery('.load-more').show();
                      for(let i = 0 ; i < res.categories.length ; i++) {
                          var category = res.categories[i];
                          appendHtml += '<div class="product-card3';
                          if(parentId == 7) {
                              appendHtml += ' grid_three_card">';
                          } else  {
                              appendHtml += ' grid_two_card">';
                          }
                          appendHtml += '<img class="bg-icon3" loading="lazy" alt="" src="'+ category.featured_image_url+'" style="display: block;width: 100%; height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />';
                          appendHtml += '<div class="content-wrap4">';
                          appendHtml += '<div class="hero-v13">'+ category.post_title+'</div>';
                          appendHtml += '<div class="product-card-icons-parent1" style="box-shadow:none;">';
                          appendHtml += '<div class="product-card-icons6">';
                          appendHtml += '<a href="'+category.demo_url+'" target="_blank" class="preview_icon interactive">';
                          appendHtml += '<img class="eye-icon3" alt="" src="<?php echo File_URI2; ?>/css/eye.svg" />'
                          appendHtml += '</a></div>';
                          appendHtml += '<div class="product-card-icons7">';
                          appendHtml += '<a href="#" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                          appendHtml += '<img class="download-icon3" alt="" src="<?php echo File_URI2; ?>/css/download.svg" />'
                          appendHtml += '</a></div></div></div></div>';
                      }
                  }
                  jQuery('.product-card-parent').html(appendHtml);
                  if(pageIndex == totalPages) {
                      jQuery('.load-more').hide();
                  }
              },
              error: function (response22) {
                  console.log(response22)
              }
          });

        jQuery('.hero1').removeClass('activebtn');
        jQuery('#' + termId).addClass('activebtn');
    }

      jQuery('.hero1').click(function () {
        termId = this.id;
        var ajaxUrl = '<?php echo apibaseurl . "getallSectionsbytermId.php?termid="; ?>' + termId;
        jQuery.ajax({
        url: ajaxUrl,
        type: "GET",
        contentType: false,
        processData: false,
        beforeSend: function () {

        },
        success: function (response) {
          var appendHtml = '';
          var res = JSON.parse(response);
          totalPages = res.totalpages;
          pageIndex = res.currentpage; 
          if(res.status == 'success') {
            jQuery('.load-more').show();
            for(let i = 0 ; i < res.categories.length ; i++) {
              var category = res.categories[i];
                  appendHtml += '<div class="product-card3';
                  if(parentId == 7) {
                    appendHtml += ' grid_three_card">';
                  } else  {
                    appendHtml += ' grid_two_card">';
                  }
                  appendHtml += '<img class="bg-icon3" loading="lazy" alt="" src="'+ category.featured_image_url+'" style="display: block;width: 100%; height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />';
                  appendHtml += '<div class="content-wrap4">';
                  appendHtml += '<div class="hero-v13">'+ category.post_title+'</div>';
                  appendHtml += '<div class="product-card-icons-parent1" style="box-shadow:none;">';
                  appendHtml += '<div class="product-card-icons6">';
                  appendHtml += '<a href="'+category.demo_url+'" target="_blank" class="preview_icon interactive">';
                  appendHtml += '<img class="eye-icon3" alt="" src="<?php echo File_URI2; ?>/css/eye.svg" />'
                  appendHtml += '</a></div>';
                  appendHtml += '<div class="product-card-icons7">';
                  appendHtml += '<a href="#" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  //appendHtml += '<a href="#" target="_blank" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  appendHtml += '<img class="download-icon3" alt="" src="<?php echo File_URI2; ?>/css/download.svg" />'
                  appendHtml += '</a></div></div></div></div>';
              }
            }
          jQuery('.product-card-parent').html(appendHtml);
          if(pageIndex == totalPages) {
            jQuery('.load-more').hide();
          }
        },
        error: function (response22) {
          console.log(response22)
        }
      });
       
        jQuery('.hero1').removeClass('activebtn');
        jQuery(this).addClass('activebtn');
      });

      jQuery(".placeholder").on("keyup", function (event) {
        var value = jQuery(this).val().toLowerCase();
        if(value == "") {
          handleHeroClick(termId);
        } else {
          var ajaxUrl = '<?php echo apibaseurl . "getallSections.php?postname="; ?>' + value + '<?php echo "&parent_id=" . $parentid ?>';
        jQuery.ajax({
        url: ajaxUrl,
        type: "GET",
        contentType: false,
        processData: false,
        beforeSend: function () {

        },
        success: function (res) {
          var appendHtml = '';
          totalPages = res.totalpages;
          pageIndex = res.currentpage; 
          if(res.status == 'success') {
            jQuery('.load-more').hide();
            for(let i = 0 ; i < res.postdetail.length ; i++) {
              var category = res.postdetail[i];
                  appendHtml += '<div class="product-card3';
                  if(parentId == 7) {
                    appendHtml += ' grid_three_card">';
                  } else  {
                    appendHtml += ' grid_two_card">';
                  }
                  appendHtml += '<img class="bg-icon3" loading="lazy" alt="" src="'+ category.featured_image_url+'" style="display: block;width: 100%; height: 100%; border-radius: inherit; object-position: center center; object-fit: contain; image-rendering: auto;" />';
                  appendHtml += '<div class="content-wrap4">';
                  appendHtml += '<div class="hero-v13">'+ category.post_title+'</div>';
                  appendHtml += '<div class="product-card-icons-parent1" style="box-shadow:none;">';
                  appendHtml += '<div class="product-card-icons6">';
                  appendHtml += '<a href="'+category.demo_url+'" target="_blank" class="preview_icon interactive">';
                  appendHtml += '<img class="eye-icon3" alt="" src="<?php echo File_URI2; ?>/css/eye.svg" />'
                  appendHtml += '</a></div>';
                  appendHtml += '<div class="product-card-icons7">';
                  appendHtml += '<a href="#" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  //appendHtml += '<a href="#" target="_blank" class="preview_icon interactive" onclick="getdownloadsection('+category.post_id+')">';
                  appendHtml += '<img class="download-icon3" alt="" src="<?php echo File_URI2; ?>/css/download.svg" />'
                  appendHtml += '</a></div></div></div></div>';
              }
            }
          jQuery('.product-card-parent').html(appendHtml);
          if(pageIndex == totalPages) {
          }
        },
        error: function (response22) {
          console.log(response22)
        }
      });
        }
       
      });


    });


    function getdownloadsection(postid) {

      var ajaxurl = "<?php echo File_URI2 . "/pages/functions.php"; ?>";
      var formdata = new FormData();
      formdata.append("action", "saveinlibrary");
      formdata.append("postid", postid);

      const alert = document.getElementById('alert');
      const showAlertBtn = document.getElementById('showAlertBtn');
      const closebtn = document.getElementsByClassName('closebtn')[0];

      // Function to hide the alert
    function hideAlert() {
        alert.classList.remove('show');
        alert.classList.add('hide');
        setTimeout(() => {
            alert.style.display = 'none';
        }, 500); // Match this time with the CSS transition duration
    }

      closebtn.onclick = function() {
        hideAlert();
    }

      jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        contentType: false,
        processData: false,
        data: formdata,
        beforeSend: function () {
          alert.querySelector('.alert-text').textContent = 'Saving';
          alert.classList.add('show');
          alert.classList.remove('hide');
        },
        success: function (response22) {
          alert.querySelector('.alert-text').textContent = response22;
          alert.classList.add('show');
          alert.classList.remove('hide');
          setTimeout(() => {
              alert.classList.remove('show');
              alert.classList.add('hide');
          }, 2000); // Hide after 3 seconds

        },
        error: function (response22) {
          console.log(response22)
        }
      });
    }


  </script>
</body>

</html>