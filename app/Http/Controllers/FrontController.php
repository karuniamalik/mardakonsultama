<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\HeroSection;
use App\Models\Testimonial;
use App\Models\CompanyAbout;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FrontController;
use App\Http\Requests\StoreAppointmentRequest;

class FrontController extends Controller
{
    //
    public function index() {

        $hero_sections = HeroSection::orderByDesc('id')->take(1)->get();
        $principles = OurPrinciple::take(3)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(2)->get();
        return view('front.index', compact('testimonials','teams','products','statistics','principles','hero_sections'));
    }

    public function team()  {
        $statistics = CompanyStatistic::take(4)->get();
        $teams = OurTeam::take(12)->get();
        return view('front.team', compact('teams','statistics'));
    }

    public function about() {
        $statistics = CompanyStatistic::take(4)->get();
        $abouts = CompanyAbout::take(2)->get();
        return view('front.about', compact('abouts','statistics'));
    }

    public function appointment() {
        //  $testimonials = Testimonial::take(2)->get();
        //  $products = Product::take(3)->get();
          return view('front.appointment');
    }

    public function appointment_store(StoreAppointmentRequest $request)  {

        // 1. Simpan data ke database dan ambil hasilnya ke variabel $appointment
    // Gunakan return di dalam transaction agar variabel bisa dipakai di luar
    $appointment = DB::transaction(function () use ($request) {
        $validated = $request->validated();
        return Appointment::create($validated);
    });

    // 2. Susun URL WhatsApp (Ganti Http::post dengan baris ini)
    // $phone = "6281917708181";
    $phone = "6285388910812";
    $message = "⭐ *PESAN BARU* ⭐" . PHP_EOL .
           "-------------------------------------------" . PHP_EOL .
           "👤 *Nama :* {$appointment->name}" . PHP_EOL .
           "📱 *Telepon:* {$appointment->phone_number}" . PHP_EOL .
           "-------------------------------------------" . PHP_EOL .
           "📝 *Pesan:* " . PHP_EOL .
           "_{$appointment->brief}_" . PHP_EOL .
           "-------------------------------------------" . PHP_EOL .
           "Pesan ini dikirim melalui website marda-konsultama.com";
    
    // Encode pesan agar aman untuk URL
    $waUrl = "https://api.whatsapp.com/send/?phone={$phone}&text=" . rawurlencode($message) . "&type=phone_number&app_absent=0";

    // 3. Kirim Email (Setelah WA)
    try {
        // Kirim ke email admin (atau ke klien: $appointment->email)
        Mail::to('mardakonsultama@gmail.com')->send(new AppointmentMail($appointment));
    } catch (\Exception $e) {
        Log::error("Email Gagal: " . $e->getMessage());
       
    }
        
        return redirect()->route('front.index')->with([
        'success' => 'Appointment berhasil dibuat!',
        'whatsapp_url' => $waUrl // Data ini akan ditangkap oleh JavaScript di View
    ]);
    }
}
