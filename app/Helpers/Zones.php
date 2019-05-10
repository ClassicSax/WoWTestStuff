<?php

namespace App\Helpers;

use GuzzleHttp\Client;

//Helpers
use App\Helpers\Dungeon;

class Zones
{
    public static function getZoneById($zone_id, $zone_name)
    {
        $token = Dungeon::generateToken();

        if($zone_id)
        {
            $zone_endpoint = "https://us.api.blizzard.com/wow/zone/$zone_id?locale=en_US&access_token=$token";
            $res = Dungeon::call('GET', $zone_endpoint, $payload = []);
            $zone = array(
                'id' => $res->id,
                'name' => $res->name,
                'description' => isset($res->description) ? $res->description : null
            );
            return $zone;
        }elseif ($zone_name)
        {
            return $zone;
        }else
        {
            $zones_endpoint = 'https://us.api.blizzard.com/wow/zone/?locale=en_US&access_token=' . $token;
            $res = Dungeon::call('GET', $zones_endpoint, $payload = []);
            $zones = $res->zones;
            $all_zones = array();
            foreach ($zones as $zone) {
                $arr = array(
                    'id' => $zone->id,
                    'name' => $zone->name,
                    'description' => isset($zone->description) ? $zone->description : null
            );
            array_push($all_zones, $arr);
        }

        return $all_zones;

        }

    }
}
