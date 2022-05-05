<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('index', ['contacts' => $contacts]);
    }

    public function confirm(Request $request)
    {

        $this->validate($request, [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'postcode' => ['required', 'string' ],
            'address' => ['required', 'string'],
            'opinion' => ['required', 'string'],
        ], [
            'fullname.required' => ':attributeは必須です。',
            'email.required' => ':attributeは必須です。',
            'postcode.required' => ':attributeは必須です。',
            'address.required' => ':attributeは必須です。',
            'opinion.required' => ':attributeは必須です。',
        ], [
            'fullname' => 'お名前',
            'email' => 'メールアドレス',
            'postcode' => '郵便番号',
            'address' => '住所',
            'opinion' => 'お問い合わせ内容',
        ]);
    // ここまで

    
    $all = Contact::all();
        
        $contact = new Contact($request->all());
        

        return view('confirm', compact('contact'));
    }

    public function complete(Request $request)
    {
     // ※要バリデーション

        $action = $request->input('action', '送信');
        // 二つ目は初期値です。

        $input = $request->except('action');
        // そして、入力内容からは取り除いておきます。

        if($action === 'submit') {

            // メール送信処理などを実装
            return view('complete');
        } else {

            // 戻る

            return redirect()  ->route('index')
            ->withInput($input);
    }

    // お問い合わせフォームへの入力内容を保持したモデルオブジェクトを用意
    $contact = Contact::make($request->all());
   

    return view('/index/complete');

    }

    public function login(){
		return view("admin.admin_login");
	}
	
	public function showadminlogin(Request $request){
		//入力内容をチェックする
		$user = $request->input("user");
		$password = $request->input("password");
		//ログイン成功
		if($user == "hogehoge" && $password == "fugafuga"){
			$request->session()->put("admin_auth", true);
			return redirect("/admin");
		}
		//ログイン失敗
		return redirect("admin/login")->withErrors([
			"error" => "ユーザーIDまたはパスワードが違います"
		]);

	}

    public function logout(Request $request){
		$request->session()->forget("admin_auth");
		return redirect("admin");
	}

    public function show(){

        $contacts = Contact::all();


        return view('admin.admin_top',['contacts' => $contacts]);
        return view('admin.admin_top')->with('senddata', $contacts);
	}

    public function us_delete($id)
{
    $contacts = Contact::find($id);
    // 削除
    $cintacts->delete();
    // リダイレクト
    return redirect()->to('admin/list');
}

    public function list($id)
{

    $contacts = Contact::find($id);

    return view("list",[
        'cotact' => $contact,
    ]);

}

}
