
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://css.gg/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="/css/createstyle.css" rel="stylesheet" >



</head>

<body>

    <section id="menu">
        <div class="logo">
        <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t1.15752-9/438267256_430040703096224_478625623721296940_n.png?_nc_cat=108&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGbMgelCHBKc_jTZZoD3WtMgbr900HcmtSBuv3TQdya1EtkqUWhE3YdpqGj6C0HeLvDSsne337yMTBSPo2rFoTk&_nc_ohc=Yda73oqpDuMQ7kNvgHnK7W0&_nc_ht=scontent.fcgy2-4.fna&_nc_gid=A9edJLQzLBIFR7VafOlepIc&oh=03_Q7cD1QHpbHvhc_R8RGuu3pI_0b0zqnoN3iyeVsuuWTQzVwdtdQ&oe=67108132" alt="logo">
            <h2>Wash n Dry</h2>
        </div>

        <div class="items">
        <li><i class="bi bi-window-sidebar"></i><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li><i class="bi bi-table"></i><a href="{{route('admin.customer')}}">Customer ID table</a></li>
        <li><i class="bi bi-receipt"></i><a href="{{route('admin.receipt')}}">Print Receipt</a></li>
        <li><i class="bi bi-receipt"></i><a href="{{route('admin.reportsandanalytics')}}">Reports and Analytics</a></li>
          
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                             <!-- <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="Search">
                </div> -->
            </div>
            
                <div class="profile">
                    <i class="far fa-bell"></i>
                    <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t1.15752-9/412026683_879342310558683_6243308313018228149_n.png?_nc_cat=105&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeFSHlGM3iDWq5AXVBm-Y-OaTGTgT4p1YTdMZOBPinVhN_zxn18gt7fkmn40U93hUA107h_emczb3Q1hwH0EBUgf&_nc_ohc=o6102JHrHF4Q7kNvgHyoiEI&_nc_ht=scontent.fcgy2-4.fna&_nc_gid=A9edJLQzLBIFR7VafOlepIc&oh=03_Q7cD1QFLfQDYm-cpI2IG_exoZrvPyY-vHzVcpqF8pAgXR-kFJg&oe=6710AE4B" alt="profile">
                    
                </div>
        </div>

        <h3 class="i-name">
            laundry Service form
        </h3>

        <div class="input_buttons">
            <a class="btn" href="{{route('admin.index')}}" role="button">Dashboard</a>
        </div>
             
        <div class="container">

          

            <form method="post" action="{{ route('storeLaundryService') }}">
                @csrf
                @method('post')

                <div>
                    <label for="user_id">User ID</label>
                    <input type="text"  name="user_id" placeholder="Enter User ID" value="">
                </div>
                <div>
                    <label for="ServiceDetails">Service Details</label>
                    <input type="text"  name="ServiceDetails" list="ServiceDetails" placeholder="Enter Service Details" value="">
                    <datalist id="ServiceDetails">
                    <option value="Wash and Dry">
                    <option value="Wash, Dry, and Iron">
                    <option value="Dry Cleaning">
                    <option value="Ironing Only">
                    <option value="Stain Removal">   
                </div>
                <h3>Important Notice</h3>
                <p style="text-align: center;">Please enter values into the form carefully. Once submitted, the values cannot be undone.</p>
                <br>
                    <div class="laundrytypes">
                                   
                        <label for="shirts">Shirts</label>
                        <input type="number" name="shirts" value=""> 

                        <label for="pants">Pants</label>
                        <input type="number" name="pants" value=""> 

                        <label for="dresses">Dresses</label>
                        <input type="number" name="dresses" value="">

                    </div>

                    
                    <div class="laundrytypes">
                                   
                        <label for="skirts">Skirts</label>
                        <input type="number" name="skirts" value=""> 

                        <label for="jackets">Jackets</label>
                        <input type="number" name="jackets" value=""> 

                        <label for="sweaters">Sweaters</label>
                        <input type="number" name="sweaters" value="">

                    </div>

                    <div class="laundrytypes">
                                   
                        <label for="hoodies">Hoodies</label>
                        <input type="number" name="hoodies" value=""> 

                        <label for="suits">Suits</label>
                        <input type="number" name="suits" value=""> 

                        <label for="blouses">Blouses</label>
                        <input type="number" name="blouses" value="">

                    </div>

                     <div class="laundrytypes">
                                   
                        <label for="shorts">Shorts</label>
                        <input type="number" name="shorts" value=""> 

                        <label for="uniforms">Uniforms</label>
                        <input type="number" name="uniforms" value=""> 

                        <label for="beddings">Bedding</label>
                        <input type="number" name="beddings" value="">

                    </div>

                    <div class="laundrytypes">
                                   
                        <label for="towels">Towels</label>
                        <input type="number" name="towels" value=""> 

                        <label for="curtains">Curtains</label>
                        <input type="number" name="curtains" value=""> 

                        <label for="tableclothes">Table clothes</label>
                        <input type="number" name="tableclothes" value="">

                    </div>

                    <div class="laundrytypes">
                                   
                        <label for="cushioncovers">Cushion covers</label>
                        <input type="number" name="cushioncovers" value=""> 

                        <label for="coats">Coats</label>
                        <input type="number" name="coats" value=""> 

                        <label for="scarves">Scarves</label>
                        <input type="number" name="scarves" value="">

                    </div>

                    <div class="laundrytypes">
                                   
                        <label for="hats">Hats</label>
                        <input type="number" name="hats" value=""> 

                        <label for="socks">Socks</label>
                        <input type="number" name="socks" value=""> 

                        <label for="underwear">Underwear</label>
                        <input type="number" name="underwear" value="">

                    </div>



                
                <div>
                    <label for="PickupDate">Pick up Date</label>
                    <input type="date"  name="PickupDate"  placeholder="Enter Pick up Date" value="">
                </div>
                <div>
                    <label for="Ammount">Amount</label>
                    <input type="text"  name="Ammount"  placeholder="Enter Amount" value="">
                </div>
                <div>
                    <label for="PaymentMethod">Payment Method</label>
                    <input type="text"  name="PaymentMethod" list="PaymentMethod"  placeholder="Enter Payment Method" value="">
                    <datalist id="PaymentMethod">
                    <option value="Cash">
                    <option value="GCash">
                    <option value="PayMaya">
                    <option value="Debit Card">
                    <option value="Credit Card">
                </div>


                <button type="submit" class="btn">Submit</button>
 
                
            </form>
        
    </section>


    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })

    </script>
    
</body>

</html>