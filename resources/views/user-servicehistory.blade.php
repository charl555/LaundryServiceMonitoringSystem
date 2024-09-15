
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
    <link href="/css/style2.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



</head>

<body>

    <section id="menu">
        <div class="logo">
            <img src="images\logo.png" alt="logo">
            <h2>Wash n Dry</h2>
        </div>

        <div class="items">
        <li><i class="bi bi-window-sidebar"></i><a href="{{route('user.index')}}">Dashboard</a></li>
        <li><i class="bi bi-receipt"></i><a href="{{route('user.servicehistory')}}">Service History</a></li>
            

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
                    <img src="images\defaultprofile.png" alt="profile">
                    <a class="btn" href="{{ route('logout') }}" role="button"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
        </div>

        <h3 class="i-name">
            Service History
        </h3>

           
        <div class="board">
            <table width="100%" id="laundrytable">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Service ID</td>
                        <td>Service Details</td>
                        <td>Item Description</td>
                        <td>Amount</td>
                        <td>Pick up Date</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userServices as $service)
                        <tr>
                            <td>{{ $service->userName }}</td>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->ServiceDetails }}</td>
                            <td>{{ $service->itemdescription }}</td>
                            <td>{{ $service->Ammount }}</td>
                            <td>{{ $service->PickupDate }}</td>
                            <td>{{ $service->status }}</td>
                        </tr>
                        @endforeach                 
                </tbody>
            </table>
        </div>

    </div>
        
    </section>



    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    
    </script>
    
</body>

</html>