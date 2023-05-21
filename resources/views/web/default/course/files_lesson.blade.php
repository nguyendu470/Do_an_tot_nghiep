@extends(getTemplate() . '.layouts.app')

@section('content')
    <link href="/assets/vendors/plyr/plyr.css" rel="stylesheet" />
    <section class="cart-banner position-relative text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">

                    <h1 class="font-30 text-white font-weight-bold">{{ $files->title }}</h1>

                    <div class="mt-20 font-16 font-weight-500 text-white">
                        <span>{{ trans('product.course') }}: <a href="{{ $course->getUrl() }}"
                                class="font-16 font-weight-500 text-white text-decoration-underline">{{ $course->title }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-10 mt-md-40">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="post-show mt-30">
                    @if ($files->storage == 'online' && $files->file_type == 'video')
                        <div class="plyr__video-embed" id="player">
                            <iframe height="500"
                                src="{{ $files->file }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                    @elseif($files->storage == 'local')
                        @if ($files->file_type == 'mp4')
                            <video id="player" playsinline controls>
                                <source src="{{ url($files->file) }}" type="video/mp4">
                            </video>
                        @elseif($files->file_type == 'webm')
                            <video id="player" playsinline controls>
                                <source src="{{ url($file->file) }}" type="video/webm">
                            </video>
                        @endif
                    @endif
                </div>

                {{-- tôi đã vượt qua bài giảng và button next tập --}}
                <div class="mt-30 row align-items-center">
                    {{-- <div class="col-12 col-md-5">
                        @if (auth()->check())
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer font-weight-500"
                                    for="readLessonSwitch">{{ trans('public.i_passed_this_lesson') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" id="fileReadToggle{{ $files->id }}"
                                        data-file-id="{{ $files->id }}" value="{{ $course->id }}"
                                        class="js-file-learning-toggle custom-control-input"
                                        @if (!empty($files->learningStatus)) checked @endif>
                                    <label class="custom-control-label" for="fileReadToggle{{ $files->id }}"></label>
                                </div>
                            </div>
                        @endif
                    </div> --}}

                    {{-- next bài giảng tiếp theo --}}
                    {{-- <div class="col-12 col-md-7 text-right">
                        @if (!empty($course->files) and count($course->files))
                            <a href="{{ !empty($previousLesson) ? $course->getUrl() . '/lessons/' . $previousLesson->id . '/watch' : '#' }}"
                                class="btn btn-sm {{ !empty($previousLesson) ? 'btn-primary' : 'btn-gray disabled' }}">{{ trans('public.previous_lesson') }}</a>

                            <a href="{{ !empty($nextLesson) ? $course->getUrl() . '/lessons/' . $nextLesson->id . '/watch' : '#' }}"
                                class="btn btn-sm {{ !empty($nextLesson) ? 'btn-primary' : 'btn-gray disabled' }}">{{ trans('public.next_lesson') }}</a>
                        @endif
                    </div> --}}
                </div>
            </div>

            <div class="col-12 col-lg-4">

                {{-- thong tin giáo viên --}}
                {{-- <div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column">
                    <div class="teacher-avatar mt-5">
                        <img src="{{ $course->teacher->getAvatar() }}" class="img-cover"
                            alt="{{ $course->teacher->full_name }}">
                    </div>
                    <h3 class="mt-10 font-20 font-weight-bold text-secondary">{{ $course->teacher->full_name }}</h3>
                    <span class="mt-5 font-weight-500 text-gray">{{ trans('product.product_designer') }}</span>

                    @include('web.default.includes.webinar.rate', ['rate' => $course->teacher->rates()])

                    <div class="user-reward-badges d-flex align-items-center mt-30">
                        @foreach ($course->teacher->getBadges() as $userBadge)
                            <div class="mr-15" data-toggle="tooltip" data-placement="bottom" data-html="true"
                                title="{!! !empty($userBadge->badge_id) ? nl2br($userBadge->badge->description) : nl2br($userBadge->description) !!}">
                                <img src="{{ !empty($userBadge->badge_id) ? $userBadge->badge->image : $userBadge->image }}"
                                    width="32" height="32"
                                    alt="{{ !empty($userBadge->badge_id) ? $userBadge->badge->title : $userBadge->title }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-25 d-flex flex-row align-items-center justify-content-center w-100">
                        <a href="{{ $course->teacher->getProfileUrl() }}" target="_blank"
                            class="btn btn-sm btn-primary teacher-btn-action">{{ trans('public.profile') }}</a>

                        @if (!empty($course->teacher->hasMeeting()))
                            <a href="{{ $course->teacher->getProfileUrl() }}"
                                class="btn btn-sm btn-primary teacher-btn-action ml-15">{{ trans('public.book_a_meeting') }}</a>
                        @else
                            <button type="button"
                                class="btn btn-sm btn-primary disabled teacher-btn-action ml-15">{{ trans('public.book_a_meeting') }}</button>
                        @endif
                    </div>
                </div> --}}

                {{-- buổi học theo chương trình --}}
                @if (!empty($course->files) and count($course->files))
                    <div class="shadow-sm rounded-lg bg-white px-15 px-md-25 py-20 mt-30">
                        <h3 class="category-filter-title font-16 font-weight-bold text-dark-blue">
                            {{ trans('public.course_sessions') }}</h3>

                        <div class="p-0 m-0 pt-10">
                            @foreach ($course->files as $lesson)
                                <a href="{{ $course->getUrl() }}/lessons/{{ $lesson->id }}/watch"
                                    class="d-block mt-10 px-10 py-15 rounded font-14 font-weight-500 text-ellipsis @if ($lesson->id == $files->id) bg-primary text-white @else bg-info-lighter text-dark-blue @endif">
                                    {{ $loop->iteration . '- ' . $lesson->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script>
        var learningToggleLangSuccess = '{{ trans('public.course_learning_change_status_success') }}';
        var learningToggleLangError = '{{ trans('public.course_learning_change_status_error') }}';
    </script>

    <script src="/assets/default/js/parts/text_lesson.min.js"></script>
    <script src="/assets/vendors/plyr/plyr.js"></script>
    <script>
        const player = new Plyr('#player');
    </script>
@endpush
