<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\User;
use App\Models\service;
use App\Models\laundryitems;
use App\Models\payments;
use App\Models\receipts;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function userservicehistory()
    {
                $userId = auth()->user()->id;

            // Fetch services for the current user including soft deleted ones
            $services = Service::where('user_id', $userId)
                            ->withTrashed() // Include soft deleted records
                            ->whereNotNull('deleted_at') // Filter out where deleted_at is null
                            ->select('id', 'user_id', 'ServiceDetails', 'PickupDate', 'status')
                            ->get();

            // Fetch laundry items associated with these services
            $serviceIds = $services->pluck('id')->toArray(); // Get an array of service ids

            $laundryItems = Laundryitems::whereIn('ServiceID', $serviceIds)
                                        ->select('ServiceID', 'itemdescription')
                                        ->get()
                                        ->keyBy('ServiceID'); // Key by ServiceID for easy lookup

            // Fetch payments associated with these services
            $payments = Payments::whereIn('ServiceID', $serviceIds)
                            ->select('ServiceID', 'Ammount')
                            ->get()
                            ->keyBy('ServiceID'); // Key by ServiceID for easy lookup

            // Fetch the user's name
            $userName = auth()->user()->name;

            // Prepare the data for the view
            $userServices = $services->map(function($service) use ($laundryItems, $payments, $userName) {
                // Retrieve item description and amount from collections
                $service->itemdescription = $laundryItems[$service->id]->itemdescription ?? null;
                $service->Ammount = $payments[$service->id]->Ammount ?? null;
                $service->userName = $userName;
                return $service;
            });

            return view('user-servicehistory', ['userServices' => $userServices]);
    }



    public function adminhome(){
        return view('admin-home');
    }

    public function userindex()
    {
        $userId = auth()->user()->id;
    
        // Fetch services for the current user
        $services = Service::where('user_id', $userId)
                            ->select('id', 'user_id', 'ServiceDetails', 'PickupDate', 'status')
                            ->get();
    
        // Fetch laundry items associated with these services
        $laundryItems = Laundryitems::whereIn('ServiceID', $services->pluck('id'))
                                    ->select('ServiceID', 'itemdescription')
                                    ->get();
    
        // Fetch payments associated with these services
        $payments = Payments::whereIn('ServiceID', $services->pluck('id'))
                           ->select('ServiceID', 'Ammount')
                           ->get();
    
        // Fetch the user's name
        $userName = auth()->user()->name;
    
        // Prepare the data for the view
        $userServices = $services->map(function($service) use ($laundryItems, $payments, $userName) {
            $service->itemdescription = optional($laundryItems->where('ServiceID', $service->id)->first())->itemdescription;
            $service->Ammount = optional($payments->where('ServiceID', $service->id)->first())->Ammount;
            $service->userName = $userName;
            return $service;
        });
    
        return view('user-index', ['userServices' => $userServices]);
    }

    

    public function adminreportsandanalytics(){
        return view('admin-reportsandanalytics');
    }


    public function adminindex()
    {
        // Get service data with the required columns
        $services = Service::select('id', 'user_id', 'ServiceDetails', 'PickupDate', 'status')->get();
    
        // Get laundry items data with all listed columns
        $laundryItems = Laundryitems::select('ServiceID', 'itemdescription')->get();
    
        // Get payments data with the required columns
        $payments = payments::select('ServiceID', 'Ammount')->get();
    
        // Get users data with the required columns
        $users = User::select('id', 'name')->get();
    
        // Combine service data with corresponding laundry items, payments, and user names
        $data = [];
        foreach ($services as $service) {
            $serviceData = $service->toArray();
    
            // Get user name
            $user = $users->where('id', $service->user_id)->first();
            if ($user) {
                $serviceData['user_name'] = $user->name;
            } else {
                $serviceData['user_name'] = 'Unknown';
            }
    
            // Get laundry item description
            $laundryItem = $laundryItems->where('ServiceID', $service->id)->first();
            if ($laundryItem) {
                $serviceData['itemdescription'] = $laundryItem->itemdescription;
            } else {
                $serviceData['itemdescription'] = '';
            }
    
            // Get payment amount
            $payment = $payments->where('ServiceID', $service->id)->first();
            if ($payment) {
                $serviceData['Ammount'] = $payment->Ammount;
            } else {
                $serviceData['Ammount'] = '';
            }
    
            $data[] = $serviceData;
        }
    
        return view('admin-index', ['data' => $data]);
    }
    public function admincreate(){
        return view('admin-create');
    }

    public function admincustomer(){
        $users = User::all();
        return view('admin-customer',['users' => $users]);
    }

    public function admincustomercreate(){
        return view('admin-customercreate');
    }

    public function adminreceipt(){
        $receipts = receipts::all();
        return view('admin-receipt',['receipts' => $receipts]);
    }

    public function storeLaundryService(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'user_id' => 'required|numeric',
        'ServiceDetails' => 'required',
        'PickupDate' => 'required|date',
        'shirts' => 'nullable|numeric',
        'pants' => 'nullable|numeric',
        'dresses' => 'nullable|numeric',
        'skirts' => 'nullable|numeric',
        'jackets' => 'nullable|numeric',
        'sweaters' => 'nullable|numeric',
        'hoodies' => 'nullable|numeric',
        'suits' => 'nullable|numeric',
        'blouses' => 'nullable|numeric',
        'shorts' => 'nullable|numeric',
        'uniforms' => 'nullable|numeric',
        'beddings' => 'nullable|numeric',
        'towels' => 'nullable|numeric',
        'curtains' => 'nullable|numeric',
        'tableclothes' => 'nullable|numeric',
        'cushioncovers' => 'nullable|numeric',
        'coats' => 'nullable|numeric',
        'scarves' => 'nullable|numeric',
        'hats' => 'nullable|numeric',
        'socks' => 'nullable|numeric',
        'underwear' => 'nullable|numeric',
        'Ammount' => 'required|numeric',
        'PaymentMethod' => 'required',
    ]);

    // Concatenate item descriptions
    $items = [];
    $laundryItemsFields = [
        'shirts', 'pants', 'dresses', 'skirts', 'jackets', 'sweaters',
        'hoodies', 'suits', 'blouses', 'shorts', 'uniforms', 'beddings',
        'towels', 'curtains', 'tableclothes', 'cushioncovers', 'coats',
        'scarves', 'hats', 'socks', 'underwear'
    ];

    foreach ($laundryItemsFields as $item) {
        if ($request->filled($item)) {
            $items[] = $item . ' ' . $request->input($item);
        }
    }
    $itemDescription = implode(', ', $items);

    // Create a new service record
    $service = Service::create([
        'user_id' => $validatedData['user_id'],
        'ServiceDetails' => $validatedData['ServiceDetails'],
        'PickupDate' => $validatedData['PickupDate']
    ]);

    // Create a new laundry item record with the concatenated description
    Laundryitems::create([
        'ServiceID' => $service->id,
        'itemdescription' => $itemDescription,
    ]);

    // Create a new payment record
   $payment = payments::create([
        'ServiceID' => $service->id,
        'Ammount' => $validatedData['Ammount'],
        'PaymentMethod' => $validatedData['PaymentMethod']
    ]);

    // Create a new receipt record
    receipts::create([
        'user_id' => $validatedData['user_id'],
        'ServiceID' => $service->id,
        'Ammount' => $validatedData['Ammount']
    ]);

    // Redirect back with success message
    return redirect()->route('admin.index');
}


