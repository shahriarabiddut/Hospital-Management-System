<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Education;
use App\Models\Experience;
use App\Models\LanguageSkill;
use App\Models\ProfileBio;
use App\Models\Skill;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index(){
        return view('profile.dashboard');
    }
    public function index2(){
        return redirect()->route('student.dashboard');
    }
    /**
     * Display the user's profile form.
     */
    public function view(Request $request): View
    {
        return view('profile.partials.view', [
            'user' => $request->user(),
        ]);
    }
   
    
    public function edit(Request $request): View
    {
        return view('profile.partials.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = Student::find($request->userid);
        $formFields = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);
        //If user Gieven address
        if($request->has('address')){
            $formFields['address'] = $request->address;
        }
        //If user Gieven any PHOTO
        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('StudentPhoto','public');
        }else{
            $formFields['photo'] = $request->prev_photo;
        }

        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->photo = $formFields['photo'];

        $data->save();

        return Redirect::route('student.profile.view')->with('success', 'Profile Updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function appointment()
    {
        $departments = Department::all();
        return view('0pages.appointment', ['departments' => $departments]);
    }
    public function cvhome(string $id)
    {
        $user = Student::all()->where('id','=',$id)->first();
        $language = LanguageSkill::all()->where('user_id','=',$user->id);
        $skills = Skill::all()->where('user_id','=',$user->id);
        $education = Education::all()->where('user_id','=',$user->id);
        $experience = Experience::all()->where('user_id','=',$user->id);
        $bio = ProfileBio::all()->where('user_id','=',$user->id)->first();

        return view('cvview', [
            'user' => $user, 'language' => $language,'skills' => $skills,'education' => $education,'bio' => $bio,'experience' => $experience,
        ]);
    }
    public function cvview()
    {
        $user = Auth::user();
        $language = LanguageSkill::all()->where('user_id','=',$user->id);
        $skills = Skill::all()->where('user_id','=',$user->id);
        $education = Education::all()->where('user_id','=',$user->id);
        $experience = Experience::all()->where('user_id','=',$user->id);
        $bio = ProfileBio::all()->where('user_id','=',$user->id)->first();

        return view('profile.partials.cv', [
            'user' => $user, 'language' => $language,'skills' => $skills,'education' => $education,'bio' => $bio,'experience' => $experience,
        ]);
    }
    public function langadd()
    {
        return view('profile.cv.langadd');
    }
    public function langaddition(Request $request)
    {
        $data = new LanguageSkill();
        $request->validate([
            'language' => 'required',
            'fluency' => 'required',
        ]);
        $data->user_id= $request->user_id;
        $data->language= $request->language;
        $data->fluency= $request->fluency;
        $data->save();

        return Redirect::route('student.profile.cvview')->with('success', 'Language Updated');
    }
    public function editlang(string $id)
    {
        $user = Auth::user();
        $language = LanguageSkill::all()->where('id','=',$id)->where('user_id','=',$user->id)->first();
        return view('profile.cv.editlang', [
            'language' => $language
        ]);
    }
    public function updatelang(Request $request)
    {
        $data = LanguageSkill::find($request->id);
        $request->validate([
            'language' => 'required',
            'fluency' => 'required',
        ]);
        $data->language= $request->language;
        $data->fluency= $request->fluency;
        $data->save();
        return Redirect::route('student.profile.cvview')->with('success', 'Language Updated Successfully!');
    }
    public function langdestroy($id)
    {
        $data = LanguageSkill::find($id);
        $data->delete();
        return Redirect::route('student.profile.cvview')->with('danger','Data has been deleted Successfully!');

    }
    public function skill()
    {
        return view('profile.cv.skill');
    }
    public function skilladd(Request $request)
    {
        $data = new Skill();
        $request->validate([
            'skill' => 'required',
            'skilldetail' => 'required',
        ]);
        $data->user_id= $request->user_id;
        $data->skill= $request->skill;
        $data->skilldetail= $request->skilldetail;
        $data->save();

        return Redirect::route('student.profile.cvview')->with('success', 'Skill Updated');
    }
    public function editskill(string $id)
    {
        $user = Auth::user();
        $skill = Skill::all()->where('id','=',$id)->where('user_id','=',$user->id)->first();
        return view('profile.cv.editskill', [
            'skill' => $skill
        ]);
    }
    public function updateskill(Request $request)
    {
        $data = Skill::find($request->id);
        $request->validate([
            'skill' => 'required',
            'skilldetail' => 'required',
        ]);
        $data->skill= $request->skill;
        $data->skilldetail= $request->skilldetail;
        $data->save();
        return Redirect::route('student.profile.cvview')->with('success', 'Skill Updated Successfully!');
    }
    public function skilldestroy($id)
    {
        $data = Skill::find($id);
        $data->delete();
        return Redirect::route('student.profile.cvview')->with('danger','Data has been deleted Successfully!');

    }

    public function education()
    {
        return view('profile.cv.education');
    }
    public function educationadd(Request $request)
    {
        $data = new Education();
        $request->validate([
            'degree' => 'required',
            'grade' => 'required',
            'board' => 'required',
            'institution' => 'required',
            'year' => 'required',
        ]);
        $data->user_id= $request->user_id;
        $data->degree= $request->degree;
        $data->grade= $request->grade;
        $data->board= $request->board;
        $data->institution= $request->institution;
        $data->year= $request->year;
        $data->save();

        return Redirect::route('student.profile.cvview')->with('success', 'Skill Updated');
    }
    public function editeducation(string $id)
    {
        $user = Auth::user();
        $education = Education::all()->where('id','=',$id)->where('user_id','=',$user->id)->first();
        return view('profile.cv.editeducation', [
            'education' => $education
        ]);
    }
    public function updateeducation(Request $request)
    {
        $data = Education::find($request->id);
        $request->validate([
            'degree' => 'required',
            'grade' => 'required',
            'board' => 'required',
            'institution' => 'required',
            'year' => 'required',
        ]);
        $data->degree= $request->degree;
        $data->grade= $request->grade;
        $data->board= $request->board;
        $data->institution= $request->institution;
        $data->year= $request->year;
        $data->save();
        return Redirect::route('student.profile.cvview')->with('success', 'Education Updated Successfully!');
    }
    public function educationdestroy($id)
    {
        $data = Education::find($id);
        $data->delete();
        return Redirect::route('student.profile.cvview')->with('danger','Data has been deleted Successfully!');

    }
    public function bio()
    {
        $user = Auth::user();
        $bio = ProfileBio::all()->where('user_id','=',$user->id)->first();
        if($bio==null){
            return view('profile.cv.bio');
        }else{
            return redirect()->back();
        }
    }
    public function bioadd(Request $request)
    {
        
        $data = new ProfileBio();
        $request->validate([
            'bio' => 'required',
        ]);
        $data->user_id= $request->user_id;
        $data->bio= $request->bio;
        $data->save();

        return Redirect::route('student.profile.cvview')->with('success', 'Bio Updated');
    }
    public function editbio(string $id)
    {
        $user = Auth::user();
        $bio = ProfileBio::all()->where('id','=',$id)->where('user_id','=',$user->id)->first();
        return view('profile.cv.editbio', [
            'bio' => $bio
        ]);
    }
    public function updatebio(Request $request)
    {
        $data = ProfileBio::find($request->id);
        $request->validate([
            'bio' => 'required',
        ]);
        $data->bio= $request->bio;
        $data->save();
        return Redirect::route('student.profile.cvview')->with('success', 'Skill Updated Successfully!');
    }
    public function experience()
    {
        return view('profile.cv.experience');
    }
    public function experienceadd(Request $request)
    {
        $data = new Experience();
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required',
            'institution' => 'required',
            'year' => 'required',
        ]);
        $data->user_id= $request->user_id;
        $data->title= $request->title;
        $data->detail= $request->detail;
        $data->institution= $request->institution;
        $data->year= $request->year;
        $data->status= $request->status;
        $data->save();

        return Redirect::route('student.profile.cvview')->with('success', 'Experience Updated');
    }
    public function editexperience(string $id)
    {
        $user = Auth::user();
        $experience = Experience::all()->where('id','=',$id)->where('user_id','=',$user->id)->first();
        return view('profile.cv.editexperience', [
            'experience' => $experience
        ]);
    }
    public function updateexperience(Request $request)
    {
        $data = Experience::find($request->id);
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required',
            'institution' => 'required',
            'year' => 'required',
        ]);
        $data->title= $request->title;
        $data->detail= $request->detail;
        $data->institution= $request->institution;
        $data->year= $request->year;
        $data->status= $request->status;
        $data->save();
        return Redirect::route('student.profile.cvview')->with('success', 'Education Updated Successfully!');
    }
    public function experiencedestroy($id)
    {
        $data = Experience::find($id);
        $data->delete();
        return Redirect::route('student.profile.cvview')->with('danger','Data has been deleted Successfully!');

    }
    
}
