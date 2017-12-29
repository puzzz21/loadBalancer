<?php

namespace Nitv\LoadBalancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class LoadBalancingController extends Controller
{
    public function loadBalance()
    {
        $balancer = new GeoBalancerController();
        $url = $balancer->getUrl('http://103.213.31.49/vodstream/stb/720p/indo/VODStudentOfTheYear2012.mp4/playlist.m3u8');
        return $url;
    }
}
