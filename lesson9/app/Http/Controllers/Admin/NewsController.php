<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
//        dd(News::query()->paginate(5));
        return view('admin.news', [
            'news' => News::query()->paginate(5)
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $request->flash();

            $news = new News();
            $request->validate($news->rules(), $news->messages(), $news->attributeName());

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $url = Storage::url($path);
            }

            $news->image = $url;
            $news->fill($request->all())->save();

            return redirect()->route('news.one', $news);
        }

        return view('admin.create',[
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, News $news) {

        if ($request->isMethod('put')) {
            $request->validate($news->rules(), $news->messages(), $news->attributeName());

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $url = Storage::url($path);
            }

            $news->image = $url;
            $news->fill($request->all())->save();

            return redirect()->route('news.one', $news);
        }

        return view('admin.update', [
            'news' => $news,
            'categories' => Categories::all()
        ]);

    }

    public function destroy(News $news)
    {
        $news->delete();
        return view('admin.deleted');
    }

    public function test1()
    {

        return response()->json(News::all())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        return response()->download('cat.jpg');
    }
}
