<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\ArticleTag;
use App\Http\Model\Tag;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::all();
        return view('admin.tag.index',compact('data'));
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
    public function store(TagRequest $request)
    {
        $data = $request->except('_token');
//        $rules = [
//            'name' => 'required|alpha',
//        ];
//        $message = [
//            'name.required' => '该字段必须填写',
//            'name.alpha' => '该字段必须是字母',
//        ];
//        $vali = Validator::make($data,$rules,$message);
//        if($vali->passes()){
            $tag = Tag::create($data);
            if($tag){
                return redirect('admin/tag');
            }else{
                return redirect('admin/tag')->withErrors('插入失败')->withInput();
            }
//        }else{
//            return redirect('admin/tag')->withErrors($vali);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $tag = Tag::where('id',$id)->delete();

        if($tag){
            ArticleTag::where('tag_id',$id)->delete();
            $data = [
                'status'=>0,
                'mess'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'mess'=>'删除失败'
            ];
        }
        return $data;
    }
}
