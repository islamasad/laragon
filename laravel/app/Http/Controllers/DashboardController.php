<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Payment;
use App\Models\Activity;
use App\Models\Guest;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil status kamar
        $totalRooms = Room::count(); // Jumlah total kamar
        $occupiedRooms = Room::where('status', true)->count(); // Jumlah kamar yang terisi

        // Menghitung pemasukan bulan ini
        $currentMonth = now()->format('Y-m');
        $totalPayments = Payment::where('paid_date', 'like', $currentMonth . '%')->sum('amount');

        // Menghitung jumlah kamar kosong
        $availableRooms = $totalRooms - $occupiedRooms;

        // Pesan berdasarkan status kamar dan pemasukan
        $roomMessage = ($occupiedRooms === $totalRooms) ? 'Kamar Penuh' : $availableRooms . ' kamar kosong';
        $paymentMessage = 'Pemasukan bulan ini: Rp ' . number_format($totalPayments, 0, ',', '.');

        // Menghitung jumlah penghuni yang ada di kosan berdasarkan kolom status yang bernilai true
        $totalGuests = Guest::where('status', true)->count();
        $guestMessage = 'Jumlah penghuni: ' . $totalGuests;

        // Mengambil 2 aktivitas terakhir
        $activities = Activity::latest()->limit(2)->get();

        return view('dashboard')->with([
            'roomMessage' => $roomMessage,
            'paymentMessage' => $paymentMessage,
            'guestMessage' => $guestMessage,
            'activities' => $activities,
        ]);
    }




}
