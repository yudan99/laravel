<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItemRequest;

class OrderItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$order_items = OrderItem::paginate();
		return view('order_items.index', compact('order_items'));
	}

    public function show(OrderItem $order_item)
    {
        return view('order_items.show', compact('order_item'));
    }

	public function create(OrderItem $order_item)
	{
		return view('order_items.create_and_edit', compact('order_item'));
	}

	public function store(OrderItemRequest $request)
	{
		$order_item = OrderItem::create($request->all());
		return redirect()->route('order_items.show', $order_item->id)->with('message', 'Created successfully.');
	}

	public function edit(OrderItem $order_item)
	{
        $this->authorize('update', $order_item);
		return view('order_items.create_and_edit', compact('order_item'));
	}

	public function update(OrderItemRequest $request, OrderItem $order_item)
	{
		$this->authorize('update', $order_item);
		$order_item->update($request->all());

		return redirect()->route('order_items.show', $order_item->id)->with('message', 'Updated successfully.');
	}

	public function destroy(OrderItem $order_item)
	{
		$this->authorize('destroy', $order_item);
		$order_item->delete();

		return redirect()->route('order_items.index')->with('message', 'Deleted successfully.');
	}
}