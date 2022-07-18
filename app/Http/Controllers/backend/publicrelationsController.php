<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\factory;
use App\Models\infomation;
use Illuminate\Http\Request;

class publicrelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $factory = factory::get();
        $infomation = infomation::get();
        $infomationSS = [];
        foreach ($infomation as $infomationS) {
            $Datauser = factory::find($infomationS->info_factory);
            $infomationS->fac_category =  $Datauser->fac_name;
            array_push($infomationSS, $infomationS);
        }

        return view('components.backend.infomation.home', ['infomation' => $infomationSS, 'factory' => $factory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = infomation::create($request->all());
        $info->id;

        if ($image = $request->file('img')) {
            $destinationPath = 'infomations/' .  $info->id . '/' . $request->type;
            $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $info->img = $destinationPath . $file;
            $image->move($destinationPath, $file);
        }
        $info->save();
        return redirect()->route('manage-infomation.index')->with('message', 'เพิ่มข่าวประชาสัมพันธ์สำเร็จ')->with('message-status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = explode(",", $id);
        $factory = factory::get();
        $infomation = infomation::where('id', '=', $data[0])->get();
        $infomationSS = [];
        foreach ($infomation as $infomationS) {
            $Datauser = factory::find($infomationS->info_factory);
            $infomationS->fac_category =  $Datauser->fac_name;
            array_push($infomationSS, $infomationS);
        }
        return view('components.backend.infomation.page', ['infomation' => $infomationSS, 'type' => $data[1], 'factory' => $factory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        infomation::destroy($id);


        $status = infomation::destroy($id);

        if ($status) {
            return redirect()->route('manage-infomation.index')->with('message', 'ลบข้อมูลพนักงานสำเร็จ')->with('message-status', 'success');
        } else {
            return redirect()->route('manage-infomation.index')->with('message', 'ไม่พบผู้ใช้นี้ในระบบ')->with('message-status', 'error');
        }
    }
}
