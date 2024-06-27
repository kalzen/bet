<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Image;
use App\Models\Package;
use DB;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
class ProductController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $products = Product::active()->latest()->paginate();
        return view('product.index',compact('catalogues','products'));
    }
    public function catalogue($alias, Request $request)
    {
        //dd($request);
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $catalogue = Catalogue::where('slug',$alias)->firstOrFail();

        $query = Package::where('catalogue_id',$catalogue->id);

        if (isset($request->type))
        {
            $filters_only = $request->except(['_token', 'type']);
            $string_filter = $this->convertFiltersToString($filters_only);
            $client = new Client();
            $response = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/finder/global?type='.$catalogue->type.'&siteCode=vn&start=1&num=100&sort=newest&onlyFilterInfoYN=N&keySummaryYN=Y&specHighlightYN=Y&'.$string_filter.'&familyId=');
            $json = json_decode($response->getBody(), true);
            $result = [];
            foreach ($json['response']['resultData']['productList'] as $item)
            {
                array_push($result,$item['productGroupId']);
            }
            $query->whereIn('group_id',$result);
           //dd('https://searchapi.samsung.com/v6/front/b2c/product/finder/global?type='.$catalogue->type.'&siteCode=vn&start=1&num=12&sort=newest&onlyFilterInfoYN=N&keySummaryYN=Y&specHighlightYN=Y&'.$string_filter.'&familyId=');
            //dd($json);
        }

        $client = new Client();
        $response = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/finder/global?type='.$catalogue->type.'&siteCode=vn&start=1&num=100&sort=onlineavailability&onlyFilterInfoYN=Y');
        $json = json_decode($response->getBody(), true);
        $filters = $json['response']['resultData'];
        $packages = $query->paginate();
        //dd($packages);
        return view('product.index',compact('catalogue','catalogues', 'packages', 'filters'));
    }
    public function convertFiltersToString(array $filters)
    {
        try {
            $filterString = '';
            $isFirstFilter = true;

            foreach ($filters as $key => $value) {
                if (is_array($value)) {
                    $filterString .= $key . '=';
                    $isFirstArrayItem = true;
                    foreach ($value as $arrayValue) {
                        if (!$isFirstArrayItem) {
                            $filterString .= '%2B';
                        }
                        $filterString .= $arrayValue;
                        $isFirstArrayItem = false;
                    }
                } else {
                    if (!$isFirstFilter) {
                        $filterString .= '&';
                    }
                    $filterString .= $key . '=' . $value;
                }
                $isFirstFilter = false;
            }

            return $filterString;
        } catch (\Exception $e) {
            Log::error('Error converting filters to string: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while converting filters to string.'], 500);
        }
    }
    public function crawl()
    {
        $client = new Client();
        $categories = array(
            array(
              'name' => 'Smartphones',
              'type' => '01010000',
              'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-539828796'
            ),
            array(
                'name' => 'TV',
                'type' => '04010000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-542106139'
              ),
            array(
              'name' => 'Máy Tính Bảng',
              'type' => '01020000',
              'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538342563'
            ),
            array(
                'name' => 'Galaxy Buds',
                'type' => '01040000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538342563'
              ),
              array(
                'name' => 'Thiết bị đeo',
                'type' => '01030000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538342566'
              ),
              
            array(
                'name' => 'Phụ Kiện Di Động',
                'type' => '01050000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538342566'
              ),
            array(
            'name' => 'Tủ Lạnh',
            'type' => '08030000',
            'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538698113'
            ),
            array(
                'name' => 'Máy Giặt & Máy sấy',
                'type' => '08010000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538698115'
            ),
            array(
            'name' => 'Điều Hòa',
            'type' => '08060000',
            'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-538342531'
            ),
            array(
                'name' => 'Thiết Bị Nhà Bếp',
                'type' => '08080000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-540753568'
            ),
            array(
                'name' => 'Màn Hình',
                'type' => '07010000',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/epp/vn-eppcms-co04image-536891303'
            ),
        );
        // tivi
        //$type = "04010000";
        // smartphone
        //$type = "01010000";
        // tablet
        //$type = "01020000";
        // smart watch
        //$type = "01030000";
        // galaxy bugs
        //$type = "01040000";
        // Phụ kiện di động
        //$type = "01050000";
        //Tủ lạnh
        //$type = "08030000";
        //Máy giặt và máy sấy
        //$type = "08010000";
        //Điều hòa di động
        //$type = "08060000";
        //thiết bị nhà bếp
        //$type = "08080000";
        //Màn hình 
        // $type ="07010000";
        foreach ($categories as $category)
        {
            $response = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/finder/global?type='.$category['type'].'&siteCode=vn&start=1&num=100&sort=onlineavailability&onlyFilterInfoYN=N&keySummaryYN=Y&specHighlightYN=Y&companyCode=vn_congnghed&pfType=G&familyId=');

            $json = json_decode($response->getBody(), true);
            DB::beginTransaction();
                    try {
                        DB::table('catalogues')->updateOrInsert([
                            'name' => $category['name'],
                            'slug' => Str::slug($category['name']),
                            'type' => $category['type'],
                        ]);
                        DB::commit();
                    
                    } catch(Exception $ex) {
                        DB::rollback();
                        
                    }
            $cat = Catalogue::where('name',$category['name'])->first();
            $cat->image()->create(['url' => $category['images']]);
            foreach ($json['response']['resultData']['productList'] as $product)
            {
                $data = array();
                
                DB::beginTransaction();
                    try {
                        DB::table('packages')->updateOrInsert([
                            'name' => $product['fmyEngName'],
                            'options' => json_encode($product['chipOptions']),
                            'catalogue_id' => $cat->id,
                            'json_data' => json_encode($product),
                            'benefits' => json_encode($product['localBenefitList']),
                            'group_id' => $product['productGroupId'],

                        ]);
                        DB::commit();
                    
                    } catch(Exception $ex) {
                        DB::rollback();
                        
                    }
                $package = Package::where('name',$product['fmyEngName'])->first();
                
                foreach ($product['modelList'] as $key => $value)
                {
                    $data['price'] = $value['price'];
                    $images = $value['thumbUrl'];
                    $data['title'] =  $value['displayName'];
                    $data['code'] =  $value['modelCode'];
                    $data['description'] = json_encode($value['marketingMessage']);
                    $data['benefits_text'] = json_encode($value['formattedPriceSave']);
                    $data['key_summary'] = json_encode($value['keySummary']);
                    $data['instock'] = $value['stockStatusText'];
                    $data['sale_text'] = json_encode($value['salesText']);
                    $data['sale_price'] = $value['promotionPrice'];
                    
                    // foreach ($product['chipOptions'] as $att)
                    // {
                    //     if($att['fmyChipType'] == 'COLOR')
                    //     {
                    //         $attributes['1']['value'] = $att['fmyChipType']['optionList'];
                    //     }
                    //     elseif($att['fmyChipType'] == 'MOBILE MEMORY')
                    //     {
                    //         $attributes['2']['value'] = $att['fmyChipType']['optionList'];
                    //     }
                    //     elseif($att['fmyChipType'] == 'OTHER')
                    //     {
                    //         $attributes['3']['value'] = $att['fmyChipType']['optionList'];
                    //     }
                    // }
                    // $attributes['4']['value'] = $product['localBenefitList'];
                    //$category_id = 1;
                    DB::beginTransaction();
                    try {
                        $product = Product::create($data);
                    // $product->attributes()->sync(collect($attributes)->filter(function($item){return $item['value'];}));
                        $product->catalogues()->sync($cat->id);
                        $product->packages()->sync($package->id);
                        $product->images()->sync(collect(explode(',',$images))->map(function($item){return Image::updateOrCreate(['url'=>$item]);})->pluck('id'));
                        DB::commit();
                    
                    } catch(Exception $ex) {
                        DB::rollback();
                        
                    }
                }
            }
        }
    }

    public function search()
    {
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $query = Product::with(['catalogues','images'])->active();
        
        if (request('sort')=='price-asc') {
            $query->orderBy('price','asc');
        } else if (request('sort') == 'price-desc') {
            $query->orderBy('price','desc');
        } else {
            $query->orderBy('created_at','desc');
        }
        $products = $query->where(function($p){
            $p->where('title','like','%'.request('keyword').'%')
            ->orWhereHas('catalogues',function($q){
                $q->where('name','like','%'.request('keyword').'%');
            });
        })->paginate();
        return view('product.index',compact('products','catalogues'));
    }
    public function clearCookie ()
    {
        try {
            // Clear all cookies
            Cookie::queue(Cookie::forget('cart'));

            // Log the success message
            Log::info('All cookies have been cleared successfully.');

            // Redirect the user to a suitable page or return a success message
            return redirect()->route('index')->with('success', 'All cookies have been cleared.');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error in ProductController@clearCookie: ' . $e->getMessage());

            // Return an error message to the UI
            return redirect()->route('product.index')->with('error', 'An error occurred while clearing the cookies.');
        }
    }
    public function detail($alias)
    {
        $product = Product::active()->where('slug',$alias)->firstOrFail();
        if ($product->content == '')
        {
        $client = new Client();
        $content = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/card/detail/global?siteCode=vn&modelList='.$product->code.'&saleSkuYN=N&onlyRequestSkuYN=N&keySummaryYN=N&keySpecYN=N&quicklookYN=N');
        $json = json_decode($content->getBody(), true);
        $models = $json['response']['resultData']['productList'][0]['modelList'];
        foreach ($models as $model)
        {
            if ($model['modelCode'] == $product->code)
            {
                $link = 'https://www.samsung.com'. $model['pdpUrl'];
            }
        }
        try {            
            $response = $client->get($link);            
            $html = $response->getBody();            
            $dom = new \DOMDocument();            
            @$dom->loadHTML($html);            
            $xpath = new \DOMXPath($dom);            
            $benefitElement = $xpath->query("//div[@id='benefit']")->item(0);            
            if ($benefitElement) {                
                $benefitHtml = $benefitElement->C14N();        
                $benefitHtml = str_replace('data-desktop-src','src',$benefitHtml);
                $benefitHtml = str_replace('data-src-pc','src',$benefitHtml);
                $benefitHtml = preg_replace('/\$.*?\$/m', '', $benefitHtml);        
                //var_dump($benefitHtml);        
                $product->content = $benefitHtml;
                $product->save();    
            } else {                
                Log::error('Benefit element not found in the HTML.');            
            }
        } catch (\Exception $e) {            
            Log::error('Error in ProductController@detail: ' . $e->getMessage());            
            // Display an error message to the UI or handle the exception in an appropriate way        
            }
        }
        if ($product->json_data == '')
        {
            $client = new Client();
            $content = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/card/detail/global?siteCode=vn&modelList='.$product->code.'&saleSkuYN=N&onlyRequestSkuYN=N&keySummaryYN=N&keySpecYN=N&quicklookYN=N');
            $json = json_decode($content->getBody(), true);
            $product->json_data =  json_encode($json['response']['resultData']['productList'][0]);
            $product->save();
        }
        if ($product->spec == '')
        {
            $client = new Client();
            $content = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/spec/detail?siteCode=vn&modelList='.$product->code);
            $json = json_decode($content->getBody(), true);
            $product->spec =  json_encode($json['response']['resultData']);
            $product->save();
        }
        DB::table('products')->where('id',$product->id)->increment('viewed');

        return view('product.detail',compact('product'));
    }
    public function getPrice(Request $request)
    {
        $package = Package::find($request->package);
        $model_code = '';
        foreach (json_decode($package->json_data)->modelList as $model)
        {
            foreach ($model->fmyChipList as $chips)
            {
                if ($chips->fmyChipType == $request->name)
                {   
                    if ($chips->fmyChipCode == $request->value )
                    {   
                        if ($model->price)
                            {
                            $price_html = number_format($model->price).'đ';
                            }
                            else
                            {
                                $price_html = 'Liên hệ';
                            }
                            $model_code = $model->modelCode;
                        
                    
                    }
                }
            }
            if ($model_code)
            {
            $html = '<tbody>';
            $client = new Client();
            $content = $client->get('https://searchapi.samsung.com/v6/front/b2c/product/spec/detail?siteCode=vn&modelList='.$model_code);
            $json = json_decode($content->getBody(), true);
            $model_list =  $json['response']['resultData']['modelList'];
            
            
                    $specs = $model_list[0]['spec']['specItems'];
                    //dd($specs);
                    foreach ($specs as $item )
                    {
                        $html .='<tr><td class="text-center" style="font-weight: 500" colspan="2">'.$item['attrName'].'</td></tr>';
                        if (is_array($item['attrs']) || is_object($item['attrs']))
                        foreach ($item['attrs'] as $subitem)
                        {
                            $html .='<tr><td>'.$subitem['attrName'].'</td><td>'.$subitem['attrValue'].'</td></tr>';
                        }
                    }
            $html .= '</tbody>';
                }
        }
        $data = array(
            'model' => $model_code,
            'price' => $price_html,
            'spec' => $html
        );
        return response()->json($data);
    }
    public function getThumb(Request $request)
    {
        $package = Package::find($request->package);
        foreach (json_decode($package->json_data)->modelList as $model)
        {
            foreach ($model->fmyChipList as $chips)
            {
                if ($chips->fmyChipType == 'COLOR')
                {   
                    if (strcasecmp($chips->fmyChipName, $request->value) == 0)
                    {       
                    return response()->json($model->thumbUrl);
                    }
                }
            }
        }
        return response()->json($request);
    }
    public function addtocart(Request $request)
    {
        try {
            $cart = json_decode(request()->cookie('cart'), true) ?? [];
            $model = $request->model;

            if (array_key_exists($model, $cart)) {
                $cart[$model]['quantity']++;
            } else {
                $cart[$model] = [
                    'quantity' => 1,
                    'code' => $request->model
                ];
            }

            $response = response()->json([
                'total_items' => count($cart),
            ]);

            return $response->withCookie(cookie()->forever('cart', json_encode($cart)));
        } catch (\Exception $e) {
            Log::error('Error in ProductController@addtocart: ' . $e->getMessage());
            return response()->json([
                'error' => 'An error occurred while adding the item to the cart.',
            ], 500);
        }
    }
    public function cart()
    {
      
            $cart = json_decode(request()->cookie('cart'), true) ?? [];
            $cartData = [];
            $html ='';
            $total_price = 0;
            foreach ($cart as $modelCode => $model) {
                $product = Product::where('code', $modelCode)->first();
                $price = 0;
                if ($product) {
                    $package = $product->packages->first();
                    $price_html = '';
                    
                    foreach (json_decode($package->json_data, true)['modelList'] as $item)
                    {
                        
                        if ($item['modelCode'] == $model['code'])
                        {
                            //return response()->json([$model]);
                            if ($item['price'])
                            {
                            $price_html = number_format($item['price']);
                            }
                            else
                            {
                                $price_html = 'Liên hệ';
                            }
                            $price = $item['price'];
                        }
                    }
                    $html .= '<li class="woocommerce-mini-cart-item mini_cart_item">
                                <a href="#" data-model="'.$modelCode.'" onclick="removeFromCart(this)" class="remove" aria-label="Remove this item"  data-product_sku=""></a>
                                <a href="single-product-sidebar.html">
                                    <img src="'.$product->images->first()->url.'" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">'.$product->title.'
                                </a>
                                <span class="quantity">'.$model['quantity'].'×
                                    <span class="woocommerce-Price-amount amount">'.$price_html.'</span>
                                </span>
                            </li>';
                }
                $total_price += $price*$model['quantity'];
            }
            $response = response()->json([
                'total_items' => count($cart),
                'html' => $html,
                'total_price' => number_format($total_price),
            ]);
            return $response;
        
    }
    public function cartIndex()
    {
        $cart = json_decode(request()->cookie('cart'), true) ?? [];
        $cartData = [];
        $total_price = 0;
        foreach ($cart as $modelCode => $model) {
            $product = Product::where('code', $modelCode)->first();
            if ($product) {
                $package = $product->packages->first();
                $price = 0;
                foreach (json_decode($package->json_data, true)['modelList'] as $item) {
                    if ($item['modelCode'] == $model['code']) {
                        if ($item['price'])
                        {
                        $price_html = number_format($item['price']).'đ';
                        }
                        else
                        {
                            $price_html = 'Liên hệ';
                        }
                        $price = $item['price'];
                    }
                }
                $cartData[] = [
                    'product' => $product,
                    'quantity' => $model['quantity'],
                    'price_html' => $price_html,
                    'price' => $price
                ];
                $total_price += $price * $model['quantity'];
            }
        }
        //dd($cartData);
        return view('product.cart', compact('cartData', 'total_price', 'cart'));
    }
    public function checkout()
    {
        $cart = json_decode(request()->cookie('cart'), true) ?? [];
        $cartData = [];
        $total_price = 0;
        foreach ($cart as $modelCode => $model) {
            $product = Product::where('code', $modelCode)->first();
            if ($product) {
                $package = $product->packages->first();
                $price = 0;
                foreach (json_decode($package->json_data, true)['modelList'] as $item) {
                    if ($item['modelCode'] == $model['code']) {
                        $price = $item['price'];
                    }
                }
                $cartData[] = [
                    'product' => $product,
                    'quantity' => $model['quantity'],
                    'price' => $price,
                ];
                $total_price += $price * $model['quantity'];
            }
        }
        return view('product.checkout', compact('cartData', 'total_price', 'cart'));
    }
    public function removeFromCart(Request $request)
    {
        try {
            $cart = json_decode(request()->cookie('cart'), true) ?? [];
            $model = $request->model;

            if (array_key_exists($model, $cart)) {
                unset($cart[$model]);
            }

            $total_price = 0;
            $subtotals = [];
            foreach ($cart as $modelCode => $model) {
                $product = Product::where('code', $modelCode)->first();
                if ($product) {
                    $package = $product->packages->first();
                    $price = 0;
                    foreach (json_decode($package->json_data, true)['modelList'] as $item) {
                        if ($item['modelCode'] == $model['code']) {
                            $price = $item['price'];
                        }
                    }
                    $subtotal = $price * $model['quantity'];
                    $subtotals[$modelCode] = number_format($subtotal);
                    $total_price += $subtotal;
                }
            }

            $response = response()->json([
                'total_items' => count($cart),
                'total_price' => number_format($total_price),
                'subtotals' => $subtotals,
            ]);

            return $response->withCookie(cookie()->forever('cart', json_encode($cart)));
        } catch (\Exception $e) {
            Log::error('Error in ProductController@removeFromCart: ' . $e->getMessage());
            return response()->json([
                'error' => 'An error occurred while removing the item from the cart.',
            ], 500);
        }
    }
    public function searchByKeyword(Request $request)
    {
        $query = Package::where('name','like','%'.$request->s.'%');
        $packages = $query->paginate();
        return view('product.search', compact('packages', 'request'));
    }
    public function updateCartItem(Request $request)
    {
        try {
            $cart = json_decode(request()->cookie('cart'), true) ?? [];
            $model = $request->model;
            $quantity = $request->quantity;
    
            if (array_key_exists($model, $cart)) {
                $cart[$model]['quantity'] = $quantity;
            }
    
            $total_price = 0;
            $subtotals = [];
            foreach ($cart as $modelCode => $model) {
                $product = Product::where('code', $modelCode)->first();
                if ($product) {
                    $package = $product->packages->first();
                    $price = 0;
                    foreach (json_decode($package->json_data, true)['modelList'] as $item) {
                        if ($item['modelCode'] == $model['code']) {
                            $price = $item['price'];
                        }
                    }
                    $subtotal = $price * $model['quantity'];
                    $subtotals[$modelCode] = number_format($subtotal);
                    $total_price += $subtotal;
                }
            }
    
            $response = response()->json([
                'total_items' => count($cart),
                'total_price' => number_format($total_price),
                'subtotals' => $subtotals,
            ]);
    
            return $response->withCookie(cookie()->forever('cart', json_encode($cart)));
        } catch (\Exception $e) {
            Log::error('Error in ProductController@updateCartItem: ' . $e->getMessage());
            return response()->json([
                'error' => 'An error occurred while updating the cart item.',
            ], 500);
        }
    }    

}
