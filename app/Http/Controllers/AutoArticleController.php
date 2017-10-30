<?php

namespace App\Http\Controllers;

use App\AutoArticle;
use App\Http\Requests\AutoArticleRequest;
use Exception;
use Illuminate\Http\Request;
use Session;

class AutoArticleController extends Controller
{
    public function listAutoArticle(Request $request)
    {
        $response = [
            'title'=>'Auto article'
        ];
        $autoArticles_query = AutoArticle::select([
            'id',
            'title',
            'description',
            'keyword',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by'
        ]);
        $response['autoArticles'] = $autoArticles_query->paginate(20);
        return view('admin.autoArticle.list',$response);
    }

    public function getAddAutoArticle()
    {
        $response = [
            'title'=>'Add auto article'
        ];
        return view('admin.autoArticle.add',$response);
    }

    public function postAddAutoArticle(AutoArticleRequest $request)
    {
        $autoArticle = new AutoArticle();
        $autoArticle->title = $request->txt_title;
        $autoArticle->description = $request->txt_description;
        $autoArticle->keyword = $request->txt_keyword;
        $autoArticle->created_by = Session::get('user_id');
        $autoArticle->created_at = round(microtime(true));
        try{
            $autoArticle->save();
            return redirect()->route('listAutoArticle')->with('success','You have successfully added auto article !');
        }catch (Exception $e){
            return redirect()->route('listAutoArticle')->with('error','Error ! Database');
        }
    }

    public function getEditAutoArticle($autoArticle_id)
    {
        $autoArticle = AutoArticle::find($autoArticle_id);
        if(!isset($autoArticle)){
            return redirect()->back()->with('error','Auto article is not exist !');
        }
        $response = [
            'title'=>'Edit auto article'
        ];
        $response['autoArticle'] = $autoArticle;
        return view('admin.autoArticle.edit',$response);
    }

    public function postEditAutoArticle(AutoArticleRequest $request,$autoArticle_id)
    {
        $AutoArticle = AutoArticle::find($autoArticle_id);
        $AutoArticle->title = $request->txt_title;
        $AutoArticle->description = $request->txt_description;
        $AutoArticle->keyword = $request->txt_keyword;
        $AutoArticle->updated_by = Session::get('user_id');
        $AutoArticle->updated_at = round(microtime(true));
        try{
            $AutoArticle->save();
            return redirect()->back()->with('success','You are successfully fixed auto article !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }

    }

    public function deleteAutoArticle($autoArticle_id)
    {
        $autoArticle = AutoArticle::find($autoArticle_id);
        if(!isset($autoArticle)){
            return redirect()->back()->with('error','AutoArticle is not exist !');
        }
        try{
            $autoArticle->delete();
            return redirect()->back()->with('success','You have deleted auto article successfully !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error ! Database');
        }
    }
}
