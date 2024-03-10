<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Activity;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data dari database
        $payments = Payment::latest()->get();
        $guests = Guest::select('id', 'name')->get();
        $rooms = Room::select('id', 'name')->get();

        $payments = $payments->map(function ($payment) {
            $payment->amount = 'Rp ' . number_format($payment->amount, 0, ',', '.');
            return $payment;
        });
        
        return view('payment.index')->with([
            'payments' => $payments,
            'guests' => $guests,
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstGuest_id' => ['required'],
            'room_id' => ['required'],
            'paid_date' => ['required'],
            'amount' => ['required'],
        ]);
    
        // Periksa apakah secondGuest_id disediakan dalam request
        if ($request->has('secondGuest_id')) {
            // Lakukan validasi khusus jika secondGuest_id ada
            $request->validate([
                'secondGuest_id' => 'different:firstGuest_id',
            ]);
        }
    
        $room = Room::find($request->room_id);
    
        // Periksa status kamar
        if (!$room->status) {
            // Ubah status kamar menjadi true
            $room->update(['status' => true]);
        }
    
        $paymentData = [
            'firstGuest_id' => $request->firstGuest_id,
            'room_id' => $request->room_id,
            'paid_date' => $request->paid_date,
            'amount' => $request->amount,
            'description' => $request->description,
        ];
    
        // Tambahkan secondGuest_id jika disediakan
        if ($request->has('secondGuest_id')) {
            $paymentData['secondGuest_id'] = $request->secondGuest_id;
        }
    
        $payment = Payment::create($paymentData);

        $newestPayment = Payment::latest()->first();
        $firstGuest = Guest::find($newestPayment->firstGuest_id);
        if (!is_null($newestPayment->secondGuest_id)) {
            $secondGuest= Guest::find($newestPayment->secondGuest_id);
        }
        $room = Room::find($request->room_id);

        // Format jumlah amount menjadi 'Rp 1.000.000'
        $formattedAmount = 'Rp ' . number_format($newestPayment->amount, 0, ',', '.');

        $description = $firstGuest->name . ' melakukan pembayaran ' . $room->name . ' sebesar ' . $formattedAmount;

        if (!is_null($newestPayment->secondGuest_id)) {
            $description = $firstGuest->name . ' & ' . $secondGuest->name .' melakukan pembayaran ' . $room->name . ' sebesar ' . $formattedAmount;
        }
        
        $activityData = ([
            'firstGuest_id' => $newestPayment->firstGuest_id,
            'room_id' => $request->room_id,
            'payment_id' => $newestPayment->id,
            'description' => $description,
        ]);

        if (!is_null($newestPayment->secondGuest_id)) {
            $activityData['secondGuest_id'] = $newestPayment->secondGuest_id;
        }

        $activity = Activity::create($activityData);

        if ($payment) {
            return redirect()->route('payment.index')->with(
                'success', 'Payment has been created successfully.'
            );
        } else {
            return back()->with(
                'error', 'Payment creation failed. Please try again.'
            );
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payment.index')->with(
                'error', 'Payment not found'
            );
        }

        $payment->delete();

        return redirect()->route('payment.index')->with(
            'success', 'Payment deleted successfully'
        );
    }
}
