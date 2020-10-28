<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * Order Repository
     * 
     * @var $orderRepository
     */
    protected $orderRepository;

    /**
     * Create new controller
     * 
     * @param OrderRepository $orderRepository
     * @return void
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Get all order ( state = 2 )
     * 
     * @return View
     */
    public function orders()
    {
        return view('backend.orders.order', ['orders' => $this->orderRepository->allOrder()]);
    }

    /**
     * Get one order
     * 
     * @param int $id
     * @return View 
     */
    public function detail($id)
    {
        return view('backend.orders.detailorder', ['order' => $this->orderRepository->find($id)]);
    }

    /**
     * Get all order ( state = 1 )
     * 
     * @return View
     */
    public function process()
    {
        return view('backend.orders.processed', ['orders' => $this->orderRepository->allOrderProcess()]);
    }

    /**
     * Handle order
     * 
     * @param Request $request
     * @param int $id
     * @return Redirect
     */
    public function status(Request $request, $id)
    {
        if ((int)$request->status === 2) {
            $order = $this->orderRepository->find($id);
            $order['state'] = 1;
            $order->save();
        }else{
            return redirect()->route('order.process')->with('faild', __('message.order.fail', ['name' => 'đơn hàng']));
        }

        return redirect()->route('order.process')->with('success', __('message.order.success', ['name' => 'đơn hàng']));
    }
}
