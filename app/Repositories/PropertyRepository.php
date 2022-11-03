<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Interfaces\PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function search()//: Collection
    {
        $datas = $this->handleRequest();
        $conjuctions = $this->handleConjuctions($datas);
        extract($datas);

        $items = DB::table('properties')
           ->where([
               ['bedrooms', $conjuctions['bedrooms'], $bedrooms],
               ['bathrooms', $conjuctions['bathrooms'], $bathrooms],
               ['storeys', $conjuctions['storeys'], $storeys],
               ['garages', $conjuctions['garages'], $garages]
                  ])
           ->when(
                $conjuctions['name'], function($query) use ($name) {
                $query->where('name', 'like', $name);
                 }
            )
            ->when(
                $conjuctions['priceRange'], function($query) use ($priceRange) {
                $query->whereBetween('price', $priceRange);
               }
            )
            ->when(
                $conjuctions['minPrice'], function($query) use ($minPrice) {
                $query->where('price', '>', $minPrice);
               }
            )
            ->when(
                $conjuctions['maxPrice'], function($query) use ($maxPrice) {
                $query->where('price', '<', $maxPrice);
               }
            ) 
      ->paginate(10);

        return $items;
    }

    private function handleRequest(): array
    {
        $inputs = ['bedrooms', 'bathrooms', 'storeys', 'garages'];
        $output = [];
        foreach ($inputs as $data) {
           $output[$data] = request($data)?? 0;
        }
        $output['name'] = request('name') ? '%'.request('name').'%' :  '*';
        $price = $this->handlePriceRange();
        $output = array_merge($output, $price);

        return $output;
    }

    private function handleConjuctions($datas): array
    {
        $conjunctions = ['bedrooms', 'bathrooms', 'storeys', 'garages'];
        $output = [];
        foreach ($conjunctions as $data) {
            $output[$data] = $datas[$data]>0 ? '=': '>=';
        }

        $output['priceRange'] = $datas['priceRange']?? false;
        $output['minPrice'] = $datas['minPrice']  ? true : false;
        $output['maxPrice'] = $datas['maxPrice']  ? true : false;
        $output['name'] =  request('name') ? 'like' :  false;
        return $output;
    }

    private function handlePriceRange(): array
    {
        $price['minPrice'] = request('minPrice')?? null; 
        $price['maxPrice'] = request('maxPrice')?? null;

        if(!is_null($price['minPrice']) AND !is_null($price['maxPrice']) ) {
            $price['priceRange'] = []; $price['priceRange'][] = $price['minPrice']; 
            $price['priceRange'][] = $price['maxPrice'];
        } else {
            $price['priceRange'] = false;
        }

        return $price;
    }
}
