<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PropertyCollection;
use Illuminate\Validation\ValidationException;
use App\Interfaces\PropertyRepositoryInterface;

class PropertyController extends Controller
{
    public function __construct( private PropertyRepositoryInterface $propertyRepository ) {}

    public function search(Request $request): PropertyCollection
    {
      if($this->checkIfEmptyAllInputs())  throw ValidationException::withMessages([
          'Error' => 'All fields are empty!'
      ]);

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

    private function checkIfEmptyAllInputs(): bool
    {
      foreach (request()->all() as $key => $value) {
        if(empty($value)) {
           $emptyInput = true;
         } else {
            $emptyInput = false; break;
          }
      }

      return $emptyInput;
    }
}
