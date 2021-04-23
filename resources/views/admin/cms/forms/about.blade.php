{{--{{dd($data)}}--}}
<div class="row">
    <div class="col">
        <input type="text" name="title" value="{{$data['title']}}" class="form-control" placeholder="Title">
    </div>
    <div class="col">
        <input type="text" name="desc" value="{{$data['desc']}}" class="form-control" placeholder="desc">
    </div>
</div>

<div class="row">
    <div class="col">
        <input type="text" name="mission_title" value="{{$data['mission_title']}}" class="form-control" placeholder="Title">
    </div>
    <div class="col">
        <input type="text" name="mission_desc" value="{{$data['mission_desc']}}" class="form-control" placeholder="desc">
    </div>
</div>

<div class="row">
    <div class="col">
        <input type="text" name="vision_title" value="{{$data['vision_title']}}" class="form-control" placeholder="Title">
    </div>
    <div class="col">
        <input type="text" name="vision_desc" value="{{$data['vision_desc']}}" class="form-control" placeholder="desc">
    </div>
</div>

<div class="row">
    <div class="col">
        <input type="url" name="video" value="{{$data['video']}}" class="form-control" placeholder="Video">
    </div>
</div>

<div class="row">
    <div class="col">
        <input type="file" name="image1" value="{{$data['image1']}}" class="form-control" placeholder="Image1">
        <input type="file" name="image2" value="{{$data['image2']}}" class="form-control" placeholder="Image2">
        <input type="file" name="image3" value="{{$data['image3']}}" class="form-control" placeholder="Image3">
        <input type="file" name="image4" value="{{$data['image4']}}" class="form-control" placeholder="Image4">
    </div>

</div>



