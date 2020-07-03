<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{config("web.title")}}</title>
    <meta name="keywords" content="{{config('web.keywords')}}"/>
    <meta name="description" content="{{config('web.description')}}"/>
    <link rel="shortcut icon" href="/style/home/img/1.png">
    <link rel="stylesheet" href="/style/home/css/thinkpad.css">
    <script src="/style/home/js/jquery.js"></script>
    <script src="/style/home/js/think.js"></script>
</head>
<body>
<!-- 头 -->
@include("home.public.header")
<div class="container centers">
    <div class="mianbao">
        <a href="http://www.lenovo.com.cn">首页</a> &gt; <a href="#">商品详情</a>
        &gt; {{$goods->title}}
    </div>
    <div class="action">
        <div class="ac-left">
            <!-- 橱窗图上部  空白位-->
            <!-- 橱窗图 -->
            <div class="imgs" id="imgSlider">
                <a href="javascript:;" class="l-s"></a>
                <a href="javascript:;" class="l-r"></a>
                <ul class="img-d" id="imgBig">]

                    @foreach($goodsImg as $img)
                        <li id="bigim0" style="z-index:1;filter: alpha(opacity=100); opacity: 1;"><a
                                href="javascript:;"><!--最后效果abc.jpg  abc.w544.jpg -->
                                <img width="544px" height="544px" src="/Uploads/goods/{{$img->img}}"
                                     alt="{{$goods->title}}">
                            </a>
                        </li>

                    @endforeach

                </ul>
                <div class="img-x">
                    <ul class="pro_ul" id="imgSmall" style="width: 408px;">


                        @foreach($goodsImg as $img)


                            <li id="im0" style="filter:alpha(opacity:100);opacity:1;">
                                <a href="javascript:;">
                                    <img style="width:88px;height:88px;" src="/Uploads/goods/{{$img->img}}"
                                         alt="{{$goods->title}}">
                                </a>
                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="nr ">
                <span>商品编号：20DFA08ECD</span>
                <a href="javascript:void(0);" title="收藏"><span class=""></span>收藏</a>
                <a href="javascript:void(0);" title="分享"> <span class="g"></span>分享</a>
                <div class="box">
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style">
                        <a class="jiathis_button_tsina" latag="latag_pc_detail_share_weibo" title="分享到微博"><span
                                class="jiathis_txt jtico jtico_tsina"></span></a>
                        <a class="jiathis_button_qzone" latag="latag_pc_detail_share_qzone" title="分享到QQ空间"><span
                                class="jiathis_txt jtico jtico_qzone"></span></a>
                        <a class="jiathis_button_renren" latag="latag_pc_detail_share_renren" title="分享到人人网"><span
                                class="jiathis_txt jtico jtico_renren"></span></a>
                        <a class="jiathis_button_weixin" latag="latag_pc_detail_share_weixin" title="分享到微信"><span
                                class="jiathis_txt jtico jtico_weixin"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 橱窗图下部  空白位-->

        <div class="ac-right">

            <!-- 基本信息上部  空白位-->

            <!-- 商品基础信息 -->
            <h1 class="biaoti">{{$goods->title}}</h1>
            <p class="ar-jie">{{$goods->info}}</p>
            <div class="tishi">【温馨提示】<a href="&#10;http://click.lenovo.com.cn/phpstat/tourl.php?a=1775"
                                        target="blank"><font color="red">晒单最高送1年延保，点击晒单-&gt;</font></a><br>
            </div>
            <div class="ar-main">
                <div class="amt clearfix">
                    <span>商城价：</span>
                    <b>¥{{$goods->price}}</b>
                    <div id="yd">
                        <div class="icon">预售</div>
                        <span id="preselldj">定金：0</span>
                        <div id="box_djs">
	                        <span id="
	                        preselldjs"></span><a id="presellzc" href="pd_comp/html/presell_info.html" target="_blank">预售规则</a>
                        </div>
                    </div>

                </div>
                <div class="cx">
                    <span class="cxix">促销信息：</span>
                    <div class="de_sail_r">
                        <ul class="de_sail_top">
                            <li class="clearfix"
                                id="xdlj">
                                <span class="ht">下单立减</span>
                                <span class="xjz">下单立减
										<b class="detail_red">700.00元</b>，距离结束时间还有:<b class="detail_red" id="time">3天 2时 38 分 24秒</b>
								  </span>
                                <div class="clear"></div>
                            </li>
                        </ul>
                    </div>
                    <p id="n_yyks" style="display:none; color:red" class="ns_gray_less">
                    </p>
                    <p id="n_sgks" style="display:none; color:red" class="ns_gray_less">
                    </p>
                    <p id="n_fsgks" style="display:none; color:red" class="ns_gray_less">
                    </p>
                    <p id="n_djs" style="display:none; color:red" class="ns_gray_less"></p>
                </div>
            </div>
            <div class="de_info_app clearfix">

            </div>


            <!-- 价格下部  空白位-->

            <!-- 商品规格 -->
            <div class="xilei">

                <div>
                    <!-- ThinkPad 私人订制 -->

                    <div class="xuan" style="">

                    </div>

                    <!-- 分期文案 -->
                    <!-- think o2o -->
                    <div id="city_wrap" class="de_info_section de_info_section_city" style="display:none;"></div>
                    <div class="de_info_btn clearfix">
                        <div class="de_info_num">
                            <label class="i_box">
                                <input class="pro_num J_input" id="goodsNumber" type="text" value="1">
                                <input class="pro_add J_add" type="button">
                                <input class="pro_less J_minus" type="button">
                            </label>
                            <span id="stock">有库存</span>
                        </div>
                        <a href="javascript:void(0);" class="de_button de_btn_buy" id="ljgm" title="立即购买">立即购买</a>
                        <a href="javascript:void(0);" class="de_button de_btn_car" id="jrgwc" title="加入购物车">加入购物车</a>

                        <input type="hidden" name="id" value="{{$goods->id}}">
                    </div>


                    <!-- 基本信息下部  空白位-->
                </div>
            </div>
        </div>
        <div class="mainsss">
            <div class="box-lt">

                <!-- 推荐列表上部  空白位-->

                <div id="rxb">
                    <div class="lt-boxa" style="margin-bottom: 10px;">
                        <h1>hot</h1>
                        <dl>
                            <dt>
                                <a target="_blank">
                                    <img src="/style/home/img/S5pkCbFJg0toXIbnpUChlbRmG-4457.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a target="_blank">
                                    <img src="/style/home/img/18M4UXb7X8EujEoNGjGkWA84r-8467.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a target="_blank"><img
                                        src="/style/home/img/0VI374vmQqVNdnpGraQHDgsrF-5614.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a target="_blank">
                                    <img src="/style/home/img/AdIdi01d05ryyOZ3y8RtoRTL9-9011.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl style="border-bottom:none;">
                            <dt>
                                <a target="_blank">
                                    <img src="/style/home/img/76qsTSOhdkr94jtzCUirwIQet-3814.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a target="_blank">

                                </a>

                            </dd>
                        </dl>
                    </div>
                </div>

                <div id="gxhtj">
                    <div class="lt-boxa" style="margin-bottom: 10px;">
                        <h1>guess you like</h1>
                        <dl>
                            <dt>
                                <a href="http://www.lenovo.com.cn/product/53381.html" target="_blank"><img
                                        src="http://p3.lefile.cn/product/adminweb/2016/11/02/JEO8ueAXNCxyoR5vdgu9oEhI6-3309.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/53381.html" target="_blank">
                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a href="http://www.lenovo.com.cn/product/58053.html" target="_blank">
                                    <img
                                        src="http://p1.lefile.cn/product/adminweb/2016/08/17/tseds0UW4IhC8L6glTtoyvI6b-0769.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/58053.html" target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a href="http://www.lenovo.com.cn/product/52618.html" target="_blank">
                                    <img src="/style/home/img/AdIdi01d05ryyOZ3y8RtoRTL9-9011.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/52618.html" target="_blank">

                                </a>

                            </dd>

                        </dl>
                        <dl>
                            <dt>
                                <a href="http://www.lenovo.com.cn/product/52413.html" target="_blank">
                                    <img src="/style/home/img/KrSWdKJd453n4lbWrCcVdgr8a-4391.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/52413.html" target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a target="_blank">
                                    <img src="/style/home/img/ZiHG29LjNlXsL7jAat0H4YCgl-9203.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/52667.html" target="_blank">

                                </a>

                            </dd>
                        </dl>
                        <dl style="border-bottom:none;">
                            <dt>
                                <a href="http://www.lenovo.com.cn/product/48302.html" target="_blank">
                                    <img src="/style/home/img/dsQvUYkKH6voKQWnsZXG7o7to-6032.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a href="http://www.lenovo.com.cn/product/48302.html" target="_blank">
                                </a>

                            </dd>
                        </dl>
                    </div>
                </div>


                <div id="cnxh">
                    <div class="lt-boxa" style="margin-bottom: 10px;">
                        <h1 style="font-size:14px;">guess you like</h1>
                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_1_48639_52413_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52413.html" target="_blank">
                                    <img src="/style/home/img/KrSWdKJd453n4lbWrCcVdgr8a-4391.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="
							latag_pc_detail_view_rec_1_48639_52413_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52413.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_1_48639_52413_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_2_48639_52667_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52667.html" target="_blank">
                                    <img src="/style/home/img/ZiHG29LjNlXsL7jAat0H4YCgl-9203.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="latag_pc_detail_view_rec_2_48639_52667_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52667.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_2_48639_52667_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_3_48639_48302_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/48302.html" target="_blank">
                                    <img src="/style/home/img/dsQvUYkKH6voKQWnsZXG7o7to-6032.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="latag_pc_detail_view_rec_3_48639_48302_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/48302.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_3_48639_48302_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_4_48639_53011_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/53011.html" target="_blank">
                                    <img src="/style/home/img/jHvJCkVhS4qb4sBxcqTr9LIu9-8090.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="latag_pc_detail_view_rec_4_48639_53011_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/53011.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_4_48639_53011_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>

                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_6_48639_52669_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52669.html" target="_blank">
                                    <img src="/style/home/img/GcCHbiDmUV9PMTYwCa7pCpqpm-0128.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="latag_pc_detail_view_rec_6_48639_52669_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52669.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_6_48639_52669_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <a latag="latag_pc_detail_view_rec_7_48639_52157_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52157.html" target="_blank">
                                    <img src="/style/home/img/M9R6m2BPiFzMuaCUUHbUq1ycI-9363.w70xh70.jpg">
                                </a>
                            </dt>

                            <dd>
                                <a latag="latag_pc_detail_view_rec_7_48639_52157_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/52157.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_7_48639_52157_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                            </dd>
                        </dl>
                        <dl style="border-bottom:none;">
                            <dt>
                                <a latag="latag_pc_detail_view_rec_8_48639_53370_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/53370.html" target="_blank">
                                    <img src="/style/home/img/VsCFp68OUHe9FucluD1r5ec5P-3863.w70xh70.jpg">
                                </a>
                            </dt>
                            <dd>
                                <a latag="latag_pc_detail_view_rec_8_48639_53370_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468"
                                   href="http://www.lenovo.com.cn/product/53370.html" target="_blank">
                                    <p latag="latag_pc_detail_view_rec_8_48639_53370_DZ02010001_84d4dbeb-95d0-4ada-926f-6a1d248cc468">
                                    </p>
                                </a>

                                <br>

                            </dd>
                        </dl>
                    </div>
                </div>


                <!-- 推荐列表下部  空白位-->
                <div class="box-rt">
                    <!-- 详情配置上部  空白位-->
                    <div class="tab-hd">
                        <ul id="tab">
                            <!-- 商品详情配置评价tab -->
                            <li class="current" latag="latag_pc_detail_tab_商品详情_48639">商品详情</li>
                            <li latag="latag_pc_detail_tab_配置信息_48639">配置信息</li>
                            <li id="pingjia_title" latag="latag_pc_detail_tab_商品评论_48639">商品评价</li>
                        </ul>
                    </div>
                    <div id="content">
                        <!-- 商品详情 -->
                        <ul class="rt-box">

                            {!!$goods->text!!}

                        </ul>

                        <!-- 配置信息 -->


                        <ul>
                            <div class="ns_attributes-list">
                            {!!$goods->config!!}

                        </ul>

                        <ul id="pingjia_body" style="display: none;">

                            <div class="ns_comment ns_fixClear" id="div3">
                                <div class="ns_comment-inner" id="sppl_box">
                                    <dl id="sppl_list" class="clearfix">

                                    </dl>
                                </div>
                                <div id="pager_divdiv3" class="ns_discusspager">
                                    <div class="ns_comment-inner" id="sppl_box">

                                        @if($arr['commentTot'])
                                            <dl id="sppl_title">
                                                <dt>
                                                    <b>{{round(($arr['goodTot']/$arr['commentTot'])*100)}}</b>
                                                    <span>&nbsp;%</span>
                                                    <p>好评率</p>
                                                </dt>
                                                <dd class="sppl_total active" data-level="0">
                                                    全部评价(<span>{{$arr['commentTot']}}</span>)
                                                </dd>
                                                <dd class="sppl_good" data-level="3">好评(<span>{{$arr['goodTot']}}</span>)
                                                </dd>
                                                <dd class="sppl_medium" data-level="2">
                                                    中评(<span>{{$arr['zhongTot']}}</span>)
                                                </dd>
                                                <dd class="sppl_total" data-level="1">差评(<span>{{$arr['chaTot']}}</span>)
                                                </dd>
                                            </dl>
                                            <dl id="sppl_list" class="clearfix">

                                                @foreach($comment as $com)
                                                    <dd>
                                                        <div class="sppl_top">
                                                            <span
                                                                style="color:red">{{str_repeat("★",$com->start)}}{{str_repeat('☆',5-$com->start)}}</span>
                                                            <span class="sppl_username">匿名</span>
                                                            <span
                                                                class="sppl_time">{{date("Y-m-d H:i:s",$com->time)}}</span>
                                                        </div>
                                                        <div class="sppl_user_box">
                                                            <p><a class="clickpl"
                                                                  uuid="9ffce34a-deda-483c-8754-833b29421f76"
                                                                  href="javascript:void(0);">还不错 </a>
                                                            </p>
                                                        </div>

                                                    </dd>

                                                @endforeach

                                            </dl>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- 社区评论 -->
                            <div class="club-evaluation">

                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div id="think_bottom">
            <div class="think_share clear">
                <a class="th_douban" title="豆瓣" href="http://site.douban.com/thinkpad/" target="_blank">豆瓣</a>
                <a class="th_weibo" title="微博" href="http://weibo.com/lenovothink" target="_blank">微博</a>
                <a class="th_renren" title="人人" href="http://page.renren.com/600014223?checked=true"
                   target="_blank">人人</a>
                <a class="th_tencent" title="腾讯微博" href="http://e.t.qq.com/ilovethinkpad" target="_blank">腾讯微博</a>
            </div>

            <div class="think_copy">

                <div>
                </div>
                <!-- 侧边栏 -->
                <div class="shop_rightbar" id="shop_rightbar">
                    <div class="shop_rightbar_con">
                        <ul>
                            <li class="shop_userlogo">
                                <a onclick="tocenterisLogin()" target="_blank" title="会员中心"><img
                                        src="/style/home/img/3636.jpg" alt="会员中心"></a>
                            </li>
                            <li class="shop_car">
                                <a href="http://cart.lenovo.com.cn/" target="_blank" title="购物车" class="shopicon"
                                   latag="latag_pc_common_header_shopcart"></a>
                            </li>
                            <li class="shop_save">
                                <a href="http://i.lenovo.com.cn/favorite/myFavorite.jhtml?sts=e40e7004-4c8a-4963-8564-31271a8337d8"
                                   target="_blank" title="我的收藏" class="shopicon">我的收藏</a>
                            </li>
                            <li class="shop_pointer">
                                <a href="javascript:;" class="shopicon"></a>
                                <i class="shopicon V_jt"></i>

                            </li>
                            <li class="shop_totop" id="shop_totop">
                                <a href="javascript:;" title="回到顶部" class="shopicon">回到顶部</a>
                            </li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
</body>
<script>

    $("#jrgwc").click(function () {

        // read product id
        var id = $("input[name=id]").val();
        // quantity
        var num = $("#goodsNumber").val();
        // add to cart
        window.location.href = "/addCart?id=" + id + "&num=" + num;
    });
</script>
</html>
