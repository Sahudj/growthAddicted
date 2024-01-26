<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;  
use DB;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::paginate(10);    
        return view('admin.package.list', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Packages::get(); 
        return view('admin.package.add', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'amount'=> ['required', 'numeric'],
            'image' => ['required'],
          
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = '';
        if (! File::exists(public_path('packages/'))) {
            File::makeDirectory(public_path('packages/'), 0775, true);
        }
        if ($files = $request->file('image')) {
            $image = $files->getClientOriginalExtension();
            $image = 'image_'.time().'.'.$image; 
            $files->move(public_path().'/packages/', $image);
        }

        $insert = Packages::Create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'market_price' => $request->market_price,
            'image' => $image,
            'status' => $request->status,
            'sub_packages' => !empty($request->sub_packages) ? implode(',',$request->sub_packages) : '',
            'direct' => $request->direct_income,
            'passive' =>$request->passive_income,
            'fund' =>$request->fund,
            'affiliate_price' =>$request->affiliate_price,
        ]);

        if($insert){
            return redirect('admin/packages')->with('message', 'Packages details added successfully!');
        }
       
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
        $packages = Packages::get(); 
        $getDetails = Packages::findOrFail($id);
        return view('admin.package.edit', compact('getDetails', 'packages'));
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
       
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'amount'=> ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = !empty($request->hiddenImage) ? $request->hiddenImage :  '';
        if (! File::exists(public_path('packages/'))) {
            File::makeDirectory(public_path('packages/'), 0775, true);
        }
        if ($files = $request->file('image')) {
            $image = $files->getClientOriginalExtension();
            $image = 'image_'.time().'.'.$image; 
            $files->move(public_path().'/packages/', $image);
        }

        $updateArr = [
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'market_price' => $request->market_price,
            'image' => $image,
            'sub_packages' => !empty($request->sub_packages) ? implode(',',$request->sub_packages) : '',
            'direct' => $request->direct_income,
            'passive' =>$request->passive_income,
            'fund' =>$request->fund,
            'status' => $request->status,
            'affiliate_price' =>$request->affiliate_price,
        ];
       
        $update = Packages::findOrFail($id)->update($updateArr);
        if($update){
            return redirect()->route('packages.edit', $id)->with('message', 'Package details updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Packages::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message', 'Packages deleted successfully!');
    }

    public function packagesPrice(Request $request)
    {
        $packages = Packages::get();
        $packagesPrice = DB::table('package_price')->get();
        return view('admin.courses.packagePrice', compact('packages', 'packagesPrice'));
    }

    public function updatePackagesPrice(Request $request){
        $priceCountArr = $request->packagePriceId;
        if(count($priceCountArr) > 0 ){
            $getlength = count($priceCountArr);
                for($i = 0; $i < $getlength; $i++){
                    $updateArr =  [
                        'sponsor' => $request->sponsor_package[$i], 
                        'from_package' => $request->current_package[$i],
                        'to_package_id' => $request->selling_package[$i],
                        'amount' => $request->packageAmount[$i],
                        'direct'=> $request->directIncome[$i],
                        'passive'=>  $request->passiveIncome[$i],
                    ];

                $update = !empty($request->packagePriceId[$i]) ? DB::table('package_price')->where(['id' => $request->packagePriceId[$i]])->update($updateArr) : DB::table('package_price')->insert($updateArr) ;


                    // $update = DB::table('package_price')->where(['id' => $request->packagePriceId[$i]])->update($updateArr);
            }
        }
        return redirect('admin/packages-price')->with('message', 'Package Price Details Updated Successfully');
    }


    public function upgradePackages(Request $request)
    {
        $packages = Packages::get();
        $packagesPrice = DB::table('package_comm')->get();
        return view('admin.courses.upgradePackagePrice', compact('packages', 'packagesPrice'));
    }

    public function updateupgradePrice(Request $request){
        $priceCountArr = $request->packagePriceId;
        if(count($priceCountArr) > 0 ){
            $getlength = count($priceCountArr);
                for($i = 0; $i < $getlength; $i++){
                    $updateArr =  [
                        'sponsor' => $request->sponsor_package[$i], 
                        'from_package' => $request->current_package[$i],
                        'to_package_id' => $request->selling_package[$i],
                        'amount' => $request->packageAmount[$i],
                        'direct_comm'=> $request->directIncome[$i],
                    ];

                    $update = !empty($request->packagePriceId[$i]) ? DB::table('package_comm')->where(['id' => $request->packagePriceId[$i]])->update($updateArr) : DB::table('package_comm')->insert($updateArr) ;

                    // $update = DB::table('package_comm')->where(['id' => $request->packagePriceId[$i]])->update($updateArr);
            }
        }
        return redirect('admin/upgrade-price')->with('message', 'Upgrade Package Details Updated Successfully');
    }


    // Payment setting 

    public function paymentSetting(Request $request){
        $packages = Packages::get();
        return view('admin.payment.packagePayment', compact('packages'));
    }

    public function savePaymentSetting(Request $request)
    {
        $packageArr = $request->package;
        if(count($packageArr) > 0 ){
            $delete = DB::table('paymentSetting')->delete();
            $getlength = count($packageArr);
                for($i = 0; $i < $getlength; $i++){
                    $updateArr =  [
                        'packageId' => $request->package[$i], 
                        'paymentMode' => $_POST['packageId_'.$request->package[$i]],
                    ];
                    $insert = DB::table('paymentSetting')->insert($updateArr);
                }
            }

            return redirect('admin/payment-setting')->with('message', 'Payment Details Updated Successfully');
        }

}
