<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Contact information dengan link yang bisa diklik
        $contact = [
            'name' => 'Waroenk Qu',
            'tagline' => 'Cita Rasa Autentik, Harga Bersahabat',
            
            // Address
            'address' => 'Jl. Sukowiryo, Bondowoso, Jawa Timur, Indonesia',
            
            // Phone & WhatsApp
            'phone' => '+62 859-2417-1803',
            'phone_display' => '0859-2417-1803',
            'phone_link' => 'tel:+6285924171803',
            
            // WhatsApp
            'whatsapp' => '6285924171803', // Format: 62 + nomor (tanpa 0 di depan)
            'whatsapp_link' => 'https://wa.me/6285924171803?text=Halo%20Waroenk%20Qu%2C%20saya%20ingin%20bertanya%20tentang%20menu...', 
            
            // Email
            'email' => 'info@waroenkqu.com',
            'email_link' => 'mailto:info@waroenkqu.com',
            
            // Social Media
            'instagram' => '@waroenkqu_',
            'instagram_link' => 'https://www.instagram.com/waroenkqu_?igsh=a2l4cGJjdjl1a3Q=', // Ganti username
               
            // Google Maps
            'maps_link' => 'https://maps.app.goo.gl/wfNNDervvBjcxmpt6',
            'maps_embed' => 'https://www.google.com/maps/place/Rumah+Makan+RAWON+DLL/@-7.9430944,113.8080671,17z/data=!4m6!3m5!1s0x2dd6c3006397e863:0x7aa2eca3c84fb365!8m2!3d-7.9430997!4d113.810642!16s%2Fg%2F11l_33xb7m?entry=ttu&g_ep=EgoyMDI1MTEwMi4wIKXMDSoASAFQAw%3D%3D',
            
            // Jam Buka
            'open_hours' => [
                'Senin - Jumat' => '08:00 - 21:00',
                'Sabtu - Minggu' => '08:00 - 22:00',
            ],
        ];
        
        return view('pages.contact', compact('contact'));
    }
    
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|min:10',
        ]);
        
        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }
}