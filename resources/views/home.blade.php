@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Academic Path</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <quick-menu :icon-class='["fa fa-graduation-cap","fa fa-book","fa fa-users","fa fa-sign-out-alt"]'
                                    :menu-url-list='["https://github.com/AshleyLv/vue-quick-menu","https://www.npmjs.com/package/vue-quick-menu","http://www.wheelsfactory.cn/","http://www.wheelsfactory.cn/"]'>
                        </quick-menu>
                        <polar-area :graphData='[1,2,4,5,2,5,3,3]'></polar-area>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
