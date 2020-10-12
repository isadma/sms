<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Docs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 30px;">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <ol>
                                <li>
                                    Ilki bilen, <a href="{{route('users.index')}}">Proýektler</a> sahypasyndan täze proýekt goşuň. Goşaňyzdan soň size <code>token</code> beriler.
                                    Girizilen proýektiň backend developerine <code>token</code> beriň. <code>token</code> gizlin ýagdaýynda saklanmalydyr, ýogsam <code>SMS APP</code> proýekt kellä geýiler.
                                </li>

                                <li class="mt-5">
                                    Backend developeriň sms ugradyp bilmesi üçin aşakdaky bellenilen adrese, bellenilen parametrler bilen <code>request</code> ugratmaly.
                                </li>

                                <li class="mt-2 ml-5">
                                    <div class="row">
                                        <div class="col-12">Adres:</div>
                                        <div class="col-12">
                                            <code>{{route('api.message.store')}}</code>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">Headers:</div>
                                        <div class="col-12">
                                            <table border="0">
                                                <tr>
                                                    <td><code>Content-Type:</code></td>
                                                    <td><code>application/json</code></td>
                                                </tr>
                                                <tr>
                                                    <td><code>Accept:</code></td>
                                                    <td><code>application/json</code></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 150px;"><code>Authorization:</code></td>
                                                    <td><code>Bearer {token}</code></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">Body:</div>
                                        <div class="col-12">
                                            <table border="0">
                                            <tr>
                                                <td><code>phone:</code></td>
                                                <td><code>required|integer|between:61000000,65999999</code></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 150px;"><code>message:</code></td>
                                                <td><code>required|string</code></td>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
