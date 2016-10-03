<?php

namespace csi\Http\Controllers\Backend;

use csi\Info;
use Illuminate\Http\Request;
use csi\Http\Requests;

class InfoController extends Controller
{
    protected $infos;

    public function __construct(Info $info)
    {
    	$this->infos = $info;

    	parent::__construct();
    }

    public function index(){
    	$infos = $this->infos->take(1)->get();
    	$info = $infos[0];
    	// print_r($info[0]);

    	return view('backend.info.index', compact('info'));
    }

    public function store(Requests\StoreInfoRequest $request)
    {
    	$attr = [
            'name' => $request->only('name')['name'],
            'address' => $request->only('address')['address'],
            'phone' => $request->only('phone')['phone'],
            'fax' => $request->only('fax')['fax'],
            'longitude' => $request->only('longitude')['longitude'],
            'latitude' => $request->only('latitude')['latitude']
        ];

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $file = $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/logo/';
            $request->file('image')->move($path, $filename);
            $attr['image'] = $path.''.$filename;
        }

        $this->infos->create($attr);

        return redirect(route('backend.info.index'))->with('status', 'Info has successfully created');
    }

    public function update(Requests\StoreInfoRequest $request)
    {
    	$info = $this->infos->findOrFail(1);

    	$attr = [
            'name' => $request->only('name')['name'],
            'address' => $request->only('address')['address'],
            'phone' => $request->only('phone')['phone'],
            'fax' => $request->only('fax')['fax'],
            'longitude' => $request->only('longitude')['longitude'],
            'latitude' => $request->only('latitude')['latitude']
        ];

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $file = $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/logo/';
            $request->file('image')->move($path, $filename);
            $attr['image'] = $path.''.$filename;
        }

        $info->fill($attr)->save();

        return redirect(route('backend.info.index'))->with('status', 'Info has been updated');
    }
}
