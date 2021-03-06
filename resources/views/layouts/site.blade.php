<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate(true) !!}
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/libs.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
<body>
<div class="nav-game">
    <div class="content-main">
        <a href="{{ route('aion') }}" class="item-link-game @if(Request::is('aion')) active-game-nav @endif">
            <i><img src="/img/elements/ico-1.png" alt=""></i> Aion
        </a>
        <a href="{{ route('jade') }}" class="item-link-game @if(Request::is('jade')) active-game-nav @endif">
            <i><img src="/img/elements/ico-2.png" alt=""></i> Jade Dynasty
        </a>
        <a href="{{ route('lineage') }}" class="item-link-game @if(Request::is('lineage')) active-game-nav @endif">
            <i><img src="/img/elements/ico-3.png" alt=""></i> Lineage 2
        </a>
        <a href="{{ route('mu') }}" class="item-link-game @if(Request::is('mu')) active-game-nav @endif">
            <i><img src="/img/elements/ico-4.png" alt=""></i> Mu Online
        </a>
        <a href="{{ route('perfect') }}" class="item-link-game @if(Request::is('perfect')) active-game-nav @endif">
            <i><img src="/img/elements/ico-5.png" alt=""></i> Perfect World
        </a>
        <a href="{{ route('rf') }}" class="item-link-game @if(Request::is('rf')) active-game-nav @endif">
            <i><img src="/img/elements/ico-6.png" alt=""></i> RF Online
        </a>
        <a href="{{ route('wow') }}" class="item-link-game @if(Request::is('wow')) active-game-nav @endif">
            <i><img src="/img/elements/ico-7.png" alt=""></i> World Of Warcraft
        </a>
        <a href="{{ route('other') }}" class="item-link-game @if(Request::is('other')) active-game-nav @endif">
            Online Games
        </a>
    </div>
</div>
<div class="nav-main">
    <div class="content-main">
        <a href="{{ route('blog.main') }}" class="menu-item"><span class="line-menu"></span>Блог</a>
        <a href="{{ route('news.main') }}" class="menu-item"><span class="line-menu"></span>Новости</a>
        <a href="{{ route('about') }}" class="menu-item"><span class="line-menu"></span>О проекте</a>
        <a href="{{ route('rules') }}" class="menu-item"><span class="line-menu"></span>Правила</a>
        <a href="{{ route('contacts') }}" class="menu-item"><span class="line-menu"></span>Контакты</a>
        <a href="{{ route('support') }}" class="menu-item"><span class="line-menu"></span>Техническая поддержка</a>
        <a href="{{ route('faq') }}" class="menu-item"><span class="line-menu"></span>Вопросы и ответы</a>
    </div>
</div>
@if(!isset($game))
    @php
        $game = request()->get('g')
    @endphp
