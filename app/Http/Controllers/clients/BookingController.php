<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Booking;
use App\Models\clients\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    private $bktour;

    private $booking;

    public function __construct()
    {
        $this->bktour = new Tour();
        $this->booking = new Booking();
    }
    public function bookingForm($id = 0)
    {
        $title = 'Hoàn tất đơn đặt';

        $tourBooking = $this->bktour->getTourDetail($id);

        // dd($tourBooking);
        if (!$tourBooking) {
            abort(404, 'Tour không tồn tại');
        }
        return view('clients.booking', compact('title', 'tourBooking'));
    }

    public function booking(Request $request, $id)
    {

        $tourBooking = $this->bktour->getTourDetail($id);

        // Lấy dữ liệu từ form
        $startDate = $request->start_date;
        $endDate   = $request->end_date;
        $numChild  = (int)$request->child_qty;
        $numAdult = (int)$request->adult_qty;

        $priceC = $tourBooking->priceC * $numChild;
        $priceA   = $tourBooking->priceA * $numAdult;

        $totalPrice =  $priceC +  $priceA + 200000;

        return view('clients.booking', compact('tourBooking', 'startDate', 'endDate', 'numChild', 'priceC', 'priceA', 'numAdult', 'totalPrice'));
    }

    public function confirmBooking(Request $request, $id)
    {


        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $numAdult = $request->input('numA');
        $numChild = $request->input('numC');
        $totalPrice = $request->input('total_price');
        $paymentMethod = $request->input('paymentMethod');
        $tour_id = $request->input('IDTour');
        $user_id = Auth::id();

        $data = [
            'IDTour' => $tour_id,
            'IDUser' => $user_id,
            'fullname' => $fullname,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'numA' => $numAdult,
            'numC' => $numChild,
            'total_price' => $totalPrice,
        ];

        $this->booking->createBooking($data);
        $checkout = $this->booking->createCheckout($data);

        return redirect()->route('home')->with('toast', [
            'type' => 'success',
            'message' => 'Đặt tour thành công.'
        ]);
    }
}
