<?php

namespace App\Http\Controllers;

use App\Models\FileShare;
use App\Models\Order;
use App\Models\User;
use App\Models\Course;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$orders = Order::paginate();
		return view('orders.index', compact('orders'));
	}

    public function show(Order $order, Request $request)
    {
        return view('orders.show', ['order'=>$order->load('order_item')]);
    }

	public function create(Order $order)
	{
		return view('orders.create_and_edit', compact('order'));
	}

	public function storeFileOrder(OrderRequest $orderRequest){

        $data = $orderRequest->all();
        $fileShare = $data['file_share_id'];
        Log::alert($data);
        //Log::info($fileShare);

        //获取当前登录用户的ID
        $user_id = Auth::id();

        //开启一个数据库例行事务
        $order = \DB::transaction(function () use($fileShare,$user_id) {

            //创建一个订单，总金额暂时默认为0
            $order = new Order(['total_amount' => 0]);
            //将订单关联到当前用户
            $order->user()->associate($user_id);
            $order->save();


            //创建item
            if (FileShare::find($fileShare)){
                $file = FileShare::find($fileShare);
                $item = $order->orderItem()->make([
                    'product_type' => OrderItem::PRODUCT_FILE,
                    'price' => $file->cur_price,
                    'amount' => '1',
                ]);
                $item->fileShare()->associate($file);
                $item->save();
                //更新订单总金额
                $order->update(['total_amount' => $file->cur_price]);
            } else {
//                $str = implode($request->all());
//                $file_err = $request->input('file_share_id');
                Log::warning('订单item创建异常, $fileShare为：'.$fileShare.'和$user为'.$user_id);
            }
            return $order;
        } );

        //return view('orders.show',['order' => $order]);
        return redirect()->route('orders.show', $order->id)->with('message', 'Created successfully.');
    }

//	public function store(Request $request)
//	{
//		//dd($request);
//	    $user = $request->user();
//	    $file_id = $request->input('file_share_id');
//
//        Log::alert($request->all());
//	    Log::alert('内容ID是：'.$file_id);
//
//		//开启一个数据库例行事务
//        $order = \DB::transaction(function () use($user,$request,$file_id) {
//
//            //创建一个订单，总金额暂时默认为0
//            $order = new Order(['total_amount' => 0]);
//            //将订单关联到当前用户
//            $order->user()->associate($user);
//            $order->save();
//
//
//            //创建item
//            if (FileShare::find($file_id)){
//                $file = FileShare::find($file_id);
//                $item = $order->orderItem()->make([
//                    'product_type' => 'PRODUCT_FILE',
//                    'price' => $file->cur_price,
//                    'amount' => '1',
//                ]);
//                $item->fileShare()->associate($file);
//                $item->save();
//                //更新订单总金额
//                $order->update(['total_amount' => $file->cur_price]);
//            } else {
//                $str = implode($request->all());
//                $file_err = $request->input('file_share_id');
//                Log::warning('订单item创建异常：'.$str.'文件信息'.$file_err);
//            }
//
//
//
//            //分别处理不同类型商品的订单item
////            switch ($request){
////                case $request->input('file_share_id'):
////                    $file = FileShare::find($request->input('file_share_id'));
////                    //创建一个item与当前订单关联
////                    $item = $order->orderItem()->make([
////                        //'total_amount' => 1,
////                        'total_amount' => $file->cur_price,
////                    ]);
////                    $item->fileShare()->associate($file);
////                    $item->save();
////                    //更新订单总金额
////                    $order->update(['total_amount' => $file->cur_price]);
////                    break;
////
////                case $request->input('course_id'):
////                    $course = Course::find($request->input('course_id'));
////                    //创建一个item与当前订单关联
////                    $item = $order->orderItem()->make([
////                        'amount' => 1,
////                        'total_amount' => $course->cur_price,
////                    ]);
////                    $item->course()->associate($course);
////                    $item->save();
////                    //更新订单总金额
////                    $order->update(['total_amount' => $course->cur_price]);
////                    break;
////
//////                case $request->input('mem_id'):
//////                    $file = FileShare::find($request->input('file_share_id'));
//////                    //创建一个item与当前订单关联
//////                    $item = $order->orderItem()->make([
//////                        'amount' => 1,
//////                        'price' => $file->cur_price,
//////                    ]);
//////                    $item->fileShare()->associate($file);
//////                    $item->save();
//////                    //更新订单总金额
//////                    $order->update(['total_amount' => $file->cur_price]);
//////                    break;
////                default:
////                    $str = implode($request->all());
////                    $file_err = $request->input('file_share_id');
////                    Log::warning('订单item创建异常：'.$str.'文件信息'.$file_err);
////            }
//
//            return $order;
//        } );
//
//        return $order;
//
////	    $order = Order::create($request->all());
////		return redirect()->route('orders.show', $order->id)->with('message', 'Created successfully.');
//	}

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
