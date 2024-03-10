<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function getVideo()
    {
        // Lakukan operasi yang diperlukan untuk mendapatkan data video
        $videoPath = Storage::url('storage/video/Pastel Green Pro.mp4');

        // Respons HTML dengan elemen video
        return "<?php echo 
        <video class='object-fill md:object-contain min-w-screen z-1' autoplay loop>
    <source src='{{ asset('storage/video/Pastel Green Pro.mp4') }}' type='video/mp4'>
    Your browser does not support the video tag.
</video>
        ?>";
    }
}
