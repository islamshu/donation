<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index')->with('news',News::get());
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();
        return redirect()->route('news.index')->with(['success'=> trans('Added successfully')]);
    }
    public function edit($id)
    {
        return view('admin.news.edit')->with('new',News::find($id));
    }
    public function updATE(Request $request,$id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();
        return redirect()->route('news.index')->with(['success'=> trans('Edit successfully')]);
    }
     public function destroy($id)
    {
        $slider =News::find($id);
        $slider->delete();
        return redirect()->back()->with(['success'=> trans('Deleted successfully')]);
    }
}
