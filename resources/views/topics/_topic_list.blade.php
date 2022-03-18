@if (count($topics))
    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="media trans-img">
                <div class="media-left">
                    <a href="{{ route('users.show', [$topic->user_id]) }}">
                        <img class="media-object img-thumbnail mr-3" style="" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
                    </a>
                </div>

                <div class="media-body">
{{--                    <div class="media-heading mt-0 mb-1">--}}

{{--                        <a class="text-secondary btn btn-outline-primary btn-sm" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">--}}
{{--                            <i class="far fa-user"></i>--}}
{{--                            {{ $topic->user->name }}--}}
{{--                        </a>--}}
{{--                    </div>--}}

                    <div class="media-heading mt-0 mb-1 afont">
                        <a href="{{ route('topics.show',[$topic->id]) }}" title="{{ $topic->title }}" style="">
                            {{ $topic->title }}
                        </a>
{{--                        评论数量--}}
                        <a class="float-right" href="{{ route('topics.show',[$topic->id]) }}">
                            <span class="badge badge-secondary badge-pill"> {{ $topic->reply_count }} </span>
                        </a>
                    </div>

{{--                    文章内容展示--}}
                    <div class="media-heading mt-0 mb-1 cfont">
                        <a href="{{ route('topics.show',[$topic->id]) }}" title="{{ $topic->title }}" style="">
                            {{ $topic->title }}
                        </a>
                    </div>
{{--作者，时间，类型--}}
                    <div class="media-body meta text-secondary">
                        <div>
                            <a class="text-secondary" href="{{ route('categories.show', $topic->category_id) }}" title="{{ $topic->category->name }}">
                                <i class="far fa-folder"></i>
                                {{ $topic->category->name }}
                            </a>

                            <span> • </span>
                            <a class="text-secondary" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                                <i class="far fa-user"></i>
                                {{ $topic->user->name }}
                            </a>
                            <span> • </span>
                            <i class="far fa-clock"></i>
                            <span class="timeago" title="最后活跃于：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
                            {{--                        <span class="timeago" title="最后活跃于：{{ $topic->updated_at }}">--}}
                            {{--                            @if(if_query('order', 'recent'))--}}
                            {{--                                {{ $topic->created_at->diffForHumans() }}--}}
                            {{--                            @else--}}
                            {{--                                {{ $topic->updated_at->diffForHumans() }}--}}
                            {{--                            @endif--}}
                            {{--                        </span>--}}
                        </div>
                    </div>

                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif