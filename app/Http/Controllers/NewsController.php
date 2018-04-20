<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Cat;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use App\Validators\NewsValidator;

/**
 * Class NewsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewsController extends Controller
{
//    /**
//     * @var NewsRepository
//     */
//    protected $repository;
//
//    /**
//     * @var NewsValidator
//     */
//    protected $validator;
//
//    /**
//     * NewsController constructor.
//     *
//     * @param NewsRepository $repository
//     * @param NewsValidator $validator
//     */
    public function __construct(NewsRepository $repository, NewsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('cat')->get();

        return response()->json($news);

    }

    public function getNews (){
        $news = News::orderBy('id','DESC')->limit(9)->get();
        return response()->json($news);
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  NewsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create()
    {
        $cats = Cat::all();
        return response()->json(['cats'=>$cats]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $storage =  config('app.url').'/uploads/images/news/';
        $news = new News();
        $news->name = $request->name;
        $news->preview_text = $request->preview_text;
        $news->detail_text = $request->detail_text;
        $news->id_cat = $request->id_cat;
        if($request->hasFile('image')){
            $image = $request->file('image'); //get image file
            $image_name =  $storage.time().'_'.$image->getClientOriginalName(); // get name image
            $image->move('uploads/images/news',$image_name);
            $news->image=$image_name;
            $news->save();
            return response()->json($news);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = $this->repository->find($id);
        return response()->json($new,200);
//        $new = News::find($id);
//        return response()->json($new,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $cats = Cat::all();
        return response()->json([$news,$cats]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {

        $storage =  config('app.url').'/uploads/images/news/';
        $news = News::find($id);
        $news->name = $request->name;
        $news->preview_text = $request->preview_text;
        $news->detail_text = $request->detail_text;
        $news->id_cat = $request->id_cat;
        if($request->hasFile('image')){
            $image = $request->file('image'); //get image file
            $image_name =  $storage.time().'_'.$image->getClientOriginalName(); // get name image
            $image->move('uploads/images/news',$image_name);
            $news->image=$image_name;
        }
        $news->save();
        return response()->json($news);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return response()->json($new);
    }
}
