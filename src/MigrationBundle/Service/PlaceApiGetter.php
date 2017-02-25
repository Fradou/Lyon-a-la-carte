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
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        // Connexion parameters.
        curl_setopt($ch, CURLOPT_URL, "https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=6000&request=GetFeature&typename=sit_sitra.sittourisme");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $output;
    }

}