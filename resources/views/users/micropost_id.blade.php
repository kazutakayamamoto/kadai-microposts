@if (count($micropost_id) > 0)
    <ul class="list-unstyled">
        @foreach ($micropost_id as $id)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $id->user->name, ['user' => $id->user->id]) !!}
                        <span class="text-muted">posted at {{ $id->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($id->content)) !!}</p>
                    </div>
                </div>
                @if (Auth::user()->is_favorite($id->id))
                    {{-- アンフォローボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.unfavorite', $id->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
                    {!! Form::close() !!}
                @else
                    {{-- フォローボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.favorite', $id->id]]) !!}
                        {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
                    {!! Form::close() !!}
                @endif
            </li>
        @endforeach
    </ul>
@endif