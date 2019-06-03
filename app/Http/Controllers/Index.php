<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class Index extends Controller
{
    //
    public function getThem(){
    	return view('them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    	[
    		'name'=>'required',
    		'email'=>'required|unique:posts,email',
    		'password'=>'required|min:8|max:32'
    	],
    	[
    		'name.required'=>'Bạn chưa điền tên',
    		'email.required'=>'Bạn chưa nhập địa chỉ mail',
    		'email.unique'=>'Mail đã tồn tại',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu cần tối thiểu 8 kí tự',
    		'password.max'=>'Mật khẩu tối đa 32 kí tự'
    	]);
    	$posts = new Post;
        $posts->name = $request->name;
        $posts->email = $request->email;
        $posts->password = bcrypt($request->password);
        $posts->save();

        return redirect("index")->with('thongbao', 'Bạn đã thêm thành công');
    }
    public function getThongtin(){
        $post = Post::all();
        return view("Danhsach", compact("post"));
    }
    public function getSua($id){
        $post = Post::find($id);
        return view("Sua", compact("post"));
    }
    public function postSua(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request, 
            [
                'name'=>'required',
                'email'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên',
                'email.required'=>'Bạn chưa nhập địa chỉ mail',
            ]);
        $post->name = $request->name;
        $post->email = $request->email;

        if($request->changePassword == "on"){
            $this->validate($request, 
                [
                    'password' => 'required|min: 8|max: 32',
                    'passwordAgain' => 'required|same:password'

                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu tối thiểu từ 8 kí tự trở lên',
                    'password.max' => 'Mật khẩu tối đa 32 kí tự',
                    'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu không đúng'

                ]);
            $post->password = bcrypt($request->password);
        }

        $post->save();

        return redirect("index")->with('thongbao', 'Bạn đã sửa thành công');

    }  
    public function getXoa($id){
        $post = Post::find($id);
        $post->delete();
        return redirect("index")->with('thongbao', "Bạn đã xóa thành công");
    }
}
