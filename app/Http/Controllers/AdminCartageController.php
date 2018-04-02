<?php

namespace App\Http\Controllers;

use App\Cartage;
use Illuminate\Http\Request;

class AdminCartageController extends Controller
{
    public function return_index()
    {
        return $this->index('storage_return');
    }
    public function removal_index()
    {
        return $this->index('diy_removal');
    }

    protected function index($cartageType)
    {
        $options = Cartage::where('cartage_type', $cartageType)->orderBy('module_count')->get();
        return view('admin.cartage.index', compact('options', 'cartageType'));
    }

    public function return_update(Request $request)
    {
        return $this->update($request, 'storage_return');
    }

    public function removal_update(Request $request)
    {
        return $this->update($request, 'diy_removal');
    }
    protected function update($request, $cartageType)
    {
        $cartage = collect($request->cartage);

        $options = Cartage::where('cartage_type', $cartageType)->delete();

        foreach ($cartage as $opt) {
            if (!$opt['module_count']) {
                continue;
            }

            $opt['cartage_type'] = $cartageType;
            Cartage::create($opt);
        }

        flash('Success - Cartage data updated');
        return redirect()->back();

    }
}
