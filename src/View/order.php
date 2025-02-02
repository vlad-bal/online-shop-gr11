<div class="content">
    <div class="title"><span><h2> Форма оформления заказа </h2></span></div>
    <p></p>
    <div class="form"><form action="/order" method= "POST">
            <label for="name"><b>Name</b></label>      <label style="color: red">
                </label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required>
            <hr>

            <label for="email"><b>Email</b></label>      <label style="color: red">
            </label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>
            <hr>

            <label for="phone"><b>Phone</b></label>      <label style="color: red">
            </label>
            <input type="text" placeholder="Enter Phone" name="phone" id="phone" required>
            <hr>

            <label for="address"><b>Address</b></label>      <label style="color: red">
            </label>
            <input type="text" placeholder="Enter Address" name="address" id="address" required>
            <hr>

<!--            <span class="goods"> Наименование товара:</span><br />-->
<!--            <select name="goods"class="guest">-->
<!--                <option value="Товар 1">Товар 1</option>-->
<!--                <option value="Товар 2">Товар 2</option>-->
<!--            </select><p></p>-->
<!--            <label><span class="number"> Количество:</span><br />-->
<!--                <input type="search" class="guest"/></label><p></p>-->
<!--            <label><span class="date"> Дата доставки:</span><br />-->
<!--                <input type="date"class="guest"/></label><p></p>-->
<!--            <!--или <label><span class="date"> Дата доставки:</span>-->
<!--              <input type="date"/></label>-->-->
            <div class="bottom">
                <input type="submit" class="bottom1" value="Отправить"/>
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