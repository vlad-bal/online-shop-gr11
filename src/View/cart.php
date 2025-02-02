<?php
require_once './../Model/UserProduct.php';

//if (!isset($_SESSION['user_id'])) {
//    echo 'Please Login';
//    die();
//} else {
//    print_r($_SESSION['user_id']) ;
//}

$cart = new UserProduct();
$cart = $cart->getCart();
$total = 0;
foreach ($cart as $product):
print_r($product['product_id'].'-'.$product['qty']."\n");
endforeach;

?>

<div class="container-fluid mt-5">
    <h2 class="mb-5 text-center">Shopping Cart</h2>
    <div class="row justify-content-center">
        <?php foreach ($cart as $product): ?>
        <div class="col-md-8">
            <div class="table-responsive">
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th class="text-right"><span id="amount" class="amount">Amount</span> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="product-img">
                                <div class="img-prdct"><img src=<?php //echo $product["image_link"] ?>></div>
                            </div>
                        </td>
                        <td>
                            <p><?php echo $product['name']; ?></p>
                        </td>
                        <td>
                            <div class="button-container">
                                <button class="cart-qty-plus" type="button" value="+">+</button>
                                <input type="text" name="qty" min="0" class="qty form-control" value=<?php echo $product['qty']; ?>>
                                <button class="cart-qty-minus" type="button" value="-">-</button>
                            </div>
                        </td>
                        <td>
                            <input type="text" value=<?php echo $product['price'].'$'; ?> class="price form-control" disabled>
                        </td>
                        <td align="right">$ <span id="amount" class="amount"><?php $total += $product['qty']*$product['price'] ; print_r($product['qty']*$product['price']) ; ?></span></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"></td><td align="right"><strong>TOTAL = $  <span id="total" class="total"><?php  /*$total += $product['qty']*$product['price'] ;*/ print_r($total) ?></span></strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="form"><form action="/order" target="_blank">
        <body>
            <button>Оформить заказ</button>
        </form>
        </body>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
    *, ::before, ::after { box-sizing: border-box; }
    body{
        font-family:'Quicksand', sans-serif;
        text-align:center;
        line-height:1.5em;
        /*   background:#E0E4CC; */
        background: #69d2e7;
        background: -moz-linear-gradient(-45deg, #69d2e7 0%, #a7dbd8 25%, #e0e4cc 46%, #e0e4cc 54%, #f38630 75%, #fa6900 100%);
        background: -webkit-linear-gradient(-45deg, #69d2e7 0%,#a7dbd8 25%,#e0e4cc 46%,#e0e4cc 54%,#f38630 75%,#fa6900 100%);
        background: linear-gradient(135deg, #69d2e7 0%,#a7dbd8 25%,#e0e4cc 46%,#e0e4cc 54%,#f38630 75%,#fa6900 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#69d2e7', endColorstr='#fa6900',GradientType=1 );
    }
    hr {
        border:none;
        background:#E0E4CC;
        height:1px;
        /*   width:60%;
          display:block;
          margin-left:0; */
    }
    .container {
        max-width: 800px;
        margin: 1em auto;
        background:#FFF;
        padding:30px;
        border-radius:5px;
    }
    .productcont {
        display: flex;
    }
    .product {
        padding:1em;
        border:1px solid #E0E4CC;
        margin-right:1em;
        border-radius:5px;
    }
    .cart-container {
        border:1px solid #E0E4CC;
        border-radius:5px;
        margin-top:1em;
        padding:1em;
    }
    button, input[type="submit"] {
        border:1px solid #FA6900;
        color:#fff;
        background: #F38630;
        padding:0.6em 1em;
        font-size:1em;
        line-height:1;
        border-radius: 1.2em;
        transition: color 0.2s ease-in-out, background 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }
    button:hover, button:focus, button:active, input[type="submit"]:hover, input[type="submit"]:focus, input[type="submit"]:active {
        background: #A7DBD8;
        border-color:#69D2E7;
        color:#000;
        cursor: pointer;
    }
    table {
        margin-bottom:1em;
        border-collapse:collapse;
    }
    table td, table th {
        text-align:left;
        padding:0.25em 1em;
        border-bottom:1px solid #E0E4CC;
    }
    #carttotals {
        margin-right:0;
        margin-left:auto;
    }
    .cart-buttons {
        width:auto;
        margin-right:0;
        margin-left:auto;
        display:flex;
        justify-content:flex-end;
        padding:1em 0;
    }
    #emptycart {
        margin-right:1em;
    }
    table td:nth-last-child(1) {
        text-align:right;
    }
    .message {
        border-width: 1px 0px;
        border-style:solid;
        border-color:#A7DBD8;
        color:#679996;
        padding:0.5em 0;
        margin:1em 0;
    }</style>