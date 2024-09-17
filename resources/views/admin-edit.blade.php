
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

          

                <form method="POST" action="{{ route('admin.update', ['id' => $service->id]) }}">
                @csrf
                @method('post')

                <div>
                    <label for="user_id">User ID</label>
                    <input type="text"  name="user_id" value="{{ $service->user_id }}">
                </div>
                <div>
                    <label for="ServiceDetails">Service Details</label>
                    <input type="text"  name="ServiceDetails" list="ServiceDetails" value="{{ $service->ServiceDetails }}">
                    <datalist id="ServiceDetails">
                    <option value="Wash and Dry">
                    <option value="Wash, Dry, and Iron">
                    <option value="Dry Cleaning">
                    <option value="Ironing Only">
                    <option value="Stain Removal">   
                </div>

                           
                <div>
                    <label for="PickupDate">Pick up Date</label>
                    <input type="date"  name="PickupDate" value="{{ $service->PickupDate }}">
                </div>
                <div>
                    <label for="Ammount">Amount</label>
                    <input type="text"  name="Ammount" value="">
                </div>
                <div>
                    <label for="PaymentMethod">Payment Method</label>
                    <input type="text"  name="PaymentMethod" list="PaymentMethod" value="">
                    <datalist id="PaymentMethod">
                    <option value="Cash">
                    <option value="Credit Card">
                </div>
                <div>
                    <label for="status">Status</label>
                    <input type="text"  name="status" list="status" value="{{ $service->status }}">
                    <datalist id="status">
                    <option value="Pending">
                    <option value="Processing">
                    <option value="Ready for Pick up">
                    <option value="Done">
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