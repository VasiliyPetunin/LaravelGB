<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XMLParser;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

class ParserController extends Controller
{
    public function index()
    {
        $xml = XMLParser::load('https://iz.ru/xml/rss/all.xml');
        $data = $xml->parse([
           'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
        ]);
        $newsIz = $data['news'];

        $xml = XMLParser::load('https://lenta.ru/rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);
        $newsLenta = $data['news'];

        $newsData = array_merge($newsIz, $newsLenta);

        $this->createNews($newsData);

        return redirect()->route('news.index');
    }

    protected function createNews($newsData)
    {
        foreach ($newsData as $newsItem) {
            if($this->checkIsNewsExist($newsItem)) {
                continue;
            }

            $categoryId = $this->category($newsItem);

            $goodNewsArr = [
                'title' => $newsItem['title'],
                'text' => $newsItem['description'],
                'isPrivate' => false,
                'link' => $newsItem['link'],
                'created_at' => $newsItem['pubDate'],
                'category_id' => $categoryId
            ];
            $news = new News();
            $news->image = isset($newsItem['enclosure::url']) ? $newsItem['enclosure::url'] : 'storage/img/izRu.jpg';
            $news->fill($goodNewsArr)->save();
        }
    }

    protected function checkIsNewsExist($newsOne) {
        $news = News::all();
        foreach ($news as $item) {
            if($item->created_at == $newsOne['pubDate']) {
                return true;
            }
        }
        return false;
    }

    protected function category($newsOne) {
        $categories = Categories::all();

        if(isset($newsOne['category'])) {
            foreach ($categories as $category) {
                if($category['title'] === $newsOne['category']) {
                    return $category['id'];
                }
            }
            $categoryController = new AdminCategoryController();
            return $categoryController->create($newsOne['category']);
        }

        return 0;
    }
}
