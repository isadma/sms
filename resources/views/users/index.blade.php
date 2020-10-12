<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proýektler
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 30px;">
                    <div class="row">
                        <div class="col-12 col-md-12 text-right">
                            <button type="button" data-toggle="modal" data-target="#create" class="btn btn-primary">Täze goş</button>
                        </div>
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{route('users.store')}}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createTitle">Täze goş</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Proýektiň ady</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Ady" required>
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
                                    <th scope="col">Ady</th>
                                    <th scope="col">Token</th>
                                    <th scope="col">Goşulan wagty</th>
                                    <th scope="col">Goşmaça</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->token}}</td>
                                        <td>{{date('d-m-y H:i', strtotime($user->created_at))}}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam şu proýekti pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-danger btn-sm">Poz</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <th colspan="5">Proýekt tapylmady, entäk goşulmandyr</th>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
