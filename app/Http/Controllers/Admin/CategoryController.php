<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::getCategoryTree();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::getCategoryTree();
        return view('admin.category.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
//        $rules = [
//            'name' => 'required',
//        ];
//        $message = [
//            'name.required' => '请填写分类名称',
//        ];
//        $vali = Validator::make($data,$rules,$message);
//        if($vali->passes()){
            $cate = Category::create($data);
            if($cate){
                return redirect('admin/category');
            }else{
                return redirect('admin/category/create')->withErrors('插入失败')->withInput();
            }
//        }else{
//            return redirect('admin/category/create')->withErrors($vali)->withInput();
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
        $cate = Category::find($id);
        $data = Category::getCategoryTree();
        return view('admin.category.update',compact('data','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token','_method');
//        $rules = [
//            'name' => 'required',
//        ];
//        $message = [
//            'name.required' => '名称不能为空'
//        ];
//        $vali = Validator::make($data,$rules,$message);
//        if($vali->passes()){
            $val = Category::where('id',$id)->update($data);
            if($val){
                return redirect('admin/category');
            }else{
                return redirect('admin/category/'.$id.'/edit')->withErrors('修改错误')->withInput();
            }
//        }else{
//            return redirect('admin/category/'.$id.'/edit')->withErrors($vali)->withInput();
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re = Category::delCategory($id);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        return $data;
    }
}
