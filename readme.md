Load balancing is used to balance the load through out the avaibale resources. This package implements this concept in laravel.
So, lets get started!
To install via composer use the following command:
<center> <b>composer require puzzz21/loadbalancer</b> <center>
  
After the installation, you would be able to see puzzz21 folder inside vendor folder. Then copy the file /vendor/puzzz21/loadbalancer/packages/nitv/loadBalancer/src/region_servers.sql in your database. You could also create the table with similar name and columns. With the completion of table creation, you need to create a model App\RegionServer for the table region_servers.

Now you would be able to implement this package in your project. Here is the example:
<?php

<center>
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Nitv\LoadBalancer\GeoBalancerController;
use App\RegionServer;

class TestController extends Controller
{
    public function test()
    {

        $balancer = new GeoBalancerController(new RegionServer());
        $url = $balancer->getUrl('http://103.213.31.49/vodstream/stb/720p/indo/VODStudentOfTheYear2012.mp4/playlist.m3u8');
        return $url;
    }
}
</center>

Notice: here, GeoBalancerController takes instance of RegionServer Model as an argument.


  
