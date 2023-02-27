<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * GeneralService
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */
class ModelCounterService
{
    /**
     * Counters method to calculate all total quantity of available models
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    public function get_counters(): array
    {
        ## Select and count table entries
        $counts =  DB::select("SELECT (SELECT COUNT(*) FROM conversations ) as conversations, (SELECT COUNT(*) FROM messages) as messages, (SELECT COUNT(*) FROM users) as users");
        $countArray = (array) collect($counts)->first();

        ## Loop through count list and enhance by icon & title
        $richCounter = collect($countArray)->map(function (int $item, string $key) {
            return [
                'icon'  => _icons($key),
                'title' => $key,
                'count' => $item
            ];
        });

        return $richCounter->toArray();
    }
}
