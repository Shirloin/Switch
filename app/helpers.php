<?php

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Http;

if(!function_exists('formatPrice')) {
    function formatPrice($price): string
    {
        return number_format($price, 0, ',', ',');
    }
}

if(!function_exists('getRandomImageURL')) {
    function getRandomImageURL(): string
    {
        $response = Http::get('https://source.unsplash.com/random');
        return $response->effectiveUri();
    }
}

// if(!function_exists('calculateMerchantRating')) {
//     function calculateMerchantRating($merchantId): int {
//         $products = Product::where('merchant_id', $merchantId)->get();

//         $totalRating = 0;
//         $totalCount = 0;

//         foreach ($products as $product) {
//             $ratings = Rating::where('product_id', $product->id)->get();
//             $productRating = 0;
//             $productCount = 0;

//             foreach ($ratings as $rating) {
//                 $productRating += $rating->rating;
//                 $productCount++;
//             }

//             if ($productCount > 0) {
//                 $productAverage = $productRating / $productCount;
//                 $totalRating += $productAverage;
//                 $totalCount++;
//             }
//         }

//         if ($totalCount > 0) {
//             $averageRating = $totalRating / $totalCount;
//         } else {
//             $averageRating = 0;
//         }

//         return $averageRating;
//     }
// }
