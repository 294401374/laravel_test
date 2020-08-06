<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Arr;
    
    class HelpersController extends Controller
    {
        //
        public function helpMethod(Request $request)
        {
            $array = [
                "name" => "Desk",
                "price" => 100,
            ];
            // 1. pull()
            $price = Arr::pull($array, 'price');
            dump('1.pull().price', $price);
            dump('1.pull().array', $array);
            
            // 2. data_fill()
            $data = ['products' => ['desk' => ['price' => 100]]];
            data_fill($data, 'products.desk.price', 200);
            dump('2.data_fill()', $data);
            // 3. add
            $data2 = ['name' => ['desk' => ['age' => 100]]];
            $data3 = Arr::add($data2, 'name.desk.age', 200);
            dump('3.add', $data3);
            // 4.set(),data_set($data, 'products.desk.price', 200);
            dump('4.set()&&data_fill', $data2);
            // dump( Arr::set($data2, 'name.desk.age', 200));
            dump(data_set($data2, 'name.desk.age', 200));
            dump($data2);
            // 5. dot()
            $dot = Arr::dot($data2);
            dump('5.dot()', $dot);
            dump( head($dot));
            
        }
        
    }
