<?php
namespace App\Repositories\Front;

use App\Models\RootModule;
use App\Models\RootMenu;
use App\Models\RootItem;
use App\Models\RootMessage;

use App\Repositories\Common\CommonRepository;

use App, Response, Auth, Validator, DB, Exception, Cache;
use QrCode;

class IndexRepository {

    private $model;
    private $repo;
    public function __construct()
    {
//        $this->model = new OrgOrganization;
    }


    // 【首页】root
    public function view_root()
    {
//        dd(empty(null));
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

//        $seoCases = RootSeoCase::where(['active'=>1])->orderby('id', 'desc')->limit(6)->get();
//        $websiteTemplates = RootWebsiteTemplate::where(['active'=>1])->orderby('id', 'desc')->limit(8)->get();
//
//        $html = view('frontend.entrance.root')
//            ->with(['info'=>$info, 'menus'=>$menus, 'seoCases'=>$seoCases, 'websiteTemplates'=>$websiteTemplates])->__toString();
//        return $html;

//        dd(trans('custom.info.name'));

        $info = RootItem::where(['category'=>1])->orderby('updated_at', 'desc')->first();
        $info->custom = json_decode($info->custom);
        $info->custom2 = json_decode($info->custom2);
        $info->custom3 = json_decode($info->custom3);

        $advantages = RootMenu::where(['category'=>5, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $services = RootMenu::where(['category'=>11, 'active'=>1])->orderby('updated_at', 'desc')->get();
        foreach($services as $service)
        {
            $service->custom = json_decode($service->custom);
        }

        if(App::isLocale('en')) $language = 2;
        else $language = 1;
        $coverages = RootItem::where(['category'=>21, 'active'=>1, 'type'=>$language])->orderby('updated_at', 'desc')->limit(6)->get();

        $activity = RootItem::where(['category'=>29, 'active'=>1])->orderby('updated_at', 'desc')->first();

        $customers = RootItem::where(['category'=>31, 'active'=>1])->orderby('updated_at', 'desc')->limit(15)->get();



        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $service_list = RootItem::with(['children'])->where(['category'=>11,'active'=>1])->orderby('updated_at', 'desc')->get();
        if(isset($service_list))
        {
//            $service_list->custom = json_decode($service_list->custom);
//            $service_list->custom2 = json_decode($service_list->custom2);
//            $service_list->custom3 = json_decode($service_list->custom3);
        }
        else $service_list = [];



        $html = view('frontend.template-2933.entrance.root')->with([
            'info'=>$info,
            'advantages'=>$advantages,
            'partners'=>$partners,
            'services'=>$services,
            'coverages'=>$coverages,
            'activity'=>$activity,
            'customers'=>$customers,
            'service_list'=>$service_list
        ])->__toString();
        return $html;
    }




    // 【关于我们】【列表】
    public function view_about_us()
    {
        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $items = RootItem::where(['category'=>2, 'active'=>1])->orderby('updated_at', 'desc')->get();
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.about-list')->with(['abouts'=>$items,'partners'=>$partners])->__toString();

        return $html;
    }
    // 【关于我们】【列表】
    public function view_about($id = 0)
    {
        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id == 0) $mine = RootItem::orderby('updated_at', 'desc')->first();
        else $mine = RootItem::where(['id'=>$id])->first();
        $mine->custom = json_decode($mine->custom);
        $mine->custom2 = json_decode($mine->custom2);
        $mine->custom3 = json_decode($mine->custom3);

        $html = view('frontend.template-2933.entrance.about-detail')->with(['about'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【服务项目】【列表】
    public function view_advantages($id)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id == 0)
        {
            $items = RootMenu::with(['items'=>function($query) { $query->where(['active'=>1])->orderby('updated_at', 'desc'); }])
                ->where(['category'=>5, 'active'=>1])->orderby('updated_at', 'desc')->get();
        }
        else
        {
            $items = RootMenu::with(['items'=>function($query) { $query->where(['active'=>1])->orderby('updated_at', 'desc'); }])
                ->where(['id'=>$id])->orderby('updated_at', 'desc')->get();
        }
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.advantage-list')->with(['advantages'=>$items,'partners'=>$partners])->__toString();
        return $html;
    }
    // 【服务项目】【详情】
    public function view_advantage($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id != 0) $mine = RootItem::where(['id'=>$id])->first();
        else $mine = RootItem::where(['category'=>5])->orderby('updated_at', 'desc')->first();
        if(isset($mine))
        {
            $mine->custom = json_decode($mine->custom);
            $mine->custom2 = json_decode($mine->custom2);
            $mine->custom3 = json_decode($mine->custom3);
        }
        else $mine = [];

        $html = view('frontend.template-2933.entrance.advantage-detail')->with(['advantage'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【服务项目】【列表】
    public function view_services($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id == 0)
        {
            $items = RootMenu::with(['items'=>function($query) { $query->where(['active'=>1])->orderby('updated_at', 'desc'); }])
                ->where(['category'=>11, 'active'=>1])->orderby('updated_at', 'desc')->get();
        }
        else
        {
            $items = RootMenu::with(['items'=>function($query) { $query->where(['active'=>1])->orderby('updated_at', 'desc'); }])
                ->where(['id'=>$id])->orderby('updated_at', 'desc')->get();
        }
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.service-list')->with(['services'=>$items,'partners'=>$partners])->__toString();
        return $html;
    }
    // 【服务项目】【详情】
    public function view_service($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id != 0) $mine = RootItem::with(['children'])->where(['id'=>$id])->first();
        else $mine = RootItem::where(['category'=>11])->orderby('updated_at', 'desc')->first();
        if(isset($mine))
        {
            $mine->custom = json_decode($mine->custom);
            $mine->custom2 = json_decode($mine->custom2);
            $mine->custom3 = json_decode($mine->custom3);
        }
        else $mine = [];

        $html = view('frontend.template-2933.entrance.service-detail')->with(['service'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【常见问题】【列表】
    public function view_faqs()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $items = RootItem::where(['category'=>18, 'active'=>1])->orderby('order', 'desc')->get();
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.faq-list')->with(['faqs'=>$items,'partners'=>$partners])->__toString();
        return $html;
    }
    // 【常见问题】【详情】
    public function view_faq($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id != 0) $mine = RootItem::where(['id'=>$id])->first();
        else $mine = RootItem::where(['category'=>18])->orderby('updated_at', 'desc')->first();
        if(isset($mine))
        {
            $mine->custom = json_decode($mine->custom);
            $mine->custom2 = json_decode($mine->custom2);
            $mine->custom3 = json_decode($mine->custom3);
        }
        else $mine = [];

        $html = view('frontend.template-2933.entrance.faq-detail')->with(['faq'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【新闻动态】【列表】
    public function view_coverages()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if(isset($_COOKIE['language']) &&  $_COOKIE['language']=="en") $type = 2;
        else $type = 1;

        $cookie_language = request()->get('cookie_language');
        if($cookie_language == 'en') $type = 2;
        else if($cookie_language == 'zh_cn') $type = 1;

        $coverages = RootItem::where(['category'=>21, 'type'=>$type, 'active'=>1])->orderby('updated_at', 'desc')->paginate(12);
        foreach($coverages as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.coverage-list')->with(['coverages'=>$coverages,'partners'=>$partners])->__toString();
        return $html;
    }
    // 【新闻动态】【详情】
    public function view_coverage($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id != 0) $mine = RootItem::where(['id'=>$id])->first();
        else $mine = RootItem::where(['category'=>21])->orderby('updated_at', 'desc')->first();
        if(isset($mine))
        {
            $mine->custom = json_decode($mine->custom);
            $mine->custom2 = json_decode($mine->custom2);
            $mine->custom3 = json_decode($mine->custom3);

            $cookie_language = request()->get('cookie_language');

            if($cookie_language == "zh_cn")
            {
                if($mine->type != 1) return redirect('/coverages');
            }
            else if($cookie_language == "en")
            {
                if($mine->type != 2) return redirect('/coverages');
            }
        }
        else $mine = [];

        $html = view('frontend.template-2933.entrance.coverage-detail')->with(['coverage'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【客户】【列表】
    public function view_customers()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $items = RootItem::where(['category'=>31, 'active'=>1])->orderby('updated_at', 'desc')->paginate(16);
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
            $item->custom3 = json_decode($item->custom3);
        }

        $html = view('frontend.template-2933.entrance.customer-list')->with(['customers'=>$items,'partners'=>$partners])->__toString();
        return $html;
    }




    // 【优惠活动】【详情】
    public function view_activity($id = 0)
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        if($id != 0) $mine = RootItem::where(['id'=>$id])->first();
        else $mine = RootItem::where(['category'=>29])->orderby('updated_at', 'desc')->first();
        if(isset($mine))
        {
            $mine->custom = json_decode($mine->custom);
            $mine->custom2 = json_decode($mine->custom2);
            $mine->custom3 = json_decode($mine->custom3);
        }
        else $mine = [];

        $html = view('frontend.template-2933.entrance.activity-detail')->with(['activity'=>$mine,'partners'=>$partners])->__toString();
        return $html;
    }




    // 返回【联系我们】【视图】
    public function view_contact()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $html = view('frontend.template-2933.entrance.contact')->with(['partners'=>$partners])->__toString();
        return $html;
    }


    // 返回【询价】【视图】
    public function view_quote()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $partners = RootItem::where(['category'=>9, 'active'=>1])->orderby('updated_at', 'desc')->get();

        $html = view('frontend.template-2933.entrance.quote')->with(['partners'=>$partners])->__toString();
        return $html;
    }




    // 【留言】
    public function message_contact($post_data)
    {
        $messages = [
            'name.required' => '请输入姓名',
            'mobile.required' => '请输入电话',
        ];
        $v = Validator::make($post_data, [
            'name' => 'required',
            'mobile' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $post_data['category'] = 1;
            $mine = new RootMessage;
            $bool = $mine->fill($post_data)->save();
            if(!$bool) throw new Exception("insert--message--fail");

            DB::commit();
            $msg = '提交成功！';
            return response_success([],$msg);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '提交失败，请重试！';
//            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }
    }


    // 【询价】
    public function message_quote($post_data)
    {

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $insert_data['category'] = 11;
            if($post_data['language'] == 'en') {
                $insert_data['name'] = $post_data['submitted-first-name']." ".$post_data['submitted-last-name'];
            } else {
                $insert_data['name'] =$post_data['submitted-name'];
            }
            $insert_data['phone'] =$post_data['submitted-phone'];
            $insert_data['mobile'] =$post_data['submitted-phone'];
            $insert_data['email'] =$post_data['submitted-email'];

            $service_type = $post_data['submitted-service'];
            $custom['service_type'] = $service_type;
            $custom['from_country'] = $post_data['moving-from-country'];
            $custom['from_city'] = $post_data['moving-from-city'];
            $custom['to_country'] = $post_data['moving-to-country'];
            $custom['to_city'] = $post_data['moving-to-city'];
            $custom['find_way'] = $post_data['submitted-find-way'];
            if($service_type == 'storage') {
                $custom['date'] = $post_data['storage_date_year'].'/'.$post_data['storage_date_month'].'/'.$post_data['storage_date_day'];
            } else {
                $custom['date'] = $post_data['moving-date-year'].'/'.$post_data['moving-date-month'].'/'.$post_data['moving-date-day'];
            }
            if($service_type == 'moving') {
                $custom['destination_type'] = $post_data['moving_destination_type'];
                $custom['moving_type'] = $post_data['moving_type'];
                $custom['pet_type'] = $post_data['pet_relocation_type'];
                $custom['employees_involved'] = $post_data['moving_employees_involved'];
            }
            $insert_data['custom'] = json_encode($custom);


            $mine = new RootMessage;
            $bool = $mine->fill($insert_data)->save();
            if(!$bool) throw new Exception("insert--message--fail");

            $email_data['host'] = config('common.host.'.env('APP_ENV').'.root');
            $email_data['target'] = config('company.email_receiver.'.env('APP_ENV'));

            $email_data['language'] = config('company.trans.'.$post_data['language']);
            $email_data['name'] = $insert_data['name'];
            $email_data['phone'] = $insert_data['phone'];
            $email_data['mobile'] = $insert_data['mobile'];
            $email_data['email'] = $insert_data['email'];
            $email_data['type'] = config('company.trans.'.$service_type);
            if($service_type == 'moving') {
                $email_data['destination_type'] = config('company.trans.'.$post_data['moving_destination_type']);
                $email_data['moving_type'] = config('company.trans.'.$post_data['moving_type']);
                if($post_data['moving_type'] == 'pet_move')
                {
                    $email_data['pet_type'] = config('company.trans.'.$post_data['pet_relocation_type']);
                }
                else if($post_data['moving_type'] == 'office_move')
                {
                    $email_data['employees_involved'] = $post_data['moving_employees_involved'];
                }
            }
            $email_data['date'] = $custom['date'];
            $email_data['from'] = $post_data['moving-from-country']." ".$post_data['moving-from-city'];
            $email_data['to'] = $post_data['moving-to-country']." ".$post_data['moving-to-city'];
            $email_data['time'] = $custom['date'];
            $email_data['way'] = config('company.trans.'.$custom['find_way']);


            $url = config('common.MailService.'.env('APP_ENV')).'/keron/email/quote';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 7);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $email_data);
            $response = curl_exec($ch);
            curl_close($ch);
            if(empty($response)) throw new Exception('curl get request failed');
            else
            {
                $response = json_decode($response,true);
                if(!$response['success']) throw new Exception("send-email-failed");
            }

            DB::commit();
            if($post_data['language'] == 'en') $msg = 'Submitted successfully!';
            else $msg = '提交成功！';
            return response_success([],$msg);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '提交失败，请重试！';
            if($post_data['language'] == 'en') $msg = 'Submission failed, please try again!';
            else $msg = '提交失败，请重试！';
//            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }
    }




    // 【关于我们】【列表】
    public function view_temp_activity_with_milestown()
    {
        $html = view('frontend.template-2933.entrance.temp-activity-milestown')->__toString();
        return $html;
    }



}