public function adminedit($id)
{
    $service = Service::findOrFail($id);
    // You can also fetch related data if needed
    return view('admin-edit', ['service' => $service]);
}

public function adminupdate(Request $request, $id)
{
    $service = Service::findOrFail($id);
    // Update service record based on form input
    $service->update([
        'user_id' => $request->input('user_id'),
        'ServiceDetails' => $request->input('ServiceDetails'),
        'PickupDate' => $request->input('PickupDate'),
        'status' => $request->input('status'),
    ]);
    // Redirect back with success message
    return redirect()->route('admin.index');
} 

public function showReceipt($id)
{
    // Fetch the receipt data by its ID
    $receipt = receipts::findOrFail($id);

    // Pass the receipt data to the view
    return view('admin-receipt-details', ['receipt' => $receipt]);
}

public function generateReceiptPDF($id)
{
    // Fetch the receipt data by its ID
    $receipt = Receipts::findOrFail($id);
    
    // Fetch additional information from related tables
    $user = User::findOrFail($receipt->user_id);
    $service = Service::findOrFail($receipt->ServiceID);
    
    // Fetch laundry item description if available
    $laundryItem = Laundryitems::where('ServiceID', $receipt->ServiceID)->first();

    // Load the view for the PDF with all the necessary data
    $pdfView = view('admin-receipt-pdf', [
        'receipt' => $receipt,
        'user' => $user,
        'service' => $service,
        'laundryItem' => $laundryItem
    ])->render();

    // Create Dompdf options
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $options->set('defaultFont', 'Arial');

    // Create Dompdf instance with custom options
    $dompdf = new Dompdf($options);
    
    // Load HTML content
    $dompdf->loadHtml($pdfView);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper([0, 0, 300, 950], 'portrait'); // Custom size for receipt

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF
    return $dompdf->stream("receipt_{$receipt->id}.pdf");
}

public function getReportsAndAnalytics()
{
    // Calculate the total number of services
    $totalServices = Service::count();

    // Calculate the total amount of payments
    $totalPayments = Payments::sum('Ammount');

    // Fetch detailed data for the report
    $services = Service::select('id', 'ServiceDetails', 'PickupDate')
        ->with(['laundryitems:itemdescription,ServiceID', 'payments:Ammount,ServiceID'])
        ->get();

    $data = $services->map(function ($service) {
        return [
            'id' => $service->id,
            'ServiceDetails' => $service->ServiceDetails,
            'PickupDate' => $service->PickupDate,
            'itemdescription' => optional($service->laundryitems)->itemdescription,
            'Ammount' => optional($service->payments)->Ammount,
        ];
    });

    return view('admin-reportsandanalytics', [
        'totalServices' => $totalServices,
        'totalPayments' => $totalPayments,
        'data' => $data,
    ]);
}

public function archiveService($id)
{
    try {
        // Soft delete the service
        $service = Service::findOrFail($id);
        $service->delete();

        // Optionally soft delete related records
        Payments::where('ServiceID', $id)->delete();
        LaundryItems::where('ServiceID', $id)->delete();
        Receipts::where('ServiceID', $id)->delete();

        return redirect()->route('admin.index')->with('success', 'Record archived successfully.');
    } catch (\Exception $e) {
        // Redirect with error message if an exception occurs
        return redirect()->route('admin.index')->with('error', 'An error occurred while archiving the record.');
    }
}

}   




   

