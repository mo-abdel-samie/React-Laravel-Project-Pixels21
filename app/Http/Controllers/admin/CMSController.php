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

    public $sections = [
        'about_header'=>[
            'text'=>[
                'info-title'=>'required',
                'info-desc1'=>'required',
                'info-desc2-left-title'=>'required',
                'info-desc2-left-desc'=>'required',
                'info-desc2-right-title'=>'required',
                'info-desc2-right-desc'=>'required',
                'facebook-icon'=>'required',
                'twitter-icon'=>'required',
                'youtube-icon'=>'required',
                'linkedin-icon'=>'required',

            ],
            'url'=>[
                'facebook-link'=>'required',
                'twitter-link'=>'required',
                'youtube-link'=>'required',
                'linkedin-link'=>'required',
            ],
        ],
        'about'=>[
            'text'=>[
                'title'=>'required',
                'desc'=>'required',
                'mission_title'=>'required',
                'mission_desc'=>'required',
                'vision_title'=>'required',
                'vision_desc'=>'required',
            ],
            'url'=>[
                'video'=>'required',
            ],
            'file'=>[
                'image1'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
                'image2'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
                'image3'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
                'image4'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
            ],

        ],
        'about_slogan'=>[
            'text'=>[
                'title'=>'required',
            ],
            'file'=>[
                'image'=>'required|file|image|mimes:jpg,jpeg,png|max:5000',
            ],
        ],
        'slogan'=>[
            'text'=>[
                'title1'=>'required',
                'icon1'=>'required',
                'title2'=>'required',
                'icon2'=>'required',
                'title3'=>'required',
                'icon3'=>'required',
            ],

        ],
    ];

    public function showSectionForm ($id) {
        $section = Content::find($id);
//        dd($section->section_content);
        $data = json_decode($section->section_content, true);
//        dd(is_array($data));
        return view('admin.cms.form', ['id'=>$section->id, 'section_name'=>$section->section_name, 'data'=>$data, 'sectionInputTypes'=>$this->sections[$section->section_name],]);
    }



    public function updateSection (Request $request, $id) {
        $section = Content::find($id);
        $sectionInputs = $this->sections[$section->section_name];

        $inputTypes=[];
        foreach ($sectionInputs as $type=>$inputs) {
            $inputType = $type;
            $$inputType = $inputs;
            $data[]= $$inputType;
            $inputTypes[$inputType] = $$inputType;
        }

        $validated = [];
        if (count($data)>1) {
            for ($i=count($data)-1;$i>0;$i--) {
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
