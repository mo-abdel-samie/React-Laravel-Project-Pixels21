<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Content;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{

    public function index() {

        return view('admin/index') ;
    }
    
    
    
    
    
    
    public function showSections () {
        $sections = Content::all();
//        dd($sections);
        return view('admin.cms.sections', ['sections'=>$sections]) ;
    }

    // array contains inputs of every section with input types
    public $sections = [
        'home_header'=> [
            'text'=> [
                'facebook-icon'=>'required|string',
                'twitter-icon'=>'required|string',
                'youtube-icon'=>'required|string',
                'linkedin-icon'=>'required|string',
            ],
            'url'=>[
                'facebook-link'=>'required|url',
                'twitter-link'=>'required|url',
                'youtube-link'=>'required|url',
                'linkedin-link'=>'required|url',
            ],
            'file'=>[
                'background-image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
                'slogan-image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            ],
        ],
        'home_slogan'=>[
            'text'=>[
                'title1'=>'required|string',
                'icon1'=>'required|string',
                'title2'=>'required|string',
                'icon2'=>'required|string',
                'title3'=>'required|string',
                'icon3'=>'required|string',
            ],

        ],
        'home_about'=>[
            'text'=>[
                'section-title'=>'required|string',
                'section-desc'=>'required|string',
                'mission-title'=>'required|string',
                'mission-desc'=>'required|string',
                'vision-title'=>'required|string',
                'vision-desc'=>'required|string',
            ],
            'url'=>[
                'video'=>'required|url',
            ],
            'file'=>[
                'image1'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
                'image2'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
                'image3'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
                'image4'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            ],

        ],
        'home_statistics'=>[
            'text'=> [
                'icon1'=>'required|string',
                'icon2'=>'required|string',
                'icon3'=>'required|string',
                'icon4'=>'required|string',
                'title1'=>'required|integer',
                'title2'=>'required|integer',
                'title3'=>'required|integer',
                'title4'=>'required|string',
            ],
        ],
        'home_supervisor'=>[
            'text'=>[
                'section-title'=>'required|string',
                'supervisor-name'=>'required|string',
                'video-icon'=>'required|string',
            ],
            'file'=>[
                'image1'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
                'image2'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            ],
        ],
        'about_header'=>[
            'text'=>[
                'info-title'=>'required|string',
                'info-desc1'=>'required|string',
                'info-desc2-left-title'=>'required|string',
                'info-desc2-left-desc'=>'required|string',
                'info-desc2-right-title'=>'required|string',
                'info-desc2-right-desc'=>'required|string',
                'facebook-icon'=>'required|string',
                'twitter-icon'=>'required|string',
                'youtube-icon'=>'required|string',
                'linkedin-icon'=>'required|string',
            ],
            'url'=>[
                'facebook-link'=>'required|url',
                'twitter-link'=>'required|url',
                'youtube-link'=>'required|url',
                'linkedin-link'=>'required|url',
            ],
            'file'=>[
                'background-image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            ],
        ],
        'about_slogan'=>[
            'text'=>[
                'title'=>'required|string',
            ],
            'file'=>[
                'image'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
            ],
        ],
        'about_FAQ'=> [
            'text'=>[
                'section_title'=>'required|string',
                'section_subtitle'=>'required|string',
                'section_desc'=>'required|string',
                'icon'=>'required|string',
            ],
        ],
        'projects_header'=>[
            'text'=>[
                'section-title'=>'required|string',
            ],
            'file'=>[
                'projects-video'=>'mimetypes:video/avi,video/mp4,video/webm,video/mpeg,video/quicktime',
                'background-image'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
                'slogan-image'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
            ],
        ],
        'courses'=>[
            'text'=>[
                'courses-title'=>'required|string',
                'instructors-title'=>'required|string',
            ],
        ],
        'course_item'=>[
            'text'=>[
                'course-link'=>'required|string',
                'rate-icon'=>'required|string',
            ],
        ],
        'footer'=>[
            'text'=>[
                'links-title'=>'required|string',
                'links-icon'=>'required|string',
                'section-desc1'=>'required|string',
                'copy-rights'=>'required|string',
                'facebook-icon'=>'required|string',
                'twitter-icon'=>'required|string',
                'youtube-icon'=>'required|string',
                'linkedin-icon'=>'required|string',
            ],
            'url'=>[
                'facebook-link'=>'required|url',
                'twitter-link'=>'required|url',
                'youtube-link'=>'required|url',
                'linkedin-link'=>'required|url',
            ],
            'file'=>[
                'logo-image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            ],
        ],
    ];

    public function showSectionForm ($id) {
        $section = Content::find($id);
//        dd($section->section_content);
        // convert data into associative array
        $data = json_decode($section->section_content, true);
//        dd(is_array($data));
        // return section data and section of same name in sections array
        return view('admin.cms.form', ['id'=>$section->id, 'section_name'=>$section->section_name, 'data'=>$data, 'sectionInputTypes'=>$this->sections[$section->section_name],]);
    }



    public function updateSection (Request $request, $id) {
        $section = Content::find($id);
        $sectionInputs = $this->sections[$section->section_name];

//        $inputTypes=[];
        foreach ($sectionInputs as $type=>$inputs) {
            $inputType = $type;
            $$inputType = $inputs;
            // get array contains array of inputs of each section type
            $data[]= $$inputType;
//            $inputTypes[$inputType] += $$inputType;
        }

        $validated = [];
        if (count($data)>1) {
            for ($i=count($data)-1;$i>0;$i--) {
                // Merge the data inputs in one array
                $validated += array_merge($data[$i],$data[$i-1]);
            }
        } else {
            $validated = $data[0];
        }
        $validated = $request->validate($validated);
//        dd($validated);
//        dd(is_file($validated['image1']));

        if (array_key_exists('file', $sectionInputs)) {
            foreach ($validated as $key => $input) {
                if(is_file($input)) {
                    $fileNameWithExt = $input->getClientOriginalName();

                    // Delete old file
                    $exists = Storage::disk('local')->exists('public/images/cms/'.$fileNameWithExt);
                    if ($exists) {
                        Storage::delete('public/images/cms/'.$fileNameWithExt);
                    }

                    // Upload new file
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $input->getClientOriginalExtension();
                    $fileNameToStore = $fileName.'.'.$extension;
                    $path = $input->storeAs('public/images/cms/', $fileNameToStore);
                    $validated[$key] = $path;
                }
//                dd($input);
            }
//            dd($validated);
        }

        Content::where('id',$id)->update(['section_content'=>$validated]);

        return redirect()->route('admin.sections');
    }
}
