<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\services\CheckFormService; //自作のフォームチェック用サービスのインポート
use Psy\VersionUpdater\Checker;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DBから方法を取得 モデル名::select（カラム名）->get()でDBから指定したカラムを全て取得
        $contacts = ContactForm::select('id', 'name', 'title', 'gender', 'created_at')->get();
        // genderの値と表示名を結び付け
        // if($contacts->gender ===0){
        //     $gender = '男性';
        // }else{
        //     $gender = '女性';
        // }

        //処理:contactsフォルダ内のindex.balde.phpを返す
        // viewメソッドの第2引数で変数を指定するとビュー側に変数を渡すことができる
        // 変数を渡すときにはcompact()でまとめて渡すことができる
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 処理：contactsフォルダ内のcreate.blade.phpを返す
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate(
            [
                'name' => ['required', 'string', 'max:20'],
                'title' => ['required', 'string', 'max:50'],
                'email' => ['required', 'email', 'max:255'],
                'url' => ['url', 'nullable'],
                'gender' => ['required', 'boolean'],
                'age' => ['required'],
                'contact' => ['required', 'string', 'max:200']
            ]
        );

        //フォームから送られてきたデータの確認
        // dd($request->age);
        // DBに以下の情報をまとめて登録する処理
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
        // indexページにリダイレクト
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //find ⇒1件データを取得。データが存在しない場合エラー
        //findOrFail ⇒1件データを取得。データが存在しない場合404
        $contact = ContactForm::findOrFail($id);

        $gender = CheckFormService::checkGender($contact);

        return view('contacts.show', compact('contact', 'gender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DBから1件だけデータを取得
        $contact = ContactForm::FindOrFail($id);

        $gender = CheckFormService::checkGender($contact);

        return view('contacts.edit', compact('contact', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //現在の情報をDBから取得
        $before_contact = ContactForm::findOrFail($id);
        // フォームで送信されたデータ($request)で現在の情報を上書き
        // 現在の名前にフォームで送信された名前を代入
        $before_contact->name = $request->name;
        $before_contact->title = $request->title;
        $before_contact->email = $request->email;
        $before_contact->url = $request->url;
        $before_contact->gender = $request->gender;
        $before_contact->age = $request->age;
        $before_contact->contact = $request->contact;
        $before_contact->save();

        return to_route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $contact = ContactForm::findOrFail($id);
        $contact->delete(); // deleteで削除

        return to_route('contacts.index');
    }
}
