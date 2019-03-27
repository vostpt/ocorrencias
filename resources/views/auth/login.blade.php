@extends('_layouts.main')

@section('content')
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center bg-dark">
                <a href="#">
                    VOST.PT
                </a>
            </div>
            <div class="card-body">
                <p class="text-center py-2">Entrada na plataforma VOST Portugal</p>
                <form class="mb-3" id="loginForm" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" id="email" type="email"
                                   placeholder="E-mail" autocomplete="off" required name="email">
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-envelope"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" id="password" type="password"
                                   placeholder="Password" required name="password">
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-lock"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="checkbox c-checkbox float-left mt-0">
                            <label>
                                <input type="checkbox" value="" name="remember">
                                <span class="fa fa-check"></span> Lembrar a minha sessão</label>
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary mt-3" type="submit">Entrar</button>
                </form>
                <p class="pt-3 text-center">Precisa de se registar?</p>
                <a class="btn btn-block btn-secondary" href="{{ route('register') }}">Criar conta</a>
            </div>
        </div>
    </div>

@endsection