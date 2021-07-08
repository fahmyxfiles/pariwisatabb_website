<div class="instagram_posts">
    <div class="posts">
    @foreach ($instagramPost as $post)
        <a class="post" href="https://instagram.com/p/{{ $post->code }}" target="_blank">
            <div class="sq_parent">
                <div class="sq_wrap">
                    <div class="sq_content">
                        <img src="{{ asset('storage/instagram/media/'.$post->filename) }}" alt="">
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    </div>
</div>