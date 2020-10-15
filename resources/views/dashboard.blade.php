<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Esasy sahypa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 30px;">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-4">{{$users->where('type', 'project')->count()}}</h1>
                                    <p class="lead">Proýektleriň</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-4">{{$messagesToday}}</h1>
                                    <p class="lead">Şugünki ugradylan smsleriň sany</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-4">{{$messagesAll}}</h1>
                                    <p class="lead">Jemi ugradylan smsleriň sany</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($users) > 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div style="padding: 30px;">
                        <div class="row mt-2 mb-2">
                            <div class="col-12 border-bottom">
                                <h3>Proýektler boýunça</h3>
                            </div>
                        </div>
                        @foreach($users as $user)
                                <div class="row mb-2">
                                    <div class="col-12 col-md-4">
                                        <div class="jumbotron jumbotron-fluid">
                                            <div class="container">
                                                <h1 class="display-4">{{$user->name}}</h1>
                                                <p class="lead">Proýekt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="jumbotron jumbotron-fluid">
                                            <div class="container">
                                                <h1 class="display-4">{{$user->todayMessagesCount()}}</h1>
                                                <p class="lead">Şugünki ugradylan smsleriň sany</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="jumbotron jumbotron-fluid">
                                            <div class="container">
                                                <h1 class="display-4">{{$user->messages->count()}}</h1>
                                                <p class="lead">Jemi ugradylan smsleriň sany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
