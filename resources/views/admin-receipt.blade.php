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

    <link href="/css/style.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



</head>

<body>

    <section id="menu">
        <div class="logo">
        <img src="images/logo.png" alt="logo">
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
                    <img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t1.15752-9/412026683_879342310558683_6243308313018228149_n.png?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=n8lZLly_lMcQ7kNvgEjHp0s&_nc_ht=scontent.fcgy2-4.fna&oh=03_Q7cD1QELAdbSXlaLSwCvWR9Q0vCzmnYpV5cCQ2rt0UEi0X7gEQ&oe=6691050B" alt="profile">
                    <a class="btn" href="{{ route('logout') }}" role="button"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
        </div>

        <h3 class="i-name">
            Receipt Table
        </h3>

    


        
        <div class="container">
           
        <div class="board">
            <table width="100%" id="laundrytable">
                <thead>
                    <tr>
                        <td>Customer ID</td>
                        <td>Service ID</td>
                        <td>Total Amount</td>
                        <td>Date Issued</td>
                        <td></td>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($receipts as $receipt)
                                <tr>
                                    <td>{{$receipt->user_id}}</td>
                                    <td>{{$receipt->ServiceID}}</td>
                                    <td>₱{{$receipt->Ammount}}</td>
                                    <td>{{$receipt->created_at}}</td>                                 
                                    <td>
                                    <a class='btn' href="{{ route('admin.generateReceiptPDF', ['id' => $receipt->id]) }}">Generate Receipt</a>
                                    </td>
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