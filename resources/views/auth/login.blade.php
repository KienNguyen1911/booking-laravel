@extends('auth.form')

@section('login')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    {{-- START FORM LOGIN --}}
                                    <form role="form" method="post" action="{{ route('login.store') }}">
                                        @csrf
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <x-text-input type="email" name="email" class="form-control"
                                                placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <x-text-input type="password" name="password" class="form-control"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                                                Signin
                                            </button>
                                            @if (Session::has('errors'))
                                                <div class="alert alert-danger mt-2 text-white">
                                                    Your email or password is incorrect
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                    {{-- END FORM LOGIN --}}
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="/register" class="text-info text-gradient font-weight-bold">
                                            Signup
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('admin/img/curved-images/curved6.jpg')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
