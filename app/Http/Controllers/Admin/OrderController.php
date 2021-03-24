<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }
}
