@extends('layouts.backend')

@section('title', __('Links').'  >  '. $authorName)

@section('content')
    <main>
        <div class="common-card-style">
            <div class="card_header__v2">
                <div class="w-1/2">
                    <span class="text-2xl text-uh-1">
                        {{__('Links created by :author', ['author' => $authorName])}}
                    </span>
                </div>
            </div>

            @include('partials/messages')

            @livewire('table.UrlListOfUsersTable', ['user_id' => $authorId])
        </div>
    </main>
@endsection
