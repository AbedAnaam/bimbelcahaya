<?php

namespace App\Http\Controllers\Belakang;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Model\Jenjang;
use App\User;
use App\Model\Kelas;

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
        $this->data['jenjang']          = Jenjang::count();
        $this->data['user']             = User::count();
        $this->data['kelas']            = Kelas::count();
        // $this->data['testimonial']  = Testimonial::count();

        return view('belakang.dashboard', $this->data);
    }
}
