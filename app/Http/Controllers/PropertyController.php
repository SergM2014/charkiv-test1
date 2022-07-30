<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PropertyRepositoryInterface;
use App\Http\Resources\PropertyCollection;

class PropertyController extends Controller
{
    public function __construct(private PropertyRepositoryInterface $propertyRepository) {}

    public function search(): PropertyCollection
    {
        $items = $this->propertyRepository->search();

        if($items->isEmpty()) { $success = false; $message = 'Failure! Nothing found!'; };

        return (new PropertyCollection($items))
            ->additional([
                    'utilities' => [
                        'success' => $success ??= true,
                        'message' => $message ??= 'Success'
                    ],
                ]
            );
    }
}
