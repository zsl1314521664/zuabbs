@extends('layouts.app')
@section('title','首页')
@section('content')
    <!-- 巨幕 -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">欢迎来到“在郑航”服务平台！</h1>
            <p class="lead" style="text-indent: 2em;">本平台旨在及时为航院学子发布校内信息通知，切实为航院师生在校生活提供便利。</p>
{{--            <p>良好的网络环境需要你我共同维护，使用本平台须严格遵守<a style="text-decoration: none;" target="_blank" href="https://baike.baidu.com/item/%E4%B8%AD%E5%8D%8E%E4%BA%BA%E6%B0%91%E5%85%B1%E5%92%8C%E5%9B%BD%E7%BD%91%E7%BB%9C%E5%AE%89%E5%85%A8%E6%B3%95/16843044?fromtitle=%E7%BD%91%E7%BB%9C%E5%AE%89%E5%85%A8%E6%B3%95&fromid=12291792&fr=aladdin">--}}
{{--                    《中华人民共和国网络安全法》--}}
{{--                </a>等法律法规。--}}
{{--            </p>--}}
            <hr class="my-4">
            <h4 style="letter-spacing: 0.2em;"><span style="font-size: 1.5em;">你</span>准备好了吗？点击“开始”加入我们吧！如有问题可联系航航:<a href="{{ route('about') }}" style="text-decoration: none;">航帮助</a></h4>
            <a class="btn btn-primary btn-lg" href="{{ route('topics.index') }}" role="button">开始</a>
        </div>
    </div>
@stop