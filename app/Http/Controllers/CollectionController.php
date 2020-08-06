<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collectionMethed(\Illuminate\Support\Collection $collection)
    {
        // 倒着来
        // -----------------------------
    
        $collect = collect([
            ['name' => 'tom', 'age' => 10, ],
            ['name' => 'jam' , 'age' => 12],
            ['name' => 'dean', 'age' => 18],
        ]);
        $every = $collect->every(function ($item, $key){
            return $item['age'] > 9;
        });
        dump($every);
    
        dump($collect->groupBy('name')->toArray());
        $collect = collect([
            'four' => 40,
            'one' => 10,
            'two' => 20,
            'three' => 30,
            'five' => 50,
        ]);
        dump($collect->sort()->all());
    
    
        dump($collect->sortByDesc('age')->all());
        $collect = collect([
            ['email' => 'abigail@example.com', 'position' => 'Developer'],
            ['email' => 'james@example.com', 'position' => 'Designer'],
            ['email' => 'victoria@example.com', 'position' => 'Developer'],
        ]);
        dump($collect->filter(function($value, $key){
            return $value > 20;
        })->all());
        $myarr = ['one', 'two', 'three'];
        $myobj = (object)$myarr;
        if ( !($myarr instanceof \Traversable) ) {
            dump("myarray is NOT Traversable");
        }
        if ( !($myobj instanceof \Traversable) ) {
            dump("myobj is NOT Traversable");
        }
        foreach($myobj as $v){
            dump($v);
        }
    
        // dd($myobj);
        //each()
        $collect = collect([
            ['email' => 'abigail@example.com', 'position' => 'Developer'],
            ['email' => 'james@example.com', 'position' => 'Designer'],
            ['email' => 'victoria@example.com', 'position' => 'Developer'],
        ])->each(function($item, $key){
            dump($item['position']);
            // if ($item['position'] == 'Developer'){
            //     return false;
            // }
        })->all();
        // dd($collect);
        // duplicates
        $employees = collect([
            ['email' => 'abigail@example.com', 'position' => 'Developer'],
            ['email' => 'james@example.com', 'position' => 'Designer'],
            ['email' => 'victoria@example.com', 'position' => 'Developer'],
        ]);
        dump($employees->duplicates('email')->all());
        dump($employees->duplicates('position')->all());
    
        $collection = collect(['a', 'b', 'a', 'c', 'b']);
        dump($collection->duplicates()->all());
    
        //diff_key
        $collection = collect([
            'one' => 10,
            'two' => 20,
            'three' => 30,
            'four' => 40,
            'five' => 50,
        ]);
        $diffKey = $collection->diffKeys([
            'two' => 2,
            'four' => 4,
            'six' => 6,
            'eight' => 8,
        ]);
        dump($diffKey->all());
    
        //diff_assoc
        $collect1 = collect([
            'color' => 'orange',
            'type' => 'fruit',
            'remain' => 6
        ]);
    
        $collect2 = [
            'color' => 'yellow',
            'type' => 'fruit',
            'remain' => 3,
            'used' => 6,
        ];
        dump($collect1->diffAssoc($collect2)->all());
    
        // diff
        $collect = collect([1,2,3,4,5,9]);
        $diff = $collect->diff([2,4,6,8]);
        dump($diff->all());
    
        // 1. map()&& reject()
        $collect = collect(['taylor', 'abigail', null])->map(function($name){
            return strtoupper($name);
        })->reject(function($name){
            return empty($name);
        });
        //2. avg()
        dump(collect([1,2,4,5])->avg());
        //3.chunk()
        dump($collapse = collect([1,2,3,4,5,6,7,8,9])->chunk(5)->toArray());
        //4. collapse()
        dump(collect($collapse)->collapse()->all());
        //5. combine
        dump(collect(['name', 'age', 'sex'])->combine(['tom', '29', 'nan'])->all());
        //6.concat()
        dump(collect(['John Doe'])->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe'])->all());
        //7.contain()Desk
        $collect = collect(['name' => 'Desk', 'price' => 100]);
        dump($collect->contains('Desk')); // true
        dump($collect->contains('name')); // false
        dump($collect->contains('name', 'Desk')); // false
        $collect = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
        ]);
        dump($collect->all());
        dump($collect->contains( ['product' => 'Desk', 'price' => 200])); // true
        dump($collect->contains( ['product' => 'Desk' ])); // false
        dump($collect->contains('Desk')); // false
        $collect = collect([1,2,3,4,5,'6']);
        dump($collect->contains(function($value, $key){
            return $value > 5;
        }));// true
        // dump($collect); 没看出有啥区别
        dump($collect->containsStrict(function($value, $key){
            return $value > 5;
        }));// true
        // 统计
        dump($collect->count());
        // 统计每个值出现的次数
        dump($collect->concat([5])->countBy()->all());
        // strrchr()的用法
        dump(strrchr('alice@gmail.com', 'g@gc'));
        // 回调
        dump( collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com'])->countBy(function($email){
            return substr(strrchr($email, '@'), 1);
        })->all()) ;
        // 笛卡尔积，交叉组合
        dump($collect->all());
        // 可以做sku的一些相关
        dump(collect([1, 2])->crossJoin(['a', 'b'])->all());
        dump(collect([1, 2])->crossJoin($collect)->all());
    
    }
}
