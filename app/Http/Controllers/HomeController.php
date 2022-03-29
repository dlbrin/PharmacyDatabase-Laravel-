<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sidebar;
use App\Models\User;
use App\Models\supplier;
use App\Models\buy;
use App\Models\sold;
use Carbon\Carbon;
use Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sidebar(){
        return sidebar::all();
    }

    public function index()
    {
        $sidebar = $this->sidebar();
        return view('sale' , compact('sidebar'));
    }

    // Cashier page
    public function Cashier(){
        $sidebar = $this->sidebar();
        $cashiers = User::all();
        return view('cashier' , compact('sidebar' , 'cashiers'));
    }

    public function AddCashier(Request $request){
        $validator = \Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rule' => 'required'
        ]);
        if($validator->fails()){
            return redirect('cashier')->withErrors($validator);
        }else{
            $create_cashier = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rule' => $request->rule
            ]);
            return $create_cashier ? redirect('cashier')->with('result' , 'The Cashier Add !') : redirect('cashier')->with('result' , 'Some Thing Went Wrong !');
        }
    }

    // Supplier page
    
    public function Supplier(){
        $sidebar = $this->sidebar();
        $supplier = supplier::paginate(30);
        return view('supplier' , compact('sidebar' , 'supplier'));
    }

    public function AddSupplier($status , $id , Request $request){
        if($status == 0){
        $validator = \Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phonenumber' => 'required'
        ]);
        if($validator->fails()){
            return redirect('supplier')->withErrors($validator);
        }else{
            $add_supplier = supplier::create([
                'companyname' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phonenumber' => $request->phonenumber
            ]);
            return $add_supplier ? redirect('supplier')->with('result' , 'The Supplier Add !') : redirect('supplier')->with('result' , 'Some Thing Went Wrong !');
        } 
            return $DeleteSup ? redirect('supplier')->with('result' , 'The Supplier Deleted !') : redirect('supplier')->with('result' , 'Some Thing Went Wrong !');
        }else{
            $validator = \Validator::make($request->all() , [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phonenumber' => 'required'
            ]);
            if($validator->fails()){
                return redirect('supplier')->withErrors($validator);
            }else{
                $UpdateSup = supplier::where('id' , $id)->update([
                    'companyname' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phonenumber' => $request->phonenumber
                ]);
                return $UpdateSup ? redirect('supplier')->with('result' , 'The Supplier Updated !') : redirect('supplier')->with('result' , 'Some Thing Went Wrong !');
            }
        }
    }

    // Buy Page
    public function buy(){
        $sidebar = $this->sidebar();
        $Suppliers = supplier::all();
        $GetBuy = buy::with('one_supplier')->orderBY('id' , 'DESC')->paginate(30);
        return view('buy' , compact('sidebar' , 'GetBuy' , 'Suppliers'));
    }

    public function AddBuy($status , $id , Request $request){

        $validatorArr = [
            'id' => 'required',
            'name' => 'required',
            'supplier_id' => 'required',
            'count' => 'required',
            'price' => 'required',
            'expire_date' => 'required',
            'is_debt' => 'required',
            'type' => 'required'
        ];
        $InsertBuyArr = [
            'id' => $request->id,
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'count' => $request->count,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
            'is_debt' => $request->is_debt,
            'type' => $request->type
        ];
        if($status == 0){
            $validator = \Validator::make($request->all() , $validatorArr);
            if($validator->fails()){
                return redirect('buy')->withErrors($validator);
            }else{
                $InsertBuy = buy::create($InsertBuyArr);
                return $InsertBuy ? redirect('buy')->with('result' , 'The Stock Added !') : redirect('buy')->with('result' , 'Some Thing Went Wrong !');
            }
        }elseif($status == 1 && !empty($status) && !empty($id)){
            $DeleteStock = buy::where('id' , $id)->delete();
            return redirect('buy')->with('result' , 'The Stock Deleted !');
        }else{
            $validator = \Validator::make($request->all() , $validatorArr);
            if($validator->fails()){
                return redirect('buy')->withErrors($validator);
            }else{
                $UpdateStock = buy::where('id' , $id)->update($InsertBuyArr);
                return $UpdateStock ? redirect('buy')->with('result' , 'The Stock Updated !') : redirect('buy')->with('result' , 'Some Thing Went Wrong !');
            }
        }
    }

    // NotLeft Page
    public function notleft(){
        $sidebar = $this->sidebar();
        $Suppliers = supplier::all();
        $GetBuy = buy::where('count' , '<' , 2)->with('one_supplier')->orderBY('id' , 'DESC')->paginate(30);
        return view('notleft' , compact('sidebar' , 'GetBuy' , 'Suppliers'));

    }

    // deblist Page
    public function debtlist(){
        $sidebar = $this->sidebar();
        $Suppliers = supplier::all();
        $GetBuy = buy::where('is_debt' , 1)->with('one_supplier')->orderBY('id' , 'DESC')->paginate(30);
        return view('debtlist' , compact('sidebar' , 'GetBuy' , 'Suppliers'));
    }

    // Expire Page
    public function expire(){
        $sidebar = $this->sidebar();
        $Suppliers = supplier::all();
        $GetBuy = buy::where('expire_date' , '<=' , Carbon::today())->with('one_supplier')->orderBY('id' , 'DESC')->paginate(30);
        return view('expire' , compact('sidebar' , 'GetBuy' , 'Suppliers'));

    }

    // SALLER Page
    public function sellers(){
        $sidebar = $this->sidebar();
        $lists = [
            'All Pieces' => sold::where('clean' , 1 )->sum('piece'),
            'All Price' => sold::where('clean' , 1 )->sum('price_at'),
            'All Pieces Today' => sold::where(['clean' => 1 , 'created_at' => Carbon::today()])->sum('piece'),
            'All Price Today' => sold::where(['clean' => 1 , 'created_at' => Carbon::today()])->sum('price_at')
        ];
        $solds = sold::where('clean' , 1)->orderBY('id' , 'DESC')->paginate(30);
        return view('sellers' , compact('sidebar' , 'solds' , 'lists'));
    }

    // sale page
    public function sale(){
        $sidebar = $this->sidebar();
        return view('sale' , compact('sidebar'));
    }

    public function get_sale(Request $request){
        if(empty($request->id)){
            exit('Is Empty');
        }
        $stock = buy::find($request->id);
        if($stock){
            if($stock->count != 0){
                if($stock->expire_date > Carbon::today()){
                    $stock->count = $stock->count - 1;
                    $stock->save();
                    $pecies = sold::where(['user_id' => Auth::id() , 'stock_id' => $stock->id , 'clean' => 0])->first();
                    if($pecies == null){
                    $sold = sold::create([
                        'user_id' => Auth::id(),
                        'stock_id' => $stock->id,
                        'clean' => 0,
                        'price_at' => $stock->price,
                        'piece' => 1
                    ]);
                    return $sold ? "success" : "fail";
                }else{
                    $pecies->piece = $pecies->piece + 1;
                    $pecies->save();
                    return "success";
                }
                }else{
                    exit('The Product Expired !');
                }
            }else{
                exit('The Product is no longer available !');
            }
        }else{
            exit('The Product Not Found');
        }
    }

    public function viewtb(){
        $solds = sold::where(['user_id' => Auth::id() , 'clean' => 0])->orderBy('id' , 'DESC')->get();
        return view('layout.table' , compact('solds'));
    }

    public function undo(Request $request){
        $find_sold = sold::where(['clean' => 0 , 'user_id' => Auth::id()])->find($request->sold_id);
        if($find_sold){
            $find_stock = buy::find($find_sold->stock_id);
            if($find_stock){
                $find_stock->count = $find_stock->count + 1;
                $find_stock->save();

                if($find_sold->piece == 1){
                    $find_sold->delete();
                }else{
                    $find_sold->piece = $find_sold->piece - 1;
                    $find_sold->save();
                }
                return "success";
            }else{
                exit('fail');
            }
        }else{
            exit('fail');
        }
    }

    public function invoice(){
        $solds = sold::where(['user_id' => Auth::id() , 'clean' => 0])->get();
        return view('layout.invoice' , compact('solds'));
    }

    public function clean(){
        $solds = sold::where('user_id' , Auth::id())->update(['clean' => 1]);
        return redirect('sale');
    }
}
