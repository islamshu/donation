<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\GenerealResourse;
use App\Http\Resources\PageResourse;
use App\Page;

class GeneralController extends BaseController
{
    public function get_all_cities()
    {
        return   $this->sendResponse(City::get(), 'all cities');
    }
    public function Genereal_info()
    {
        $info = new GenerealResourse(General::first());
        return  $this->sendResponse($info, 'general info');
    }
    public function Page($id)
    {
        $info = new PageResourse(Page::find($id));
        return  $this->sendResponse($info, 'pageinfo');
    }
}
