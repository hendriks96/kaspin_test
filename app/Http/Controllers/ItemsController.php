<?php

namespace App\Http\Controllers;

use App\Http\CustomClass\Record;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->to('home-admin');
            } else if(Auth::user()->role == 'staff'){
                return redirect()->to('home-staff');
            }
        } 
        $isGuest = true;
        $datas = 'home';
        $items = DB::table('items')->paginate(4);
        return view('display.home-display', compact('items', 'isGuest', 'datas'))->with('i', (request()->input('page', 1)-1)*5);
    }

    public function aboutMe(){
        return view('resume.resume-display');
    }

    public function indexAdmin(){
        $isGuest = false;
        $datas  = 'home';
        $items = DB::table('items')->paginate(4);
        return view('display.home-admin-display', compact('items', 'isGuest', 'datas'))->with('i', (request()->input('page', 1)-1)*5);
    }

    public function indexStaff(){
        $isGuest = false;
        $datas = 'home';
        $items = DB::table('items')->paginate(4);
        return view('display.home-staff-display', compact('items', 'isGuest', 'datas'))->with('i', (request()->input('page', 1)-1)*5);
    }

    public function submitItems(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title'             => 'required|email',
            'image'             => 'required',
            
        ]);
        $dateTime   =   Carbon::now();
        $file       =   $request->file('image');

        $dirupload  =   'public/images/product';
        $time       =   $dateTime->toTimeString();
        $date       =   $dateTime->toDateString();

        $timeFormatted  =   str_replace(':', '', $time);
        $dateFormatted  =   str_replace('-', '', $date);

        $nameUpload     =   $dateFormatted . $timeFormatted . "." . $file->getClientOriginalExtension();
        $file->move($dirupload, $nameUpload);

        DB::table('items')
            ->insert([
                'name'          =>  $request->title,
                'qty'           =>  doubleval($request->qty),
                'image_url'     =>  "http://localhost/kaspin_test/images/product/".$nameUpload,
            ]);

        Record::saveLog(Auth::user()->id, Auth::user()->email, Auth::user()->name, 'insert new product');

        return redirect()->to('/');
    }

    public function editItems(Request $request){
        
        if (isset($request->image)) { #jika yang di ubah terdapat gambar
            $dateTime   =   Carbon::now();
            $file       =   $request->file('image');
            $dirupload  =   'public/images/product';
            $time       =   $dateTime->toTimeString();
            $date       =   $dateTime->toDateString();
            $item       =   DB::table('items')
                                ->where('id', $request->id)
                                ->first();

            $timeFormatted  =   str_replace(':', '', $time);
            $dateFormatted  =   str_replace('-', '', $date);
            
            //hapus gambar terlebih dahulu
            if ($item != null) {
                $this->deleteImageFileMotor($item->image_url);
            }

            $nameUpload     =   $dateFormatted . $timeFormatted . "." . $file->getClientOriginalExtension();
            // upload file
            $file->move($dirupload, $nameUpload);

            DB::table('items')
                ->where('id', $request->id)
                ->update([
                    'name'          =>  $request->name,
                    'qty'           =>  doubleval($request->qty),
                    'image_url'     =>  "http://localhost/kaspin_test/images/product/".$nameUpload,
                ]);
        } else {
            DB::table('items')
                ->where('id', $request->id)
                ->update([
                    'name'          =>  $request->name,
                    'qty'           =>  doubleval($request->qty),
                ]);
        }

        Record::saveLog(Auth::user()->id, Auth::user()->email, Auth::user()->name, 'updated product in id '.$request->id);

        return redirect()->to('/');
    }

    public function deleteItem($id){
        $item       =   DB::table('items')
                            ->where('id', $id)
                            ->first();

        if ($item != null) {
            $this->deleteImageFileMotor($item->image_url);
        }

        DB::table('items')
            ->where('id', $id)
            ->delete();

        Record::saveLog(Auth::user()->id, Auth::user()->email, Auth::user()->name, 'deleted product with id'. $id);

        return redirect()->to('/');
        
    }

    function deleteImageFileMotor($image_url)
    {
        $expString      =   explode('/',$image_url);
        $imageName      =   end($expString);

        $imagePath      =   public_path('images\\') . "product\\" . $imageName;
       
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
