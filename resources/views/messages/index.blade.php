<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SMS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 30px;">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <form action="{{route('messages.index')}}" class="form-inline" style="float: left;">
                                <div class="form-group mb-2">
                                    <select class="form-control" style="min-width: 200px;" name="user"">
                                        <option {{!request()->has('user') || request()->get('user') == 'all' ? 'selected' : ''}} value="all">Hemmesi</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{request()->get('user') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="number" min="61000000" style="min-width: 200px;" max="65999999" class="form-control" name="phone" placeholder="Nomer" value="{{request()->get('phone')}}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Filtirle</button>
                            </form>
                            <button style="float: right;" type="button" data-toggle="modal" data-target="#create" class="btn btn-primary">Täze goş</button>
                        </div>
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{route('messages.store')}}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createTitle">Täze goş</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="phone">Telefon nomer</label>
                                                <input type="number" min="61000000" max="65999999" class="form-control" id="phone" name="phone" placeholder="Telefon nomer" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Hat</label>
                                                <textarea rows="5" class="form-control" id="message" name="message" placeholder="Hat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Yza</button>
                                            <button type="submit" class="btn btn-primary">Goş</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proýekt</th>
                                    <th scope="col">Nomer</th>
                                    <th scope="col">Hat</th>
                                    <th scope="col">Goşulan wagty</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$message->user->name ?? '-'}}</td>
                                        <td>{{$message->phone}}</td>
                                        <td>{{$message->message}}</td>
                                        <td>{{date('d-m-y H:i', strtotime($message->created_at))}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <th colspan="5">SMS tapylmady, entäk ugradylmandyr.</th>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-12">
                            {{ $messages->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
