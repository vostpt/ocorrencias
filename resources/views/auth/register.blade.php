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
                <p class="text-center py-2">Por favor registe a sua conta</p>
                <form class="mb-3" id="registerForm" novalidate method="post" action="{{ url('/register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="text-muted" for="name">Nome</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   id="name" type="text" name="name"
                                   placeholder="Escreva o seu nome" autocomplete="off" required>
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-user"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="email">Email address</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   id="email" type="email" name="email"
                                   placeholder="Escreva o seu e-mail" autocomplete="off" required>
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-envelope"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="password">Password</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   id="password" type="password"
                                   placeholder="Password" autocomplete="off" required name="password">
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-lock"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="signupInputRePassword1">Repita a Password</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0 {{ $errors->has('password_confirm') ? 'is-invalid' : '' }}"
                                   id="signupInputRePassword1" type="password"
                                   placeholder="Repita a Password" autocomplete="off" required
                                   name="password_confirmation">
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-lock"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signupCode">Código de registo</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0 {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                   id="signupCode" type="text"
                                   placeholder="Código de registo" autocomplete="off" required name="code">
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-key"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->isNotEmpty())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <button class="btn btn-block btn-primary mt-3" type="submit">Criar a sua conta</button>
                </form>
                <p class="pt-3 text-center">Já tem uma conta?</p>
                <a class="btn btn-block btn-secondary" href="{{ route('login') }}">Login</a>
            </div>
        </div>
        <!-- END card-->
        <div class="p-3 text-center">
            <span class="mr-2">&copy;</span>
            <span>2019</span>
            <span class="mr-2">-</span>
            <span>Angle</span>
            <br>
            <span>Bootstrap Admin Template</span>
        </div>
    </div>
@endsection