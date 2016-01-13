<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <title>Category Page</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Online Store</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="cart.php">Cart <span class="indigo">5</span></a></li>
        </ul>
    </div>
</nav>
<?php
// Start the session
session_start();
?>
<div class="container">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once ('../includes/functions/main.php');
    $model = new main();
    $_collection = $model->getProducts();
    ?>
    <?php foreach($_collection as $_product): ?>
        <div class="row product">
            <div class="col s12 m6">
                <img src="img/product-image.jpg" alt="product image">
            </div>
            <div class="col s12 m6">
                <h3><?php echo $_product['name']?></h3>
                <p class="sku">SKU: <?php echo $_product['id']?></p>
                <p class="price">$<?php echo $_product['price']?></p>
                <div class="description">
                    <?php echo $_product['description']?>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field product-quantity col s12 m3">
                                <input type="number" id="qty-<?php echo $_product['id'] ?>" class="validate" value="1">
                                <label for="quantity">Quantity</label>
                            </div>
                            <div class="input-field col s12 m9">
                                <button id="<?php echo $_product['id'] ?>" class="btn waves-effect indigo add-to-cart" name="action" type="submit">Add to cart
                                    <i class="material-icons right">shopping_cart</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<script type="text/javascript">

    $(".product button").click(function() {
        var id = this.id;
        var qty = $("#qty-"+id).val();

        $.ajax({
            url: '../includes/functions/ajax.php?id='+id+'&qty='+qty,
            success: function (data){
                console.log(data);
            }
        }

        );
    });
</script>
<body>
<!--Import jQuery before materialize.js-->

<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>