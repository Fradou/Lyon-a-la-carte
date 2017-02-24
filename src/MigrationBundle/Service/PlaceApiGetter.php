<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24/02/17
 * Time: 07:50
 */

namespace MigrationBundle\Service;


class PlaceApiGetter
{
    public function getPlaces(){

        $ch = curl_init();

        // fix to allow HTTPS connections with incorrect certificates.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);

        // Connexion parameters.
        curl_setopt($ch, CURLOPT_URL, "https://download.data.grandlyon.com/ws/rdata/sit_sitra.sittourisme/all.json?maxfeatures=6000");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);

        return $output;
    }

}