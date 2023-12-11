<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cafe House - Food and Drink Menu</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <?php
    include_once "parts/header.php";
    $drinkCategories = $db->getCategories();
    ?>
    <section class="tm-welcome-section">
      <div class="container tm-position-relative">
        <div class="tm-lights-container">
          <img src="img/light.png" alt="Light" class="light light-1">
          <img src="img/light.png" alt="Light" class="light light-2">
          <img src="img/light.png" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Our Menus&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
          <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
          <p class="gray-text tm-welcome-description">Cafe House template is a mobile-friendly responsive <span class="gold-text">Bootstrap v3.3.5 layout</span> by <span class="gold-text">templatemo</span>. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
          <a href="#main" class="tm-more-button tm-more-button-welcome">Read More</a>      
        </div>
        <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">  
      </div>      
    </section>
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main">
        <section class="tm-section row">
          <div class="col-lg-9 col-md-9 col-sm-8">
            <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
            <h2>Cafe House</h2>
            <p class="tm-welcome-description">This is free HTML5 website template from <span class="blue-text">template</span><span class="green-text">mo</span>. Fndimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Ettiam sit amet orci eget eros faucibus tincidunt.</p>
            <a href="#" class="tm-more-button margin-top-30">Read More</a> 
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
            <div class="inline-block shadow-img">
              <img src="img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
            </div>              
          </div>            
        </section>
          <section class="tm-section row">
              <div class="col-lg-12 tm-section-header-container margin-bottom-30">
                  <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/logo.png" alt="Logo" class="tm-site-logo"> Our Menus</h2>
                  <div class="tm-hr-container"><hr class="tm-hr"></div>
              </div>
              <div>
                  <div class="col-lg-3 col-md-3">
                      <div class="tm-position-relative margin-bottom-30">
                          <nav class="tm-side-menu">

                              <ul>
                                  <?php
                                  foreach ($drinkCategories as $category) {
                                      echo '<li><a onclick="showDrinks(' . $category['id'] . ')">'  . $category['name'] . '</a></li>';
                                  }
                                  ?>

                              </ul>

                          </nav>
                          <img src="img/vertical-menu-bg.png" alt="Menu bg" class="tm-side-menu-bg">
                      </div>
                  </div>
                  <div id="drinkContent" class="tm-menu-product-content col-lg-9 col-md-9">

                  </div>
              </div>
          </section>
      </div>
    </div>
    <?php
    include_once "parts/footer.php";
    ?>
   <!-- JS -->
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
   <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
        function showDrinks(categoryId) {
            $.ajax({
                type: 'GET',
                url: 'lib/processDrinks.php',
                data: { category_id: categoryId },
                success: function(response) {
                    $('#drinkContent').html(response);
                }
            });
        }
        $(document).ready(function() {
            showDrinks(<?php echo $drinkCategories[0]['id']; ?>);
        });

    </script>
 </body>
 </html>