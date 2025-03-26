<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Ecs store</title>
    <!-- <title>Infinite Card Slider JavaScript | CodingNepal</title> -->

    <link rel="stylesheet" href="stylepos.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="website.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav>
        <div class="nav-container">
            <a href="index.php">
                <img src="../mem_img/2.jpg" class="logonav">
            </a>
            <div class="nav-profile">
                <p class="nav-profile-name">
                    <a href="#">Sign in</a>
               </p>
                <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
                    <i class="fas fa-bag-shopping fa-xl" style="color: orange;"></i>
                    <div id="cartcount"class="cartcount" style="display: none;">
                        0
                    </div>
                </div>
            </div>
            
        </div>
    </nav>
    <div class="headtext">
        <p>Air Conditioner</p>  
        <div class="headtext2">
            <p style="font-size: 10px;">The Best Expreience</p>
        </div>
    </div>


    <video autoplay loop muted src="../p_img/Air conditioner.mp4"> </video>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}
video {
    width: 70%; 
    margin-left: 270px;
    margin-top: 4px;
    border-radius: 25px;
    margin-bottom: 40px;
    
}



</style>


    <div class="wrapper">
      <!-- <i id="left" class="fa-solid fa-angle-left"></i> -->
        <ul class="carousel">
          <li class="card">
            <div class="img"><img src="https://d1dtruvuor2iuy.cloudfront.net/media/catalog/product/2/8/285736.jpg" alt="img" draggable="false"></div>
            <h2>LG </h2>
            <span>BTU:2,000 - 13,500</span>
          </li>
          <li class="card">
            <div class="img"><img src="https://res.cloudinary.com/cenergy-innovation-limited-head-office/image/fetch/c_scale,q_70,f_auto,h_740/https://d1dtruvuor2iuy.cloudfront.net/media/catalog/product/0/0/000274514_ar24byhcmwknst.jpg" alt="img" draggable="false"></div>
            <h2>SAMSUNG</h2>
            <span>BTU:5000 - 21500</span>
          </li>
          <li class="card">
            <div class="img"><img src="https://res.cloudinary.com/cenergy-innovation-limited-head-office/image/fetch/c_scale,q_70,f_auto,h_740/https://d1dtruvuor2iuy.cloudfront.net/media/catalog/product/p/w/pwb000238325.jpg" alt="img" draggable="false"></div>
            <h2>DAIKIN</h2>
            <span>BTU:2,000 - 13,500</span>
          </li>
          <li class="card">
            <div class="img"><img src="https://res.cloudinary.com/cenergy-innovation-limited-head-office/image/fetch/c_scale,q_70,f_auto,h_740/https://d1dtruvuor2iuy.cloudfront.net/media/catalog/product/2/8/288659-edit2.jpg" alt="img" draggable="false"></div>
            <h2>PANASONIC</h2>
            <span>BTU:3,480 - 13,600</span>
          </li>
          <li class="card">
            <div class="img"><img src="https://res.cloudinary.com/cenergy-innovation-limited-head-office/image/fetch/c_scale,q_70,f_auto,h_740/https://d1dtruvuor2iuy.cloudfront.net/media/catalog/product/0/0/000275413_hsu-10cqaa03t.jpg" alt="img" draggable="false"></div>
            <h2>HAIER</h2>
            <span>BTU:6,700-14,600</span>
          </li>
        </ul>
        <!-- <i id="right" class="fa-solid fa-angle-right"></i> -->


<div class="container">
    <div class="sidebar"> 
        <input onkeyup="search(this)" id="txt_search" type="text"class="sidebar-search" placeholder="Search..."> 
       <br>
       <br>
       <div>
        <div class="btu">
          <p>BTU Calculationㅤ</p>
          <i class="fa-solid fa-pen"></i>   
       </div>
       <input id="txt_search" type="text"class="sidebar-searchWidth" placeholder="Width..."> 
    <div>       
        <input id="txt_search" type="text"class="sidebar-searchLength" placeholder="Length..."> 
    </div>
        <div class="Brand">
        </div>
<br>
        <a onclick="searchproduct('all')"class="sidebar-items">
            All PRODUCTS
        </a>
        <a onclick="searchproduct('LG')"class="sidebar-items">
            LG
        </a>
        <a onclick="searchproduct('SAMSUNG')"class="sidebar-items">
            SAMSUNG
        </a>
        <a onclick="searchproduct('DAIKIN')"class="sidebar-items">
            DAIKIN
        </a>
        <a onclick="searchproduct('PANASONIC')"class="sidebar-items">
            PANASONIC
        </a>
        <a onclick="searchproduct('HAIER')"class="sidebar-items">
            HAIER
        </a>

        <div id="productlist" class="product">  
                          
            </div>
        </div>
    </div>
    </div>
</div>

<div id="modalDesc" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
        <h2>Detail</h2>
        <br>
        <div class="modaldesc-content">
            <img id="mdd-img" class="modaldesc-img" src="imgs/285736.jpg" alt="">
            <div class="modaldesc-detail">
            <p id="mdd-name" style="font-size: 1.5vw;">Product name</p>
            <p id="mdd-price" style="font-size: 1.2vw;">500 THB</p>
            <br>
            <p id="mdd-desc" style="color: black;"></p>
            <p id="mdd-desc1" style="color: black;"></p>
            <p id="mdd-desc2" style="color: black;"></p>
            <p id="mdd-desc3" style="color: black;"></p>

            <br>
            <div class="btn-control">   
                <button onclick="closeModal()" class="btn">
                    Close
                </button>
                <button onclick="addtocart()" class="btn btn-buy">
                    Add to cart
                </button>
            </div>
            </div>
        </div>
    </div>
</div>  

<div id="modalCart"class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
        <h2>My cart</h2>
        <br>
        <div id="mycart"class="cartlist">

           
            
        </div>
        <div class="btn-control">
            <button onclick="closeModal()" class="btn">
                Cancel
            </button>
            <button class="btn btn-buy">
                Buy
            </button>
        </div>
    </div>
</div>
    

</body>

</html> 


