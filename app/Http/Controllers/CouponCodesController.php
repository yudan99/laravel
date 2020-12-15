<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponCodeRequest;

class CouponCodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$coupon_codes = CouponCode::paginate();
		return view('coupon_codes.index', compact('coupon_codes'));
	}

    public function show(CouponCode $coupon_code)
    {
        return view('coupon_codes.show', compact('coupon_code'));
    }

	public function create(CouponCode $coupon_code)
	{
		return view('coupon_codes.create_and_edit', compact('coupon_code'));
	}

	public function store(CouponCodeRequest $request)
	{
		$coupon_code = CouponCode::create($request->all());
		return redirect()->route('coupon_codes.show', $coupon_code->id)->with('message', 'Created successfully.');
	}

	public function edit(CouponCode $coupon_code)
	{
        $this->authorize('update', $coupon_code);
		return view('coupon_codes.create_and_edit', compact('coupon_code'));
	}

	public function update(CouponCodeRequest $request, CouponCode $coupon_code)
	{
		$this->authorize('update', $coupon_code);
		$coupon_code->update($request->all());

		return redirect()->route('coupon_codes.show', $coupon_code->id)->with('message', 'Updated successfully.');
	}

	public function destroy(CouponCode $coupon_code)
	{
		$this->authorize('destroy', $coupon_code);
		$coupon_code->delete();

		return redirect()->route('coupon_codes.index')->with('message', 'Deleted successfully.');
	}
}