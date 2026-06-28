<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller

{
    public function index()
    {
        $pageTitle = '商品一覧';

        // 各配列の前に (object) をつけることで、Blade側で「->」が使えるようになります！
        $products = collect([
            (object)[
                'id' => 1,
                'name' => 'ノートパソコン',
                'category' => '電子機器',
                'price' => 89800,
                'in_stock' => true, // Bladeの@if判定に合わせて true に変更
            ],
            (object)[
                'id' => 2,
                'name' => 'ワイヤレスマウス',
                'category' => '周辺機器',
                'price' => 3980,
                'in_stock' => true, // 在庫があるので true
            ],
            (object)[
                'id' => 3,
                'name' => 'USBハブ',
                'category' => '周辺機器',
                'price' => 2480,
                'in_stock' => false, // 在庫がないので false
            ],
        ]);

        $lastUpdated = now()->format('Y年m月d日 H:i:s');

        return view('products.index', compact('pageTitle', 'products', 'lastUpdated'));
    }    }
