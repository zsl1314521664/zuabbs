@if (count($lists))
    <ul class="list-unstyled">
        @foreach ($lists as $list)
            <li class="media trans-img">
                <div class="media-left">
                    <a href="{{ route('users.show', [$list->user_id]) }}">
                        <img class="media-object img-thumbnail mr-3" style="" src="{{ $list->user->avatar }}" title="{{ $list->user->name }}">
                    </a>
                </div>

                <div class="media-body">
                    <div class="media-heading mt-0 mb-1 afont">
                        <a href="{{ route('topics.show',[$list->id]) }}" title="{{ $list->title }}" style="">
                            {{ $list->title }}
                        </a>
                        {{--                        评论数量--}}
                        <a class="float-right" href="{{ route('topics.show',[$list->id]) }}">
                            <span class="badge badge-secondary badge-pill"> {{ $list->reply_count }} </span>
                        </a>
                    </div>

                    {{--                    文章内容展示--}}
                    <div class="media-heading mt-0 mb-1 cfont">
                        <a href="{{ route('topics.show',[$list->id]) }}" title="{{ $list->title }}" style="">
                            {{ $list->title }}
                        </a>
                    </div>
                    {{--作者，时间，类型--}}
                    <div class="media-body meta text-secondary">
                        <div>
                            <a class="text-secondary" href="{{ route('categories.show', $list->category_id) }}" title="{{ $list->category->name }}">
                                <i class="far fa-folder"></i>
                                {{ $list->category->name }}
                            </a>

                            <span> • </span>
                            <a class="text-secondary" href="{{ route('users.show', [$list->user_id]) }}" title="{{ $list->user->name }}">
                                <i class="far fa-user"></i>
                                {{ $list->user->name }}
                            </a>
                            <span> • </span>
                            <i class="far fa-clock"></i>
                            <span class="timeago" title="最后活跃于：{{ $list->updated_at }}">{{ $list->updated_at->diffForHumans() }}</span>
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