@endif
@if(isset($game) && $game != 'lineage')
    @if($game == 'perfect' or $game == 'my')
        <div class="pw-container">
            @endif
            <div class="{{ $game }}-container">
                @else
                    <div class="page_bg_style">
                    {{--<div class="main-container">--}}
                        @endif
                        <div class="contentLogo">
                            @if(isset($route))
                                <a href="{{ route($route) }}">
                                    @else
                                        <a href="{{ route('main') }}">
                                            @endif
                                            <img src="{{ asset('img/elements/logo.png') }}" alt="MMORATE">
                                        </a>
                        </div>
                        @yield('content')
                        <div class="contentRight">
                            <div class="element-desing-2">
                                <img src="/img/elements/elem-2.png" alt="">
                            </div>
                            @guest
                            <div class="link-lk">
                                <a href="{{ route('register') }}" class="link-lk-btn">Создать аккаунт</a>
                            </div>
                            @else
                            <div class="menu-block-lk">
                                <div class="title-menu-lk" onclick="$('.menu-panel-lk').slideToggle();">
                                    Панель навигации
                                    <i><img src="/img/image_dop/arr_panel.png" alt=""></i>
                                </div>
                                <div class="menu-panel-lk" style="display: none">
                                    <a onclick="subMenuSlide('1');" class="itemLkMenu lkMenuActive arrow_slide-menu">
                                        <span class="vnutItemMenu" style="border-top: 0;">Мой профиль</span>
                                        <div class="submenu_lk" id="submenu_lk_1" style="">
                                            <span class="vnutItemMenu"><span class="arrMenu">› </span>Редактировать профиль</span>
                                            <span class="vnutItemMenu"><span class="arrMenu">› </span>Сменить пароль</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('myVotes') }}"
                                       class="itemLkMenu @if(Request::is('myVotes')) lkMenuActive @endif">
                                        <span class="vnutItemMenu"><span
                                                    class="arrMenu">› </span>Мои голоса</span>
                                    </a>
                                    <a onclick="subMenuSlide('2');" class="itemLkMenu lkMenuActive arrow_slide-menu">
                                        <span class="vnutItemMenu" style="border-top: 0;">Мои сервера</span>
                                        <div class="submenu_lk" id="submenu_lk_2" style="">
                                            <span class="vnutItemMenu"><span class="arrMenu">› </span>Добавить сервер</span>
                                            <span class="vnutItemMenu"><span class="arrMenu">› </span>Список серверов</span>
                                        </div>
                                    </a>
                                    <a href="#"
                                       class="itemLkMenu @if(Request::is('profile')) lkMenuActive @endif">
                                        <span class="vnutItemMenu"><span
                                                    class="arrMenu">› </span>Статистика</span>
                                    </a>
                                    <a href="{{ route('privileges') }}"
                                       class="itemLkMenu @if(Request::is('privilege')) lkMenuActive @endif">
                                        <span class="vnutItemMenu"><span class="arrMenu">› </span>VIP Профиль</span>
                                    </a>
                                    <a href="{{ route('ads') }}"
                                       class="itemLkMenu @if(Request::is('ads')) lkMenuActive @endif">
                                        <span class="vnutItemMenu"><span class="arrMenu">› </span>Реклама</span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="itemLkMenu">
                                            <span class="vnutItemMenu" style="border-bottom: 0;"><span
                                                        class="arrMenu">› </span>Выйти</span>
                                    </a>
                                    {{--@if(auth()->user()->is_admin == 1)--}}
                                    {{--<a href="{{ route('admin.servers') }}" class="itemLkMenu">--}}
                                    {{--<span class="vnutItemMenu" style="border-top: 0;"><span class="arrMenu">› </span>Панель администратора</span>--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                    {{--<a href="{{ route('profile') }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('profile')) lkMenuActive @endif">--}}
                                        {{--<span class="vnutItemMenu"><span--}}
                                                    {{--class="arrMenu">› </span>Настройки профиля</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('myVotes') }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('myVotes')) lkMenuActive @endif">--}}
                                        {{--<span class="vnutItemMenu"><span class="arrMenu">› </span>Мои голоса</span>--}}
                                    {{--</a>--}}
                                    {{--@if(MMORATE\Servers::MyCount() != 0)--}}
                                    {{--<a href="{{ route('myServers') }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('myServers') or Request::is('editServer')) lkMenuActive @endif">--}}
                                                    {{--<span class="vnutItemMenu"><span--}}
                                                                {{--class="arrMenu">› </span>Игровые сервера</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('myServersStat') }}" class="itemLkMenu @if(Request::is('statistic')) lkMenuActive @endif">--}}
                                    {{--<span class="vnutItemMenu"><span class="arrMenu">› </span>Статистика</span>--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                    {{--@if(Request::is('myServers'))--}}
                                    {{--<a href="{{ route('addServer') . '?g=' . $game ?? '' }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('addServer')) lkMenuActive @endif">--}}
                                            {{--<span class="vnutItemMenu" style="border-top: 0;"><span--}}
                                                        {{--class="arrMenu">› </span>Добавить сервер</span>--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                    {{--<a href="{{ route('changePassword') }}"--}}
                                    {{--class="itemLkMenu @if(Request::is('changePasswordPage')) lkMenuActive @endif">--}}
                                    {{--<span class="vnutItemMenu"><span--}}
                                    {{--class="arrMenu">› </span>Сменить пароль</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('banners') }}"--}}
                                    {{--class="itemLkMenu @if(Request::is('ads')) lkMenuActive @endif">--}}
                                    {{--<span class="vnutItemMenu"><span--}}
                                    {{--class="arrMenu">› </span>Баннера и кнопки</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('privileges') }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('privilege')) lkMenuActive @endif">--}}
                                        {{--<span class="vnutItemMenu"><span class="arrMenu">› </span>VIP Профиль</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('ads') }}"--}}
                                       {{--class="itemLkMenu @if(Request::is('ads')) lkMenuActive @endif">--}}
                                        {{--<span class="vnutItemMenu"><span class="arrMenu">› </span>Реклама</span>--}}
                                    {{--</a>--}}
                                    {{--<a href="{{ route('logout') }}" class="itemLkMenu">--}}
                                            {{--<span class="vnutItemMenu" style="border-bottom: 0;"><span--}}
                                                        {{--class="arrMenu">› </span>Выйти</span>--}}
                                    </a>
                                </div>
                            </div>
                            @endif
                            <div class="segment-rek-sitebar">
                                <div class="bg-ramka-sitebar"></div>
                                <a href=""><img src="/img/rk/bn234.png" alt=""></a>
                            </div>
                            @guest
                                <div class="auth-block">
                                    <div class="title-auth">
                                        Профиль
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                                        @csrf
                                        <div class="form-auth">
                                            <input type="email" class="inpAuth" placeholder="Введите ваш email"
                                                   name="email"
                                                   value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="margin: 0">
                  <strong>Имя пользователя и пароль не совпадают.</strong>
              </span>
                                            @endif
                                            <input type="password" class="inpAuth" placeholder="Введите пароль"
                                                   name="password"
                                                   minlength="6">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" style="margin: 0">
                  <strong>Имя пользователя и пароль не совпадают.</strong>
              </span>
                                            @endif
                                            <div class="capcha">
                                                {!! Captcha::display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="error-message">Подтвердите капчу</span>
                                                @endif
                                            </div>
                                            <button class="authBtn"></button>
                                            <a href="{{ route('password.request') }}">Забыли пароль?</a>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            @section('scripts')
                                <script>$("#loginForm").validate();</script>
                            @endsection
                            @else
                                <div class="auth-block">
                                    <div class="title-auth">
                                        Информация
                                    </div>
                                    <form>
                                        <div class="form-auth">
                                            <div class="auth-autorize">
                                                Добро пожаловать, <span class="user-auth-name"><a
                                                            href="{{ route('profile') }}">{{ Auth::user()->name }}</a></span>
                                                <p class="line-user-uath"></p>
                                                <p>Предыдущий IP адрес: {{ $request->ip() }}</p>
                                                <p>Текущий IP адрес: {{ $_SERVER['REMOTE_ADDR'] }}</p>
                                                <p class="line-user-uath"></p>
                                                <p>Ваш баланс: {{ Auth::user()->balance }} рублей</p>
                                                <p class="line-user-uath"></p>
                                                @php
                                                    $vote = \MMORATE\Votes::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->first();
                                                @endphp
                                                <p>До голосования осталось: <span class="timer-uath"
                                                                                  @if(isset($vote) and $vote->created_at->isToday()) id="timeleft" @endif>00:00:00</span>
                                                </p>
                                                {{--<a href="{{ route('logout') }}" class="out-btn"><i><img src="/img/icon/i-9.png" alt=""></i> Выйти</a>--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="segment-rek-sitebar">
                                <div class="bg-ramka-sitebar"></div>
                                <a href=""><img src="/img/rk/bn234.png" alt=""></a>
                            </div>
                            <div class="bottom-sitebar">
                                <a href="{{ route('main') }}"><img src="/img/elements/logo-sitebar.png" alt=""></a>
                                <div class="miniRek">
                                    <a href=""></a>
                                    <a href=""></a>
                                    <a href=""></a>
                                </div>
                            </div>
                            {{--<div class="widget-block">--}}
                            {{--<div class="title-vk">--}}
                            {{--Группа Вконтакте--}}
                            {{--</div>--}}
                            {{--<div class="widget-vk">--}}
                            {{--<img src="/img/elements/widget.png" alt="">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="bottom-sitebar-vnut">--}}
                            {{--<div class="miniRek">--}}
                            {{--<a href=""></a>--}}
                            {{--<a href=""></a>--}}
                            {{--<a href=""></a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="clear"></div>
                        <div class="bg-bottom-content">
                            <div class="element-desing-4">
                                <img src="/img/elements/elem-4.png" alt="">
                            </div>
                        </div>
                    </div>
            </div>
            <footer>
                <div class="content-main">
                    <p class="text-info-footer">
                        Новые игровые сервера - открывающиеся или только что открытые игровые MMO миры.
                        <br> Благодаря огромной популярности, ежедневно открываются множество серверов с различными
                        рейтами (которые
                        влияют на скорость повышения уровня персонажа и добычу игровых предметов) и хрониками, а так же
                        с
                        уникальными модификациями и дополнениями.
                        <br>
                        <br> Играть на данных серверах вы можете абсолютно бесплатно, так как они носят лишь
                        ознакомительный
                        характер и не являются официальной версией игры.
                        <br>
                        <br>
                        <a href="">© 2018 MmoRate.com</a> - Мониторинг игровых серверов
                    </p>
                    <div class="social-footer">
                        <a href="" class="item-social vk-ico"></a>
                        <a href="" class="item-social fb-ico"></a>
                        <a href="" class="item-social twit-ico"></a>
                        <a href="" class="item-social mail-ico"></a>
                    </div>
                    <ul class="footer-menu">
                        <li>
                            <a href="{{ route('about') }}">О проекте</a>
                        </li>
                        <li>
                            <a href="{{ route('rules') }}">Правила</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts') }}">Контакты</a>
                        </li>
                        <li>
                            <a href="{{ route('support') }}">Техническая поддержка</a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}">Вопросы и ответы</a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </footer>
            <script type="text/javascript" src="{{ asset('/js/libs.min.js') }}"></script>
            {{--https://github.com/sitexw/FuckAdBlock--}}
            {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js"></script>--}}
            {{--http://igorescobar.github.io/jQuery-Mask-Plugin/--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
            {{--https://github.com/IonDen/ion.calendar--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ion.calendar/2.0.2/js/moment-with-locales.min.js"></script>
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/ion.calendar/2.0.2/css/ion.calendar.min.css"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ion.calendar/2.0.2/js/ion.calendar.min.js"></script>
            {{--https://github.com/knockout/knockout--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
            {{--https://github.com/jquery-validation/jquery-validation--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/localization/messages_ru.min.js"></script>
            {{--http://premiumsoftware.net/cleditor/--}}
            <link rel="stylesheet" href="{{ asset('js/cleditor/jquery.cleditor.css') }}"/>
            <script src="{{ asset('js/cleditor/jquery.cleditor.min.js') }}"></script>
            <script src="{{ asset('js/cleditor/jquery.cleditor.bbcode.min.js') }}"></script>
            {{--https://github.com/CodeSeven/toastr--}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
            <link rel="stylesheet" href="{{ asset('/css/toastr.style.css') }}"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            {{--https://github.com/sampotts/plyr--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.3/plyr.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.3/plyr.polyfilled.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.3/plyr.css"/>
            {{--http://kushagragour.in/lab/hint/--}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.5.0/hint.base.min.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.5.0/hint.min.css"/>
            {{--https://www.highcharts.com/--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.1.2/highcharts.js"></script>
            <!--[if lt IE 9]>
            <script src="https://code.highcharts.com/modules/oldie.js"></script>
            <![endif]-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.1.2/css/highcharts.css"/>
            <script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/js/common.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/js/flipclock.min.js') }}"></script>
            <link rel="stylesheet" href="{{ asset('/css/flipclock.css') }}"/>
        @yield('scripts')
</body>
</html>
