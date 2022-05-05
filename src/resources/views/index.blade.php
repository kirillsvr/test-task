<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание - Бондаренко К. В.</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <div class="left-header col horizontal-wrapper ps-0">
                <ul class="horizontal-menu">
                    <li class="mega-menu outside">
                        <a href="#!">
                            <span>Продукты</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        @role('admin')
                        <span>Иванов Иван Иванович</span>
                        @elserole
                        <span>Гость</span>
                        @endrole
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-body-wrapper">
        <div class="sidebar-wrapper">
            <div class="logo-wrapper">
                <div class="logo-block">
                    <a href="/">
                        <img class="img-fluid for-light" src="assets/images/logo/logo.png" alt="">
                    </a>
                </div>
                <div class="text-logo">
                    Enterprise <br>
                    Resource <br>
                    Planning
                </div>
            </div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links">
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/"><span>Продукты</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="page-body row">
            <div class="col-md-8">
                @if($products->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Артикул</th>
                        <th scope="col">Название</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Атрибуты</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="popup-open" data-name="view-product" data-id="{{$product->id}}">
                            <td class="article">{{$product->article}}</td>
                            <td class="name">{{$product->name}}</td>
                            <td class="status">@if($product->status === "available")Доступен @else Недоступен@endif</td>
                            <td class="attribute">
                                @if($product->data)
                                    @foreach($product->data as $data)
                                        <p class="attr-p"><span class="key">{{$data->name}}</span>: <span class="value">{{$data->value}}</span></p>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <p>Продукты не добавлены</p>
                @endif
            </div>
            <div class="col-md-4">
                <a class="btn buts-right popup-open" data-name="new-product">Добавить</a>
            </div>
        </div>
    </div>
</div>

<div class="popup-fade new-product">
    <div class="popup">
        <a class="popup-close" href="#"><img src="assets/images/Close_round.png" alt=""></a>
        <div class="popup-content">
            <div class="popup-header">Добавить продукт</div>
            <form action="{{route('store')}}" class="needs-validation popup-form new-product-form" novalidate="">
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="validationArticle">Артикул</label>
                    <div class="input-group">
                        <input class="form-control" id="validationArticle" name="article" type="text" aria-describedby="inputGroupPrepend" required="">
                        <div class="invalid-feedback">Пожалуйста заполните артикул.</div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="validationName">Название</label>
                    <div class="input-group">
                        <input class="form-control" id="validationName" name="name" type="text" aria-describedby="inputGroupPrepend" required="">
                        <div class="invalid-feedback">Пожалуйста заполните название.</div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="col-form-label">Статус</div>
                    <select class="js-example-basic-single col-sm-12 form-control" name="status">
                        <option value="available">Доступен</option>
                        <option value="unavailable">Недоступен</option>
                    </select>
                </div>
                <h6 class="mt-4 mb-3">Атрибуты</h6>
                <div class="cont-attributes" data-int="0"></div>
                <a href="" class="add-attribute">+ Добавить атрибут</a>
                <button type="submit" class="btn popup-form-button">Добавить</button>
            </form>
        </div>
    </div>
</div>

<div class="popup-fade view-product">
    <div class="popup">
        <div class="popup-icons">
            <a href="javascript:void(0)" class="icon-blocks ic-edit" data-id=""><img src="assets/images/small-edit.png" alt=""></a>
            <a href="javascript:void(0)" class="icon-blocks ic-trash" data-id=""><img src="assets/images/small-trash.png" alt=""></a>
        </div>
        <a class="popup-close" href="#"><img src="assets/images/Close_round.png" alt=""></a>
        <div class="popup-content">
            <div class="popup-header">MTOK-B2/216-1KT3645-K</div>
            <ul>
                <li class="article">
                    Артикул
                    <p></p>
                </li>
                <li class="name">
                    Название
                    <p></p>
                </li>
                <li class="status">
                    Статус
                    <p></p>
                </li>
                <li class="attribute">
                    Атрибут
                    <p></p>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="popup-fade edit-product">
    <div class="popup">
        <a class="popup-close" href="#"><img src="assets/images/Close_round.png" alt=""></a>
        <div class="popup-content">
            <div class="popup-header">Добавить продукт</div>
            <form action="" id="edit-prod" class="needs-validation popup-form edit-product-form" novalidate="" data-id="">
                @role('admin')
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="validationArticleEdit">Артикул</label>
                    <div class="input-group">
                        <input class="form-control" id="validationArticleEdit" name="article" type="text" aria-describedby="inputGroupPrepend" required="">
                        <div class="invalid-feedback">Пожалуйста заполните артикул.</div>
                    </div>
                </div>
                @endrole
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="validationNameEdit">Название</label>
                    <div class="input-group">
                        <input class="form-control" id="validationNameEdit" name="name" type="text" aria-describedby="inputGroupPrepend" required="">
                        <div class="invalid-feedback">Пожалуйста заполните название.</div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="col-form-label">Статус</div>
                    <select class="js-example-basic-single col-sm-12 form-control" name="status">
                        <option value="available">Доступен</option>
                        <option value="unavailable">Недоступен</option>
                    </select>
                </div>
                <h6 class="mt-4 mb-3">Атрибуты</h6>
                <div class="cont-attributes" data-int="0"></div>
                <a href="" class="add-attribute">+ Добавить атрибут</a>
                <button type="submit" class="btn popup-form-button popup-form-button-edit">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<div class="popup-fade popup-message popup-success">
    <div class="popup">
        <a class="popup-close" href="#"><img src="assets/images/Close_round.png" alt=""></a>
        <div class="popup-success-content">
            <div class="popup-header">Готово</div>
            <div class="popup-text"></div>
            <div class="popup-button">
                <a href="javascript:void(0)" class="btn popup-form-button btn-ok">Ок</a>
            </div>
        </div>
    </div>
</div>
<div class="popup-fade popup-message popup-error">
    <div class="popup">
        <a class="popup-close" href="#"><img src="assets/images/Close_round.png" alt=""></a>
        <div class="popup-success-content">
            <div class="popup-header">Ошибка</div>
            <div class="popup-text"></div>
            <div class="popup-button">
                <a href="javascript:void(0)" class="btn popup-form-button btn-ok">Ок</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
