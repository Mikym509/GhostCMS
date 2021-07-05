<x-layout>
    <x-slot name="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="text-align:center">Your Profile</h1>
                    <form id="edit" method="post" action="/dashboard/{{ $LoggedUserInfo->username }}/update">
                        @csrf

                        <div class="rowEdit row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <label for="Email" class="labelFormEdit">Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="inputFormEdit" style="font-size:4.5vmin;" value="{{ $LoggedUserInfo->name }}">
                            </div>
                        </div>

                        <div class="rowEdit row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <label for="Email" class="labelFormEdit">Last name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="surname" class="inputFormEdit" style="font-size:4.5vmin;" value="{{ $LoggedUserInfo->surname }}">
                            </div>
                        </div>

                        <div class="rowEdit row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <label for="Email" class="labelFormEdit">Username </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="inputFormEdit" style="font-size:4.5vmin;" value="{{ $LoggedUserInfo->username }}">
                            </div>
                        </div>

                        <div class="rowEdit row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <label for="Email" class="labelFormEdit">Email</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="inputFormEdit" style="font-size:4.5vmin;" value="{{ $LoggedUserInfo->email }}">
                            </div>

                        </div>

                        <div class="rowEdit row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8" style="text-align:right">
                                <input type="submit" class="btnEdit" name="btnSign" value="Save">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
