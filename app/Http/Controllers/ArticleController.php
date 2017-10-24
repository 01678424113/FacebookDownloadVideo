<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Exception;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{
    public function listArticle(Request $request)
    {
        $response = [
            'title' => 'Article'
        ];
        $articles_query = Article::select([
            'id',
            'title',
            'content',
            'description',
            'keyword',
            'create_at'
        ])->orderBy('create_at', 'DESC');
        if ($request->has('title_search') && $request->input('title_search') != "") {
            $articles_query->where('title', 'LIKE', '%' . $request->input('title_search') . '%');
        }

        $response['articles'] = $articles_query->paginate(20);
        return view('admin.article.list', $response);
    }

    public function getAddArticle()
    {
        $response = [
            'title' => 'Add article'
        ];
        return view('admin.article.add', $response);
    }

    public function postAddArticle(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->txt_description;
        $article->content = $request->txt_content;
        $article->keyword = $request->keyword;
        $article->create_at = round(microtime(true));

        try {
            $article->save();
            return redirect()->back()->with('success', 'You have successfully added article !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }
    }

    public function getEditArticle($article_id)
    {
        $article = Article::find($article_id);
        if (!isset($article)) {
            return redirect()->back()->with('error', 'Article is not exist !');
        }
        $response = [
            'title' => 'Edit article ' . $article->title
        ];
        $response['article'] = $article;
        return view('admin.article.edit', $response);
    }

    public function postEditArticle(ArticleRequest $request, $article_id)
    {
        $article = Article::find($article_id);
        $article->title = $request->title;
        $article->description = $request->txt_description;
        $article->content = $request->txt_content;
        $article->keyword = $request->keyword;
        $article->update_at = round(microtime(true));
        try {
            $article->save();
            return redirect()->back()->with('success', 'You have successfully fixed article !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }

    }

    public function deleteArticle($article_id)
    {
        $article = Article::find($article_id);
        if (!isset($article)) {
            return redirect()->back()->with('error', 'Article is not exist !');
        }
        try {
            $article->delete();
            return redirect()->back()->with('success', 'You have successfully deleted article !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }
    }


    public function doHandleImage(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'file-image' => "required|image",
            ], [
                'file-image.required' => "Hình ảnh không hợp lệ",
                'file-image.image' => "Hình ảnh không hợp lệ",
            ]);
            if (!$validator->fails()) {
                try {
                    $path = 'public/images/';
                    $file = $request->file('file-image');
                    $name = $file->getClientOriginalName();
                    $file->move($path, $name);
                    return response()->json([
                        "status_code" => 200,
                        "data" => $path . $name
                    ]);
                } catch (\Exception $ex) {
                    return response()->json([
                        "status_code" => 500,
                        "message" => "Lỗi trong quá trình xử lý dữ liệu",
                    ]);
                }
            } else {
                return response()->json([
                    "status_code" => 442,
                    "message" => $validator->errors()->first(),
                ]);
            }
        }
        return redirect()->action('Admin\HomeController@index')->with('error', 'Không được truy cập trực tiếp');
    }

}
