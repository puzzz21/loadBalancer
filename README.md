Load balancing is used to balance the load through out the available resources. This package implements this concept in PHP.
So, lets get started!

To install via composer use the following command:

<code><center> <b>composer require puzzz21/loadbalancer</code></b> <center>
  
If there is an error regarding minimum stability version then add the following code in your root composer.json file.

<code><center>"minimum-stability":"dev"</code></center>
  
After the installation, you would be able to see puzzz21 folder inside vendor directory. Then copy the file packages/nitv/loadBalancer/src/region_servers.sql in your database. You can also create the table with similar name and columns. With the completion of table creation, you need to create a model App\RegionServer for the table region_servers.

Now you would be able to implement this package in your project. Here is the example:
<?php

<center><code><pre>
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nitv\LoadBalancer\GeoBalancerController;
use App\RegionServer;

class TestController extends Controller
{
    public function test()
    {

        $balancer = new GeoBalancerController(new RegionServer());
        $balancer->setDefaultServer('abc.default.com');
        $url = $balancer->getUrl('http://abc.example.com');
        return $url;
    }
}
</pre></code></center>

Notice: here, GeoBalancerController takes instance of RegionServer Model as an argument. Similarly, setDefaultServer takes the default server url and getUrl function takes the stream url.


  
