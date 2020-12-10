<?php

namespace App\Http\Controllers;

use App\Models\FileShare;
use App\Models\Order;
use App\Models\Course;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$orders = Order::paginate();
		return view('orders.index', compact('orders'));
	}

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

	public function create(Order $order)
	{
		return view('orders.create_and_edit', compact('order'));
	}

	public function store(OrderRequest $request)
	{
		//dd($request);
	    $user = $request->user();
		//开启一个数据库例行事务
        $order = \DB::transaction(function () use($user,$request) {

            //创建一个订单，总金额暂时默认为0
            $order = new Order(['total_amount' => 0]);
            //将订单关联到当前用户
            $order->user()->associate($user);
            $order->save();

            //分别处理不同类型商品的订单item
            switch ($request){
                case $request->input('file_share_id'):
                    $file = FileShare::find($request->input('file_share_id'));
                    //创建一个item与当前订单关联
                    $item = $order->orderItem()->make([
                        'amount' => 1,
                        'price' => $file->cur_price,
                    ]);
                    $item->fileShare()->associate($file);
                    $item->save();
                    //更新订单总金额
                    $order->update(['total_amount' => $file->cur_price]);
                    break;

                case $request->input('course_id'):
                    $course = Course::find($request->input('course_id'));
                    //创建一个item与当前订单关联
                    $item = $order->orderItem()->make([
                        'amount' => 1,
                        'price' => $course->cur_price,
                    ]);
                    $item->course()->associate($course);
                    $item->save();
                    //更新订单总金额
                    $order->update(['total_amount' => $course->cur_price]);
                    break;

//                case $request->input('mem_id'):
//                    $file = FileShare::find($request->input('file_share_id'));
//                    //创建一个item与当前订单关联
//                    $item = $order->orderItem()->make([
//                        'amount' => 1,
//                        'price' => $file->cur_price,
//                    ]);
//                    $item->fileShare()->associate($file);
//                    $item->save();
//                    //更新订单总金额
//                    $order->update(['total_amount' => $file->cur_price]);
//                    break;
                default:
                    return '当前订单item存在异常';
            }
            return $order;
        } );

        return $order;

//	    $order = Order::create($request->all());
//		return redirect()->route('orders.show', $order->id)->with('message', 'Created successfully.');
	}

	public function edit(Order $order)
	{
        $this->authorize('update', $order);
		return view('orders.create_and_edit', compact('order'));
	}

	public function update(OrderRequest $request, Order $order)
	{
		$this->authorize('update', $order);
		$order->update($request->all());

		return redirect()->route('orders.show', $order->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Order $order)
	{
		$this->authorize('destroy', $order);
		$order->delete();

		return redirect()->route('orders.index')->with('message', 'Deleted successfully.');
	}
}
