<?php

namespace App\Http\Controllers\backend;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
  public function index(Request $request) {
    $faqs = Faq::select('faqs.*','users.name as username');
    $faqs = $faqs->join('users','users.id','faqs.user_id');
    if(!empty($request->get('query'))) {
        $faqs =  $faqs->where('question','like','%'.$request->get('query').'%');
    }

    $faqs = $faqs->orderBy('created_at','desc');
    $faqs = $faqs->paginate(10);

    $data['faqs'] = $faqs;
    $data['header_title'] = 'FAQ';
    return view('backend.faq.list',$data);

  }


  public function create() {
    $data['header_title'] = 'Create FAQ';
    return view('backend.faq.create',$data);
  }

  public function store(Request $request) {
    $request->validate([
           'question' => 'required',
           'answer' => 'required'
    ]);

    $faq = new Faq();
    $faq->question = trim($request->question);
    $faq->answer = trim($request->answer);
    $faq->user_id = Auth::user()->id;
    $faq->status = trim($request->status);
    $faq->save();

    return redirect()->route('faq.list')->with('success','Faq Successfully Created');

  }

  public function edit(string $id) {
      $data['header_title'] = 'Edit FAQ';
      $data['faq']= Faq::findOrFail($id);
      return view('backend.faq.edit',$data);
  }


  public function update(Request $request, string $id) {
    $request->validate([
        'question' => 'required',
        'answer' => 'required'
 ]);
     $faq = Faq::findOrFail($id);
     $faq->question = trim($request->question);
     $faq->answer = trim($request->answer);
     $faq->user_id = Auth::user()->id;
     $faq->status = trim($request->status);
     $faq->save();
     return redirect()->route('faq.list')->with('success','Faq Successfully Updated');
  }

  public function destroy(string $id) {
    $faq = Faq::findOrFail($id);
    $faq->delete();
    return redirect()->back()->with('success','Faq Successfully Deleted');
  }
}