<?php

namespace Nitv\LoadBalancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Nitv\LoadBalancer\GeoBalancerController;

class LoadBalancingController extends Controller
{
    public function loadBalance()
    {
        ini_set('memory_limit', '-1');
        $balancer = new GeoBalancerController();
        $balancer->setDefaultServer('usa.example.com');
        $balancer->setRegionServer(['JP', 'KR'], 'asia.example.com');
        $balancer->setRegionServer(['FR', 'GB', 'IT'], 'europe.example.com');
        $balancer->setRegionServer(['US-CA', 'US-NV', 'US-OR', 'US-WA'], 'east.usa.example.com');
        $balancer->setRegionServer(['US-MT', 'US-ND', 'US-MN', 'CA'], 'north.usa.example.com');
        $balancer->setRegionServer('US', ['NE', 'KS', 'OK', 'CO'], 'central.usa.example.com');
        $userIp = $_SERVER['REMOTE_ADDR'];
        $link1 = $balancer->getGeoVideoLink($userIp, 'https', '/vod/sample.mp4/playlist.m3u8', 443);
        $link2 = $balancer->getGoVideoLink('199.193.156.29', 'rtmp', '/live/stream/', 1935);
        $link3 = $balancer->getGeeoVideoLink('123.123.123.123', 'http', '/live/channel/playlist.m3u8', 8081);
        $link4 = $balancer->getGeoVideoLink('1.201.255.255', 'rtsp', '/live/channel/', 554);
        print($link1 . "<br/>" . $link2 . "<br/>" . $link3 . "<br/>" . $link4);
    }
}
