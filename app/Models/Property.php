<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Laravel\Scout\EngineManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "properties";

    public function searchableUsing()
    {
        return app(EngineManager::class)->engine('meilisearch');
    }

    public function toSearchableArray(): array
    {
        return [
          'name' => $this->name,
          'price' => $this->price,
          'bedrooms' => $this->bedrooms,
          'bathrooms' => $this->bathrooms,
          'storeys' => $this->storeys,
          'garages' => $this->garages
        ];
    }
}
