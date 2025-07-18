<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'agents_models'; // if my table name is not snake agents of my model name then i can set it to whatever i want
    protected $primaryKey = 'agent_id'; //if my primary key is not 'id' then i can set it to whatever i want
    public $incrementing = false;  // if i decided to use a non-numeric primary key so by default it's not incremmented
    protected $keyType = 'string';  // if i decided to use a non-numeric primary key
    public $timestamps = false; // if i don't want to use created_at and updated_at timestamps
    protected $dateFormat = 'U'; // if i want to use a different date format than the default one in timestamps
    const CREATED_AT = 'creation_date'; // if i want to use a different name for the created_at column
    const UPDATED_AT = 'updated_date';// if i want to use a different name for the updated_at column
    protected $connection = 'mysql'; // if i want to use a different database connection than the default one
    protected $attributes = [// if i want to set a default value for an attribute
        'name' => 'Agent', 
        'description' => "Default agent description",
    ];

    public function boot(): void
{
    Model::preventLazyLoading(! $this->app->isProduction()); // Prevent lazy loading in production to avoid N+1 query issues
}



public function newUniqueId(): string
{
    return (string) Uuid::uuid4();
}

public function uniqueIds(): array
{
    return ['id', 'model_id']; //if i want to use UUId on another columns than id
}

};


Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction()); // Prevent silently discarding attributes in production to ensure all attributes are saved

Model::withoutTimestamps(fn () => $post->increment('use_agent')); // Temporarily disable timestamps for this operation

$agent = Agent::create(['name' => 'quiaBot']);
 
$agent->id; // "8f8e8478-9035-4d23-b9a7-62f4d2612ce5"