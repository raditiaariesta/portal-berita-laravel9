<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsController extends Controller
{
    public function index()
    {
        $client = new Client(['verify' => false]); // Nonaktifkan verifikasi SSL
        $apiKey = 'e44f5d3a55444b5fa02d5be7878298f6'; // Ganti dengan API Key Anda
        $url = 'https://newsapi.org/v2/top-headlines';

        try {
            $response = $client->get($url, [
                'query' => [
                    'country' => 'us',
                    'category' => 'business',
                    'apiKey' => $apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            // Kirim data berita ke view
            return view('dashboard.index', ['articles' => $data['articles']]);
        } catch (\Exception $e) {
            // Tangani error jika terjadi kesalahan saat mengambil data
            return view('news.create', [
                'articles' => [],
                'error' => 'Tidak dapat mengambil berita saat ini. ' . $e->getMessage(),
            ]);
        }
    }
}
