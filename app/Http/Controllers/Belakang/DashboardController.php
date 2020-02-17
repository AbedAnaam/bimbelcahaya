<?php

namespace App\Http\Controllers\Belakang;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Model\Jenjang;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title']            = 'Dashboard';
        $this->data['jenjang']           = Jenjang::count();
        // $this->data['testimoni']        = Testimoni::count();
        // $this->data['resep']            = Resep::count();
        // $this->data['testimonial']  = Testimonial::count();

        return view('belakang.dashboard', $this->data);
    }
}
