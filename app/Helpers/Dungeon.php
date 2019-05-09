<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Dungeon
{
    /*Make requests based on the endpoint.
    *
    */
    public static function call($req, $endpoint, $payload = [])
    {
        $client = new Client();

        // Make a GET call
        if ($req == 'GET') {
            $res = $client->get($endpoint);
        } elseif ($req == 'PUT') {
            $res = $client->put(
                $endpoint,
                ['form_params' => $payload]
            );
        } elseif ($req == 'POST') {
            $res = $client->post(
                $endpoint,
                ['form_params' => $payload]
            );
        }

        // Parse and return body
        $body = json_decode($res->getBody());

        return $body;
    }

    /*Generates Token for Blizzard API
    *
    */
    public static function generateToken()
    {
        $token = false;
        try {
            $payload = [
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'grant_type' => 'client_credentials'
            ];
            $token = self::call('POST', 'https://us.battle.net/oauth/token', $payload);
            $token = $token->access_token;
        } catch (\Exception $e) {
            \Log::error('Could not get Blizzard Token: ' . $e);
        }

        return $token;
    }

    public static function getBosses()
    {
        $token = self::generateToken();

        $bosses_endpoint = 'https://us.api.blizzard.com/wow/boss/?locale=en_US&access_token=' . $token;

        $res = self::call('GET', $bosses_endpoint, $payload = []);
        $bosses = $res->bosses;
        return $bosses;
    }

    public static function getBoss($bosses)
    {
        $all_bosses = array();

        foreach ($bosses as $boss) {
            $arr = array(
            'id' => $boss->id,
            'Name' => $boss->name,
            'Location' => $boss->zoneId,
            'Description' => isset($boss->description) ? $boss->description : null
        );

            array_push($all_bosses, $arr);
        }

        return $all_bosses;
    }
}
