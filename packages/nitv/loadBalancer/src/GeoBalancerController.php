<?php

namespace Nitv\LoadBalancer;

require 'geoip2.phar';

use App\Http\Controllers\Controller;
use GeoIp2\Database\Reader;
use App\Http\Requests;
use League\Flysystem\Exception;
use App\RegionServer as Model;
class GeoBalancerController extends Controller
{
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->defaultServer = NULL;
    }

    public function getUrl($streamUrl)
    {
        $userIp = $_SERVER['REMOTE_ADDR'];
        $full_url = explode('://', $streamUrl);
        if (strpos($full_url[0], ':') !== false) {
            $port_array = explode($full_url[0], ':');
            $port = $port_array[1];
        } else {
            $port = 80; //default port
        }
        $server_url = explode('/', $full_url[1]);
        unset($server_url[0]);
        $url = implode('/', $server_url);
        $this->setDefaultServer('abc.default.com');
        $stream_url = $this->getVideoLink($userIp, $full_url[0], $url, $port);
        return $stream_url;
    }

    public function setDefaultServer($url)
    {
        $this->defaultServer = rtrim($url, '/');

    }

    public function getVideoLink($userIp, $protocol, $relativeMediaPath, $port)
    {

        $geocityPath = "../public/storage/GeoLite2-City.mmdb";

        $reader = new Reader($geocityPath);
        if ($port == NULL) {
            throw new \Exception("Media server port must be specified.");
        }
        try {
            $record = $reader->city($userIp);
            $userRegion = $record->country->isoCode;
            $userSubRegion = $record->mostSpecificSubdivision->isoCode;
            if (NULL == $userSubRegion) {
                $userSubRegion = 'unknown';
            }
        } catch (\Exception $e) {
            $userRegion = 'unknown';
            $userSubRegion = 'unknown';
        }

        $data = $this->model->get();
        $dedicatedServer = NULL;

        foreach ($data as $d) {
            if ($d->country == $userRegion) {
                if ($d->region == $userSubRegion) {
                    $dedicatedServer = $d->server_url;
                } else if ($d->region == '') {
                    $dedicatedServer = $d->server_url;
                }
            }
        }
        if (NULL == $dedicatedServer) {
            if (NULL == $this->defaultServer) {
                throw new \Exception("No server match for user's location. No default server is specified either.");
            } else {
                $dedicatedServer = $this->defaultServer;
            }
        }
        $relativeMediaPath = preg_replace('{^https?://}', '/', $relativeMediaPath);
        $dedicatedServer = preg_replace('{^https?://}', '', $dedicatedServer);
        $dedicatedServer = preg_replace('{:\d*$}', '', $dedicatedServer);
        if ($this->startsWith($relativeMediaPath, $protocol . '://')) {
            $relativeMediaPath = str_replace($protocol . '://', '/', $relativeMediaPath);
        }
        if ($this->startsWith($dedicatedServer, $protocol . '://')) {
            $mediaPath = $dedicatedServer . ':' . $port .'/'. $relativeMediaPath;
        } else {
            $mediaPath = $protocol . '://' . $dedicatedServer . ':' . $port . '/'. $relativeMediaPath;
        }
        return $mediaPath;
    }

    public function startsWith($str, $sub)
    {
        if (strlen($sub) > strlen($str)) {
            return false;
        }
        return (substr($str, 0, strlen($sub)) == $sub);
    }

}