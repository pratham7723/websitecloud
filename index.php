<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopy Cloud</title>

    <!-- Chatbase script -->

    <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="eGacXZJKrDYthAT7m2pgB";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></src=>
    >
        (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="eGacXZJKrDYthAT7m2pgB";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
            $(document).ready(function() {
            function loadReviews() {
                $.ajax({
                    url: "fetch_reviews.php",
                    method: "GET",
                    success: function(data) {
                        $(".box-container").html(data);
                    }
                });
            }
            loadReviews();
            setInterval(loadReviews, 5000); // Refresh reviews every 5 seconds
        });
    </script>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
        body {
            /* Remove margin */
        }
        .animate {
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>

<!-- header section starts  -->

<header class="animate">
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo"><img src="shopy cloud logo.png" height="70px" width="120px"></a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#products">products</a>
        <a href="#review">reviews</a>
        <a href="contact.html">contact</a>
        <a href="F&Q.html">F&Q</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
        <a href="login.html" class="fas fa-user"></a>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home animate" id="home">
    <div class="content" style="position:relative; right:50px; top:50px">
        <h3>Best Gifts</h3>
        <span>Specially crafted gifts for All</span>
        <p>One stop gifting solution for all age groups. Best quality with best rates.</p>
        <span>Shop With a Smile!</span>
        <br>
        <a href="#products" class="btn">shop now</a>
    </div>
</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about animate" id="about">
    <h1 class="heading"><span>about</span> us</h1>

    <div class="row">
        <div class="video-container">
            <video src="about-vid.mp4" loop autoplay muted></video>
            <h3>best Gift sellers</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>We are One Of the Best Seller and manufacturer of gifting items with more than 100+ Items in stock with fully customizable designs.</p>
            <p>We Are Having A customer Base of nearly 10000+ people and Reseller base of 300+ Resellers. Your order is finally crafted and checked by expert before dispatch and then packed with love & Care.</p>
            <a href="#" class="btn">learn more</a>
        </div>
    </div>
</section>

<!-- about section ends -->

<!-- icons section starts  -->

<section class="icons-container animate">
    <div class="icons">
        <img src="icon-1.png" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="icon-3.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="icon-4.png" alt="">
        <div class="info">
            <h3>secure payments</h3>
            <span>protected by Razor Pay</span>
        </div>
    </div>
</section>

<!-- icons section ends -->

<!-- prodcuts section starts  -->

<section class="products animate" id="products">

    <h1 class="heading"> latest <span>products</span> </h1>

    <div class="box-container">

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src="1.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Couple Wallet Combo</h3>
                <div class="price"> ₹1350 <span>1500</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 2.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Sling Bag</h3>
                <div class="price"> ₹900 <span>1000</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 3.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Men's Wallet </h3>
                <div class="price"> ₹540 <span>600</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 4.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Ladies Wallet </h3>
                <div class="price"> ₹900 <span>1000</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 5.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Spotify Plaque</h3>
                <div class="price"> ₹630 <span>700</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 6.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Passport Cover</h3>
                <div class="price"> ₹630 <span>700</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 7.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Customized Pen </h3>
                <div class="price"> ₹400 <span>440</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 8.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Mens Full Combo </h3>
                <div class="price"> ₹1800 <span>2000</span> </div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src=" 9.jpeg" alt="" height="100px" width="250px">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="https://wa.me/message/YR3A3JQXCLA4F1" class="cart-btn">Buy Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>3 Pcs Combo </h3>
                <div class="price"> ₹1350 <span>1500</span> </div>
            </div>
        </div>

    </div>

</section>

<!-- prodcuts section ends -->

<!-- review section starts  -->
<section class="review animate" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="box-container">
        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "jignesh@6278", "shopycloud");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch reviews from the database (latest 10 reviews)
        $sql = "SELECT name, review, rating FROM reviews ORDER BY id DESC LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box">
                        <div class="stars">';
                
                // Display stars dynamically based on rating
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $row['rating']) {
                        echo '<i class="fas fa-star"></i>'; // Filled star
                    } else {
                        echo '<i class="far fa-star"></i>'; // Empty star
                    }
                }

                echo '</div>
                      <p>' . htmlspecialchars($row['review']) . '</p>
                      <div class="user">
                          <div class="user-info">
                              <h3>' . htmlspecialchars($row['name']) . '</h3>
                              <span>happy customer</span>
                          </div>
                      </div>
                      <span class="fas fa-quote-right"></span>
                  </div>';
            }
        } else {
            echo "<p>No reviews yet. Be the first to review!</p>";
        }

        $conn->close();
        ?>
    </div>

</section>

    
    <!-- review section ends -->
    
    <!-- contact section starts  -->
    
    <section class="contact animate" id="contact">
    
        <h1 class="heading"> <span> Please Write </span> A Review </h1>
    
        <div class="row">
    
            <form action="submit_review.php" method="POST">
                <input type="text" name="name" placeholder="name" class="box" required>
                <input type="email" name="email" placeholder="email" class="box" required>
                <input type="number" name="number" placeholder="number" class="box" required>
                <textarea name="review" class="box" placeholder="Review" cols="30" rows="10" required></textarea>
    
                <div class="cont">
                    <div class="stars">
                        <input class="star star-5" id="star-5-2" type="radio" name="rating" value="5" required/>
                        <label class="star star-5" for="star-5-2"></label>
                        
                        <input class="star star-4" id="star-4-2" type="radio" name="rating" value="4"/>
                        <label class="star star-4" for="star-4-2"></label>
                        
                        <input class="star star-3" id="star-3-2" type="radio" name="rating" value="3"/>
                        <label class="star star-3" for="star-3-2"></label>
                        
                        <input class="star star-2" id="star-2-2" type="radio" name="rating" value="2"/>
                        <label class="star star-2" for="star-2-2"></label>
                        
                        <input class="star star-1" id="star-1-2" type="radio" name="rating" value="1"/>
                        <label class="star star-1" for="star-1-2"></label>
                    </div>
                </div>
    
                <input type="submit" value="Send Review" class="btn">
            </form>
    
            <div class="image">
                <img src="review-svgrepo-com.svg" alt="" height="400" width="400">
            </div>
        </div>
    
    </section>
    
    
    <!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer animate" id="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">products</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">7016498352</a>
            <a href="#">shopycloud@gmail.com</a>
            <a href="#">Rajkot, Gujarat, India - 360001</a>
            <img src="payment.png" alt="">
        </div>
    </div>
    <div class="credit">created by <span>Pratham Mehta</span></div>
</section>

<!-- footer section ends -->

</body>
</html>
