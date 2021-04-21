{{--{{dd($data)}}--}}
<div class="">
    <div class="row form-group">
        <div class="col">
            <input type="text" name="info-title" value="{{$data['info-title']}}" class="form-control" placeholder="info-title">
        </div>
        <div class="col">
            <input type="text" name="info-desc1" value="{{$data['info-desc1']}}" class="form-control" placeholder="info-desc1">
        </div>
    </div>

    <div class="row form-group">
        <div class="col">
            <input type="text" name="info-desc2-left-title" value="{{$data['info-desc2-left-title']}}" class="form-control" placeholder="info-desc2-left-title">
        </div>
        <div class="col">
            <input type="text" name="info-desc2-left-desc" value="{{$data['info-desc2-left-desc']}}" class="form-control" placeholder="info-desc2-left-desc">
        </div>
    </div>

    <div class="row form-group">
        <div class="col">
            <input type="text" name="info-desc2-right-title" value="{{$data['info-desc2-right-title']}}" class="form-control" placeholder="info-desc2-right-title">
        </div>
        <div class="col">
            <input type="text" name="info-desc2-right-desc" value="{{$data['info-desc2-right-desc']}}" class="form-control" placeholder="info-desc2-right-desc">
        </div>
    </div>
</div>

<div class="social-links">
    <div class="row form-group">
        <div class="col">
            <input type="text" name="facebook-icon" value="{{$data['facebook-icon']}}" class="form-control" placeholder="facebook-icon">
        </div>
        <div class="col">
            <input type="url" name="facebook-link" value="{{$data['facebook-']}}" class="form-control" placeholder="facebook-link">
        </div>
    </div>

    <div class="row form-group social-links">
        <div class="col">
            <input type="text" name="twitter-icon" value="{{$data['twitter-icon']}}" class="form-control" placeholder="twitter-icon">
        </div>
        <div class="col">
            <input type="url" name="twitter-link" value="{{$data['twitter-']}}" class="form-control" placeholder="twitter-link">
        </div>
    </div>

    <div class="row form-group social-links">
        <div class="col">
            <input type="text" name="youtube-icon" value="{{$data['youtube-icon']}}" class="form-control" placeholder="youtube-icon">
        </div>
        <div class="col">
            <input type="url" name="youtube-link" value="{{$data['youtube-']}}" class="form-control" placeholder="youtube-link">
        </div>
    </div>

    <div class="row form-group social-links">
        <div class="col">
            <input type="text" name="linkedin-icon" value="{{$data['linkedin-icon']}}" class="form-control" placeholder="linkedin-icon">
        </div>
        <div class="col">
            <input type="url" name="linkedin-link" value="{{$data['linkedin-']}}" class="form-control" placeholder="linkedin-link">
        </div>
    </div>
</div>
