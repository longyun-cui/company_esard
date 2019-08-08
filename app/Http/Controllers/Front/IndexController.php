<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Front\IndexRepository;

class IndexController extends Controller
{

    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new IndexRepository;
    }



    // 返回【主页】视图
    public function view_root()
    {
        return $this->repo->view_root();
//        return view('frontend.metinfo');
    }


    // 返回【关于我们】【列表】视图
    public function view_about_us()
    {
        return $this->repo->view_about_us();
    }

    // 返回【关于我们】【详情】视图
    public function view_about($id=0)
    {
        return $this->repo->view_about($id);
    }


    // 返回【优势】【列表】视图
    public function view_advantages($id=0)
    {
        return $this->repo->view_advantages($id);
    }
    // 返回【优势】【详情】视图
    public function view_advantage($id=0)
    {
        return $this->repo->view_advantage($id);
    }


    // 返回【产品服务】【列表】视图
    public function view_services($id=0)
    {
        return $this->repo->view_services($id);
    }
    // 返回【产品服务】【详情】视图
    public function view_service($id=0)
    {
        return $this->repo->view_service($id);
    }


    // 返回【常见问题】【列表】视图
    public function view_faqs()
    {
        return $this->repo->view_faqs();
    }
    // 返回【常见问题】【详情】视图
    public function view_faq($id=0)
    {
        return $this->repo->view_faq($id);
    }


    // 返回【新闻动态】【列表】视图
    public function view_coverages()
    {
        return $this->repo->view_coverages();
    }
    // 返回【新闻动态】【详情】视图
    public function view_coverage($id=0)
    {
        return $this->repo->view_coverage($id);
    }


    // 返回【优惠活动】【详情】视图
    public function view_activity($id=0)
    {
        return $this->repo->view_activity($id);
    }


    // 返回【客户】【列表】视图
    public function view_customers()
    {
        return $this->repo->view_customers();
    }




    // 返回【联系我们】视图
    public function view_contact()
    {
        return $this->repo->view_contact();
    }

    // 返回【询价】视图
    public function view_quote()
    {
        return $this->repo->view_quote();
    }




    // 保存【联系我们】表单
    public function message_contact()
    {
        return $this->repo->message_contact(request()->all());
    }
    // 保存【询价】表单
    public function message_quote()
    {
        return $this->repo->message_quote(request()->all());
    }




    // 保存【询价】表单
    public function view_temp_activity_with_milestown()
    {
        return $this->repo->view_temp_activity_with_milestown();
    }



}
