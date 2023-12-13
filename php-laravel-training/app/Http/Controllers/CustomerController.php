<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    // 顧客一覧取得
    public function retrieve()
    {
        /**
         * modelなくて直接的にデータベースクエリの実行
         *  $result = DB::table('customer')->get();
         * 素のSQLで実行する
         *  $result = DB::select('select * from customer');
         */

        $customers = Customer::all();
        return response()->json($customers);
    }

    // IDによって検索する
    public function searchById(Int $id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    // 顧客登録
    public function create(Request $request)
    {
        // $customer = new Customer();
        // $customer->name = $request->input('name');
        // $customer->phone = $request->input('phone');
        // $customer->email = $request->input('email');
        // $customer->create_at = date("Y/m/d H:i:s");
        // $customer->update_at = date("Y/m/d H:i:s");
        // $customer->save();
        $now = date("Y/m/d H:i:s");
        DB::table('customer')->insertGetId(
            [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'create_at' => $now,
                'update_at' => $now
            ]
        );
    }

    // 顧客情報更新
    public function update(Int $id, Request $request)
    {
        // $customer = Customer::find($id);
        // $customer->name = $request->input('name');
        // $customer->phone = $request->input('phone');
        // $customer->email = $request->input('email');
        // $customer->update_at = date("Y/m/d H:i:s");
        DB::table('customer')
            ->where('id', $id)
            ->update(['name' => $request->input('name'), 'phone' => $request->input('phone'), 'email' => $request->input('email'), 'update_at' => date("Y/m/d H:i:s")]);

        //$customer->save();
    }

    // 顧客削除
    public function delete(Int $id)
    {
        DB::table('customer')->where('id', $id)->delete();
    }
}
