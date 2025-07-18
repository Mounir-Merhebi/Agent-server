<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Collection; // Import the Collection class for chunking
use Illuminate\Http\Request;

class AgentController extends Controller
{

function getAgentsName(){
foreach (Agent::all() as $agent) {
    echo $agent->name; //this will print the name of each agent
}
}

function getAgents(){
    $agent = Agent::where('active', 1)->orderBy('name')->limit(10)->get(); // this will return the first 10 active agents ordered by name
}

$agent = Agent::where('type', 'chatbot')->first(); // this will return the first agent with type 'chatbot'

$freshAgent = $agent->fresh(); // This line takes the $agent instance i already have in memory and performs a new database query to retrieve the latest data 
// for that specific Agent
//It then creates a brand new Agent model instance ($freshAgent) with this fresh data.


$agent = Agent::where('type', 'chatbot')->first();

$agent->type = 'ImageRecognizer'; // This line updates the type of the agent to 'ImageRecognizer'

$agent->refresh();

$agent->type; // "imageRecognizer" // This line retrieves the updated type of the agent

$allAgents = Agent::all(); // This retrieves all agents from the database

$inactiveAgents = $allAgents->reject(function (Agent $agent) { // This line filters out agents that are not inactive
    return $agent->status === 'inactive'; // This will return all agents that are not inactive
});


Agent::chunk(200, function (Collection $agents) { // This will process agents in chunks of 200
    // perform operations on each chunk of agent
    // For example, you can loop through each agent in the chunk:
    foreach ($agents as $agent) {
        // we perform some operations on each agent
    }
});


Agent::where('type', 'Chatbot')
    ->chunkById(2, function (Collection $agentsChunk) { 
        // ... update agents' descriptions ...
    }, column: 'id');  // This will process agents in chunks of 2 based on their 'id' column

    Agent::where(function ($query) {  // This will filter agents based on their type
    $query->where('type', 'Data Analyzer')
          ->orWhere('type', 'Image Generator');
})->chunkById(3, function (Collection $agentsChunk) {  
    // ... update agents ...
}, column: 'id'); // This will process agents in chunks of 3 based on their 'id' column